<?php

class Users extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->model('province_model');
        $this->load->model('district_model');
        $this->load->library('upload');
    }

    public function index()
    {
        $data['heading'] = $data['title'] = $this->lang->line('manage_users');
        $this->users_model->orderBy('DESC');
        $data['list'] = $this->users_model->getAll();
        $data['province_arr'] = $this->province_model->getAll();
        $data['district_arr'] = $this->district_model->getAll();
        $data['template'] = 'users/list';
        $this->load->view("layout/layout", $data);

        //nếu bấm xóa nhiều bản ghi
        if($this->input->post('btndelall')) {
            $link_redirect = base_url().'admin/users';
            $list_check = $this->input->post('checks');
            $this->delete_all($list_check,'users_model','delete_record', $link_redirect,'avatar','getAll','uploads/avatars/');
        }
    }

    /*
     * hàm insert
     * */
    public function insert()
    {
        $data['heading'] = $data['title'] = $this->lang->line('insert_users');
        $data['template'] = 'users/insert';

        $this->province_model->orderBy('ASC','name');
        $data['province_arr'] = $this->province_model->getAll();
        $this->district_model->orderBy('ASC','name');
        $data['district_arr'] = $this->district_model->getAll();
        if($this->input->post('btnsub'))
        {
            $this->set_rule('|required','|required|matches[pass]');
            $data['dist'] = $this->input->post('district');
            if($this->form_validation->run() == TRUE) {
                $this->setInput(array('name','subname','as','email','pass','select_work','phone','fbname','fblink','city','district','introduce','address','status'));
                $frm_data = $this->set_arrdata(array('first_name','last_name','alias_name','email','password','user_type','phone','facebook_name','facebook_link','city','district','introduce','address','status'));
                $check_upload_submit = TRUE;
                //upload avatar
                if($_FILES['avatar']['name'] != null) {
                    $link_upload = 'uploads/avatars/';
                    $link_data =array();
                    if($_FILES['avatar']['error'] == 0) {
                        $link_data[] = $this->uploadImages('avatar', $link_upload);
                    }
                    if(!is_array($link_data[0])) {
                        $data['avatar_error'] = $link_data[0];
                        $check_upload_submit = FALSE;
                    } else {
                        $frm_data['avatar'] = $link_data[0]['file_name'];
                    }

                }
                //end upload avatar
                if($check_upload_submit == TRUE) {
                    if($this->users_model->insert_record($frm_data)) {
                        $this->session->set_flashdata('success', $this->lang->line('insert_success'));
                    } else {
                        $this->session->set_flashdata('error', $this->lang->line('insert_fail'));
                    }
                    redirect(base_url()."admin/users");
                }
            }
        }
        $this->load->view("layout/layout", $data);
    }

    /*
     * hàm edit
     * */
    public function edit()
    {
        $data['heading'] = $data['title'] = $this->lang->line('edit_users');
        $data['template'] = 'users/insert';
        $id = $this->uri->segment(4);
        $data['edit_record'] = $this->users_model->getAll('', $id);

        $this->province_model->orderBy('ASC','name');
        $data['province_arr'] = $this->province_model->getAll();
        $this->district_model->orderBy('ASC','name');
        $data['district_arr'] = $this->district_model->getAll();
        if($this->input->post('btnsub'))
        {
            $re_pass = '';
            if($this->input->post('pass') != null) {$re_pass = '|required|matches[pass]';}
            $this->set_rule('', $re_pass);
            $data['edit_record'][0]['user_type'] = $this->input->post('select_work');
            $data['edit_record'][0]['status'] = $this->input->post('status');
            $data['edit_record'][0]['city'] = $this->input->post('city');
            $data['edit_record'][0]['district'] = $this->input->post('district');
            if($this->form_validation->run() == TRUE) {
                if($this->input->post('pass') == null) {
                    $this->setInput(array('name','subname','as','email','select_work','phone','fbname','fblink','city','district','introduce','address','status'));
                    $frm_data = $this->set_arrdata(array('first_name','last_name','alias_name','email','user_type','phone','facebook_name','facebook_link','city','district','introduce','address','status'));
                } else {
                    $this->setInput(array('name','subname','as','email','pass','select_work','phone','fbname','fblink','city','district','introduce','address','status'));
                    $frm_data = $this->set_arrdata(array('first_name','last_name','alias_name','email','password','user_type','phone','facebook_name','facebook_link','city','district','introduce','address','status'));
                }
                $check_upload_submit = TRUE;
                //upload avatar
                if($_FILES['avatar']['name'] != null) {
                    $link_upload = 'uploads/avatars/';
                    $link_data =array();
                    if($_FILES['avatar']['error'] == 0) {
                        $link_data[] = $this->uploadImages('avatar', $link_upload);
                    }
                    if(!is_array($link_data[0])) {
                        $data['avatar_error'] = $link_data[0];
                        $check_upload_submit = FALSE;
                    } else {
                        //xóa file cũ và lưu tên file mới
                        unlink('uploads/avatars/'.$data['edit_record'][0]['avatar']);
                        $frm_data['avatar'] = $link_data[0]['file_name'];
                    }
                }

                //end upload avatar
                if($check_upload_submit == TRUE) {
                    if($this->users_model->update_record($frm_data,'',$id)) {
                        $this->session->set_flashdata('success', $this->lang->line('edit_success'));
                    } else {
                        $this->session->set_flashdata('error', $this->lang->line('edit_fail'));
                    }
                    redirect(base_url()."admin/users");
                }
            }
        }
        $this->load->view("layout/layout", $data);
    }

    /*
     * hàm set rule cho 2 hàm insert và edit
     * */
    public function set_rule($pass = '',$re_pass = '')
    {
        $this->form_validation->set_rules('name', $this->lang->line('name_user'), 'trim');
        $this->form_validation->set_rules('subname', $this->lang->line('subname_user'), 'trim');
        $this->form_validation->set_rules('as', $this->lang->line('as_user'), 'trim|required');
        $this->form_validation->set_rules('email', $this->lang->line('email_user'), 'trim|required|valid_email|callback_checkexistmail');
        $this->form_validation->set_rules('pass', $this->lang->line('pass'), 'trim|min_length[6]|md5'.$pass);
        $this->form_validation->set_rules('repeat_pass', $this->lang->line('repeat_pass'), 'trim'.$re_pass);
        $this->form_validation->set_rules('select_work');
        $this->form_validation->set_rules('phone', $this->lang->line('phone_user'), 'trim|required|callback_validphone');
        $this->form_validation->set_rules('fbname', $this->lang->line('namefb_user'), 'trim');
        $this->form_validation->set_rules('fblink', $this->lang->line('linkfb_user'), 'trim');
        $this->form_validation->set_rules('city', $this->lang->line('city_user'), 'required');
        $this->form_validation->set_rules('district', $this->lang->line('district_user'), 'required');
        $this->form_validation->set_rules('introduce', $this->lang->line('introduce'), 'trim');
        $this->form_validation->set_rules('address', $this->lang->line('address_user'), 'trim');
        $this->form_validation->set_rules('status');
        $this->form_messages();
    }

    /*
     * hàm delete
     */

    public function del()
    {
        $id = $this->uri->segment(4);
        $del_record = $this->users_model->getAll('', $id);

        if($this->users_model->delete_record($id)) {
            //xóa file avatar
            if($del_record[0]['image'] != null) {
                unlink('uploads/avatars/'.$del_record[0]['avatar']);
            }

            $this->session->set_flashdata('success', $this->lang->line('del_success'));
        } else {
            $this->session->set_flashdata('error', $this->lang->line('del_fail'));
        }
        redirect(base_url()."admin/users");
    }


    /*
     * reg check phone number
     * */
    function validphone()
    {
        $value = trim($this->input->post('phone'));
        if ($value != '') {
            // /^\(?[0-9]{3}\)?[-. ]?[0-9]{3}[-. ]?[0-9]{4}$/
            if (preg_match('/^[0]\d{9,10}$/', $value)){
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

    /*
     * hàm kiểm tra tồn tại email
     */

    public function checkexistmail()
    {
        $email =  $this->input->post("email");
        $this->users_model->where_user("email",$email);
        $id = $this->uri->segment(4);
        if($id != null)
        {
            $this->users_model->where_user("id_user !=", $id);
        }
        $num = $this->users_model->count_record();
        if($num > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /*
     * hàm lấy district theo city
     * */
    public function getDistrict($id = '', $check = '')
    {
        $option = $current_option = $list = $span = '';

        //lấy option hiện tại
        if($check != null) {
            $dist_current = $this->district_model->getAll('',$check);
            if($dist_current != null){
                $val_current  = $dist_current[0]['districtid'];
                $name_current = $dist_current[0]['name'];
                $span         = "<span class='sp_dist'>$name_current</span>";
                $current_option ="<option value='$val_current' selected='selected'>$name_current</option>";
            }
        }

        /*nếu không có lựa chọn sẽ hiện mạc định choose one*/
        if($span == null) {
            $span = "<span class='sp_dist'>Choose One</span>";
        }
        $option .= "<div class='selector' id='uniform-city'>";
        $option .= $span;
        $option .="<select name='district' id='district' class='uniformselect' >";

        //lấy các option khác
        $this->district_model->orderBy('ASC','name');
        $district_arr = $this->district_model->getAll('provinceid',$id);
        $option .= "<option value='' >Choose One</option>";
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

    /*
     * hàm thay đổi status
     */

    public function status($id = '', $status_current = '')
    {
        $url = base_url()."admin/users";
        $this->change_status($id, $status_current, 'users_model', 'update_record',$url);
    }
}
