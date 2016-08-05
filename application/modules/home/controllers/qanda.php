<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Qanda extends MY_Controller
{

    var $_id_user = '';
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/news_model');
        $user = $this->session->userdata('login_home');
        if($user != null && $user['id'] != null) {
            $this->_id_user = $user['id'];
        }
    }

    public function index($title = '')
    {
        $temp['title']      = 'Danh sách hởi đáp';
        $temp['template']   = 'qanda/index';
        if($title != null) {
            $temp['template']   = 'qanda/detail';
            $temp['title']      = 'Not Found';
            $temp['news']       = $this->news_model->getDetail($title);
            $this->load->model('admin/users_model');
            $temp['user_list']  = $this->users_model->getAll();
            if(count($temp['news']) > 0) {
                $temp['title']  = $temp['news'][0]->title;
            }
            $temp['enable']     = $this->_id_user;
            $id_current = 0;
            if(count($temp['news']) > 0) {
                $id_current = $temp['news'][0]->id_news;
            }
            //get news other
            $num_other  = $this->get_config('num_show_other_news');
            if($num_other == null) {$num_other = 5;}
            $first      = round($num_other / 2);
            $last       = $num_other - (round($num_other / 2));

            //get list before current news
            $this->news_model->select_column(array('id_news','title','alias'));
            $this->news_model->where('id_news >',$id_current);
            $this->news_model->limit_record($first,0);
            $temp['other_first_list']   =  $this->list_question();

            //get list after current news
            $this->news_model->select_column(array('id_news','title','alias'));
            $this->news_model->orderBy('DESC');
            $this->news_model->where('id_news <',$id_current);
            $this->news_model->limit_record($last,0);
            $temp['other_last_list']   =  $this->list_question();
        } else {
            $temp['enable']     = $this->_id_user;
            $temp['news']       = $this->news_model->getAllQa();
        }

        $this->load->view('layout/layout', $temp);
    }


    public function list_question()
    {
        $this->news_model->where('status','1');
        $this->news_model->where('type','1');
        return $this->news_model->getAll();
    }

    public function create()
    {
        $temp['title']      = 'Question';
        $temp['template']   = 'qanda/create';
        $this->load->helper('captcha');

        if($this->input->post())
        {
            $this->form_validation->set_rules('question', $this->lang->line('content_question'), 'trim|required|callback_checkexistquestion');
            $this->form_messages();

            //check captcha
            $captcha                        = $this->input->post('captcha');
            $temp['err_captcha']            = null;
            if($captcha == null) {
                $temp['err_captcha'] = $this->lang->line('require_captcha');
            } else {
                if($captcha != $this->session->userdata('captcha')) {
                    $temp['err_captcha'] = $this->lang->line('validate_captcha');
                }
            }
            //end check captcha

            if($this->form_validation->run() == TRUE  && $temp['err_captcha'] == null) {
                $this->setInput(array('question'));
                $frm_data = $this->set_arrdata(array('title'));
                $val_inp = $this->getInput();
                $frm_data['alias'] = $frm_data['alias']   = url_title($val_inp['question']);
                $frm_data['creator'] = $this->_id_user;
                $frm_data['status']  = '0';
                $frm_data['type']    = '1';
                if($this->news_model->insert_record($frm_data)) {
                    $this->session->set_flashdata('success', $this->lang->line('qst_success'));
                } else {
                    $this->session->set_flashdata('error', $this->lang->line('qst_fail'));
                }
                redirect(base_url());
            }
        }
        // tạo captcha
        $str_captcha = rand_string(7);
        $vals = array(
            'word'          => $str_captcha,
            'img_path'      => './captcha/',
            'img_url'       => base_url().'captcha/',
            'img_width'     => 130,
            'img_height'    => 26,
            'expiration'    => 3600
        );
        $cap = create_captcha($vals);
        $temp['image_captcha'] = $cap['image'];
        $this->session->set_userdata('captcha',$str_captcha);

        $temp['images_banner'] = $this->get_banner();
        $this->load->view('layout/layout', $temp);
    }

    public function checkexistquestion()
    {
        $alias =  $this->input->post("question");
        $this->news_model->where("title",$alias);
        $this->news_model->where("type",'1');
        $num = $this->news_model->count_record();
        if($num > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
