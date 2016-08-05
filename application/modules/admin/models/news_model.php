<?php

/**
 * Created by PhpStorm.
 * User: KhacTung
 * Date: 29/07/2014
 * Time: 22:42
 */
class news_model extends MY_Model
{
    protected $_primaryKey = 'id_news';

    /*
     * hàm lấy ra danh sách ban ghi
     * */
    public function getAll($col = '', $val = '')
    {
        if ($col == null) {
            $col = $this->_primaryKey;
        }
        return $this->getList($this->_tbl_news, $col, $val);
    }

    public function getAllQa()
    {
        $this->db->select('*');
        $this->orderBy('DESC');
        $this->db->where('type',1);
        $this->db->where('status',1);
        $this->limit_record(100,0);
        return $this->db->get($this->_tbl_news)->result();
    }

    public function getDetail($alias)
    {
        $this->db->select('*');
        $this->db->where('alias',$alias);
        $this->db->where('status',1);
        return $this->db->get($this->_tbl_news)->result();
    }

    /*
     * ham set where
     * */

    public function where($col = '', $val = '')
    {
        if ($col == null) {
            $col = $this->_primaryKey;
        }
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
        return $this->getCountWhere($this->_tbl_news);
    }

    /*
     * hàm lấy tổng số bản ghi trong bảng
     * */
    public function count_all()
    {
        return $this->getCountAll($this->_tbl_news);
    }

    /*
     * hàm lấy danh sách theo giới hạn
     * */
    public function limit_record($limit = '', $start = '')
    {
        $this->setLimit($limit, $start);
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
    public function orderBy($val = '', $col = '')
    {
        if ($col == '') {
            $col = $this->_primaryKey;
        }
        $this->setOrder($val, $col);
    }

    /*
     * hàm xóa bản ghi trong bảng
     * */
    public function delete_record($val = '')
    {
        return $this->delRows($this->_tbl_news, $this->_primaryKey, $val);
    }

    /*
     * hàm cập nhật bản ghi trong bảng
     * */
    public function update_record($data = '', $col = '', $val = '')
    {
        if ($col == '') {
            $col = $this->_primaryKey;
        }
        return $this->updateRow($this->_tbl_news, $data, $col, $val);
    }

    /*
     * hàm thêm bản ghi trong bảng
     * */
    public function insert_record($data = '')
    {
        return $this->insertRow($this->_tbl_news, $data);
    }

}