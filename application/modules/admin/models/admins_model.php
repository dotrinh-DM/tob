<?php
/**
 * Created by PhpStorm.
 * User: KhacTung
 * Date: 29/07/2014
 * Time: 22:42
 */
class admins_model extends MY_Model
{
    protected $_primaryKey = 'id_admins';

    /*
     * hàm chọn các trường cần select
     * */
    public function select_column($select = '')
    {
        $this->setSelect($select);
    }

    /*
     * hàm lấy ra danh sách user
     * */
    public function getAll($col = '',$val = '')
    {
        return $this->getList($this->_tbl_admins, $col, $val);
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
     * hàm đếm số bản ghi khớp điều kiện
     * */

    public function count_record()
    {
        return $this->getCountWhere($this->_tbl_admins);
    }

    /*
     * hàm lấy tổng số bản ghi trong bảng
     */

    public function count_all()
    {
        return $this->db->count_all($this->_tbl_admins);
    }

    /*
    * hàm xóa bản ghi trong bảng
    * */
    public function delete_record($val = '')
    {
        return $this->delRows($this->_tbl_admins, $this->_primaryKey, $val);
    }

    /*
     * hàm cập nhật bản ghi trong bảng
     * */
    public function update_record($data = '', $col = '', $val = '')
    {
        if($col == '') { $col = $this->_primaryKey; }
        return $this->updateRow($this->_tbl_admins,$data,$col,$val);
    }

    /*
     * hàm thêm bản ghi trong bảng
     * */
    public function insert_record($data = '')
    {
        return $this->insertRow($this->_tbl_admins,$data);
    }
}