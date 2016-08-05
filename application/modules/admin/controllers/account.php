<?php

class Account extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admins_model');
    }

    /*
     * hàm insert
     * */
//    public function insert()
//    {
//        $data['heading'] = $data['title'] = $this->lang->line('insert_news');
//        $data['template'] = 'news/insert';
//        if($this->input->post('btnsub'))
//        {
//            $this->form_validation->set_rules('news_title', $this->lang->line('title_news'), 'trim|required|callback_checkexisttitle');
//            $this->form_validation->set_rules('news_content', $this->lang->line('content_news'), 'required');
//            $this->form_validation->set_rules('status');
//            $this->form_messages();
//            if($this->form_validation->run() == TRUE) {
//                $this->setInput(array('news_title','status'));
//                $frm_data = $this->set_arrdata(array('title','status'));
//
//                $id_admin = $this->session->userdata("login_info");
//                $frm_data['creator'] = $id_admin['id'];
//
//                $frm_data['content'] = $this->input->post('news_content');
//                if($this->news_model->insert_record($frm_data)) {
//                    $this->session->set_flashdata('success', $this->lang->line('insert_success'));
//                } else {
//                    $this->session->set_flashdata('error', $this->lang->line('insert_fail'));
//                }
//                redirect(base_url()."admin/news");
//            }
//        }
//        $this->load->view("layout/layout", $data);
//    }

    /*
     * hàm edit
     * */
    public function edit()
    {
        $data['heading'] = $data['title'] = $this->lang->line('edit_user');
        $data['template'] = 'account/insert';
        $id = $this->uri->segment(4);
        $data['edit_record'] = $this->admins_model->getAll('', $id);

        if($this->input->post('btnsub'))
        {
            $re_pass = '';
            if($this->input->post('pass') != null) {$re_pass = '|required|matches[pass]';}
//            $this->form_validation->set_rules('name', $this->lang->line('name_user'), 'trim|required');
            $this->form_validation->set_rules('email', $this->lang->line('email_user'), 'trim|required|valid_email|callback_checkexistmail');
            $this->form_validation->set_rules('pass', $this->lang->line('pass'), 'md5|trim|min_length[6]');
            $this->form_validation->set_rules('repeat_pass', $this->lang->line('repeat_pass'), 'trim'.$re_pass);
            $this->form_validation->set_rules('phone', $this->lang->line('phone_user'), 'trim|callback_validphone|required');
            $this->form_validation->set_rules('address', $this->lang->line('address_user'), 'trim');
            $this->form_validation->set_rules('status');
            $this->form_validation->set_rules('current_pass', $this->lang->line('current_pass'), 'md5|trim|required|callback_checkcurentpass');
            $this->form_messages();

            if($this->form_validation->run() == TRUE) {
                if($this->input->post('pass') == null) {
                    $this->setInput(array('email','phone','address','status'));
                    $frm_data = $this->set_arrdata(array('email','phone','address','status'));
                    $link     = base_url().'admin';
                } else {
                    $this->setInput(array('email','pass','phone','address','status'));
                    $frm_data = $this->set_arrdata(array('email','password','phone','address','status'));
                    $link     = base_url().'admin/login/logout';
                }

                if($this->admins_model->update_record($frm_data,'',$id)) {
                    $this->session->set_flashdata('success', $this->lang->line('edit_success'));
                } else {
                    $this->session->set_flashdata('error', $this->lang->line('edit_fail'));
                }
                redirect($link);
            }
        }
        $this->load->view("layout/layout", $data);
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
        $this->admins_model->where('email',$email);
        $id = $this->uri->segment(4);
        if($id != null) {
            $this->admins_model->where("id_admins !=", $id);
        }
        $num = $this->admins_model->count_record();
        if($num > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /*
     * hàm kiểm tra pass hiện tại khi update thông tin mới
     * */
    public function checkcurentpass()
    {
        $pass =  $this->input->post("current_pass");
        $this->admins_model->where('password', md5($pass));
        $id = $this->uri->segment(4);
        if($id != null) {
            $this->admins_model->where("id_admins", $id);
        }
        $num = $this->admins_model->count_record();
        if($num > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    /*
     * hàm delete
     */

//    public function del()
//    {
//        $id = $this->uri->segment(4);
//        if($this->news_model->delete_record($id)) {
//            $this->session->set_flashdata('success', $this->lang->line('del_success'));
//        } else {
//            $this->session->set_flashdata('error', $this->lang->line('del_fail'));
//        }
//        redirect(base_url()."admin/news");
//    }

    /*
     * hàm thay đổi status
     */

//    public function status($id = '', $status_current = '')
//    {
//        $url = base_url()."admin/news";
//        $this->change_status($id, $status_current, 'news_model', 'update_record',$url);
//    }

    /*
      * hàm kiểm tra tồn tại title news
      */

//    public function checkexisttitle()
//    {
//        $alias =  $this->input->post("news_title");
//        $this->news_model->where("title",$alias);
//        $id = $this->uri->segment(4);
//        if($id != null)
//        {
//            $this->news_model->where("id_news !=", $id);
//        }
//        $num = $this->news_model->count_record();
//        if($num > 0) {
//            return FALSE;
//        } else {
//            return TRUE;
//        }
//    }

}
