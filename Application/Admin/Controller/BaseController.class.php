<?php
/**
 * Created by PhpStorm.
 * User: Oway
 * Date: 15-10-17
 * Time: 上午2:09
 * Product: PhpStorm
 */

namespace Admin\Controller;

use Admin\Model\AdminRoleModel;
use Think\Controller;

class BaseController extends Controller
{
    //标题
    protected $siteTitle;

    public static $homepage = '/home';

    //三级菜单
    protected $_threeMenu = array();

    protected $message;

    //面包屑导航
    protected $breadcrumb = array('');

    //获取来路
    protected $referer;

    const MESSAGE_TYPE_SUCCESS = 'success';

    const MESSAGE_TYPE_ERROR = 'danger';

    const MESSAGE_TYPE_INFO = 'info';

    const AJAX_STATUS_ERROR = 0;

    const AJAX_STATUS_SUCCESS = 1;

    /**
     * 不需要验证是否登陆的PATH
     *
     * @var array
     */
    public static $withOutCheckAuth = array(
        '/index/index' => '',
        '/index/login' => ''
    );

    /**
     * 不需要验证权限的PATH
     *
     * @var array
     */
    public static $withOutRight = array(
        '/index/logout' => '',
        '/home/index' => '',
        '/home/' => '',
        '/home/error' => ''
    );

    /**
     * 控制器每个方法前执行
     *
     * @author Oway
     * @return bool
     */
    protected function _initialize() {
        $callback = $_SERVER['REQUEST_URI'];
        if(!isLogin('_uid')) {
            redirect('/index/login?callback=' . urlencode($callback),2,'请登陆.....');
        }
        if($this->message = cookie('_Message')) {
            cookie('_Message',null);
            $this->assign('errorMessage',$this->message);
        }
        $this->referer = $_SERVER['HTTP_REFERER'];
        if( IS_GET || IS_POST ) {
            if( !$menu = D('AdminMenu')->getMenu() ) {
                $this->redirect('/index/login');
            }
            $this->assign('menu',$menu);

            //面包屑导航
            $this->assign('nowTitle','');

            $rulesed = array();
            if($bread = D('AdminMenu')->getBreadCrumbNav()) {
                $this->breadcrumb = array($this->breadcrumb,$bread);
                foreach($this->breadcrumb as $v) {
                    $this->assign('nowTitle',$v);
                    $rulesed[$v['name']] = '';
                    $this->setTitle($v['name']);
                }
            }
            $this->assign('rulesed',$rulesed);
            //查找第三极菜单
            if(count($this->breadcrumb) > 1) {
                //获取当前访问地址的子地址
                $this->_threeMenu = D('AdminMenu')->getUrlChid();
                $this->assign('threeMenu',$this->_threeMenu);
            }
        }

        //检查权限
        if( !$this->checkAuth() ) {
            $this->redirect($this->referer,'没有权限访问本页.....');
        }
    }

    public function checkAuth() {
        //超级用户不需要检查权限
        $roleid = D('Admin')->where(array('adminid' => getUId()))->field('roleid');
        if($roleid == AdminRoleModel::SUPER_ROLEID) {
            return true;
        }
        //当用户访问的控制器是以public开头的，将不需要对权限进行判断
        if( strtolower(substr(ACTION_NAME, 0, 6) == 'public') ) {
            return true;
        }

//        $controllerRules = (!empty(MODULE_NAME) ? '/' . lcfirst(MODULE_NAME) : '') . '/' . lcfirst(CONTROLLER_NAME) . '/';
        $controllerRules = '/' . lcfirst(CONTROLLER_NAME) . '/';
        $actionRules = $controllerRules . lcfirst(ACTION_NAME);
        if(isset(self::$withOutCheckAuth[$controllerRules]) || isset(self::$withOutCheckAuth[$actionRules])) {
            return true;
        }

        if(isset(self::$withOutRight[$controllerRules]) || isset(self::$withOutRight[$actionRules])) {
            return true;
        }

        if(D('Admin')->checkPath($actionRules)) {
            return true;
        }

        return false;
    }


    protected function setTitle($title) {
        $this->siteTitle = $title;
    }

    /**
     * 重写操作错误跳转的快捷方法
     * @access protected
     * @param string $message 错误信息
     * @param string $jumpUrl 页面跳转地址
     * @param mixed $ajax 是否为Ajax方式 当数字时指定跳转时间
     * @return void
     */
    protected function error($jumpUrl = '', $message = '', $ajax = false)
    {
        if (true === $ajax || IS_AJAX) {
            // AJAX提交
            $data           = is_array($ajax) ? $ajax : array();
            $data['info']   = $message;
            $data['status'] = self::AJAX_STATUS_ERROR;
            $data['url']    = $jumpUrl;
            $this->ajaxReturn($data);
        }
        if (is_int($ajax)) {
            $this->assign('waitSecond', $ajax);
        }

        if(!empty($message)) {
            cookie('_Message',array('message' => $message,'type' => self::MESSAGE_TYPE_ERROR));
        }
        header('location:' . $jumpUrl);
        $this->end();
    }

    /**
     * 重写操作成功跳转的快捷方法
     * @access protected
     * @param string $message 提示信息
     * @param string $jumpUrl 页面跳转地址
     * @param mixed $ajax 是否为Ajax方式 当数字时指定跳转时间
     * @return void
     */
    protected function success($jumpUrl = '',$message = '',  $ajax = false)
    {
        if (true === $ajax || IS_AJAX) {
            // AJAX提交
            $data           = is_array($ajax) ? $ajax : array();
            $data['info']   = $message;
            $data['status'] = self::AJAX_STATUS_SUCCESS;
            $data['url']    = $jumpUrl;
            $this->ajaxReturn($data);
        }
        if (is_int($ajax)) {
            $this->assign('waitSecond', $ajax);
        }

        if(!empty($message)) {
            cookie('_Message',array('message' => $message,'type' => self::MESSAGE_TYPE_SUCCESS));
        }
        header('location:' . $jumpUrl);
        $this->end();
    }

    /**
     * 重写操作成功跳转的快捷方法
     * @access protected
     * @param string $message 提示信息
     * @param string $jumpUrl 页面跳转地址
     * @param mixed $ajax 是否为Ajax方式 当数字时指定跳转时间
     * @return void
     */
    protected function redirect($jumpUrl = '',$message = '')
    {
        if(!empty($message)) {
            cookie('_Message',array('message' => $message,'type' => self::MESSAGE_TYPE_INFO));
        }
        header('location:' . $jumpUrl);
        $this->end();
    }


    /**
     * 优雅的关闭程序
     *
     * @author Oway
     */
    public function end(){
        exit();
    }

}