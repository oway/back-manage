<?php
/**
 * Created by PhpStorm.
 * User: Oway
 * Date: 15-10-22
 * Time: 下午9:05
 * Product: PhpStorm
 */

namespace Admin\Model;


class AdminRoleModel extends BaseModel
{
    protected $connection = 'default';

    const SUPER_ROLEID = 1; //超级管理员
}