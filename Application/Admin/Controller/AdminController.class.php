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
use Admin\Model\TestModel;

class AdminController extends BaseController
{
    //列表
    public function index() {
        $this->setTitle('管理员首页');
        $wheres = array();
        $data = $this->model->paginate($wheres,'adminid DESC');
        $this->assign('data',$data);
        $this->display();
    }

    //添加
    public function add() {
        $this->setTitle('添加管理员');
        if(IS_POST){
            $data = I('post.');
            if($this->model->create()) {
                $data['encrypt'] = substr(time(),-6);
                $data['lastloginip'] = userIp();
                $data['lastlogintime'] = time();
                $data['password'] = md5(md5($data['password'].$data['encrypt']));
                if($this->model->add($data)) {
                    $this->success('/admin/index','添加成功');
                }
                $this->error($this->referer,'添加失败');
            }
            $this->error($this->referer,$this->model->getError());
        }
        $roleRows = D('AdminRole')->field('roleid,rolename')->where(array('disable' => AdminRoleModel::DISABLE_YES))->select();
        $roleList = selectList($roleRows,'roleid','rolename');
        $this->assign('roleList',$roleList);
        $this->display();
    }

    //编辑
    public function edit() {
        $this->setTitle('编辑管理员');
        if(IS_POST){
            $data = I('post.');
            //用户名不能重复
            if($this->model->isExistByWhere(array('adminid' => array('NEQ',$data['adminid']),'username' => $data['username']))) {
               $this->error($this->referer,'用户名已经存在，请重新填写!');
            }
            //邮箱不能重复
            if($this->model->isExistByWhere(array('adminid' => array('NEQ',$data['adminid']),'email' => $data['email']))) {
                $this->error($this->referer,'邮箱已经存在,请重新填写!');
            }
            $data['lastloginip'] = userIp();
            $data['lastlogintime'] = time();
            if( $this->model->create() ) {
                if( $this->model->save() ) {
                    $this->success('/admin/index','更新成功！');
                }
                $this->error($this->referer,'更新失败!');
            }
            $this->error($this->referer,$this->model->getError());
        }
        $adminid = I('get.adminid');
        $roleRows = D('AdminRole')->field('roleid,rolename')->where(array(array('disable' => AdminRoleModel::DISABLE_YES)))->select();
        $row = $this->model->where(array('adminid' => $adminid))->find();
        $roleList = selectList($roleRows,'roleid','rolename',$row['roleid']);
        $this->assign(array(
            'row' => $row,
            'roleList' => $roleList
        ));
        $this->display();
    }

    //删除
    public function del() {
        if(IS_POST){
            $adminid = I('get.adminid');
            if( $this->model->where(array('adminid' => $adminid))->delete() ) {
                $this->success('/admin/index','删除成功');
            }
            $this->error($this->referer,'删除失败');
        }
        $this->error($this->referer,'请求方式错误');
    }
}