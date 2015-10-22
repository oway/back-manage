<?php
namespace Admin\Controller;


class IndexController extends BaseController {

    protected $template;

    public function index() {
        if(!isLogin('_uid')) {  //判断用户是否登陆
            $this->redirect('/index/login','请登录.....');
        }
        //若登陆成功，则跳转到home首页
        $this->redirect( \Admin\Controller\BaseController::$homepage );
    }

    //登陆
    public function login() {
        //layout('/Layouts/layout');  //定义模板
        if(IS_POST){
            $data = I('post.');
            $where = array();
            //>>验证验证码是否正确
            if( !checkVerify($data['verify']) ) {
                $this->error('/index/login','验证码错误');
            }
            if(strpos($data['username'],'@') === false) {
                $where['username'] = $data['username'];
            } else {
                $where['email'] = $data['username'];
            }
            if( !$passwordAndEncrypt = D('Admin')->getRowBywhere($where,'adminid,username,password,encrypt') ) {
                $this->error('/index/login','无此用户信息');
            }
            if( $passwordAndEncrypt['password'] !== md5(md5(trim($data['password']).$passwordAndEncrypt['encrypt']))) {
                $this->error('/index/login','密码错误');
            }
            //讲管理员id和username保存到cookie中
            D('Admin')->setAdminCookie($passwordAndEncrypt);
            //设置权限
            D('Admin')->setPermission($passwordAndEncrypt['adminid']);
            $loginIp = userIp();
            $encrypt = substr(time(),-6);
            D('Admin')->where($where)->save(array('lastloginip' => $loginIp,'lastlogintime' => time(),'encrypt' => $encrypt));
            $this->success('','/home/index');
        }elseif(IS_GET){
            $this->setTitle('后台程序管理登陆');
            $this->display();
        }
    }

    public function getVerify() {
        verify();
    }

}