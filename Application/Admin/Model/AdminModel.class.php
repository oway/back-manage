<?php

/**
 * Created by PhpStorm.
 * User: Oway
 * Date: 15-10-14
 * Time: 下午5:49
 * Product:PhpStorm
 */
namespace Admin\Model;

class AdminModel extends \Think\Model
{
    protected $connection = 'default';

    public function test() {
        return $this->connection;
    }
}