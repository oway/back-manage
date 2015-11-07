<?php
/**
 * Created by PhpStorm.
 * User: Oway
 * Date: 15-10-19
 * Time: 下午9:39
 * Product: PhpStorm
 */

namespace Admin\Controller;


class HomeController extends BaseController
{
    protected $connection = 'default';

    public function index() {
        $this->setTitle('首页');
        $this->assign('breadcrumb',$this->hehe);
        $this->display();
    }
}