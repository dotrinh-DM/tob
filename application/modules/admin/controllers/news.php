<?php

class News extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
        $this->load->model('admins_model');
    }

    public function index()
    {
        $data['heading'] = $data['title'] = $this->lang->line('manage_news');
        $this->news_model->select_column(array('id_news','title','status','creator','date_create','alias'));
        $this->news_model->orderBy('DESC');
        $this->news_model->where('type','0');
        $data['list'] = $this->news_model->getAll();
        $data['list_admins'] = $this->admins_model->getAll();
        $data['template'] = 'news/list';
        $this->load->view("layout/layout", $data);
        //nếu bấm xóa nhiều bản ghi
        if($this->input->post('btndelall')) {
            $link_redirect = base_url().'admin/news';
            $list_check = $this->input->post('checks');
            $this->delete_all($list_check,'news_model','delete_record', $link_redirect);
        }
    }

    /*
     * hàm insert
     * */
    public function insert()
    {
        $data['heading'] = $data['title'] = $this->lang->line('insert_news');
        $data['template'] = 'news/insert';
        if($this->input->post('btnsub'))
        {
            $this->form_validation->set_rules('news_title', $this->lang->line('title_news'), 'trim|required|callback_checkexisttitle');
            $this->form_validation->set_rules('news_content', $this->lang->line('content_news'), 'required');
            $this->form_validation->set_rules('status');
            $this->form_messages();
            if($this->form_validation->run() == TRUE) {
                $this->setInput(array('news_title','status'));
                $frm_data = $this->set_arrdata(array('title','status'));

                $val_inp = $this->getInput();
                $frm_data['alias']   = url_title($val_inp['news_title']);

                $id_admin = $this->session->userdata("login_info");
                $frm_data['creator'] = $id_admin['id'];

                $frm_data['content'] = $this->input->post('news_content');
                $frm_data['type']    = '0';
                if($this->news_model->insert_record($frm_data)) {
                    $this->session->set_flashdata('success', $this->lang->line('insert_success'));
                } else {
                    $this->session->set_flashdata('error', $this->lang->line('insert_fail'));
                }
                redirect(base_url()."admin/news");
            }
        }
        $this->load->view("layout/layout", $data);
    }

    /*
     * hàm edit
     * */
    public function edit()
    {
        $data['heading'] = $data['title'] = $this->lang->line('edit_news');
        $data['template'] = 'news/insert';
        $id = $this->uri->segment(4);
        $data['edit_record'] = $this->news_model->getAll('', $id);
        $data['list_admins'] = $this->admins_model->getAll();

        if($this->input->post('btnsub'))
        {
            $this->form_validation->set_rules('news_title', $this->lang->line('title_news'), 'trim|required|callback_checkexisttitle');
            $this->form_validation->set_rules('news_content', $this->lang->line('content_news'), 'trim|required');
            $this->form_validation->set_rules('status');
            $this->form_messages();

            $data['edit_record'][0]['status'] = $this->input->post('status');
            if($this->form_validation->run() == TRUE) {
                $this->setInput(array('news_title','status'));
                $frm_data = $this->set_arrdata(array('title','status'));

                $val_inp = $this->getInput();
                $frm_data['alias'] = url_title($val_inp['news_title']);

                $content  = $this->input->post('news_content');
                $frm_data['content'] = $content;

                if($this->news_model->update_record($frm_data,'',$id)) {
                    $this->session->set_flashdata('success', $this->lang->line('edit_success'));
                } else {
                    $this->session->set_flashdata('error', $this->lang->line('edit_fail'));
                }
                redirect(base_url()."admin/news");
            }
        }
        $this->load->view("layout/layout", $data);
    }

    /*
     * hàm delete
     */

    public function del()
    {
        $id = $this->uri->segment(4);
        if($this->news_model->delete_record($id)) {
            $this->session->set_flashdata('success', $this->lang->line('del_success'));
        } else {
            $this->session->set_flashdata('error', $this->lang->line('del_fail'));
        }
        redirect(base_url()."admin/news");
    }

    /*
     * hàm thay đổi status
     */

    public function status($id = '', $status_current = '')
    {
        $url = base_url()."admin/news";
        $this->change_status($id, $status_current, 'news_model', 'update_record',$url);
    }

    /*
      * hàm kiểm tra tồn tại title news
      */

    public function checkexisttitle()
    {
        $alias =  $this->input->post("news_title");
        $this->news_model->where("title",$alias);
        $this->news_model->where("type",'0');
        $id = $this->uri->segment(4);
        if($id != null)
        {
            $this->news_model->where("id_news !=", $id);
        }
        $num = $this->news_model->count_record();
        if($num > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
