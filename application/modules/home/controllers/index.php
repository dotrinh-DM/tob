<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Index extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/users_model');
        $this->load->model('admin/collection_model');
        $this->load->model('home/home_collection_model');
    }

    public function index()
    {
        $this->load->model('admin/news_model');
        $data['title'] =  $this->lang->line('home');
        $data['template'] = 'index/home';

        //Get youtube link
        $data['link_youtube'] = $this->get_config('link_youtube');

        //Get news
        $this->news_model->where('status','1');
        $this->news_model->where('type','0');
        $this->news_model->orderBy('DESC');
        $this->news_model->limit_record(5,0);
        $data['news'] = $this->news_model->getAll();

        //Get top users
        $this->collection_model->select_column(array('id_user','vote'));
        $this->collection_model->where('status','1');
        $collection  = $this->collection_model->getAll_normal();
        $data['ntm'] = $this->get_users_like(1,$collection,3);
        $data['nag'] = $this->get_users_like(2,$collection,3);
        $data['nm']  = $this->get_users_like(3,$collection,3);
        $data['slt'] = $this->get_users_like(4,$collection,3);

        $data['images_banner'] = $this->get_banner();
        $this->load->view('layout/layout', $data);
    }

    /*
     * hàm lấy danh sách users theo điều kiện truyền vào
     * $type_user: type user (1,2,3,4)
     * $collection: mảng collection thô lấy từ db
     * $num_show: số lượng user có vote cao nhất
     * */
    public function get_users_like($type_user = '', $collection = array(), $num_show = '')
    {
        $this->users_model->select_column('id_user');
        $this->users_model->where_user('status','1');
        $this->users_model->where_user('user_type',$type_user);
        $this->users_model->orderBy('DESC');
        $users = $this->users_model->getAll();
        $result = $max = $arr = array();
        $num = 0;
        //trả về danh sách user và số vote tương ứng
        foreach($users as $key) {
            foreach($collection as $vote) {
                if($vote['id_user'] == $key['id_user']) {
                    $num += $vote['vote'];
                }
            }
            $result[] = array('id' => $key['id_user'], 'vote' => $num);
            $num = 0;
        }

        //lặp với số lần quy định trước $num_show
        if(count($result) > 0 ){
            // nếu kết quả nhỏ hơn $num_show thì gán $num_show = kết quả
            if(count($result) < $num_show) $num_show = count($result);
            for($i = 0;$i < $num_show; $i++) {
                //gán $max = giá trị mảng đầu tiên
                $max = $result[0];
                $num_max = 0;
                //duyệt mảng nếu có giá trị lớn hơn sẽ lấy giá trị đó (giá trị lớn nhất trong mảng)
                foreach($result as $key2) {
                    if($key2['vote'] > $max['vote']) {
                        $max = $result[$num_max];
                    }
                    $num_max++;
                }
                //gán biến $max vào 1 mảng
                $arr[] = $max;
                //unset giá trị vừa lấy ra để duyệt lấy giá trị lớn thứ 2,3,...
                $num_unset = 0;
                foreach($result as $key3) {
                    foreach($arr as $key4) {
                        if($key3['id'] == $key4['id']) {
                            unset($result[$num_unset]);
                            //sắp xếp (refresh) lại mảng
                            sort($result);
                        }
                    }
                    $num_unset++;
                }
            }
        }

        //lấy danh sách các user có vote cao nhất
        $count_arr = 0;
        $str_sql = '';
        if(count($arr) > 1) {
            $str_sql = 'id_user IN (';
            foreach($arr as $user) {
                if($count_arr < (count($arr) - 1)) {
                    $str_sql .= $user['id'].',';
                } else {
                    $str_sql .= $user['id'].')';
                }
                $count_arr++;
            }
        } else {
            if(count($arr) == 1) {
                $str_sql = 'id_user = ';
                foreach($arr as $user) {
                    $str_sql .= $user['id'];
                }
            }
        }

        $users_data = '';
        if($str_sql != null) {
            $this->users_model->wheres_user($str_sql);
            $users_data = $this->users_model->getAll();
        }

        return $users_data;
    }

    /*
     * login
     * */
    public function login()
    {
        $this->load->library('email');
        $user = $this->session->userdata('login_home');
        if($user || $user['name'] != '') {
            redirect(base_url());
        }

        $data['title'] = $this->lang->line('login_home');
        $data['template'] = 'index/login';
        if($this->input->post())
        {
            $this->form_validation->set_rules('email', $this->lang->line('email_login'), 'trim|required');
            $this->form_validation->set_rules('pass', $this->lang->line('login_password'), 'md5|trim|required');
            $this->form_messages();
            if($this->form_validation->run() == TRUE) {
                $name       = $this->input->post('email');
                $pass       = $this->input->post('pass');
                $remember   = $this->input->post('remember');
                $check = $this->checklogin($name,$pass);
                //get_array($check);
                if($check['num'] > 0) {
                    $id_login = $check['info'][0]['id_user'];
                    if($this->check_disable_acc($id_login) == true) {
                        $info = array(
                            'name' => $check['info'][0]['alias_name'],
                            'id'   => $id_login
                        );
                        $this->session->set_userdata('login_home',$info);

                        if($remember == 1) {
                            $pa = $check['info'][0]['password'];
                            setcookie("existlgpa", $pa, time()+3600*24*7);
                            setcookie("homeaction", $id_login, time()+3600*24*7);
                        }
                        redirect(base_url());
                    }
                    else $data['wrong'] = $this->lang->line('acc_disable');
                } else $data['wrong']   = $this->lang->line('wrongLogin_home');
            }
        }

        $data['images_banner'] = $this->get_banner();
        $this->load->view('layout/layout',$data);
    }

    /*
     * hàm kiểm tra đăng nhập
     * $name: tên nhập vào
     * $pass: pass nhập vào
     */
    public function checklogin($name,$pass)
    {
        $this->users_model->where_user('email',$name);
        $this->users_model->where_user('password',$pass);
        $list = $this->users_model->getAll();
        $num  = count($list);
        $info = array(
            'num'  => $num,
            'info' => $list
        );
        return $info;
    }

    public function check_disable_acc($id = '')
    {
        $this->users_model->where_user('id_user',$id);
        $this->users_model->where_user('status','1');
        $list = $this->users_model->getAll();
        if(count($list) > 0) return TRUE;
        else return FALSE;
    }

    /**
     * Logout
     */
    public function logout()
    {
        $this->session->sess_destroy();
        setcookie("existlgpa", '', time()-3600*24*7);
        setcookie("homeaction", '', time()-3600*24*7);
        redirect(base_url());
    }

    /*
    *giải thưởng
    * */
    public function awards()
    {
        $this->page_simple('awards','awards_title','awards_content');
    }

    /*
     * nhà tài trợ
     * */
    public function donors()
    {
        $this->page_simple('donors_title','donors_title','donors_content');
    }

     /*
     * ban giám khảo
     * */
    public function jury()
    {
        $this->page_simple('jury_title','jury_title','jury_content');
    }

    /*
     * thể lệ cuộc thi
     * */
    public function rules()
    {
        $this->page_simple('rules_title','rules_title','rules_content');
    }

    /*
     * hàm load nội dung trang đơn giản
     * */
    public function page_simple($title_page = '', $title_config = '', $content_config = '')
    {
        $temp['title']          = $this->lang->line($title_page);
        $temp['template']       = 'index/simple';
        $title = $this->get_config($title_config);
        $content = $this->get_config($content_config);
        $temp['content']        = 'Updating...';
        $temp['titles']         = 'Updating...';
        if(count($content) > 0 ) {
            $temp['titles']     = $title;
            $temp['content']    = $content;
        }

        $temp['images_banner'] = $this->get_banner();
        $this->load->view('layout/layout', $temp);
    }

    /*
     * 404 error
     * */
    public function not_found_404()
    {
        $this->error404();
    }

    /*
     * forgot password
     * */
    public function forgot_password()
    {
        $data['title']      = $this->lang->line('forgot_password');
        $data['template']   = 'index/forgot_password';
        $this->load->helper('captcha');

        if($this->input->post())
        {
            $this->form_validation->set_rules('email', $this->lang->line('email_user'), 'trim|required|valid_email|callback_checkforgotexistmail');
            $this->form_messages();
            $email_forgot       = $this->input->post('email');
            //check captcha
            $captcha            = $this->input->post('captcha');
            $data['err_captcha']          = null;
            if($captcha == null) {
                $data['err_captcha'] = $this->lang->line('require_captcha');
            } else {
                if($captcha != $this->session->userdata('captcha_forgot')) {
                    $data['err_captcha'] = $this->lang->line('validate_captcha');
                }
            }
            //end check captcha

            if($this->form_validation->run() == TRUE && $data['err_captcha'] == null) {

                $new_password         = rand_string(8);

                /*$new_pas1        = '<br/><br/><b>Mật khẩu mới: </b>'.$new_password;
                $name_website    = $this->get_config('name_website');
                $from            = $this->get_config('address_email_send');
                $content         = html_entity_decode($this->get_config('content_forgot_password_email_send').$new_pas1);*/

                //Update password
                if($this->users_model->update_record(array('password' => md5($new_password)), 'email', $email_forgot) == true) {

                    //Send new password email
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
                        $data['name'] = '';
                        $data['subject'] = 'Mật khẩu tài khoản của bạn trên Chuyencuatoc.vn đã được thay đổi';
                        $data['email'] = $email_forgot;
                        $data['new_password'] = $new_password;

                        $html = $this->load->view('email/newpassword',$data,TRUE);

                        $email = array(
                            'html' => $html,
                            'text' => '',
                            'subject' => $data['subject'],
                            'from_email' => 'no-reply@chuyencuatoc.vn',
                            'from_name' => 'Chuyencuatoc.vn',
                            'to' => array(array('email' => $data['email'] ))
                        );

                        $result = $this->mandrill->messages_send($email);

                        if ($result) {
                            $this->session->set_flashdata('success', $this->lang->line('forgot_success'));
                        } else {
                            $this->session->set_flashdata('error', $this->lang->line('forgot_fail'));
                        }

                    }

                    /*if($this->smtpmailer($email_forgot,$from,'Forgot Password',$name_website.' - Forgot Password', $content) == true) {
                        $this->session->set_flashdata('success', $this->lang->line('forgot_success'));
                    }  else {
                        $this->session->set_flashdata('error', $this->lang->line('forgot_fail'));
                    }*/

                } else {
                    $this->session->set_flashdata('error', $this->lang->line('forgot_fail'));
                }
                //end send mail


                redirect(base_url());
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
        $this->session->set_userdata('captcha_forgot',$str_captcha);

        $data['images_banner'] = $this->get_banner();
        $this->load->view('layout/layout', $data);
    }

    /*
   * hàm kiểm tra tồn tại email
   */

    public function checkforgotexistmail()
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
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function test()
    {
        /*$this->load->library('email');
        $this->config->load('email');

        $subject = 'This is a test';
        $message = '<p>This message has been sent for tesing purposes.</p>';

        // Get full html:
        $body =
            '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <title>'.htmlspecialchars($subject, ENT_QUOTES, $this->email->charset).'</title>
    <style type="text/css">
        body {
            font-family: Arial, Verdana, Helvetica, sans-serif;
            font-size: 16px;
        }
    </style>
</head>
<body>
'.$message.'
</body>
</html>';
        // Also, for getting full html you may use the following internal method:
        //$body = $this->email->full_html($subject, $message);

        $result = $this->email
            ->from('toannk.nguyenkhanh@smartchoices.vn')
            ->reply_to('toannk.nguyenkhanh@smartchoices.vn')    // Optional, an account where a human being reads.
            ->to('toannk@gmail.com')
            ->subject($subject)
            ->message($body)
            ->send();

        var_dump($result);
        echo '<br />';
        echo $this->email->print_debugger();

        exit;*/


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
            $email = array(
                'html' => '<p>This is my message<p>', //Consider using a view file
                'text' => 'This is my plaintext message',
                'subject' => 'This is my subject',
                'from_email' => 'me@ohmy.com',
                'from_name' => 'Me-Oh-My',
                'to' => array(array('email' => 'toannk@gmail.com' )) //Check documentation for more details on this one
                //'to' => array(array('email' => 'joe@example.com' ),array('email' => 'joe2@example.com' )) //for multiple emails
            );

            $result = $this->mandrill->messages_send($email);

        }
    }
}
