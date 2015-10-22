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

    const DISPLAY_SHOW = 1; //可见
    const DISPLAY_NONE = 0; //不可见

    public function getMenu() {
        $adminid = $this->getAdminId();
        //>>超级管理员获得所有菜单
        if($adminid == 1) {
            $menu = $this->order('listorder ASC')->select();
            $menu = $this->_handleMenu($menu);
            return $menu;
        }
    }

    private function _handleMenu($menu){
        $arr = array();
        if( empty($menu) ) {
            return $arr;
        }
        foreach( $menu as $value) {
            $arr[$value['menuid']]['rules'] = (!empty($value['m']) ? '/' . $value['m'] : '' ) . '/' . $value['c'] . '/' . $value['a'] . (!empty($value['data']) ? '?' . $value['data'] : '');
            $arr[$value['menuid']]['icon'] = $value['icon'];
            $arr[$value['menuid']]['name'] = $value['name'];
            $arr[$value['menuid']]['menuid'] = $value['menuid'];
            $arr[$value['menuid']]['parentid'] = $value['parentid'];
        }
        $arr = getTreeWithChildren($arr,'menuid','parentid');
        return $arr;
    }
}