<?php
return array(
    'URL_MODEL' => 2,    //rewrite模式
    'LAYOUT_ON' => true,    //启用布局
    'LAYOUT_NAME' => 'Layouts/layout',  //默认布局名称layout
    'TMPL_TEMPLATE_SUFFIX' => '.tpl',    //模板文件名称后缀

    'TMPL_PARSE_STRING' => array(   //模板替换
        '__JS__' => PUBLIC_PATH . 'js',
        '__CSS__' => PUBLIC_PATH . 'css',
        '__IMG__' => PUBLIC_PATH . 'imgs',
    ),

    //调试模式
    'SHOW_PAGE_TRACE' => true,  //页面trace调试
    'TMPL_CACHE_ON' => true,   //禁止模板编译缓存
    'HTML_CACHE_ON' => true,   //禁止静态缓存

);