<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * Lớp này có nhiemj vụ thừa kế lớp ci_model và tạo ra 1 số hàm truy vấn
 * Chung cho các model con khác
 */

class MY_Model extends CI_Model {

    /**
     * Khai bao tat ca  cac bang co trong DB
     * @var string
     */
    protected $_tbl_admins      = 'tbl_admins';
    protected $_tbl_users       = 'tbl_users';
    protected $_tbl_collections = 'tbl_collections';
    protected $_tbl_news        = 'tbl_news';
    protected $_tbl_images      = 'tbl_images';
    protected $_tbl_tag         = 'tbl_tag';
    protected $_tbl_config      = 'tbl_config';
    protected $_tbl_province    = 'tbl_province';
    protected $_tbl_district    = 'tbl_district';
    protected $_tbl_category    = 'tbl_category';
    protected $_tbl_product     = 'tbl_product';
    protected $_tbl_brand       = 'tbl_brand';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /*
     * hàm chạy câu lệnh truy vấn
     */

    public function query($sql = '')
    {
        if($sql != null) {
            return $this->db->query($sql);
        }
    }

    /*
     * hàm lấy tổng số bản ghi trong bảng
     */

    public function getCountAll($table = '')
    {
        return $this->db->count_all($table);
    }

    /*
     * hàm lấy tổng bản ghi theo điều kiện
     */

    public function getCountWhere($table = '')
    {
        return $this->db->count_all_results($table);
    }

    /*
     * hàm lấy danh sách theo giới hạn
     */

    public function setLimit($limit = '',$start = '')
    {
        if($limit != null && $start != null ) {
            $this->db->limit($limit,$start);
        } else {
            if($start == null) {
                $this->db->limit($limit);
            }
        }
    }

    /*
    * hàm chọn các trường cần select
    */

    public function setSelect($select = '')
    {
        if($select != null)
        {
            if(is_array($select)) {
                foreach($select as $key) {
                    $this->db->select($key);
                }
            } else {
                $this->db->select($select);
            }
        }
    }

    /*
     * hàm select max
     */

    public function setSelectMax($select = '')
    {
        if($select != null)
        {
            $this->db->select_max($select);
        }
    }

    /*
     * hàm xắp sếp theo một trình tự nhất đinh
     */

    public function setOrder($value = '',$colum = '')
    {
        $this->db->order_by($colum,$value);
    }

    /*
     * hàm đặt where cho câu lệnh sql
     */

    public function setWhere($col = '',$val = '')
    {
        $this->db->where($col,$val);
    }

    /*
     * hàm đặt nhiều where cho câu lệnh sql
     * $where : mảng where
     */

    public function setWheres($where = '')
    {
        $this->db->where($where);
    }

    /*
     * hàm đặt where bằng LIKE
     */

    public function setLike($colum = '',$value = '',$position = '')
    {
        //$position = before, after, none or both;
        //default: both
        if($colum != null && $value != null) {
            $this->db->like($colum,$value,$position);
        }
    }

    /*
     * Hàm này sẽ lấy tất cả bản ghi của một bảng hoặc, theo trường nào đó
     */
    public function getList($table = '',$col = '',$val = '')
    {
        if($col != null && $val != null) {
            $this->setWhere($col,$val);
        }
        return $this->db->get($table)->result_array();
    }

    /*
     * Cập nhật 1 bản ghi cho 1 bảng nào đó
     */
    public function updateRow($table = '', $data = '', $col = '', $val = '')
    {
        $this->db->where("$col", "$val");
        if($this->db->update($table,$data));
        if ($this->db->affected_rows() > 0)
            return TRUE;
        else
            return FALSE;
    }

    /*
     * Thêm bản ghi cho bảng nào đó
     */

    public function insertRow($table = '', $data = '')
    {
        if($this->db->insert($table,$data))
            return TRUE;
        else
            return FALSE;
    }

    /*
     *hàm thêm data vào bảng và trả về id vừa insert
     */

    public function insertGetId($table = '',$data = '')
    {
        if($this->db->insert($table,$data))
            return  $this->db->insert_id();
        else
            return FALSE;
    }

    /*
     * insert nhiều bản ghi vào bảng 1 lúc
     */

    public function insertRows($table = '',$data = '')
    {
        if($this->db->insert_batch($table,$data))
            return TRUE;
        else
            return FALSE;
    }

    /*
     * Xóa 1 bản ghi của bảng nào đó
     * 
     */

    public function delRows($table = '', $col = '', $val = '')
    {
        $this->db->where("$col", "$val");
        $this->db->delete($table);
        if ($this->db->affected_rows() > 0)
            return TRUE;
        else
            return FALSE;
    }

    function count_all($table=''){
        return $this->db->count_all($table);
    }
}
