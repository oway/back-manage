<?php
/**
 * Created by PhpStorm.
 * User: Oway
 * Date: 15-10-22
 * Time: 上午12:05
 * Product: PhpStorm
 */

namespace Admin\Model;


class AdminMenuModel extends BaseModel
{
    protected $connecting = 'default';

    protected $defaultAction = 'index';

    const DISPLAY_SHOW = 1; //可见
    const DISPLAY_NONE = 0; //不可见

    const ADMIN_MENU_MEMCACHE = 'admin_menu';
    const ADMIN_PRIV_MECACHE = 'admin_priv_';
    /**
     * 得到菜单
     *
     * @author Oway
     * @return array|bool|mixed
     */
    public function getMenu() {
        if( empty(getUId()) ) {
            return false;
        }

        if( !$menu = S(self::ADMIN_MENU_MEMCACHE) ) {  //从缓存中(memcache)中查找菜单
            //>>超级管理员获得所有菜单
            $menu = $this->field('menuid,name,parentid,m,c,a,data,icon,display')->order('listorder ASC')->select();
            if( !empty($menu) ) {
                $menu = $this->_handleMenu($menu);
                S(self::ADMIN_MENU_MEMCACHE,$menu);  //将菜单设置到缓存memcache中
            }
        }
        return getTreeWithChildren($menu['menus'],'menuid','parentid');
    }

    /**
     * 处理菜单数据admin_menu
     *
     * @author Oway
     * @param $menu
     * @return array
     */
    private function _handleMenu($menu){
        $menus = $parents = $paths =array();
        foreach( $menu as $value) {
            $rules = (!empty($value['m']) ? '/' . $value['m'] : '' ) . '/' . $value['c'] . '/' . $value['a'] . (!empty($value['data']) ? '?' . $value['data'] : '');
            $menus[$value['menuid']] = $value;
            $menus[$value['menuid']]['rules'] = $rules;
            $parents[$value['parentid']][] = $value['menuid'];
            $paths[$rules] = $value['menuid'];
        }
        $arr = array('parents' => $parents,'menus' => $menus, 'paths' => $paths);
        return $arr;
    }

    /**
     * 得到面包屑
     *
     * @author Oway
     * @param null $id
     * @param array $menu
     * @return array|bool
     */
    public function getBreadCrumbNav($id = null,&$menu = array()) {
        if(empty($menu)) {
            $menu = S(self::ADMIN_MENU_MEMCACHE);
        }
        $requestUrl = $this->_handleRequestUrl();
        if(!isset($menu['paths'][$requestUrl])) {
            return array('status' => 0);
        }
        if(empty($id)) {
            $id = $menu['paths'][$requestUrl];
        }
        $rs = array();
        $menuRow = $menu['menus'][$id];
        $key = '/' . (empty($menuRow['m']) ? '' : $menuRow['m'] . '/') . $menuRow['c'] . '/' . $menuRow['a'] . (!empty($menuRow['data']) ? '?' . $menu['data'] : '');
        if ($menuRow['parentid'] != 0) {
            $tmpRs = $this->getBreadCrumbNav($menuRow['parentid'], $arr);
            $rs = array_merge($rs, $tmpRs);
        }
        $rs[$key] = array('name' => $menuRow['name'], 'icon' => $menuRow['icon']);
        return $rs;
    }

    /**
     * 处理url
     * eg: /Admin/index/p/1 => /admin/index
     *
     * @author Oway
     * @return string
     */
    private function _handleRequestUrl() {
        $requestUrl = $_SERVER['REQUEST_URI'];
        $url = '';
        if(strpos($requestUrl,'?') !== false) {
            $requestUrl = strchr($requestUrl,'?',true);
        }
        //eg:/Admin/Edit => /admin/edit
        $requestUrlArr = array_map(function($v){
            return lcfirst($v);
        },explode('/',substr($requestUrl,strpos($requestUrl,'/')+1)));
        $requestUrl = '/' . implode('/',$requestUrlArr);

        // eg:/admin/edit
        if(substr_count($requestUrl,'/') == 2) {
            $url = $requestUrl;
        }elseif(substr_count($requestUrl,'/') == 1) {
            $url = $requestUrl . '/' . $this->defaultAction;
        }
        return $url;
    }

    /**
     * 得到第三级菜单
     *
     * @author Oway
     * @return array
     */
    public function getUrlChid() {
        $menu = S(self::ADMIN_MENU_MEMCACHE);
        $rules = $this->_handleRequestUrl();
        if( isset($menu['paths'][$rules]) && $menuid = $menu['paths'][$rules]) {
            if(isset($menu['parents'][$menuid])) {
                $rs = array();
                foreach($menu['parents'][$menuid] as $v) {
                    $tmp = isset($menu['menus'][$v]) ? $menu['menus'][$v] : array();
                    if($tmp['display'] == self::DISPLAY_SHOW) {
                        $rs[] = $tmp;
                    }
                }
                return $rs;
            }
        }
        return false;
    }
}