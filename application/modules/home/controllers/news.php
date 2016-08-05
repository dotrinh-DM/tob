<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class News extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/news_model');
        $this->load->model('admin/admins_model');
    }

    public function index($title = '')
    {
        $temp['title']      =  $this->lang->line('news_home');
        $temp['template']   = 'news/default';
        //lấy tin tức
        if($title != null) {
            $temp['template']   = 'news/detail';
            $this->news_model->where('alias',$title);
            $temp['news']       = $this->list_news();
            $id_current         = 0;
            if(count($temp['news']) > 0) {
                $id_current         = $temp['news'][0]['id_news'];
            }

            //get creator
            if(count($temp['news']) > 0) {
                $this->admins_model->select_column('name');
                $this->admins_model->where('id_admins', $temp['news'][0]['creator']);
                $temp['creator'] = $this->admins_model->getAll();
                $temp['creator'] = $temp['creator'][0]['name'];
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
            $temp['other_first_list']   =  $this->list_news();

            //get list after current news
            $this->news_model->select_column(array('id_news','title','alias'));
            $this->news_model->orderBy('DESC');
            $this->news_model->where('id_news <',$id_current);
            $this->news_model->limit_record($last,0);
            $temp['other_last_list']   =  $this->list_news();

        } else {
            $this->news_model->select_column(array('id_news','title','alias'));
            $this->news_model->limit_record(100,0);
            $this->news_model->orderBy('DESC');
            $temp['news'] = $this->list_news();
        }

        $this->load->view('layout/layout', $temp);
    }


    public function list_news()
    {
        $this->news_model->where('status','1');
        $this->news_model->where('type','0');
        return $this->news_model->getAll();
    }
}
