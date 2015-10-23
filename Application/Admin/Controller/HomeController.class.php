<?php
/**
 * Created by PhpStorm.
 * User: Oway
 * Date: 15-10-19
 * Time: 下午9:39
 * Product: PhpStorm
 */

namespace Admin\Controller;


use Common\Library\Api;

class HomeController extends BaseController
{
    public function index() {
        $this->setTitle('首页');
        $this->display();
    }

    public function test() {
        $api = new Api();
        $api->test();
    }
}