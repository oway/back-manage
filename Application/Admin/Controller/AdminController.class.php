<?php
/**
 * Created by PhpStorm.
 * User: Oway
 * Date: 15-10-17
 * Time: 上午2:08
 * Product: PhpStorm
 */

namespace Admin\Controller;


class AdminController extends BaseController
{
    //列表
    public function index() {
        $this->setTitle('管理员首页');
        $wheres = array();
        $data = D('Admin')->paginate($wheres,'adminid DESC');
        $this->assign('data',$data);
        $this->display();
    }
}