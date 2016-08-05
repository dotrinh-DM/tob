<?php

class Product extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
        $this->load->model('category_model');
        $this->load->model('brand_model');
        $this->load->library('upload');
    }

    public function index()
    {
        $data['heading'] = $data['title'] = $this->lang->line('manage_pro');
        $this->product_model->orderBy('DESC');
        $data['list']       = $this->product_model->getAll();
        $data['list_cate']  = $this->category_model->getAll();
        $data['list_brand'] = $this->brand_model->getAll();
        $data['template']   = 'product/list';
        $this->load->view("layout/layout", $data);

        //nếu bấm xóa nhiều bản ghi
        if($this->input->post('btndelall')) {
            $link_redirect  = base_url().'admin/product';
            $list_check     = $this->input->post('checks');
            $this->delete_all($list_check,'product_model','delete_record', $link_redirect,'image','getAll','uploads/product/');
        }
    }

    /*
     * hàm insert
     * */
    public function insert()
    {
        $data['heading'] = $data['title'] = $this->lang->line('insert_pro');
        $data['template'] = 'product/insert';
        $this->category_model->orderBy('DESC');
        $data['list_cate']  = $this->category_model->getAll();
        $this->brand_model->orderBy('DESC');
        $data['list_brand'] = $this->brand_model->getAll();
        if($this->input->post('btnsub'))
        {
            $this->set_rule();

            if($this->form_validation->run() == TRUE) {
                $this->setInput(array('cate','name','desc','status','brand'));
                $frm_data = $this->set_arrdata(array('id_category','name','desc','status','id_brand'));
                $check_upload_submit = TRUE;
                //upload avatar
                if($_FILES['image']['name'] != null) {
                    $link_upload = 'uploads/product/';
                    $link_data =array();
                    if($_FILES['image']['error'] == 0) {
                        $link_data[] = $this->uploadImages('image', $link_upload);
                    }
                    if(!is_array($link_data[0])) {
                        $data['avatar_error'] = $link_data[0];
                        $check_upload_submit = FALSE;
                    } else {
                        $frm_data['image'] = $link_data[0]['file_name'];
                    }

                }
                //end upload avatar
                if($check_upload_submit == TRUE) {
                    if($this->product_model->insert_record($frm_data)) {
                        $this->session->set_flashdata('success', $this->lang->line('insert_success'));
                    } else {
                        $this->session->set_flashdata('error', $this->lang->line('insert_fail'));
                    }
                    redirect(base_url()."admin/product");
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
        $data['heading'] = $data['title'] = $this->lang->line('edit_pro');
        $data['template'] = 'product/insert';
        $this->category_model->orderBy('DESC');
        $data['list_cate']  = $this->category_model->getAll();
        $this->brand_model->orderBy('DESC');
        $data['list_brand'] = $this->brand_model->getAll();
        $id = $this->uri->segment(4);
        $data['edit_record'] = $this->product_model->getAll('', $id);

        if($this->input->post('btnsub'))
        {
            $this->set_rule();
            $data['edit_record'][0]['desc']     = $this->input->post('desc');
            $data['edit_record'][0]['id_category']     = $this->input->post('cate');
            $data['edit_record'][0]['id_brand']     = $this->input->post('brand');
            $data['edit_record'][0]['status']   = $this->input->post('status');
            $data['edit_record'][0]['name']     = $this->input->post('name');
            if($this->form_validation->run() == TRUE) {

                $this->setInput(array('cate','name','desc','status','brand'));
                $frm_data = $this->set_arrdata(array('id_category','name','desc','status','id_brand'));

                $check_upload_submit = TRUE;
                //upload image
                if($_FILES['image']['name'] != null) {
                    $link_upload = 'uploads/product/';
                    $link_data =array();
                    if($_FILES['image']['error'] == 0) {
                        $link_data[] = $this->uploadImages('image', $link_upload);
                    }
                    if(!is_array($link_data[0])) {
                        $data['avatar_error'] = $link_data[0];
                        $check_upload_submit = FALSE;
                    } else {
                        //xóa file cũ và lưu tên file mới
                        unlink('uploads/product/'.$data['edit_record'][0]['image']);
                        $frm_data['image'] = $link_data[0]['file_name'];
                    }
                }

                //end upload avatar
                if($check_upload_submit == TRUE) {
                    if($this->product_model->update_record($frm_data,'',$id)) {
                        $this->session->set_flashdata('success', $this->lang->line('edit_success'));
                    } else {
                        $this->session->set_flashdata('error', $this->lang->line('edit_fail'));
                    }
                    redirect(base_url()."admin/product");
                }
            }
        }
        $this->load->view("layout/layout", $data);
    }

    /*
     * hàm set rule cho 2 hàm insert và edit
     * */
    public function set_rule()
    {
        $this->form_validation->set_rules('name', $this->lang->line('product'), 'trim|required|callback_checkexistname');
        $this->form_validation->set_rules('cate', $this->lang->line('category'), 'trim|required');
        $this->form_validation->set_rules('brand', $this->lang->line('brand'), 'trim');
        $this->form_validation->set_rules('desc', $this->lang->line('desc_pro'), 'trim');
        $this->form_validation->set_rules('status');
        $this->form_messages();
    }

    /*
     * hàm delete
     */

    public function del()
    {
        $id = $this->uri->segment(4);
        $del_record = $this->product_model->getAll('', $id);

        if($this->product_model->delete_record($id)) {
            //xóa file avatar
            if($del_record[0]['image'] != null) {
                unlink('uploads/product/'.$del_record[0]['image']);
            }
            $this->session->set_flashdata('success', $this->lang->line('del_success'));
        } else {
            $this->session->set_flashdata('error', $this->lang->line('del_fail'));
        }
        redirect(base_url()."admin/product");
    }

    /*
     * hàm kiểm tra tồn tại email
     */

    public function checkexistname()
    {
        $name =  $this->input->post("name");
        $name = encodeStr($name);
        $this->product_model->where("name",$name);
        $id = $this->uri->segment(4);
        if($id != null)
        {
            $this->product_model->where("id_product !=", $id);
        }
        $num = $this->product_model->count_record();
        if($num > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /*
     * hàm thay đổi status
     */

    public function status($id = '', $status_current = '')
    {
        $url = base_url()."admin/product";
        $this->change_status($id, $status_current, 'product_model', 'update_record',$url);
    }
}
