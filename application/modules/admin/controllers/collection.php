<?php

class Collection extends MY_Controller
{
    /**
     * Of course is ini something
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('collection_model');
        $this->load->library('upload');
    }

    /**
     *  Get all record in tbl_collections
     */

    public function index()
    {
        $data['heading'] = $data['title'] = $this->lang->line('manage_collection');
        $config['base_url'] = base_url('admin/collection/index');
        $config['total_rows'] = $this->collection_model->countAll();
        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['template'] = 'collection/albums';
        $data['collections'] = $this->collection_model->getAll($config['per_page'], $this->uri->segment(4), '', '', '');
        $this->load->view("layout/layout", $data);
    }

    /**
     * @param string $id
     */

    public function viewDetail($id = '')
    {
        if ($id == '' || $id == null) {
            $this->error404();
        } else {
            $data['heading'] = $data['title'] = $this->lang->line('manage_collection');
            $data['collections'] = $this->collection_model->viewDetail($id);
            $data['user_tag'] = $this->collection_model->getUserTag($id);
            $data['user_info_tag'] = array();
            foreach ($data['user_tag'] as $id_user_tag) {
                $data['user_info_tag'][$id_user_tag->id_user] = $this->collection_model->getInfoUserTag($id_user_tag->id_user);
            }
            $data['template'] = 'collection/collection_detail';
            $this->load->view("layout/layout", $data);

        }

    }

    public function moveToTrash($id = '')
    {
        $data = array(
//            'status' => 0,
            'trash' => 1
        );
        if ($this->collection_model->updateTrash($id, $data)) {
            $this->session->set_flashdata('success', 'Đã chuyển đến thùng rác!');
        } else {
            $this->session->set_flashdata('error', 'Xóa thất bại!');
        }
        if ($this->uri->segment(5) == 1) {
            redirect('admin/collection/index');
        } else {
            redirect('admin/collection/approve');
        }
    }

    public function manageTrash()
    {
        $data['heading'] = $data['title'] = 'Thùng rác'; //$this->lang->line('manage_collection');
        $data['template'] = 'collection/albums';
        $data['collections'] = $this->collection_model->getAll('', '', '', '', '1');
        $this->load->view("layout/layout", $data);
    }

    /**
     * Khoi phuc again collection
     * @param string $id
     */
    public function restoreCollection($id = '')
    {
        $data = array(
            'trash' => 0
        );
        if ($this->collection_model->updateTrash($id, $data)) {
            $this->session->set_flashdata('success', 'Khôi phục thành công!');
        } else {
            $this->session->set_flashdata('error', 'Thất bại!');
        }
        redirect('admin/collection/manageTrash');

    }

    /**
     * @param string $id
     */

    public function delete($id = '')
    {
        if ($id == '' || $id == null) {
            $this->error404();
        } else {
            $link_to_del = $this->collection_model->getLink($id);
            foreach ($link_to_del as $item) {
                unlink('uploads/photos/' . $item['link']);
            }
            if ($this->collection_model->delete($id)) {
                $this->session->set_flashdata('success', 'Xóa thành công!');
            } else {
                $this->session->set_flashdata('error', 'Xóa thất bại!');
            }
            if ($this->uri->segment(5) == 'trash') {
                redirect('admin/collection/manageTrash');
            } else {
                redirect('admin/collection/');
            }
        }
    }

    public function deleteImages($id = '', $id_collection = '')
    {
        if ($id == '' || $id == null) {
            $this->error404();
        } else {
            $images = 1;
            $link_to_del = $this->collection_model->getLink($id, $images);
            foreach ($link_to_del as $item) {
                unlink('uploads/photos/' . $item['link']);
            }
            if ($this->collection_model->delete($id, $images)) {
                $this->session->set_flashdata('success', 'Xóa thành công!');
            } else {
                $this->session->set_flashdata('error', 'Xóa thất bại!');
            }
            redirect("admin/collection/viewDetail/$id_collection");
        }
    }

    public function acceptCollection($id = '', $stat = '')
    {
        if ($stat == 1) {
            $data = array(
                'status' => 0
            );
            $this->collection_model->updateStatus($id, $data);
        } else {
            $data = array(
                'status' => 1
            );
            $this->collection_model->updateStatus($id, $data);
        }
        if ($this->uri->segment(5) == 1) {
            redirect('admin/collection');
        } else {
            redirect('admin/collection/approve');
        }
    }

    public function acceptImages($id = '', $id_collec = '', $stat = '')
    {
        if ($stat == 1) {
            $data = array(
                'status' => 0
            );
            $this->collection_model->updateStatus($id, $data, $stat);
        } else {
            $data = array(
                'status' => 1
            );
            $this->collection_model->updateStatus($id, $data, $stat);
        }
        redirect("admin/collection/viewDetail/$id_collec");
    }

    public function getUserById($id)
    {
        $user_input = preg_replace('/\s+/', ' ', trim($_REQUEST['term']));
        $user_arr['data'] = $this->collection_model->getUserById($user_input, $id);
        if (count($user_arr['data']) > 0) {
            $this->load->view('collection/ajax/autocomplete', $user_arr);
        } else {
            $display_json = array();
            $json_arr = array();
            $json_arr["id"] = "#";
            $json_arr["value"] = "";
            $json_arr["label"] = "No Result Found !";
            array_push($display_json, $json_arr);
            $jsonWrite = json_encode($display_json); //encode that search data
            print $jsonWrite;
        }

    }

    /**
     * Create a new album
     */
    public function uploadAlbum()
    {
        $data['heading'] = $data['title'] = $this->lang->line('title_upload');
        $check = TRUE;
        if ($this->input->post()) {

            /**
             * validate inputs
             */
            $this->form_validation->set_rules('title_album', $this->lang->line('title_album'), 'trim|required');
            $this->form_validation->set_rules('designer', $this->lang->line('designer'), 'trim|required');
            $this->form_validation->set_rules('photographer', $this->lang->line('photographer'), 'trim');
            $this->form_validation->set_rules('modelor', $this->lang->line('modelor'), 'trim');
            $this->form_validation->set_rules('salon', $this->lang->line('salon'), 'trim|required');
            $this->form_validation->set_rules('idea', $this->lang->line('idea'), 'trim');
            $this->form_validation->set_rules('curly', $this->lang->line('curly'), 'trim');
            $this->form_validation->set_rules('dye', $this->lang->line('dye'), 'trim|required');
            $this->form_validation->set_rules('style', $this->lang->line('style'), 'trim|required');
            $this->form_validation->set_rules('care', $this->lang->line('care'), 'trim|required');
            $this->form_validation->set_rules('technology', $this->lang->line('technology'), 'trim');

            $this->form_messages();
            if ($this->form_validation->run() == TRUE) {
                /**
                 * Upload images and get link save into a array.
                 */
                $link_upload = 'uploads/photos/';
                $link_data = array();
                $statusUpload = false;
                for ($i = 1; $i < 4; $i++) {
                    if ($_FILES['img' . $i]['error'] == 0) {
                        $statusUpload = true;
                        $succOrNot = $this->uploadImages('img' . $i, $link_upload);
                        if (is_array($succOrNot)) {
                            $link_data[] = $succOrNot;
                        } else {
                            $data['error_img'] = $succOrNot;
                            $data['template'] = 'collection/addform';
                            $this->load->view('layout/layout', $data);
                            $check = FALSE;
                        }
                    }
                }
                if (!$statusUpload) {
                    $data['chooseImage'] = $this->lang->line('chooseimages');

                    $data['template'] = 'collection/addform';
                    $this->load->view('layout/layout', $data);
                    $check = FALSE;
                }
                if ($check) {
                    $this->setInput(array('title_album', 'idea', 'curly', 'dye', 'style', 'care', 'technology'));
                    $combine_data = $this->set_arrdata(array('title', 'idea', 'curly_product', 'dye_product', 'style_product', 'care_product', 'technology'));
                    $id_user = $this->session->userdata('login_info');
                    $combine_data['id_user'] = $id_user['id'];
                    $id_collection = $this->collection_model->insert($combine_data);
                    if ($id_collection) {

                        /**
                         * Insert images into tbl_images
                         */
                        foreach ($link_data as $single_link) {
                            $data_image = array(
                                "id_collection" => $id_collection,
                                "link" => $single_link['file_name']
                            );
                            $this->collection_model->insertImages($data_image);
                        }
                        /**
                         * Get id of each user type and insert it into tbL_tag
                         */
                        $user_type = $this->input->post('user_type');
                        foreach ($user_type as $item) {
                            if ($item != '') {
                                $tags_data = array(
                                    'id_user' => $item,
                                    'id_collection' => $id_collection
                                );
                                $this->collection_model->insertTag($tags_data);
                            }
                        }
                        $this->session->set_flashdata('success', 'Upload successfully!');
                    } else {
                        $this->session->set_flashdata('error', 'Fail Upload!');
                    }
                    redirect("admin/collection");
                }
            }
        }
        if ($check) {
            $data['template'] = 'collection/addform';
            $this->load->view('layout/layout', $data);
        }
    }

    public function searchCollection()
    {
        $temp['collections'] = $this->collection_model->getAll($num = '', $offset = '', $this->input->post('string_name'), '', '');
        if (count($temp['collections']) > 0) {
            $this->load->view('collection/ajax/search_result', $temp);
        } else {
            echo 'No result!';
        }
    }

    public function approve()
    {
        $data['heading'] = $data['title'] = $this->lang->line('manage_collection');
        //number,offset,search,status,trash
        $data['collections'] = $this->collection_model->getAll('', '', '', '0', '');
        $data['template'] = 'collection/albums';
        $this->load->view("layout/layout", $data);
    }

}














