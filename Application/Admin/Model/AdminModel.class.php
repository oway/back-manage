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
     * 得到用户权限,并保存到memcache中
     *
     * @author Oway
     * @param $adminid
     */
    public function getPermission($adminid) {
        //角色权限

        //用户自身权限
    }
}