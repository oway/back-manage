<?php
/**
 * Created by PhpStorm.
 * User: Oway
 * Date: 15-10-17
 * Time: 上午2:08
 * Product: PhpStorm
 */

namespace Admin\Controller;


use Admin\Model\AdminRoleModel;

class AdminController extends BaseController
{
    //列表
    public function index() {
        $this->setTitle('管理员首页');
        $wheres = array();
        $data = D('Admin')->count();
        dump($data);
        $this->assign('data',$data);
        $this->display();
    }

    //添加
    public function add() {
        $this->setTitle('添加管理员');
        if(IS_POST){
            $data = I('post.');
            if(D('Admin')->create()) {
                $data['encrypt'] = substr(time(),-6);
                $data['lastloginip'] = userIp();
                $data['lastlogintime'] = time();
                $data['password'] = md5(md5($data['password'].$data['encrypt']));
                if(D('Admin')->add($data)) {
                    $this->success('/admin/index','添加成功');
                }
                $this->error($this->referer,'添加失败');
            }
            $this->error($this->referer,D('Admin')->getError());
        }
        $roleRows = D('AdminRole')->where(array('disable' => AdminRoleModel::DISABLE_YES))->select();
        $roleList = selectList($roleRows,'roleid','rolename','roleid');
        $this->assign('roleList',$roleList);
        $this->display();
    }

    //编辑
    public function edit() {
        $this->setTitle('编辑管理员');
        if(IS_POST){

        }
        $adminid = I('get.adminid');
        $row = D('Admin')->where(array('adminid' => $adminid))->find();
        dump($row);
        exit;
        $this->assign('row',$row);
        $this->display();
    }

    //删除
    public function del() {
        if(IS_POST){
            $adminid = I('get.adminid');
            if( D('Admin')->where(array('adminid' => $adminid))->delete() ) {
                $this->success('/admin/index','删除成功');
            }
            $this->error($this->referer,'删除失败');
        }
        $this->error($this->referer,'请求方式错误');
    }
}