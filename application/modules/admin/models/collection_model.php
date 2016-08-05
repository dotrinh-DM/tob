<?php

class collection_model extends MY_Model
{
    protected $_primaryKey = 'id_collection';

    /*
    * ham set where
    * */

    public function where($col = '',$val = '')
    {
        if($col == null) {$col = $this->_primaryKey;}
        $this->setWhere($col, $val);
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
        return $this->getCountWhere($this->_tbl_collections);
    }

    /*
     * hàm lấy ra danh sách ban ghi
     * */
    public function getAll_normal($col = '',$val = '')
    {
        if($col == null) {$col = $this->_primaryKey;}
        return $this->getList($this->_tbl_collections, $col, $val);
    }

    /*
     * hàm lấy ra danh sách
     * */
    public function getAll($number = '', $offset = '', $search = '', $status = '',$trash='')
    {
//        var_dump($trash); die;
        if ($number == '') {
            $number = 20;
        }
        if ($offset == '') {
            $offset = 0;
        }
        if ($status == '') {
            $status = 1;
            $status2 = 1;
        }
        else
        {
            $status2 = $status;
        }
        if ($trash == '') {
            $trash = 0;
        }else{
            $status2 = 0;
        }
        //20,0,0,0,0
        $sql = "
                SELECT
                    *, tbl_collections.status AS status_collection,tbl_collections.id_collection as id_of_collec
                FROM
                    tbl_collections
                LEFT JOIN tbl_images
                ON tbl_collections.id_collection = tbl_images.id_collection
                WHERE tbl_collections.title LIKE '%$search%'
                AND (tbl_collections.status = '$status' OR tbl_collections.status = '$status2')
                AND tbl_collections.trash = '$trash'
                GROUP BY tbl_collections.id_collection
                ORDER BY
                    tbl_collections.id_collection DESC
                LIMIT $offset,$number
        ";
//        var_dump($sql); die;
        return $this->db->query($sql)->result();
    }

    /*
     * ham set where
     * */

    public function viewDetail($id = '')
    {
        return $this->db->query("
                         SELECT  c.id_collection,
                                 c.title,c.idea,c.curly_product,
                                 c.dye_product,c.style_product,
                                 c.care_product,c.technology,
                                 c.date_create as date_collec,
                                 c.status as status_collection,
                                 i.id_images,
                                 i.link,i.status as status_img
                        FROM
                            tbl_collections c
                        LEFT JOIN tbl_images i ON c.id_collection = i.id_collection
                        WHERE
                            c.id_collection = $id ")->result();
    }

    public function getAll_easy($col = '', $val = '')
    {
        if ($col == null) {
            $col = $this->_primaryKey;
        }
        return $this->getList($this->_tbl_collections, $col, $val);
    }

    /*
     * ham set where
     * */

    public function where_collection($col = '', $val = '')
    {
        if ($col == null) {
            $col = $this->_primaryKey;
        }
        $this->setWhere($col, $val);
    }


    /*
     * hàm đếm số bản ghi khớp điều kiện
     * @param int $id
     * @param string $images
     * @return bool
     */

    public function delete($id = '', $images = '')
    {
        if (isset($images) && $images === 1) {
            return $this->delRows($this->_tbl_images, 'id_images', $id);
        } else {
            $this->delRows($this->_tbl_images, 'id_collection', $id);
            return $this->delRows($this->_tbl_collections, $this->_primaryKey, $id);
        }
    }

    /**
     * @param $id
     * @param $data
     */
    public function updateStatus($id, $data, $stat)
    {
        if ($stat == '') {
            $this->updateRow($this->_tbl_collections, $data, $this->_primaryKey, $id);
        } else {
            $this->updateRow($this->_tbl_images, $data, 'id_images', $id);
        }
    }

    public function insert($data = '')
    {
        $this->db->insert($this->_tbl_collections, $data);
        return $this->db->insert_id();
    }

    public function insertImages($data = '')
    {
        $this->db->insert($this->_tbl_images, $data);
    }

    public function insertTag($data = '')
    {
        $this->db->insert($this->_tbl_tag, $data);
    }

    public function getUserById($input_user, $id)
    {
        return $this->db->query("SELECT
                                id_user,first_name,last_name,alias_name,user_type
                            FROM
                                $this->_tbl_users
                            WHERE
                                (first_name LIKE '%$input_user%'
                            OR last_name LIKE '%$input_user%'
                            OR alias_name LIKE '%$input_user%')
                            AND user_type = $id
                           ")->result_array();
    }

    public function getLink($id, $images = '')
    {
        if ($images == 1 && $images != '') {
            return $this->getList($this->_tbl_images, 'id_images', $id);
        } else {
            return $this->getList($this->_tbl_images, 'id_collection', $id);

        }
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

    public function countAll()
    {
        return $this->count_all($this->_tbl_collections);
    }

    public function getUserTag($id = '')
    {
        return $this->db->query("
                    SELECT
                        tbl_users.id_user,tbl_users.alias_name,tbl_users.avatar,tbl_users.user_type
                    FROM
                        tbl_users
                    JOIN tbl_tag ON tbl_users.id_user = tbl_tag.id_user
                    WHERE
                        tbl_tag.id_collection = $id
                    AND tbl_tag.status = 1")->result();
    }

    public function getInfoUserTag($id = '')
    {
        return $this->db->query("
                    SELECT
                        COUNT(tbl_collections.id_user) AS collec_number,
                        SUM(tbl_collections.viewed) AS view_user,
                        SUM(tbl_collections.vote) AS vote_user
                    FROM
                        tbl_collections
                    WHERE
                        id_user = $id")->result();
    }
    public function updateTrash($id='',$data='')
    {
        return $this->updateRow($this->_tbl_collections,$data,'id_collection',$id);
    }
}





















