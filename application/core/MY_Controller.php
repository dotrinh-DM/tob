<?php

class MY_Controller extends CI_Controller
{

    //biến lưu nội dung các trường trong form khi được mã hóa
    protected $_arrinput;

    /**
     * Khai bao ham tao, load ca thu vien can thiet
     */
    public function __construct()
    {
        parent::__construct();

        $user = $this->session->userdata('login_home');

        if(isset($_COOKIE["existlgpa"]) && $_COOKIE["existlgpa"] != null && isset($_COOKIE["homeaction"]) && $_COOKIE["homeaction"] != null) {
            $pass = $_COOKIE["existlgpa"];
            $id   = $_COOKIE["homeaction"];
            if($user == null && $user['name'] == null && $pass != null && $id != null) {
                $this->check_cookie_login($pass, $id);
            }
        }

        $this->load->model('admin/config_model');
        //kiểm tra nếu trong trang admin, chưa login sẽ chuyển đến trang login
        $acc  = $this->session->userdata("login_info");
        $url  = $this->uri->segment(1);
        $url1 = $url."/".$this->uri->segment(2);
        $url2 = $this->uri->segment(3);
        if($url == 'admin')
        {	//kiểm tra có session login hay chưa
            if($acc["name"] == null) {
                if($url1 != "admin/login") {
                    redirect(base_url()."admin/login");
                }
            } else {
                if($url1 == "admin/login" && $url2 != 'logout') {
                    redirect(base_url()."admin");
                }
            }
        }
        $this->lang->load('en','english');
        $this->lang->load('upload','vietnamese');
        $this->lang->load('vi','vietnamese');
    }

    /*
     * check cookie login
     * */
    public function check_cookie_login($pass = '', $id = '')
    {
        $this->load->model('admin/users_model');
        $this->users_model->where_user('password',$pass);
        $this->users_model->where_user('id_user',$id);
        $list = $this->users_model->getAll();
        if(count($list) > 0) {
            $info = array(
                'name' => $list[0]['alias_name'],
                'id'   => $id
            );
            $this->session->set_userdata('login_home',$info);
        }
    }

    /*
     * Phương thức này sẽ thông báo thành công hay fail cho 1 hành động!
     */

    public function checkStatusChange($check)
    {
        if ($check)
            $this->session->set_flashdata('success', 'Success!');
        else
            $this->session->set_flashdata('error', 'Error!');
    }

    public function error404()
    {
        $this->load->view('error/404_error');
    }

    /*
     * set nội dung err cho form
     */

    public function form_messages()
    {
        $this->form_validation->set_message("matches",$this->lang->line("matches"));
        $this->form_validation->set_message("required",$this->lang->line("required"));
        $this->form_validation->set_message("valid_email",$this->lang->line("valid_email"));
        $this->form_validation->set_message("valid_emails",$this->lang->line("valid_emails"));
        $this->form_validation->set_message("min_length",$this->lang->line("min_length"));
        $this->form_validation->set_message("max_length",$this->lang->line("max_length"));
        $this->form_validation->set_message("numeric",$this->lang->line("numeric"));
        $this->form_validation->set_message("integer",$this->lang->line("integer"));
        $this->form_validation->set_message("checkexist",$this->lang->line("checkexist"));
        $this->form_validation->set_message("checkexistmail",$this->lang->line("checkexistmail"));
        $this->form_validation->set_message("validname",$this->lang->line("validname"));
        $this->form_validation->set_error_delimiters("<span class='err'>","</span>");
    }

    /*
	 * lấy nội dung input trong form thông qua tên thẻ input
	 * $array: là mảng chứa tên các thẻ input
	 */

    function setInput($array = array())
    {
        $this->_arrinput = null;
        foreach($array as $key) {
            $value_input = $this->input->post($key);
            if(is_numeric($key)) {
                $this->_arrinput[$key] = trim($value_input);
            } else {
                $this->_arrinput[$key] = encodeStr($value_input);
            }
        }
    }

    /*
     * trả về nội dung giá trị thẻ input vừa gán trong hàm $array()
     */

    function getInput()
    {
        return $this->_arrinput;
    }

    /*
     * Hàm trả về 1 mảng bằng cách hợp 2 mảng lấy giá trị input và tên colum bảng, phục vụ cho save vào database
     * tao 1 mảng mới có tên colum table là mảng nhập vào, giá trị là mảng get_input trên
     * $array: các trường trong bảng dữ liệu, số phần tử mảng bằng số phần từ trong mảng trong hàm $array()
     */

    public function set_arrdata($array = array())
    {
        return $data = array_combine($array,$this->_arrinput);
    }

    /**
     * @param $name
     * @param $link
     * @return mixed
     */
    public function uploadImages($name, $link)
    {

        $config['upload_path'] = $link;
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['file_name'] = $name . uniqid();
        $config['max_size'] = '15000';
        $config['max_width'] = '2000';
        $config['max_height'] = '1500';
        $this->upload->initialize($config);
        if ($this->upload->do_upload($name))
        {
            return $this->upload->data();
        }
        else
        {
            return $this->upload->display_errors();
        }
    }

    /*
     * hàm xóa nhiều bản ghi 1 lúc
     * $list_check: mảng id checkbox chưa xử lý
     * $model: model sử dụng
     * $function_delete: hàm xóa trong model
     * $link_direct: link chuyển trang sau khi thực hiện xong
     * $col_img: colum image
     * $function_list_all: function get all
     * $root_url_file: folder root of image
     * */
    public function delete_all($list_check = '', $model = '', $function_delete = '', $link_direct = '', $col_img = '', $function_list_all = '', $root_url_file = '')
    {
        $id_arr = array();
        $count_item_del = 0;
        if(count($list_check) > 0) {
            //lấy id trong mảng post về
            foreach($list_check as $item) {
                $id_arr[] = array_keys($item);
            }

            //xóa bản ghi đk chọn
            foreach($id_arr as $id) { //echo $id[0];
                //get info record
                $this_link = '';
                if($col_img != null && $function_list_all != null && $root_url_file != null) {
                    $this_link = $this->$model->$function_list_all('', $id[0]);
                }

                //delete in sql
                if($this->$model->$function_delete($id[0])) {
                    $count_item_del++;
                }

                //delete file if exist available $col_img
                if($this_link !=null && $this_link[0][$col_img] != null) {
                   if(unlink($root_url_file.$this_link[0][$col_img])) {
                       $count_item_del++;
                   }
                }
            }
            //set notice
            if($count_item_del > 0) {
                $this->session->set_flashdata('success', $this->lang->line('del_success').' ('.$count_item_del.' '.$this->lang->line('record').')');
            } else {
                $this->session->set_flashdata('error', $this->lang->line('del_fail'));
            }

            if($link_direct != null) {
                redirect($link_direct);
            }
        }
    }

    /*
     * hàm thay đổi status
     * $status_current: status hiện tại
     * $id: id bản ghi sửa
     * $model: model sử dụng
     * $function_update: hàm upgdade trong model
     * $url_direct: link chuyển trang sau khi thực hiện xong
     * */
    public function change_status($id = '', $status_current = '', $model = '', $function_update = '',$url_direct)
    {
        if($status_current == 0) {
            $data = array(
                'status' => 1
            );
        } else {
            $data = array(
                'status' => 0
            );
        }

        if($this->$model->$function_update($data,'',$id)) {
            $this->session->set_flashdata('success', $this->lang->line('edit_success'));
        } else {
            $this->session->set_flashdata('error', $this->lang->line('edit_fail'));
        }
        redirect($url_direct);
    }

    /*
    * reg check name
    * */
    function red_name($value = '')
    {
        if ($value != '') {
            //kiểm tra tên không có ký tự đặc biệt
            if (!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $value)){
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

    /*
    * reg check phone number
    * */
    function valid_phone($value)
    {
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
     *get content config
     * */
    public function get_config($alias = '')
    {
        if($alias != null) {
            $conten = $this->config_model->getAll('alias',$alias);
            if(count($conten) > 0) {
                $conten = $conten[0]['value'];
            } else $conten = null;
        }
        else
            $conten = $this->config_model->getAll();
        return $conten;
    }

    public function notLogin()
    {
        $user = $this->session->userdata('login_home');
        if(!$user || $user['name'] =='') {
            redirect(base_url('/login'));
        }
    }

    public function pagination($base_url,$total_row,$per_page,$segment_default)
    {
        $config['base_url'] = base_url($base_url);
        $config['total_rows'] = $total_row;
        $config['per_page'] = $per_page;
        $config['uri_segment'] = $segment_default;
        $this->pagination->initialize($config);
    }

    /*
     * hàm xửa lý phân trang
     * $base_url: url trong các nút đánh số trang
     * $total_rows: tổng bản ghi trong trang
     * $segment: vị trí trên url hiển thị thông tin trang
     * $number: số bản ghi trên trang
     */

    function pagination_home($base_url = '',$total_rows= '',$segment = '',$number = '')
    {
        $config["base_url"]    = base_url($base_url);
        $config['total_rows']  = $total_rows;
        $config['per_page']    = $number;
        $config['uri_segment'] = $segment;
        $config['next_link']   = "";
        $config['prev_link']   = "";
        $config['last_link']   = "";
        $config['first_link']  = "";
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment($segment);
        if($data['start'] == null) {$data['start'] = 0;}

        $data['limit'] = $config['per_page'];
        return $data;
    }

    /*
     * send mail
     * $to: to
     * $from: from
     * $from_name: from name
     * $subject :subject
     * $body: content
     * */
    function smtpmailer($to, $from, $from_name, $subject, $body) {

        require_once('/PHPMailer-master/class.phpmailer.php');
        $email_name = $this->get_config('address_email_send');
        $email_pass = $this->get_config('password_email_send');
        define('GUSER', $email_name); // tài khoản đăng nhập Gmail
        define('GPWD', $email_pass); // mật khẩu cho cái mail này

        global $error;
        $mail = new PHPMailer();  // tạo một đối tượng mới từ class PHPMailer
        $mail->IsSMTP(); // bật chức năng SMTP
        $mail->SMTPDebug = 0;  // kiểm tra lỗi : 1 là  hiển thị lỗi và thông báo cho ta biết, 2 = chỉ thông báo lỗi
        $mail->SMTPAuth = true;  // bật chức năng đăng nhập vào SMTP này
        $mail->SMTPSecure = 'ssl'; // sử dụng giao thức SSL vì gmail bắt buộc dùng cái này
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->Username = GUSER;
        $mail->Password = GPWD;
        $mail->SetFrom($from, $from_name);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->IsHTML(true);
        $mail->AddAddress($to);
        if(!$mail->Send()) {
            $error = 'Gửi mail bị lỗi: '.$mail->ErrorInfo;
            return false;
        } else {
            $error = 'Thư của bạn đã được gởi đi ';
            return true;
        }
    }

    public function facebook_count($url){

        $fql  = "SELECT share_count, like_count, comment_count ";
        $fql .= " FROM link_stat WHERE url = '$url'";
        $fqlURL = "http://api.facebook.com/method/fql.query?format=json&query=" . urlencode($fql);
        $response = file_get_contents($fqlURL);
        return json_decode($response);
    }

    public function get_banner()
    {
        $this->load->model('home/home_collection_model');
        $result = $this->home_collection_model->getTopImages();
        $content = "<div class='banner'>";
            foreach ($result as $item_img) {
            $img = getPhotoThumbSrc('uploads/photos/'.$item_img->link, 200, 300);
                $href = '/photos/'.$item_img->alias_name.'/'.$item_img->id_images;
                $content .= "<div class='photo'><a title='".$item_img->alias_name."' href='".$href."' ><img src='".$img."' alt='' width='200' height='300'/></a></div>";
        }
        $content .= '</div>';
        return $content;
    }

}



















