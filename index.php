<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用入口文件

// 检测PHP环境
if (version_compare(PHP_VERSION, '5.3.0', '<')) {
    die('require PHP > 5.3.0 !');
}

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG', true);

//定义根路径
define('ROOT_PATH',__DIR__ . DIRECTORY_SEPARATOR);

//定义Public路径
define('PUBLIC_PATH',DIRECTORY_SEPARATOR . 'Public' . DIRECTORY_SEPARATOR);

//绑定目录
define('BIND_MODULE','Admin');

// 定义应用目录
define('APP_PATH', './Application/');

//定义文件缓存/日志路径
define('RUN_PATH',ROOT_PATH . 'Runtime' . DIRECTORY_SEPARATOR);


// 引入ThinkPHP入口文件
require '../thinkphp/ThinkPHP/ThinkPHP.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单
