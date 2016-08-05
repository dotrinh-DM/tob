<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class User_home extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('home/home_users_model');
        $this->load->model('admin/users_model');
        $this->load->helper('captcha');
        $this->load->library('upload');
        $this->load->model('admin/province_model');
        $this->load->model('admin/district_model');
    }


    public function getUserInfo($id='')
    {
        if($id != null && is_numeric($id))
        {
            $user                   = $this->session->userdata('login_home');
            $data['id_segment']     = $id;
            $data['id_user']        = $user['id'];
            //nếu id có thì show thông tin user, nếu ko show not found
            if(count($this->users_model->getAll('', $id)) > 0) {

                $data['user_name'] = $this->home_users_model->getUserInfo($id); // user information to show
                $data['user_album'] = $this->home_users_model->getUserAlbumInfo($id);
                $data['all_user_images'] = $this->home_users_model->getAllImagesUser($id);
                $data['title'] = 'Thông tin chi tiết | '.$data['user_name'][0]->alias_name;
                $this->province_model->orderBy('ASC','name');
                $data['province_arr'] = $this->province_model->getAll();
                $this->district_model->orderBy('ASC','name');
                $data['district_arr'] = $this->district_model->getAll();

                $data['dist'] = $data['user_name'][0]->district;
                if($this->input->post())
                {
                    $re_pass = '';
                    if($this->input->post('pass') != null) {$re_pass = '|required|matches[pass]';}
                    $this->form_validation->set_rules('name', $this->lang->line('name_user_home'), 'trim|callback_validname');
                    $this->form_validation->set_rules('subname', $this->lang->line('subname_user_home'), 'trim|callback_validlastname');
                    $this->form_validation->set_rules('as', $this->lang->line('as_user_home'), 'trim|required|callback_validalias');
                    $this->form_validation->set_rules('pass', $this->lang->line('repeat_pass_home'), 'trim|min_length[6]|md5');
                    $this->form_validation->set_rules('repeat_pass', $this->lang->line('repeat_pass_home'), 'trim'.$re_pass);
                    $this->form_validation->set_rules('select_work');
                    $this->form_validation->set_rules('phone', $this->lang->line('phone_user_home'), 'trim|required|callback_validphone');
                    $this->form_validation->set_rules('fbname', $this->lang->line('namefb_user'), 'trim');
                    $this->form_validation->set_rules('fblink', $this->lang->line('linkfb_user'), 'trim');
                    $this->form_validation->set_rules('city', $this->lang->line('city_user'), 'required');
                    $this->form_validation->set_rules('district', $this->lang->line('district_user'), 'required');
                    $this->form_validation->set_rules('introduce', $this->lang->line('introduce'), 'trim');
                    $this->form_validation->set_rules('address', $this->lang->line('address_user'), 'trim');
                    $this->form_messages();

                    $data['dist']   = $this->input->post('district');
                    $data['city']   = $this->input->post('city');

                    if($this->form_validation->run() == TRUE) {

                        if($this->input->post('pass') == null) {
                            $this->setInput(array('name','subname','as','select_work','phone','fbname','fblink','city','district','introduce','address'));
                            $frm_data = $this->set_arrdata(array('first_name','last_name','alias_name','user_type','phone','facebook_name','facebook_link','city','district','introduce','address'));
                        } else {
                            $this->setInput(array('name','subname','as','pass','select_work','phone','fbname','fblink','city','district','introduce','address'));
                            $frm_data = $this->set_arrdata(array('first_name','last_name','alias_name','password','user_type','phone','facebook_name','facebook_link','city','district','introduce','address'));
                        }

                        $frm_data['status'] = '1';
                        $check_upload_submit = TRUE;
                        //upload avatar
                        if($_FILES['avatar']['name'] != null) {
                            $link_upload = 'uploads/avatars/';
                            $link_data =array();
                            //nếu không có lỗi
                            if($_FILES['avatar']['error'] == 0) {
                                $link_data[] = $this->uploadImages('avatar', $link_upload);
                            }
                            //nếu có lỗi thì biến $link_data là 1 mảng
                            if(!is_array($link_data[0])) {
                                $data['avatar_error'] = $link_data[0];
                                $check_upload_submit = FALSE;
                            } else {
                                //xóa file avatar
                                unlink('uploads/avatars/'.$data['user_name'][0]->avatar);
                                $frm_data['avatar'] = $link_data[0]['file_name'];
                            }
                        }
                        //end upload avatar
                        if($check_upload_submit == TRUE) {
                            echo $id_succ = $this->users_model->update_record($frm_data,'',$user['id']);
                            if($id_succ != FALSE) {
                                $val_input = $this->getInput();
                                $this->session->set_flashdata('success', $this->lang->line('user_update_success'));
                                $info = array(
                                    'name' => $val_input['as'],
                                    'id'   => $user['id']
                                );
                                $this->session->set_userdata('login_home',$info);
                            } else {
                                $this->session->set_flashdata('error', $this->lang->line('user_update_fail'));
                            }
                            redirect(current_url());
                        }
                    }
                }

                $data['template'] = 'users/user_detail';

            } else {
                $data['title'] = 'Not Access';
                $data['template'] = 'users/user_notfound';
            }
            $this->load->view('layout/layout',$data);
        } else{
            $this->error404();
        }
    }

    /*
    * reg check phone number
    * */
    function validphone()
    {
        $value = trim($this->input->post('phone'));
        return $this->valid_phone($value);
    }

    /*
     * hàm kiểm tra first name không có ký tự đặc biệt
     */

    public function validname()
    {
        $val = $this->input->post('name');
        return $this->red_name($val);
    }

    /*
     * hàm kiểm tra last name không có ký tự đặc biệt
     */

    public function validlastname()
    {
        $val = $this->input->post('subname');
        return $this->red_name($val);
    }

    /*
    * hàm kiểm tra last name không có ký tự đặc biệt
    */

    public function validalias()
    {
        $val = $this->input->post('as');
        return $this->red_name($val);
    }

    /*
    * hàm lấy district theo city
    * */
    public function getDistrict($id = '', $check = '')
    {
        $option = $current_option = $list = '';

        //lấy option hiện tại
        if($check != null) {
            $dist_current = $this->district_model->getAll('',$check);
            if($dist_current != null){
                $val_current  = $dist_current[0]['districtid'];
                $name_current = $dist_current[0]['name'];
                $current_option ="<option value='$val_current' selected='selected'>$name_current</option>";
            }
        }

        $option .= "<div class='selector' id='uniform-city'>";
        $option .="<select name='district' id='district' >";

        //lấy các option khác
        $this->district_model->orderBy('ASC','name');
        $district_arr = $this->district_model->getAll('provinceid',$id);
//        $option .= "<option value='' >Choose One</option>";
        foreach($district_arr as $key) {
            if($id != null) {
                if($key['districtid'] != $check) {
                    $vlue = $key['districtid'];
                    $name = $key['name'];
                    $list .= "<option value='$vlue' >$name</option>";
                }
            }
        }

        if($current_option != null) $option .= $current_option;
        if($list != null) $option .= $list;
        $option .= "</select></div>";
        echo $option;
    }
}
