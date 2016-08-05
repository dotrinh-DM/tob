<?php
/**
 * Created by PhpStorm.
 * User: KhacTung
 * Date: 29/07/2014
 * Time: 22:42
 */
class category_model extends MY_Model
{
    protected $_primaryKey = 'id_category';

    /*
     * hàm lấy ra danh sách
     * */
    public function getAll($col = '',$val = '')
    {
        if($col == null) {$col = $this->_primaryKey;}
        return $this->getList($this->_tbl_category, $col, $val);
    }

    /*
     * ham set where
     * */

    public function where($col = '',$val = '')
    {
        if($col == null) {$col = $this->_primaryKey;}
        $this->setWhere($col, $val);
    }

    /*
     * ham set wheres
     * */

    public function wheres($where = '')
    {
        $this->setWheres($where);
    }

    /*
     * hàm đếm số bản ghi khớp điều kiện
     * */

    public function count_record()
    {
        return $this->getCountWhere($this->_tbl_category);
    }

    /*
     * hàm lấy tổng số bản ghi trong bảng
     * */
    public function count_all()
    {
        return $this->getCountAll($this->_tbl_category);
    }

    /*
     * hàm lấy danh sách theo giới hạn
     * */
    public function limit_record($limit = '',$start = '')
    {
        $this->setLimit($limit,$start);
    }

    /*
     * hàm chọn các trường cần select
     * */
    public function select_column($select = '')
    {
         $this->setSelect($select);
    }

    /*
     * hàm xắp sếp theo một trình tự nhất đinh
     * */
    public function orderBy($val = '',$col = '')
    {
        if($col == '')
        {
            $col = $this->_primaryKey;
        }
        $this->setOrder($val,$col);
    }

    /*
     * hàm xóa bản ghi trong bảng
     * */
    public function delete_record($val = '')
    {
        return $this->delRows($this->_tbl_category, $this->_primaryKey, $val);
    }

    /*
     * hàm cập nhật bản ghi trong bảng
     * */
    public function update_record($data = '', $col = '', $val = '')
    {
        if($col == '') { $col = $this->_primaryKey; }
        return $this->updateRow($this->_tbl_category,$data,$col,$val);
    }

    /*
     * hàm thêm bản ghi trong bảng
     * */
    public function insert_record($data = '')
    {
        return $this->insertRow($this->_tbl_category,$data);
    }

    /*
    *hàm thêm data vào bảng và trả về id vừa insert
    */

    public function insert_getId($data = '')
    {
         return  $this->insertGetId($this->_tbl_category,$data);
    }

}