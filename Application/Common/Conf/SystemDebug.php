<?php
return array(
    'URL_MODEL' => 2,    //rewrite模式
        //只在模板引擎是Think的有用
//    'LAYOUT_ON' => true,    //启用布局
//    'LAYOUT_NAME' => 'Layouts/base',  //默认布局名称layout
//
//    'TMPL_PARSE_STRING' => array(   //模板替换
//        '__JS__' => PUBLIC_PATH . 'js',
//        '__CSS__' => PUBLIC_PATH . 'css',
//        '__IMG__' => PUBLIC_PATH . 'imgs',
//    ),
    //启用smarty模板
    'THINK_PLUGIN_ON' => true,
    'TMPL_TEMPLATE_SUFFIX' => '.tpl',    //模板文件名称后缀
    'TMPL_ENGINE_TYPE'      => 'smarty',
    'TMPL_ENGINE_CONFIG'    => array(
        'debugging' => false,
        'caching' => false, //是否启用缓存
        'cache_lifetime' => 1,  //缓存时间s
        'compile_dir' => TEMP_PATH,
        'cache_dir' => CACHE_PATH . MODULE_NAME . DS,
        'left_delimiter' => '{',
        'right_delimiter' => '}',
    ),

    //smarty定义跳转页面(smarty可能无法解析)
    'TMPL_ACTION_SUCCESS'=>'Layouts:dispatch_jump',
    'TMPL_ACTION_ERROR'=>'Layouts:dispatch_jump',

    //调试模式
    'SHOW_PAGE_TRACE' => true,  //页面trace调试
    'TMPL_CACHE_ON' => false,   //禁止模板编译缓存
    'HTML_CACHE_ON' => false,   //禁止静态缓存

    'PAGE_SIZE' => 5,  //每页显示数据条数

    'DB_FIELD_CACHE' => false
);