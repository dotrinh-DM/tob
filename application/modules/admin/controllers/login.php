<?php

class Login extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admins_model');
    }

    /**
     * load form dang nhap cho nguoi dung
     */
    public function index()
    {
        $data['title'] = $this->lang->line('login_title');
        if($this->input->post('btnsub'))
        {
            $this->form_validation->set_rules('username', $this->lang->line('username'), 'trim|required');
            $this->form_validation->set_rules('password', $this->lang->line('password'), 'trim|required');
            $this->form_messages();
            if($this->form_validation->run() == TRUE) {
                $name = $this->input->post('username');
                $pass = $this->input->post('password');
                $check = $this->checklogin($name,$pass);
                if($check['num'] > 0) {
                    $info = array(
                                    'name' => $check['info'][0]['name'],
                                    'id'   => $check['info'][0]['id_admins']
                                );
                    $this->session->set_userdata('login_info',$info);
                    redirect(base_url().'admin');
                } else {
                    $data['wrong'] = $this->lang->line('wrongLogin');
                }
            }
        }
        $this->load->view('login',$data);
    }

    /*
     * hàm kiểm tra đăng nhập
     * $name: tên nhập vào
     * $pass: pass nhập vào
     */
    public function checklogin($name,$pass)
    {
        $this->admins_model->where('name',$name);
        $this->admins_model->where('password',md5($pass));
        $list = $this->admins_model->getAll();
        $num  = count($list);
        $info = array(
                        'num'  => $num,
                        'info' => $list
                      );
        return $info;
    }

    /**
     * Logout khi nguoi dung muon thoat khoi trang admin
     */
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('admin/login');
    }

}
