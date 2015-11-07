<?php
/**
 * Created by PhpStorm.
 * User: Oway
 * Date: 15-10-19
 * Time: 上午12:25
 * Product: PhpStorm
 */

namespace Admin\Model;


use Think\Model;
use Think\Page;

class BaseModel extends Model
{
    protected $connection = 'default';

    const DISABLE_YES = 1;  //可用
    const DISABLE_NO = -1;  //不可用

    /**
     * 根据条件得到一行数据
     *
     * @author Oway
     * @param array $where
     * @param string $fields
     * @return bool
     */
    public function getRowByWhere($where = array(),$fields = ''){
        $rs = $this->field($fields)->where($where)->find();
        if( $rs !== false && !empty($rs)) {
            return $rs;
        }
        return false;
    }

    /**
     * 得到符合条件的所有记录
     *
     * @author Oway
     * @param array $where
     * @param string $fields
     * @param string $order
     * @return bool|mixed
     */
    public function getRowsByWhere($where = array(),$fields = '',$order ='') {
        $rs = $this->field($fields)->where($where)->order($order)->select();
        if($rs === false || empty($rs) ) {
            return false;
        }
        return $rs;
    }

    /**
     * 得到分页数据
     *
     * @author Oway
     * @param array $wheres
     * @param string $order
     * @return array
     */
    public function paginate($wheres = array(),$order = '') {
        $count = $this->where($wheres)->count();
        $page = new Page($count);
        $page->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
        $pages = $page->show();

        $start = $page->firstRow;
        if($start > $page->totalRows) {
            $start = $page->totalRows - $page->listRows * ($page->totalPages-1);
        }
        $rows = $this->where($wheres)->order($order)->limit($start,$page->listRows)->select();
        $this->_handlePageRows($rows);
        return array('pages' => $pages,'rows' => $rows);
    }

    /**
     * 钩子方法处理分页数据
     *
     * @author Oway
     * @param $rows
     */
    protected function _handlePageRows(&$rows) {}

    /**
     * 更具条件删除
     *
     * @author Oway
     * @param array $where 删除条件
     * @return mixed
     */
    public function deleteByWhere($where = array()) {
        return $this->where($where)->delete();
    }

    /**
     * 检查满足条件的数据是否存在
     *
     * @author Oway
     * @param array $where
     * @return bool
     */
    public function isExistByWhere($where = array()) {
        if( $rs = $this->where($where)->find() ) {
            return true;
        }
        return false;
    }

    /**
     * 检查该主键记录是否存在
     *
     * @author Oway
     * @param int|string $pk    主键值
     * @return bool
     */
    public function isExistByPK($pk) {
        if($this->where(array($this->getPk() => $pk))->find()) {
            return true;
        }
        return false;
    }

    /**
     * 根据条件查询某个字段的所有值
     *
     * @author Oway
     * @param array $where  where条件
     * @param string $fields    字段名
     * @return array|string
     */
    public function getColumnByWhere($where = array(),$fields = '') {
        $rows = $this->where($where)->select();
        if( $rows === false && empty($rows) ) {
            return null;
        }
        return array_column($rows,$fields);
    }

}