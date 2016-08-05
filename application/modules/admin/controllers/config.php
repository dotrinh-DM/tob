<?php

class Config extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('config_model');
    }

    public function index()
    {
        $data['heading'] = $data['title'] = $this->lang->line('manage_config');
        $this->config_model->orderBy('DESC');
        $data['list'] = $this->config_model->getAll();
        $data['template'] = 'config/list';
        $this->load->view("layout/layout", $data);

        //nếu bấm xóa nhiều bản ghi
        if($this->input->post('btndelall')) {
            $link_redirect = base_url().'admin/config';
            $list_check = $this->input->post('checks');
            $this->delete_all($list_check,'config_model','delete_record', $link_redirect);
        }
    }

    /*
     * hàm insert
     * */
    public function insert()
    {
        $data['heading'] = $data['title'] = $this->lang->line('insert_config');
        $data['template'] = 'config/insert';
        if($this->input->post('btnsub'))
        {
            $this->form_validation->set_rules('alias', $this->lang->line('alias_config'), 'trim|required|callback_checkexistconfig');
            $this->form_validation->set_rules('value', $this->lang->line('value_config'), 'trim|required');
            $this->form_messages();
            if($this->form_validation->run() == TRUE) {
                $this->setInput(array('alias','value'));
                $frm_data = $this->set_arrdata(array('alias','value'));

                if($this->config_model->insert_record($frm_data)) {
                    $this->session->set_flashdata('success', $this->lang->line('insert_success'));
                } else {
                    $this->session->set_flashdata('error', $this->lang->line('insert_fail'));
                }
                redirect(base_url()."admin/config");
            }
        }
        $this->load->view("layout/layout", $data);
    }

    /*
     * hàm edit
     * */
    public function edit()
    {
        $data['heading'] = $data['title'] = $this->lang->line('edit_config');
        $data['template'] = 'config/insert';
        $id = $this->uri->segment(4);
        $data['edit_record'] = $this->config_model->getAll('', $id);

        if($this->input->post('btnsub'))
        {
//            $this->form_validation->set_rules('alias', $this->lang->line('alias_config'), 'trim|required|callback_checkexistconfig');
            $this->form_validation->set_rules('value', $this->lang->line('value_config'), 'trim|required');
            $this->form_messages();
            if($this->form_validation->run() == TRUE) {
                $this->setInput(array('value'));
                $frm_data = $this->set_arrdata(array('value'));

                if($this->config_model->update_record($frm_data,'',$id)) {
                    $this->session->set_flashdata('success', $this->lang->line('edit_success'));
                } else {
                    $this->session->set_flashdata('error', $this->lang->line('edit_fail'));
                }
                redirect(base_url()."admin/config");
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
        if($this->config_model->delete_record($id)) {
            $this->session->set_flashdata('success', $this->lang->line('del_success'));
        } else {
            $this->session->set_flashdata('error', $this->lang->line('del_fail'));
        }
        redirect(base_url()."admin/config");
    }

    /*
     * hàm kiểm tra tồn tại alias
     */

    public function checkexistconfig()
    {
        $alias =  $this->input->post("alias");
        $this->config_model->where_config("alias",$alias);
        $id = $this->uri->segment(4);
        if($id != null)
        {
            $this->config_model->where_config("id_config !=", $id);
        }
        $num = $this->config_model->count_record();
        if($num > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
