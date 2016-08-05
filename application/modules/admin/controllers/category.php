<?php

class Category extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('category_model');
        $this->load->library('upload');
    }

    public function index()
    {
        $data['heading'] = $data['title'] = $this->lang->line('manage_cate');
        $this->category_model->orderBy('DESC');
        $data['list'] = $this->category_model->getAll();
        $data['template'] = 'category/list';
        $this->load->view("layout/layout", $data);

        //nếu bấm xóa nhiều bản ghi
        if($this->input->post('btndelall')) {
            $link_redirect = base_url().'admin/category';
            $list_check = $this->input->post('checks');
            $this->delete_all($list_check,'category_model','delete_record', $link_redirect,'image','getAll','uploads/category/');
        }
    }

    /*
     * hàm insert
     * */
    public function insert()
    {
        $data['heading'] = $data['title'] = $this->lang->line('insert_category');
        $data['template'] = 'category/insert';

        if($this->input->post('btnsub'))
        {
            $this->set_rule();

            if($this->form_validation->run() == TRUE) {
                $this->setInput(array('name','desc','status'));
                $frm_data = $this->set_arrdata(array('name','desc','status'));
                $check_upload_submit = TRUE;
                //upload avatar
                if($_FILES['image']['name'] != null) {
                    $link_upload = 'uploads/category/';
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
                    if($this->category_model->insert_record($frm_data)) {
                        $this->session->set_flashdata('success', $this->lang->line('insert_success'));
                    } else {
                        $this->session->set_flashdata('error', $this->lang->line('insert_fail'));
                    }
                    redirect(base_url()."admin/category");
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
        $data['heading'] = $data['title'] = $this->lang->line('edit_cate');
        $data['template'] = 'category/insert';
        $id = $this->uri->segment(4);
        $data['edit_record'] = $this->category_model->getAll('', $id);

        if($this->input->post('btnsub'))
        {
            $this->set_rule();
            $data['edit_record'][0]['desc'] = $this->input->post('desc');
            $data['edit_record'][0]['status'] = $this->input->post('status');
            $data['edit_record'][0]['name'] = $this->input->post('name');
            if($this->form_validation->run() == TRUE) {

                $this->setInput(array('name','desc','status'));
                $frm_data = $this->set_arrdata(array('name','desc','status'));

                $check_upload_submit = TRUE;
                //upload image
                if($_FILES['image']['name'] != null) {
                    $link_upload = 'uploads/category/';
                    $link_data =array();
                    if($_FILES['image']['error'] == 0) {
                        $link_data[] = $this->uploadImages('image', $link_upload);
                    }
                    if(!is_array($link_data[0])) {
                        $data['avatar_error'] = $link_data[0];
                        $check_upload_submit = FALSE;
                    } else {
                        //xóa file cũ và lưu tên file mới
                        unlink('uploads/category/'.$data['edit_record'][0]['image']);
                        $frm_data['image'] = $link_data[0]['file_name'];
                    }
                }

                //end upload avatar
                if($check_upload_submit == TRUE) {
                    if($this->category_model->update_record($frm_data,'',$id)) {
                        $this->session->set_flashdata('success', $this->lang->line('edit_success'));
                    } else {
                        $this->session->set_flashdata('error', $this->lang->line('edit_fail'));
                    }
                    redirect(base_url()."admin/category");
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
        $this->form_validation->set_rules('name', $this->lang->line('category'), 'trim|required|callback_checkexistname');
        $this->form_validation->set_rules('desc', $this->lang->line('desc_cate'), 'trim');
        $this->form_validation->set_rules('status');
        $this->form_messages();
    }

    /*
     * confirm_delete
     * */
    public function confirm_delete($id = '')
    {
        $data['heading']  = $data['title'] = $this->lang->line('confirm_delete_cate');
        $data['template'] = 'category/confirm_delete';
        $data['id_cate']  = $id;
        $this->load->view("layout/layout", $data);
    }

    /*
     * hàm delete
     */

    public function del()
    {
        $id = $this->uri->segment(4);
        $del_record = $this->category_model->getAll('', $id);

        if($this->category_model->delete_record($id)) {
            //delete file avatar
            if($del_record[0]['image'] != null) {
                unlink('uploads/category/'.$del_record[0]['image']);
            }
            //delete parent product
            $this->load->model('product_model');
            $this->product_model->where("id_category",$id);
            $list_pro = $this->product_model->getAll();
            $num = 0;
            foreach($list_pro as $pro_del) {
                if($this->product_model->delete_record($pro_del['id_product'])) {
                    //xóa file avatar
                    if($pro_del['image'] != null) {
                        unlink('uploads/product/'.$pro_del['image']);
                    }
                    $num++;
                }
            }
            $this->session->set_flashdata('success', $this->lang->line('del_success')." (".$num." products in the category has been deleted.)");
        } else {
            $this->session->set_flashdata('error', $this->lang->line('del_fail'));
        }
        redirect(base_url()."admin/category");
    }

    /*
     * hàm kiểm tra tồn tại email
     */

    public function checkexistname()
    {
        $name =  $this->input->post("name");
        $name = encodeStr($name);
        $this->category_model->where("name",$name);
        $id = $this->uri->segment(4);
        if($id != null)
        {
            $this->category_model->where("id_category !=", $id);
        }
        $num = $this->category_model->count_record();
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
        $url = base_url()."admin/category";
        $this->change_status($id, $status_current, 'category_model', 'update_record',$url);
    }
}
