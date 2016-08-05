<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Collection extends MY_Controller
{
    protected $_upload_rule = '';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/collection_model');
        $this->load->model('home_collection_model');
        $this->load->library('upload');
        $this->_upload_rule = $this->home_collection_model->getConfig('rule_upload');
    }

    public function index()
    {
        $this->notLogin();
        $data['title'] = 'Upload';
        $data['template'] = 'collection/upload';
        $data['rule_upload'] = $this->_upload_rule[0]->value;
        $this->load->view('layout/layout', $data);
    }

    public function upload()
    {
        $this->notLogin();
        $data['rule_upload'] = $this->_upload_rule[0]->value;
        $check = true;
        $check_upload_img = array();
        $this->validate();
        $this->form_messages();
        if ($this->form_validation->run() == TRUE) {
            if ($_SESSION['captcha'] == $this->input->post('captcha')) {
                foreach ($_FILES as $img)
                {
                    $check_upload_img[] = $img['error'];
                }
                if(!in_array(4,$check_upload_img)){
                    $this->session->unset_userdata('captcha');
                    $link_upload = 'uploads/photos/';
                    $link_data = array();
                    $statusUpload = false;
                    for ($i = 1; $i < 5; $i++) {
                        if ($_FILES['img' . $i]['error'] == 0) {
                            $statusUpload = true;
                            $succOrNot = $this->uploadImages('img' . $i, $link_upload);
                            if (is_array($succOrNot)) {
                                $link_data[] = $succOrNot;
                            } else {
                                $data['title'] = 'Upload';
                                $data['error_img'] = $succOrNot;
                                $data['template'] = 'collection/upload';
                                $this->load->view('layout/layout', $data);
                                $check = FALSE;
                            }
                        }
                    }
                    if ($check) {
                        $this->setInput(array('title_album', 'idea', 'curly1', 'dye1', 'style1', 'care1', 'technology'));
                        $combine_data = $this->set_arrdata(array('title', 'idea', 'curly_product', 'dye_product', 'style_product', 'care_product', 'technology'));
                        $id_user = $this->session->userdata('login_home');
                        $combine_data['id_user'] = $id_user['id'];
                        $id_collection = $this->collection_model->insert($combine_data); //insert collection
                        if ($id_collection) { //insert images
                            foreach ($link_data as $single_link) {
                                $data_image = array(
                                    "id_collection" => $id_collection,
                                    "link" => $single_link['file_name']
                                );
                                $this->collection_model->insertImages($data_image); // end insert images by id of collection
                            }
                            $user_type = $this->input->post('user_type');
                            foreach ($user_type as $item) {
                                if ($item != '') {
                                    $tags_data = array(
                                        'id_user' => $item,
                                        'id_collection' => $id_collection
                                    );
                                    $this->collection_model->insertTag($tags_data); // Tag user name in collection
                                }

                            }
                            $this->session->set_flashdata('success', 'Thành công!');
                        } else {
                            $this->session->set_flashdata('error', 'Thất bại!');
                        }
                        redirect("home/collection");
                    }
                }else{
                    $data['title'] = 'Upload';
                    $data['template'] = 'collection/upload';
                    $data['chooseImage'] = 'Vui lòng chon đủ 4 ảnh!';
                    $this->load->view('layout/layout', $data);
                }
            } else {
                $data['title'] = 'Upload';
                $data['template'] = 'collection/upload';
                $data['captcha_error'] = 'Nhập sai captcha';
                $this->load->view('layout/layout', $data);
            }
        } else {
            $data['title'] = 'Upload';
            $data['template'] = 'collection/upload';
            $this->load->view('layout/layout', $data);
        }
    }

    public function getUserById($id)
    {
        $this->notLogin();
        $data['rule_upload'] = $this->_upload_rule[0]->value;
        $user_input = preg_replace('/\s+/', ' ', trim($_REQUEST['term']));
        $user_arr['data'] = $this->collection_model->getUserById($user_input, $id);
        if (count($user_arr['data']) > 0) {
            $this->load->view('collection/ajax/json_autocomplete', $user_arr);
        } else {
            $display_json = array();
            $json_arr = array();
            $json_arr["id"] = "#";
            $json_arr["value"] = "";
            $json_arr["label"] = "Không có ai!";
            array_push($display_json, $json_arr);
            $jsonWrite = json_encode($display_json); //encode that search data
            print $jsonWrite;
        }
    }

    public function listUploaded()
    {
        $this->notLogin();
        $data['rule_upload'] = $this->_upload_rule[0]->value;
        $data['title'] = 'Danh sách đã đăng';
        $data['template'] = 'collection/list_uploaded';
        $id_user = $this->session->userdata('login_home');
        $count = $this->home_collection_model->countAllUploaded($id_user['id']);
        $config['base_url'] = base_url('home/collection/listUploaded');
        $config['total_rows'] = $count[0]->mount;
        $config['per_page'] = 18;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['collections'] = $this->home_collection_model->collectionUploaded($id_user['id'],$this->uri->segment(4),16);
        $this->load->view('layout/layout', $data);
    }

    public function listTagged()
    {
        $this->notLogin();
        $data['rule_upload'] = $this->_upload_rule[0]->value;
        $data['title'] = 'Danh sách đã tag';
        $data['template'] = 'collection/list_tagged';
        $id_user = $this->session->userdata('login_home');
        $count = $this->home_collection_model->countAlltagged($id_user['id']);
        $config['base_url'] = base_url('home/collection/listTagged');
        $config['total_rows'] = $count[0]->mount;
        $config['per_page'] = 18;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['collections'] = $this->home_collection_model->collectionTagged($id_user['id'],$this->uri->segment(4),$config['per_page']);
        $this->load->view('layout/layout', $data);
    }

    public function delCollection($id = '')
    {
        $this->notLogin();
        $data['rule_upload'] = $this->_upload_rule[0]->value;
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
            redirect('home/collection/listUploaded');
        }
    }

    public function editCollection($id_collec = '')
    {
        $this->notLogin();
        $data['rule_upload'] = $this->_upload_rule[0]->value;
        $data['title'] = 'Sửa album';
        $data['template'] = 'collection/edit_form';
        $user = $this->session->userdata('login_home');
        $check = $this->home_collection_model->RightUser($id_collec);
        if($check[0]->id_user == $user['id']){
            $data['collections'] = $this->home_collection_model->getDetailCollection($id_collec);
            $raw_id_products = $this->home_collection_model->getArrayProductId($id_collec);
            $id_products = implode(',',$raw_id_products[0]);
            $data['product_info'] = $this->home_collection_model->getProductInfoByCollec($id_products);
            $data['id_user_taggged'] = $this->home_collection_model->getUserTagged($id_collec);
            foreach ($data['id_user_taggged'] as $id_user)
            {
                $data['user_info'][] = $this->home_collection_model->getUserInfo($id_user->id_user);
            }
            $this->load->view('layout/layout', $data);
        }else
        {
            redirect('home/collection/listUploaded','refresh');
        }
    }

    public function updateCollection()
    {
        $this->notLogin();
        $data['rule_upload'] = $this->_upload_rule[0]->value;
        $check = true;
        $this->validate();
        if ($this->form_validation->run() == TRUE) {
            if ($_SESSION['captcha'] == $this->input->post('captcha')) {
                $this->session->unset_userdata('captcha');

                $post = $this->input->post();
                $file = $_FILES;

                $this->setInput(array('title_album', 'idea', 'curly1', 'dye1', 'style1', 'care1', 'technology'));
                $combine_data = $this->set_arrdata(array('title', 'idea', 'curly_product', 'dye_product', 'style_product', 'care_product', 'technology'));
                $this->home_collection_model->updateCollection($combine_data,$post['id_collection']); //update collection

                // Del user tag if album already tag before
                if($this->input->post('id_array') != '0'){
                    $this->home_collection_model->deleteTagByUser($this->input->post('id_array'),$post['id_collection']);
                }
                $user_type = $this->input->post('user_type');

                //Insert tag user then  user marked
                foreach ($user_type as $item) {
                    if ($item != '') {
                        $tags_data = array(
                            'id_user' => $item,
                            'id_collection' => $post['id_collection']
                        );
                        $this->collection_model->insertTag($tags_data);
                    }
                }

                $name = 'img';
                $link = 'uploads/photos/';
                $link_data = array();
                for ($i=1;$i<5;$i++)
                {
                    if($file[$name.$i]['error'] != 4)
                    {
                        $link_data[] = $this->uploadImages($name.$i,$link);
                        if(isset($post[$name.$i]) && $post[$name.$i] != '')
                        {
                            $link_to_del = $this->home_collection_model->getLink($post[$name.$i],1);
                            unlink('uploads/photos/'.$link_to_del[0]['link']);
                            $this->home_collection_model->delete($post[$name.$i],1);
                        }
                    }
                }

                //Insert images into db
                foreach ($link_data as $single_link) {
                    $data_image = array(
                                        "id_collection" => $post['id_collection'],
                                        "link" => $single_link['file_name']
                                      );
                    $this->collection_model->insertImages($data_image);
                }
                $this->session->set_flashdata('success', 'Sửa thành công!');
                redirect("home/collection/listUploaded");
            }else {
                $id_collec = $this->input->post('id_collection');
                $this->session->set_flashdata('error', 'Sai captcha!');
                redirect("home/collection/editCollection/$id_collec");
            }
        }else {
            $id_collec = $this->input->post('id_collection');
            redirect("home/collection/editCollection/$id_collec");
        }

    }

    public function hideAndShowCollection($id_tag = '', $status = '')
    {
        $this->notLogin();
        if ($status != '' && $id_tag != '') {
            $this->home_collection_model->hideAndShowCollection($id_tag, $status);
        }
        redirect('home/collection/listUploaded');
    }

    public function accept($id_tag = '', $status = '')
    {
        $this->notLogin();
        if ($status == 0) {
            $this->home_collection_model->changeStatus($id_tag, $status);
        } else {
            $this->home_collection_model->changeStatus($id_tag, $status);
        }
        redirect('home/collection/listTagged');
    }

    public function deny($id_tag = '')
    {
        $this->notLogin();
        if ($this->home_collection_model->deleteTag($id_tag)) {
            $this->session->set_flashdata('success', 'Thành công!');
        } else {
            $this->session->set_flashdata('error', 'Thất bại!');
        }
        redirect('home/collection/listTagged');
    }

    public function validate()
    {
        $this->form_validation->set_rules('title_album', $this->lang->line('title_album'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('designer', $this->lang->line('designer'), 'trim|xss_clean|required');
        $this->form_validation->set_rules('photographer', $this->lang->line('photographer'), 'trim|xss_clean');
        $this->form_validation->set_rules('modelor', $this->lang->line('modelor'), 'trim|xss_clean');
        $this->form_validation->set_rules('salon', $this->lang->line('salon'), 'trim|xss_clean|required');
        $this->form_validation->set_rules('idea', $this->lang->line('idea'), 'trim|xss_clean|prep_for_form');
        $this->form_validation->set_rules('curly', $this->lang->line('curly'), 'trim|xss_clean');
        $this->form_validation->set_rules('dye', $this->lang->line('dye'), 'trim|xss_clean|required');
        $this->form_validation->set_rules('style', $this->lang->line('style'), 'trim|xss_clean|required');
        $this->form_validation->set_rules('care', $this->lang->line('care'), 'trim|xss_clean|required');
        $this->form_validation->set_rules('technology', $this->lang->line('technology'), 'trim|xss_clean');
        $this->form_validation->set_rules('captcha', $this->lang->line('captcha'), 'trim|xss_clean|required');
        $this->form_messages();
    }

    public function imageDetail($id_img = '')
    {
        if ($id_img != null && is_numeric($id_img)) {
            $has_img = $this->home_collection_model->hasImg($id_img);
            if (count($has_img) == 1) {
                $this->load->model('admin/users_model');
                $data['list_user'] = $this->users_model->getAll();
                $data['user_info_tag'] = array();
                $data['title'] = 'Chi tiết ảnh';
                $data['template'] = 'collection/image_detail';
                $data['page'] = 'photo-detail';
                $current_url = current_url();
                $raw_num_like = $this->facebook_count($current_url);
                $like_mount = $raw_num_like[0]->like_count;
                $this->home_collection_model->incLikeImages($id_img, $like_mount);
                $id_collection = $this->home_collection_model->getCollecIDByIdImg($id_img);
                $data['author'] = $this->home_collection_model->getInfoUserByIdImg($id_img);
                $this->home_collection_model->incView($id_img);
                $the_raw_same_images = $this->home_collection_model->getImagesByIdCollecDetail($id_collection[0]->id_collection);
                foreach ($the_raw_same_images as $key => $item) {
                    if ($item->id_images == $id_img) {
                        $data['the_same_images'] = $this->array_reorder($the_raw_same_images, $key, 0);
                    }
                }
                $link_to_get_size = $data['the_same_images'][0];
                list($width, $height) = getimagesize('uploads/photos/' . $link_to_get_size->link);
                if ($width > $height) {
                    $data['rotate'] = TRUE;
                } else {
                    $data['rotate'] = FALSE;
                }
                $data['collections'] = $this->collection_model->viewDetail($id_collection[0]->id_collection);
                $raw_id_products = $this->home_collection_model->getArrayProductId($id_collection[0]->id_collection);
                $id_products = implode(',', $raw_id_products[0]);
                $data['product_info'] = $this->home_collection_model->getProductInfoByCollec($id_products);

                /*
                 * Nhà tạo mẫu > Salon > Người mẫu > Nhiếp ảnh gia
                 * Stylist (1) > Salon (4) > Model (3) > Photographer (2)
                 * $user_type_arr = array(1 => 'Stylist', 2 => 'Photographer', 3 => 'Model', 4 => 'Salon')
                 * */
                //$data['user_tag'] = $this->collection_model->getUserTag($id_collection[0]->id_collection);

                /*
                 *
                 * stdClass Object
                    (
                        [id_user] => 25
                        [alias_name] => Jasontrinh
                        [avatar] => avatar541ebaa7dd605.png
                        [user_type] => 1
                    )
                 * stdClass Object
                    (
                        [collec_number] => 2
                        [view_user] => 0
                        [vote_user] => 0
                    )
                 * */

                $users_tagged_collection = $this->collection_model->getUserTag($id_collection[0]->id_collection);
                if (isset($users_tagged_collection) && is_array($users_tagged_collection)) {
                    $users_tagged = array();
                    foreach ($users_tagged_collection as $user_tagged) {

                        $info_additional = $this->collection_model->getInfoUserTag($user_tagged->id_user);

                        if ( $user_tagged->user_type == 1 && !isset($users_tagged['stylist']) ) {

                            $users_tagged['stylist']['user_id'] = $user_tagged->id_user;
                            $users_tagged['stylist']['user_alias'] = $user_tagged->alias_name;
                            $users_tagged['stylist']['user_avatar'] = getUserAvatarSrc($user_tagged->avatar);
                            $users_tagged['stylist']['user_type'] = $user_tagged->user_type;
                            $users_tagged['stylist']['stat_collection_number'] = ($info_additional[0]->collec_number) ? $info_additional[0]->collec_number : 0;
                            $users_tagged['stylist']['stat_view_count'] = ($info_additional[0]->view_user) ? $info_additional[0]->view_user : 0;
                            $users_tagged['stylist']['stat_vote_count'] = ($info_additional[0]->vote_user) ? $info_additional[0]->vote_user : 0;

                        } elseif ( $user_tagged->user_type == 2 && !isset($users_tagged['photographer']) ) {

                            $users_tagged['photographer']['user_id'] = $user_tagged->id_user;
                            $users_tagged['photographer']['user_alias'] = $user_tagged->alias_name;
                            $users_tagged['photographer']['user_avatar'] = getUserAvatarSrc($user_tagged->avatar);
                            $users_tagged['photographer']['user_type'] = $user_tagged->user_type;
                            $users_tagged['photographer']['stat_collection_number'] = ($info_additional[0]->collec_number) ? $info_additional[0]->collec_number : 0;
                            $users_tagged['photographer']['stat_view_count'] = ($info_additional[0]->view_user) ? $info_additional[0]->view_user : 0;
                            $users_tagged['photographer']['stat_vote_count'] = ($info_additional[0]->vote_user) ? $info_additional[0]->vote_user : 0;

                        } elseif ( $user_tagged->user_type == 3 && !isset($users_tagged['model']) ) {

                            $users_tagged['model']['user_id'] = $user_tagged->id_user;
                            $users_tagged['model']['user_alias'] = $user_tagged->alias_name;
                            $users_tagged['model']['user_avatar'] = getUserAvatarSrc($user_tagged->avatar);
                            $users_tagged['model']['user_type'] = $user_tagged->user_type;
                            $users_tagged['model']['stat_collection_number'] = ($info_additional[0]->collec_number) ? $info_additional[0]->collec_number : 0;
                            $users_tagged['model']['stat_view_count'] = ($info_additional[0]->view_user) ? $info_additional[0]->view_user : 0;
                            $users_tagged['model']['stat_vote_count'] = ($info_additional[0]->vote_user) ? $info_additional[0]->vote_user : 0;

                        } elseif ( $user_tagged->user_type == 4 && !isset($users_tagged['salon']) ) {

                            $users_tagged['salon']['user_id'] = $user_tagged->id_user;
                            $users_tagged['salon']['user_alias'] = $user_tagged->alias_name;
                            $users_tagged['salon']['user_avatar'] = getUserAvatarSrc($user_tagged->avatar);
                            $users_tagged['salon']['user_type'] = $user_tagged->user_type;
                            $users_tagged['salon']['stat_collection_number'] = ($info_additional[0]->collec_number) ? $info_additional[0]->collec_number : 0;
                            $users_tagged['salon']['stat_view_count'] = ($info_additional[0]->view_user) ? $info_additional[0]->view_user : 0;
                            $users_tagged['salon']['stat_vote_count'] = ($info_additional[0]->vote_user) ? $info_additional[0]->vote_user : 0;
                        }
                    }

                    $data['stylist_info']       = (isset($users_tagged['stylist'])) ? $users_tagged['stylist'] : null;
                    $data['photographer_info']  = (isset($users_tagged['photographer'])) ? $users_tagged['photographer'] : null;
                    $data['model_info']         = (isset($users_tagged['model'])) ? $users_tagged['model'] : null;
                    $data['salon_info']         = (isset($users_tagged['salon'])) ? $users_tagged['salon'] : null;
                }

                $this->load->view("layout/layout", $data);
            } else {
                redirect(base_url());
            }
        } else {
            $this->error404();
        }
    }

    public function array_reorder($array, $oldIndex, $newIndex) {
        array_splice($array,$newIndex,count($array),array_merge(array_splice($array, $oldIndex, 1),array_slice($array, $newIndex, count($array))));
        return $array;
    }

    public function getProductByCate($id_category = '') {
        $this->notLogin();
        $user_input = preg_replace('/\s+/', ' ', trim($_REQUEST['term']));
        $user_arr['data'] = $this->home_collection_model->getProductByCate($user_input, $id_category);
        if (count($user_arr['data']) > 0) {
            $this->load->view('collection/ajax/json_product', $user_arr);
        } else {
            $display_json = array();
            $json_arr = array();
            $json_arr["id"] = "#";
            $json_arr["value"] = "";
            $json_arr["label"] = "Không có sản phẩm nào!";
            array_push($display_json, $json_arr);
            $jsonWrite = json_encode($display_json); //encode that search data
            print $jsonWrite;
        }
    }

//    public function likeAction()
//    {
//      $id_user = $this->session->userdata('login_home');
//      if($id_user && $id_user['name'] != ''){
//        $id = $this->input->post('string_name');
//        if(isset($id) && is_numeric($id)){
//            $check_exist = $this->home_collection_model->checkLikeAndDislike($id_user['id'],$id);
//            if(count($check_exist) > 0)
//            {
//                // Da ton tai ban ghi, ta se cap nhat
//                $this->home_collection_model->updatePairLike($id_user['id'],$id,'like_action');
//            }else{
//                //Chua co ban ghi nao thi ta se them moi
//                $this->home_collection_model->addPairLike($id_user['id'],$id,'like_action');
//            }
//            $this->home_collection_model->incLike($id);
//        }
//      }
//    }
//
//    public function dislikeAction()
//    {
//        $id_user = $this->session->userdata('login_home');
//        if($id_user && $id_user['name'] != ''){
//            $id = $this->input->post('string_name');
//            if($id && $id != ''){
//                $check_exist = $this->home_collection_model->checkLikeAndDislike($id_user['id'],$id);
//                if(count($check_exist) > 0)
//                {
//                    // Da ton tai ban ghi, ta se cap nhat
//                    $this->home_collection_model->updatePairLike($id_user['id'],$id,'dislike');
//                }else{
//                    //Chua co ban ghi nao thi ta se them moi
//                    $this->home_collection_model->addPairLike($id_user['id'],$id,'dislike');
//                }
//                $this->home_collection_model->descLike($id);
//            }
//        }
//    }


}






















































