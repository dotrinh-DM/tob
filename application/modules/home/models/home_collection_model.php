<?php

class Home_collection_model extends MY_Model
{
    protected $_primaryKey = 'id_collection';

    public function getConfig($alias_name)
    {
        return $this->db->query("select value from tbl_config where alias = '$alias_name' ")->result();
    }

    public function collectionUploaded($id_user = '',$offset='',$number='')
    {
        if($offset == '')
        {
            $offset = 0;
        }

        $sql = "SELECT
                    tbl_collections.id_collection as id_of_collec,
                    tbl_collections.approve,
                    tbl_collections.title,
                    tbl_collections.status AS status_admin,
                    tbl_images.id_images as id_of_img,
                    tbl_images.link,tbl_images.liked,
                    tbl_images.viewed as view_of_img,
                    tbl_images.vote,
                    tbl_users.alias_name
                FROM
                    tbl_collections
                INNER JOIN tbl_images ON tbl_collections.id_collection = tbl_images.id_collection
                INNER JOIN tbl_users ON tbl_collections.id_user = tbl_users.id_user
                WHERE tbl_collections.id_user = $id_user
                AND tbl_collections.trash = 0
                GROUP BY tbl_collections.id_collection
                LIMIT $offset,$number";
        return $this->db->query($sql)->result();
    }

    public function collectionTagged($id = '',$offset='',$number)
    {
        if($offset == '')
        {
            $offset = 0;
        }
        return $this->db->query("
                            SELECT
                            tbl_images.id_images as id_of_img,
                            tbl_images.link,
                            tbl_tag.`status` AS status_tag,
                            tbl_collections.title,
                            tbl_tag.id_tag
                            FROM
                                tbl_tag
                            INNER JOIN tbl_collections ON tbl_tag.id_collection = tbl_collections.id_collection
                            INNER JOIN tbl_images ON tbl_images.id_collection = tbl_collections.id_collection
                            AND tbl_tag.id_user = $id
                            GROUP BY tbl_collections.id_collection
                            LIMIT $offset,$number")->result();
    }

    public function countAllUploaded($id_user)
    {
        return $this->db->query("
                                SELECT
                                    COUNT(tbl_collections.id_collection) as mount
                                FROM
                                    tbl_collections
                                WHERE
                                    tbl_collections.id_user = $id_user")->result();
    }

    public function countAlltagged($id)
    {
        return $this->db->query("SELECT
                                    count(tbl_tag.id_collection) as mount
                                FROM
                                    tbl_collections
                                INNER JOIN tbl_tag ON tbl_collections.id_collection = tbl_tag.id_collection
                                WHERE
                                    tbl_tag.id_user = $id")->result();
    }

    public function getImagesByIdCollecDetail($id_collec = '')
    {
        return $this->db->query("
            SELECT
                tbl_images.*
            FROM
                tbl_images
            INNER JOIN tbl_collections ON tbl_collections.id_collection = tbl_images.id_collection
            INNER JOIN tbl_users ON tbl_users.id_user = tbl_collections.id_user
            WHERE
                tbl_collections.status = 1
            AND tbl_collections.id_collection = $id_collec
            AND tbl_collections.approve = 1
            AND tbl_collections.trash = 0
            AND tbl_users.status = 1
            AND tbl_images.status = 1
        ")->result();
    }

    public function delete($id = '', $images = '')
    {
        if (isset($images) && $images == 1) {
            return $this->delRows($this->_tbl_images, 'id_images', $id);
        } else {
            $this->delRows($this->_tbl_images, 'id_collection', $id);
            return $this->delRows($this->_tbl_collections, $this->_primaryKey, $id);
        }
    }

    public function RightUser($id = '')
    {
        return $this->db->query("SELECT id_user FROM tbl_collections WHERE tbl_collections.id_collection = $id")->result();
    }

    public function updateCollection($data = '', $id_collec = '')
    {
        $this->updateRow($this->_tbl_collections, $data, $this->_primaryKey, $id_collec);
    }

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
        if ($images == 1) {
            return $this->getList($this->_tbl_images, 'id_images', $id);
        } else {
            return $this->getList($this->_tbl_images, 'id_collection', $id);

        }
    }

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
                        tbl_tag.id_collection = $id")->result();
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

    public function getUserIdInCollection($id = '')
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

    public function updateTrash($id = '', $data = '')
    {
        return $this->updateRow($this->_tbl_collections, $data, 'id_collection', $id);
    }

    public function getDetailCollection($id = '')
    {
        return $this->db->query("
                        SELECT
                            *
                        FROM
                            tbl_collections
                        INNER JOIN tbl_images ON tbl_collections.id_collection = tbl_images.id_collection
                        WHERE
                            tbl_collections.id_collection = $id")->result();
    }

    public function changeStatus($id, $stat)
    {
        if ($stat == 0) {
            $data = array(
                'status' => 1
            );
            $this->updateRow($this->_tbl_tag, $data, 'id_tag', $id);
        } else {
            $data = array(
                'status' => 0
            );
            $this->updateRow($this->_tbl_tag, $data, 'id_tag', $id);
        }
    }

    public function hideAndShowCollection($id, $stat)
    {
        if ($stat == 0) {
            $data = array(
                'approve' => 1
            );
            $this->updateRow($this->_tbl_collections, $data, $this->_primaryKey, $id);
        } else {
            $data = array(
                'approve' => 0
            );
            $this->updateRow($this->_tbl_collections, $data, $this->_primaryKey, $id);
        }
    }

    public function deleteTag($tag = '')
    {
        return $this->delRows($this->_tbl_tag, 'id_tag', $tag);
    }

    public function deleteTagByUser($tag = '', $id_collec = '')
    {
        $this->db->query("DELETE FROM tbl_tag WHERE id_user in ($tag) AND id_collection = $id_collec");
    }

    public function getUserTagged($id_collection)
    {
        return $this->db->query("
                                SELECT
                                    tbl_tag.id_user
                                FROM
                                    tbl_tag
                                INNER JOIN tbl_collections ON tbl_collections.id_collection = tbl_tag.id_collection
                                WHERE
                                    tbl_collections.id_collection = $id_collection")->result();
    }

    public function getUserInfo($id_user = '')
    {
        return $this->db->query("SELECT * FROM tbl_users WHERE id_user = $id_user")->result();
    }

    public function incView($id_img = '')
    {
        $view = $this->db->query("SELECT tbl_images.viewed FROM tbl_images WHERE id_images = $id_img")->result();
        $num = (int) $view[0]->viewed + 1;
        $data =array(
            'viewed'=>$num
        );
        $this->updateRow($this->_tbl_images,$data,'id_images',$id_img);
    }

    public function hasImg($id_img = '')
    {
        $this->db->select('id_images');
        $this->db->where('id_images',$id_img);
        return $this->db->get($this->_tbl_images)->result();
    }

    public function getCollecIDByIdImg($id_img = '')
    {
        $this->db->select('id_collection');
        $this->db->where('id_images',$id_img);
        return $this->db->get($this->_tbl_images)->result();
    }

    public function getInfoUserByIdImg($id_img = '')
    {
        return $this->db->query("
                            SELECT tbl_users.alias_name FROM tbl_images
                            INNER JOIN tbl_collections ON tbl_images.id_collection = tbl_collections.id_collection
                            INNER JOIN tbl_users ON tbl_users.id_user = tbl_collections.id_user
                            WHERE tbl_images.id_images = $id_img")->result();
    }

    public function getProductByCate($input_user, $id_category)
    {
        return $this->db->query("SELECT * FROM tbl_product WHERE id_category = $id_category AND name LIKE '%$input_user%';")->result_array();
    }

    public function getArrayProductId($id_collec ='')
    {
        return $this->db->query("
                            SELECT
                                curly_product,
                                dye_product,
                                style_product,
                                care_product
                            FROM
                                tbl_collections
                            WHERE
                                id_collection = $id_collec")->result_array();
    }


    public function getProductInfoByCollec($id_products ='')
    {
        return $this->db->query("
                            SELECT
                                tbl_product.name AS product_name,
                                tbl_brand.name AS brand_name,tbl_product.id_category,
                                tbl_brand.image,tbl_brand.desc
                            FROM
                                tbl_product
                            JOIN tbl_brand ON tbl_product.id_brand = tbl_brand.id_brand
                            WHERE
                                tbl_product.id_product in ($id_products) ")->result();
    }
    public function incLikeImages($id = '',$like_mount)
    {
        $data =array(
            'liked'=>$like_mount
        );
        $this->updateRow($this->_tbl_images,$data,'id_images',$id);
    }

    public function getTopImages()
    {
        return $this->db->query("SELECT
                                    tbl_images.link,
                                    tbl_images.id_images,
                                    tbl_users.alias_name
                                FROM
                                    tbl_images
                                INNER JOIN tbl_collections ON tbl_collections.id_collection = tbl_images.id_collection
                                INNER JOIN tbl_users ON tbl_users.id_user = tbl_collections.id_user
                                WHERE
                                    tbl_collections.status      = 1
                                    AND tbl_collections.approve = 1
                                    AND tbl_collections.trash   = 0
                                    AND tbl_users.status        = 1
                                    AND tbl_images.status       = 1
                                ORDER BY
                                    liked DESC
                                LIMIT 5")->result();
    }


    public function getCount_collection_show($list_disble = '')
    {
        if($list_disble != null) {
            $this->setWheres("id_user NOT IN('$list_disble')");
        }
        $this->setWhere('status','1');
        $this->setWhere('approve','1');
        $this->setWhere('trash','0');
        return $this->getList($this->_tbl_collections);
    }

//
//    public function descLike($id = '')
//    {
//        $like = $this->db->query("SELECT tbl_collections.unlike FROM tbl_collections WHERE id_collection = $id")->result();
//        $num = (int) $like[0]->unlike + 1;
//        $data =array(
//            'unlike'=>$num
//        );
//        $this->updateRow($this->_tbl_collections,$data,$this->_primaryKey,$id);
//    }

//   public function addPairLike($id_user,$id_collection,$type)
//   {
//       $data = array(
//           'id_user' => $id_user,
//           'id_collection' => $id_collection,
//           "$type" => 1
//       );
//       $this->insertRow('tbl_check_like',$data);
//   }
//
//   public function updatePairLike($id_user,$id_collection,$type)
//   {
//       $this->db->query("UPDATE tbl_check_like SET $type = 1 WHERE id_user = $id_user AND id_collection = $id_collection");
//   }

}





















