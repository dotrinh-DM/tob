<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Listcollection extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/collection_model');
        $this->load->model('admin/users_model');
        $this->load->model('home_images_model');
        $this->load->model('home_collection_model');
    }

    public function index($page = '')
    {
        if($page != null && !is_numeric($page)) {
            $this->error404();
        } else {
            $data['title'] =  $this->lang->line('list_collection_home');
            $data['template'] = 'collection/list_collection';

            //lấy count image show
            $num_show = $this->get_config('num_show_list_collection');
            if($num_show == null || $num_show < 0) {$num_show = 10;}
            $list_collect_count =  $this->home_images_model->getJustifiedImagesList($num_show, 0, 1);
            //phân trang
//            pagination_home($url = '',$total_rows= '',$segment = '',$number = '')
//            $pagination = $this->pagination_home('/xem-binh-chon', count($list_collect_count), 2, $num_show);
//            $data['max_page'] = round(count($list_collect_count)/$num_show) - 1;
//            $data['current_page'] = $pagination['start'];

//            $this->collection_model->limit_record($num_show,$pagination['start']);
            //lấy list user
            $data['list_user'] = $this->users_model->getAll();
//            $start = $pagination['start'];
//            if($start <= 0 || $start == null) $start = 0;

            $data['images_list'] = $this->home_images_model->getJustifiedImagesList($num_show, 0, 1);
            $data['page'] = 'photo-listing';
            $data['num_list_show'] = $num_show;
            $this->load->view('layout/layout', $data);
        }
    }

    /*
     * get list collection
     * */
    public function get_list_collection()
    {
        $arr_sl     = array();
        $name_show = $id_users = '';
        $stt        = 0;
        if(isset($_POST['id_list']) && $_POST['id_list'] != null) {
            $arr_sl[]   = $_POST['id_list'];
            $name_show  = $this->users_model->getAll('',$_POST['id_list']);
            $name_show  = 'của '.decodeStr($name_show[0]['alias_name']);
        } else {
            $arr_sl[]   = $_POST['ntm'];
            $arr_sl[]   = $_POST['salon'];
            $arr_sl[]   = $_POST['nm'];
            $arr_sl[]   = $_POST['nag'];
            $stt        = $_POST['stt'];
        }

        $arr_sl_1 = array();
        foreach($arr_sl as $posts) {
            if($posts != null) {
                $arr_sl_1[] = $posts;
            }
        }
        $list_select = implode(',',$arr_sl_1);
        if($stt == 0) {
            $id_users = $list_select;
        } else {
            $id_users = '';
        }

        $images_list = $this->home_images_model->getJustifiedImagesList('', '', 0, $id_users);
        //output
        ?>

        <?php foreach ($images_list as $img_item) { ?>
            <a href="/photos/<?php echo url_title($img_item->alias_name,'-',true).'/'.$img_item->id_images; ?>" title="">
                <img alt="By <?php echo $img_item->alias_name; ?>" src="<?php echo '/uploads/photos/'.$img_item->link; ?>" />
                <div class="caption">
                    <h5><?php echo $img_item->title; ?></h5>
                    By <?php echo $img_item->alias_name; ?>
                    <div style="float: right">Xem <?php echo $img_item->viewed; ?> - Thích <?php echo $img_item->liked; ?></div>
                </div>
            </a>
        <?php } ?>
    <?php
    }

    /*
     * get load collection
     * */
    public function get_load_collection()
    {
        //get value when scroll to bottom page list collection
        $show_scroll = $this->get_config('num_load_scroll');
        if($show_scroll == null) { $show_scroll = 12; }

        //get value start limit to select sql
        if(isset($_POST['num_start']) && $_POST['num_start'] != null ) {
            $num_start = $_POST['num_start'];
        } else {
            $num_start = 4;
        }
        $images_list = $this->home_images_model->getJustifiedImagesList($show_scroll, $num_start, 1);
        //output
        ?>
        <?php foreach ($images_list as $img_item){ ?>
            <a href="/photos/<?php echo url_title($img_item->alias_name,'-',true).'/'.$img_item->id_images; ?>" title="">
                <img src="<?php echo '/uploads/photos/'.$img_item->link; ?>" />
                <div class="caption">
                    <h5><?php echo $img_item->title; ?></h5>
                    By <?php echo $img_item->alias_name; ?>
                    <div style="float: right">Xem <?php echo $img_item->viewed; ?> - Thích <?php echo $img_item->liked; ?></div>
                </div>
            </a>

            <!--set value input is value number start get in sql-->
            <script type="text/javascript">
                $('#input_num_start').val('<?php echo ($num_start + $show_scroll); ?>');
            </script>
        <?php }
    }
}
