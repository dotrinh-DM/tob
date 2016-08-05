<?php

class Register extends MY_Controller {

    public function __construct()
    {
        parent::__construct();

        $user = $this->session->userdata('login_home');
        if($user || $user['name'] != '') {
            redirect(base_url());
        }
        $this->load->model('admin/users_model');
        $this->load->model('admin/province_model');
        $this->load->model('admin/district_model');
        $this->load->library('upload');
        $this->load->helper('captcha');
    }

    public function index()
    {
        $data['title'] = $this->lang->line('title_register');
        $data['template'] = 'users/form_register';

        $this->province_model->orderBy('ASC','name');
        $data['province_arr'] = $this->province_model->getAll();
        $this->district_model->orderBy('ASC','name');
        $data['district_arr'] = $this->district_model->getAll();

        if($this->input->post())
        {
            $this->form_validation->set_rules('name', $this->lang->line('name_user_home'), 'trim|callback_validname');
            $this->form_validation->set_rules('subname', $this->lang->line('subname_user_home'), 'trim|callback_validlastname');
            $this->form_validation->set_rules('as', $this->lang->line('as_user_home'), 'trim|required|callback_validalias');
            $this->form_validation->set_rules('email', $this->lang->line('email_user'), 'trim|required|valid_email|callback_checkexistmail');
            $this->form_validation->set_rules('pass', $this->lang->line('repeat_pass_home'), 'trim|min_length[6]|md5|required');
            $this->form_validation->set_rules('repeat_pass', $this->lang->line('repeat_pass_home'), 'trim|required|matches[pass]');
            $this->form_validation->set_rules('select_work');
            $this->form_validation->set_rules('phone', $this->lang->line('phone_user_home'), 'trim|required|callback_validphone');
            $this->form_validation->set_rules('fbname', $this->lang->line('namefb_user'), 'trim');
            $this->form_validation->set_rules('fblink', $this->lang->line('linkfb_user'), 'trim');
            $this->form_validation->set_rules('city', $this->lang->line('city_user'), 'required');
            $this->form_validation->set_rules('district', $this->lang->line('district_user'), 'required');
            $this->form_validation->set_rules('introduce', $this->lang->line('introduce'), 'trim');
            $this->form_validation->set_rules('address', $this->lang->line('address_user'), 'trim');
            $this->form_messages();

            $data['dist'] = $this->input->post('district');

            //check captcha
            $captcha           = $this->input->post('captcha');
            $data['err_captcha']          = null;
            if($captcha == null) {
                $data['err_captcha'] = $this->lang->line('require_captcha');
            } else {
                if($captcha != $this->session->userdata('captcha')) {
                    $data['err_captcha'] = $this->lang->line('validate_captcha');
                }
            }
            //end check captcha

            if($this->form_validation->run() == TRUE && $data['err_captcha'] == null) {

                $this->setInput(array('name','subname','as','email','pass','select_work','phone','fbname','fblink','city','district','introduce','address'));
                $frm_data = $this->set_arrdata(array('first_name','last_name','alias_name','email','password','user_type','phone','facebook_name','facebook_link','city','district','introduce','address'));
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
                        $frm_data['avatar'] = $link_data[0]['file_name'];
                    }
                }
                //end upload avatar
                if($check_upload_submit == TRUE) {
                    $id = $this->users_model->insert_getId($frm_data);
                    if($id != FALSE) {
                        $this->session->set_flashdata('success', $this->lang->line('register_success'));
                        $val_input = $this->getInput();
                        $info = array(
                            'name' => $val_input['as'],
                            'id'   => $id
                        );
                        $this->session->set_userdata('login_home', $info);

                        /*$name_website    = $this->get_config('name_website');
                        $from            = $this->get_config('address_email_send');
                        $content         = html_entity_decode($this->get_config('content_register_email_send'));
                        $this->smtpmailer($val_input['email'],$from,'WELCOME TO '.$name_website,$name_website.' - Welcome', $content);*/

                        //Send welcome email
                        $this->load->config('mandrill');
                        $this->load->library('mandrill');
                        $mandrill_ready = NULL;

                        try {
                            $this->mandrill->init( $this->config->item('mandrill_api_key') );
                            $mandrill_ready = TRUE;
                        } catch(Mandrill_Exception $e) {
                            $mandrill_ready = FALSE;
                        }

                        if( $mandrill_ready ) {
                            //Send us some email!
                            $data['name'] = $val_input['as'];
                            $data['subject'] = 'Chào mừng bạn tham gia Chuyencuatoc.vn';
                            $data['email'] = $val_input['email'];

                            $html = $this->load->view('email/welcome',$data,TRUE);

                            $email = array(
                                'html' => $html,
                                'text' => '',
                                'subject' => $data['subject'],
                                'from_email' => 'no-reply@chuyencuatoc.vn',
                                'from_name' => 'Chuyencuatoc.vn',
                                'to' => array(array('email' => $data['email'] ))
                            );

                            $result = $this->mandrill->messages_send($email);

                        }

                    } else {
                        $this->session->set_flashdata('error', $this->lang->line('register_fail'));
                    }
                    redirect(base_url());
                }
            }
        }

        // tạo captcha
        $str_captcha = rand_string(4);
        $vals = array(
                        'word'          => $str_captcha,
                        'img_path'      => './captcha/',
                        'img_url'       => base_url().'captcha/',
                        'img_width'     => 150,
                        'img_height'    => 26,
                        'expiration'    => 3600
                    );
        $cap = create_captcha($vals);
        $data['image_captcha'] = $cap['image'];
        $this->session->set_userdata('captcha',$str_captcha);

        $data['images_banner'] = $this->get_banner();
        $this->load->view("layout/layout", $data);
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
     * hàm kiểm tra tồn tại email
     */

    public function checkexistmail()
    {
        $email =  $this->input->post('email');
        $this->users_model->where_user('email',$email);
        $id = $this->uri->segment(4);
        if($id != null)
        {
            $this->users_model->where_user('id_user !=', $id);
        }
        $num = $this->users_model->count_record();
        if($num > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
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