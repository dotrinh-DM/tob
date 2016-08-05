<?php
/**
 * Created by PhpStorm.
 * User: KhacTung
 * Date: 29/07/2014
 * Time: 22:42
 */
class Home_images_model extends MY_Model
{
    protected $_primaryKey = 'id_images';

    /*
     * hàm lấy ra danh sách ban ghi
     * */
    public function getAll($col = '',$val = '')
    {
        if($col == null) {$col = $this->_primaryKey;}
        return $this->getList($this->_tbl_images, $col, $val);
    }

    /*
     * ham set where
     * */

    public function where_config($col = '',$val = '')
    {
        if($col == null) {$col = $this->_primaryKey;}
        $this->setWhere($col, $val);
    }

    /*
     * ham set wheres
     * */

    public function wheres_config($where = '')
    {
        $this->setWheres($where);
    }

    /*
     * hàm đếm số bản ghi khớp điều kiện
     * */

    public function count_record()
    {
        return $this->getCountWhere($this->_tbl_images);
    }

    /*
     * hàm lấy tổng số bản ghi trong bảng
     * */
    public function count_all()
    {
        return $this->getCountAll($this->_tbl_images);
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
        return $this->delRows($this->_tbl_images, $this->_primaryKey, $val);
    }

    /*
     * hàm cập nhật bản ghi trong bảng
     * */
    public function update_record($data = '', $col = '', $val = '')
    {
        if($col == '') { $col = $this->_primaryKey; }
        return $this->updateRow($this->_tbl_images,$data,$col,$val);
    }

    /*
     * hàm thêm bản ghi trong bảng
     * */
    public function insert_record($data = '')
    {
        return $this->insertRow($this->_tbl_images,$data);
    }


    /*
     * get images
     * */
    public function getJustifiedImagesList($limit = '', $start = '', $access_limit = 1, $is_users = '')
    {
        $set_limit = $set_id_users = '';
        if($access_limit == 1) {
            $set_limit = " LIMIT $start,$limit";
        }
        if($is_users != null) $set_id_users = "AND tbl_users.id_user IN($is_users)";

        return $this->db->query("
            SELECT
                tbl_collections.id_collection,
                tbl_collections.title,
                tbl_images.id_images,
                tbl_images.link,
                tbl_images.viewed,
                tbl_images.liked,
                tbl_users.alias_name
            FROM
                tbl_collections
            INNER JOIN tbl_images ON tbl_collections.id_collection = tbl_images.id_collection
            INNER JOIN tbl_users ON tbl_users.id_user = tbl_collections.id_user
            WHERE
                tbl_collections.status      = 1
                AND tbl_collections.approve = 1
                AND tbl_collections.trash   = 0
                AND tbl_users.status        = 1
                AND tbl_images.status       = 1
                $set_id_users
            ORDER BY tbl_images.id_images DESC
            $set_limit
        ")->result();
    }

}