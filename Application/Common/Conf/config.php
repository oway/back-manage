<?php
if(APP_DEBUG) { //调试模式
    return array(
        'LOAD_EXT_CONFIG' => 'DbDebug,SystemDebug'
    );
}
return array(
    //'配置项'=>'配置值'
    'LOAD_EXT_CONFIG' => 'Db,System'    //将多个配置文件信息合并,共C()方法使用
);