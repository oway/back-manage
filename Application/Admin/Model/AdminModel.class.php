<?php

/**
 * Created by PhpStorm.
 * User: Oway
 * Date: 15-10-14
 * Time: 下午5:49
 * Product:PhpStorm
 */
namespace Admin\Model;

class AdminModel extends BaseModel
{
    protected $connection = 'default';

    /**
     * 将用户id和username保存到cookie中
     *
     * @author Oway
     * @param $adminRow
     */
    public function setAdminCookie($adminRow) {
        cookie('_uid',$adminRow['adminid']);
        cookie('_uname',$adminRow['username']);
    }

    /**
     * 清除cookie中的uid和uname
     *
     * @author Oway
     */
    public function delAdminCookie() {
        cookie('_uid',null);
        cookie('_uname',null);
    }

    /**
     * 得到用户权限,并保存到memcache中
     *
     * @author Oway
     * @param $adminid
     */
    public function getPermission($adminid) {
        if( false === S(AdminMenuModel::ADMIN_PRIV_MECACHE)) {
            //角色权限
            $rolePriv = D('AdminRolePriv')->getRolePriv($adminid);
            //用户自身权限
            $selfPriv = D('AdminPriv')->getAdminPriv($adminid);
            $priv = array_merge($rolePriv,$selfPriv);
            $adminPriv = $this->_handleAdminPriv($priv);
            S(AdminMenuModel::ADMIN_PRIV_MECACHE,$adminPriv);
            return $adminPriv;
        }
        return S(AdminMenuModel::ADMIN_PRIV_MECACHE);
    }

    /**
     * 将数据处理成
     *   ["menu"] => array(4) {
                    [2] => string(11) "/menu/index"
                    [3] => string(20) "/menu/add?parentid=0"
                    [4] => string(13) "/menu/edit?id"
                    [5] => string(12) "/menu/delete"
                }
     *
     * @author Oway
     * @param array $priv
     * @return array
     */
    private function _handleAdminPriv($priv = array()) {
        $adminPriv = array();
        if( empty($priv) ) {
            return $adminPriv;
        }
        foreach($priv as $menuid => $value) {
            $adminPriv[$value['c']][$menuid] = $value['rules'];
        }
        return $adminPriv;
    }

    /**
     * 检查请求的路径是否在权限中
     *
     * @author Oway
     * @param string $requestUrl 请求路径
     * @return bool
     */
    public function checkPath($requestUrl){
        $adminPriv = S(AdminMenuModel::ADMIN_PRIV_MECACHE);
        if( isset($adminPriv[lcfirst(CONTROLLER_NAME)]) && in_array($requestUrl,$adminPriv[lcfirst(CONTROLLER_NAME)])) {
            return true;
        }
        return false;
    }
}