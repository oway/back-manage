<?php
/**
 * Created by PhpStorm.
 * User: Oway
 * Date: 15-10-23
 * Time: 上午9:44
 * Product: PhpStorm
 */

namespace Admin\Model;


class AdminPrivModel extends BaseModel{

    protected $connction = 'default';

    /**
     * 得到管理员权限
     *
     * @author Oway
     * @param $adminid
     * @return array|mixed
     */
    public function getAdminPriv($adminid) {
        $adminPriv = array();
        $roleid = D('Admin')->where(array('adminid' => $adminid))->getField('roleid');
        if($roleid == AdminRoleModel::SUPER_ROLEID) {
            return $adminPriv;
        }
        $adminPriv = $this->field('admin_menu.menuid,m,c,a,data')
            ->where(array('adminid' => $adminid))
            ->join('admin_menu on admin_priv.menuid = admin_menu.menuid')
            ->select();
        if( !empty($adminPriv) ){
            $adminPriv = D('AdminRolePriv')->getPrivByMenu($adminPriv);
            return $adminPriv;
        }
        return $adminPriv;
    }
}