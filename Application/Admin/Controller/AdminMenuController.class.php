<?php
/**
 * Created by PhpStorm.
 * User: Oway
 * Date: 15-10-25
 * Time: 下午12:27
 * Product: PhpStorm
 */

namespace Admin\Controller;


class AdminMenuController extends BaseController
{
    public function index() {
        $count = D('AdminMenu')->count();
        echo $count;
    }
}