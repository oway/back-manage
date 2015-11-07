<?php
/**
 * Created by PhpStorm.
 * User: Oway
 * Date: 15-10-23
 * Time: 上午12:20
 * Product: PhpStorm
 */

namespace Admin\Model;


class AdminRolePrivModel extends BaseModel
{
    protected $connect = 'default';

    /**
     * 根据roleid得到对应的权限
     *
     * @author Oway
     * @param $adminid
     * @return array|mixed
     */
    public function getRolePriv($adminid) {
        $rolePriv = array();
        $roleid = D('Admin')->where(array('adminid' => $adminid))->getField('roleid');
        if( $roleid == AdminRoleModel::SUPER_ROLEID ){  //超级角色,拥有所有访问路径权限
            $rolePriv = $this->_getPrivMenu($roleid);
            return $rolePriv;
        }
        return $rolePriv;
    }

    /**
     * 根据roleid查询对应的权限
     *
     * @author Oway
     * @param int $roleid   角色id
     * @return array|mixed
     */
    private function _getPrivMenu($roleid) {
        $rolePriv = array();
        $db = D('AdminMenu')->field('admin_menu.menuid,m,c,a,data');
        if( $roleid != AdminRoleModel::SUPER_ROLEID ) { //不是超级用户
            $db->where(array('roleid' => $roleid))->join('admin_role_priv arp on arp.menuid = admin_menu.menuid')->select();
        }
        $rolePrivMenu = $db->select();
        if( !empty($rolePrivMenu) ) {
            $rolePriv = $this->getPrivByMenu($rolePrivMenu);
            return $rolePriv;
        }
        return $rolePriv;
    }

    /**
     * 拼成权限路径
     *
     * @author Oway
     * @param $menu
     * @return array
     */
    public function getPrivByMenu(&$menu) {
        $arr = array();
        foreach($menu as $value) {
            $arr[$value['menuid']]['rules'] = (!empty($value['m']) ? '/' . lcfirst($value['m']) : '') . '/' .lcfirst( $value['c']) . '/' . lcfirst($value['a']) . (!empty($value['data']) ? '?' . $value['data'] : '');
            $arr[$value['menuid']]['c'] = lcfirst( $value['c']);
        }
        return $arr;
    }
}