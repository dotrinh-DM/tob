<?php

class Brand extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('brand_model');
        $this->load->library('upload');
    }

    public function index()
    {
        $data['heading'] = $data['title'] = $this->lang->line('manage_brand');
        $this->brand_model->orderBy('DESC');
        $data['list'] = $this->brand_model->getAll();
        $data['template'] = 'brand/list';
        $this->load->view("layout/layout", $data);

        //nếu bấm xóa nhiều bản ghi
        if($this->input->post('btndelall')) {
            $link_redirect = base_url().'admin/brand';
            $list_check = $this->input->post('checks');
            $this->delete_all($list_check,'brand_model','delete_record', $link_redirect,'image','getAll','uploads/brands/');
        }
    }

    /*
     * hàm insert
     * */
    public function insert()
    {
        $data['heading'] = $data['title'] = $this->lang->line('insert_brand');
        $data['template'] = 'brand/insert';

        if($this->input->post('btnsub'))
        {
            $this->set_rule();

            if($this->form_validation->run() == TRUE) {
                $this->setInput(array('name','desc'));
                $frm_data = $this->set_arrdata(array('name','desc'));
                $check_upload_submit = TRUE;
                //upload avatar
                if($_FILES['image']['name'] != null) {
                    $link_upload = 'uploads/brands/';
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
                    if($this->brand_model->insert_record($frm_data)) {
                        $this->session->set_flashdata('success', $this->lang->line('insert_success'));
                    } else {
                        $this->session->set_flashdata('error', $this->lang->line('insert_fail'));
                    }
                    redirect(base_url()."admin/brand");
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
        $data['heading'] = $data['title'] = $this->lang->line('edit_brand');
        $data['template'] = 'brand/insert';
        $id = $this->uri->segment(4);
        $data['edit_record'] = $this->brand_model->getAll('', $id);

        if($this->input->post('btnsub'))
        {
            $this->set_rule();
            $data['edit_record'][0]['desc'] = $this->input->post('desc');
            $data['edit_record'][0]['name'] = $this->input->post('name');
            if($this->form_validation->run() == TRUE) {

                $this->setInput(array('name','desc'));
                $frm_data = $this->set_arrdata(array('name','desc'));

                $check_upload_submit = TRUE;
                //upload image
                if($_FILES['image']['name'] != null) {
                    $link_upload = 'uploads/brands/';
                    $link_data =array();
                    if($_FILES['image']['error'] == 0) {
                        $link_data[] = $this->uploadImages('image', $link_upload);
                    }
                    if(!is_array($link_data[0])) {
                        $data['avatar_error'] = $link_data[0];
                        $check_upload_submit = FALSE;
                    } else {
                        //xóa file cũ và lưu tên file mới
                        unlink('uploads/brand/'.$data['edit_record'][0]['image']);
                        $frm_data['image'] = $link_data[0]['file_name'];
                    }
                }

                //end upload avatar
                if($check_upload_submit == TRUE) {
                    if($this->brand_model->update_record($frm_data,'',$id)) {
                        $this->session->set_flashdata('success', $this->lang->line('edit_success'));
                    } else {
                        $this->session->set_flashdata('error', $this->lang->line('edit_fail'));
                    }
                    redirect(base_url()."admin/brand");
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
        $this->form_validation->set_rules('name', $this->lang->line('brand'), 'trim|required|callback_checkexistname');
        $this->form_validation->set_rules('desc', $this->lang->line('desc_brand'), 'trim');
        $this->form_validation->set_rules('status');
        $this->form_messages();
    }

    /*
     * hàm delete
     */

    public function del()
    {
        $id = $this->uri->segment(4);
        $del_record = $this->brand_model->getAll('', $id);
        $this->load->model('product_model');

        if($this->brand_model->delete_record($id)) {
            //delete file avatar
            if($del_record[0]['image'] != null) {
                unlink('uploads/brands/'.$del_record[0]['image']);
            }

            //change id brand product
            $this->load->model('product_model');
            $this->product_model->where("id_brand",$id);
            $list_pro = $this->product_model->getAll();
            $num = 0;
            foreach($list_pro as $pro_del) {
                $frm_data['id_brand'] = '';
                if($this->product_model->update_record($frm_data,'id_brand',$id)) {
                    $num++;
                }
            }

            $this->session->set_flashdata('success', $this->lang->line('del_success'));
        } else {
            $this->session->set_flashdata('error', $this->lang->line('del_fail'));
        }
        redirect(base_url()."admin/brand");
    }

    /*
     * hàm kiểm tra tồn tại email
     */

    public function checkexistname()
    {
        $name =  $this->input->post("name");
        $name = encodeStr($name);
        $this->brand_model->where("name",$name);
        $id = $this->uri->segment(4);
        if($id != null)
        {
            $this->brand_model->where("id_brand !=", $id);
        }
        $num = $this->brand_model->count_record();
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
        $url = base_url()."admin/brand";
        $this->change_status($id, $status_current, 'brand_model', 'update_record',$url);
    }
}
