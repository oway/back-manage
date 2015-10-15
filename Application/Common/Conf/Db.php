<?php
return array(
//    'default' => array(
//        'db_type'  => 'mysql',
//        'db_user'  => 'root',
//        'db_pwd'   => '123123',
//        'db_host'  => 'localhost',
//        'db_port'  => '3306',
//        'db_name'  => 'bamboo',
//        'db_charset' => 'utf8mb4',
//        'db_debug' => true
//    ),
    'default' => 'mysql://root:123123@localhost:3306/bamboo#utf8mb4',
    'blog' => array(
        'DB_TYPE'   => 'pdo', // 数据库类型
        'DB_USER'   => 'root', // 用户名
        'DB_PWD'    => '123123', // 密码
        'DB_DEBUG'  => TRUE,
        //'DB_PREFIX' => 'think_', // 数据库表前缀
        'DB_DSN'    => 'mysql:host=localhost;dbname=bamboo_blog;charset=utf8mb4'
    ),
    'image' => array(
        'DB_TYPE'   => 'pdo', // 数据库类型
        'DB_USER'   => 'root', // 用户名
        'DB_PWD'    => '123123', // 密码
        'DB_DEBUG'  => TRUE,
        //'DB_PREFIX' => 'think_', // 数据库表前缀
        'DB_DSN'    => 'mysql:host=localhost;dbname=bamboo_image;charset=utf8mb4'
    ),
);