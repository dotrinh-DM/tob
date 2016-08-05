<?php
/**
 * Created by PhpStorm.
 * User: KhacTung
 * Date: 29/07/2014
 * Time: 22:42
 */
class province_model extends MY_Model
{
    protected $_primaryKey = 'provinceid';

    /*
     * hàm lấy ra danh sách ban ghi
     * */
    public function getAll($col = '',$val = '')
    {
        return $this->getList($this->_tbl_province, $col, $val);
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
     * ham set where
     * */

    public function where_user($col = '',$val = '')
    {
        $this->setWhere($col, $val);
    }

    /*
     * hàm đếm số bản ghi khớp điều kiện
     * */

    public function count_record()
    {
        return $this->getCountWhere($this->_tbl_province);
    }
}