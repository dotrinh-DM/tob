<?php

/**
 * Created by PhpStorm.
 * User: KhacTung
 * Date: 29/07/2014
 * Time: 22:42
 */
class Home_users_model extends MY_Model
{
    protected $_primaryKey = 'id_user';

    public function getUserInfo($id = '')
    {
        return $this->db->query("SELECT * FROM tbl_users WHERE id_user = $id")->result();
    }

    public function getUserAlbumInfo($id = '')
    {
        return $this->db->query("
                    SELECT
                        COUNT(id_user) AS collec_number,
                        SUM(viewed) AS view_user,
                        SUM(vote) AS vote_user
                    FROM
                        tbl_collections
                    WHERE
                        id_user = $id
                    AND status = 1
                    AND approve = 1
                    AND trash = 0")->result();
    }

    public function getAllImagesUser($id_user = '')
    {
        return $this->db->query("
                    SELECT
                        tbl_collections.id_collection,
                        tbl_images.id_images,
                        tbl_images.link,tbl_users.alias_name
                    FROM
                        tbl_collections
                    INNER JOIN tbl_images ON tbl_collections.id_collection = tbl_images.id_collection
                    INNER JOIN tbl_users ON tbl_users.id_user = tbl_collections.id_user
                    WHERE
                        tbl_collections.status = 1
                        AND tbl_collections.approve = 1
                        AND tbl_collections.trash = 0
                        AND tbl_collections.id_user = $id_user")->result();
    }



}