<?php

//判断用户是否登陆
function isLogin($uid){
    return cookie($uid) ? cookie($uid) : false;
}

//得到adminid
function getUId() {
    return (!empty(cookie('_uid'))) ? cookie('_uid') : '';
}

//生成验证码
function verify() {
    ob_clean();
    $verify = new \Think\Verify();
    $verify->entry();
}

//验证验证码
function checkVerify($code) {
    $verify = new \Think\Verify();
    return $verify->check($code);   //成功删除服务器上的验证码，失败则不会删除
}

//得到用户IP
function userIp() {
    $ip = isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : '';
    if (empty($ip)) {
        $ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : '';
    }
    if (empty($ip)) {
        $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
    }
    return $ip;
}

/**
 * 获得带有子集(children)的树形数组
 *
 * @author Oway
 * @param array $arr        需要排成树形结构的数组
 * @param string $pkField   主键字段值
 * @param string $pidField  父id字段值
 * @param int $pid          父id
 * @param int $level        层级
 * @return array
 */
function getTreeWithChildren($arr = array(),$pkField = '',$pidField='',$pid=0,$level=0) {
    $tree = array();
    if(!is_array($arr) || empty($arr)) {
        return $tree;
    }
    foreach($arr as $key=>$row) {
        if($row[$pidField] == $pid) {
            $row['level'] = $level;
            $children = getTreeWithChildren($arr,$pkField,$pidField,$row[$pkField],$level+1);
            if(!empty($children)) {
                $row['child'] = $children;
            }
            $tree[$key] = $row;
        }
    }
    return $tree;
}

/**
 * 得到下拉框
 *
 * @author Oway
 * @param array $arr
 * @param string $selectName 下拉框名称
 * @param string $optionName    option内容
 * @param string $optionValue   option值
 * @return string
 */
function selectList($arr = array(),$selectName= '',$optionName='',$optionValue=''){
    $str = '<div class="col-sm-4"><select name="'.$selectName.'" class="form-control" id="'.$selectName.'">';
    $str .= '<option value="0">----请选择----</option>';
    foreach($arr as $v) {
        $str .= '<option value="'.$v[$optionValue].'">'.$v[$optionName].'</option>';
    }
    $str .= '</select></div>';
    return $str;
}