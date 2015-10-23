<?php
namespace Admin\Controller;


use Admin\Model\AdminMenuModel;
use Think\Controller;

class IndexController extends Controller {

    protected $template;

    public function index() {
        if(!isLogin('_uid')) {
            $this->error('请登陆.....','/index/login');
        }
        //若登陆成功，则跳转到home首页
        $this->redirect( \Admin\Controller\BaseController::$homepage );
    }

    //登陆
    public function login() {
        if(IS_POST){
            $data = I('post.');
            $where = array();
//            //>>验证验证码是否正确
//            if( !checkVerify($data['verify']) ) {
//                $this->error('/index/login','验证码错误');
//            }
            if(strpos($data['username'],'@') === false) {
                $where['username'] = $data['username'];
            } else {
                $where['email'] = $data['username'];
            }
            if( !$passwordAndEncrypt = D('Admin')->getRowBywhere($where,'adminid,username,password,encrypt') ) {
                $this->error('无此用户信息','/index/login');
            }
            if( $passwordAndEncrypt['password'] !== md5(md5(trim($data['password']).$passwordAndEncrypt['encrypt']))) {
                $this->error('密码错误','/index/login');
            }
            //讲管理员id和username保存到cookie中
            D('Admin')->setAdminCookie($passwordAndEncrypt);
            //设置权限
            D('Admin')->getPermission($passwordAndEncrypt['adminid']);
            $loginIp = userIp();
            $encrypt = substr(time(),-6);
            $password = md5(md5($data['password'] . $encrypt));
            D('Admin')->where($where)->save(array('lastloginip' => $loginIp,'lastlogintime' => time(),'encrypt' => $encrypt,'password' => $password));
            if(!empty($data['callback'])) {
                $this->success('登陆成功',urldecode($data['callback']));
            }
            $this->success('登陆成功','/home/index');
        }elseif(IS_GET){
            $callback = I('get.callback');
            $this->assign('callback',$callback);
            $this->assign('siteTitle','后台程序管理登陆');
            $this->display();
        }
    }

    /**
     * 退出
     *
     * @author Oway
     */
    public function logout() {
        //>>清除cookie中的uid和uname
        D('Admin')->delAdminCookie();
        $this->success('退出成功',U('/index/login'));
    }
    //得到验证码
    public function getVerify() {
        verify();
    }

}