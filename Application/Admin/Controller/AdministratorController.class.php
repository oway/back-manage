<?php
/**
 * Created by PhpStorm.
 * User: Oway
 * Date: 15-10-14
 * Time: 下午7:48
 * Product:PhpStorm
 */

namespace Admin\Controller;


use Think\Controller;

class AdministratorController extends Controller
{
    public function index() {
        $rows = D('admin')->select();
        $this->display();
    }
}