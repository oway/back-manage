<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{

    public function index()
    {
        $data = array(
            array('name' => 'oway','age' => 12),
            array('name' => 'liubei','age' => 13),
            array('name' => 'zhangfei','age' => 14),
            array('name' => 'caocao','age' => 15),
            array('name' => 'guanyu','age' => 16)
        );
        $this->assign('data',$data);
        $this->display();
    }
}