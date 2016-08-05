<?php

class Dashboard extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->model('collection_model');
        $this->load->model('news_model');
    }

    public function index()
    {
        $this->load->model('admins_model');
        $data['heading'] = $data['title'] = $this->lang->line('Dasboard_Admin');
        ///////Statistics, thống kê
        //user new
        $this->users_model->orderBy('DESC');
        $this->users_model->limit_record(10,0);
        $data['list_user_new'] = $this->users_model->getAll();

        //collection
        $this->collection_model->orderBy('DESC');
        $this->collection_model->limit_record(10,0);
        $data['list_collection_new'] = $this->collection_model->getAll_normal();

        //news
        $this->news_model->orderBy('DESC');
        $this->news_model->where('type','0');
        $this->news_model->limit_record(10,0);
        $data['list_news_new'] = $this->news_model->getAll();
        $data['list_admins'] = $this->admins_model->getAll();

        //question
        $this->news_model->orderBy('DESC');
        $this->news_model->where('type','1');
        $this->news_model->limit_record(10,0);
        $data['list_question_new'] = $this->news_model->getAll();
        $data['list_users'] = $this->users_model->getAll();


        //if click search all
        if($this->input->post('txtsearchall'))
        {
            $this->form_validation->set_rules('txtsearchall', $this->lang->line('search_all'), 'trim|required');
            $this->form_messages();
            if($this->form_validation->run() == TRUE) {
                $txtsearch = $this->input->post('txtsearchall');
                redirect(base_url().'admin/search_all/'.$txtsearch);
            }
        }
        //end click search all
        $data['template'] = 'dashboard/index';
        $this->load->view("layout/layout", $data);
    }

    /*
     * search all
     * $txtsearch: key words search
     * */
    public function search_all($txtsearch = '')
    {
        $txtsearch = urldecode($txtsearch);
        $data['title'] = $this->lang->line('search_all');
        if($txtsearch != null) {
            $this->load->model('province_model');
            $this->load->model('district_model');
            $count_result = 0;

            //table users
            $arr_columns_user = array('first_name','last_name','alias_name','facebook_name','email','address');
            $data['search_all']['users']['list'] = $this->getList_table_search('users_model','getAll','wheres_user',$txtsearch,$arr_columns_user,'orderBy');
            if(count($data['search_all']['users']['list']) > 0) {
                $count_result += count($data['search_all']['users']['list']);
                $data['search_all']['users']['table_name'] = $this->lang->line('users_list').' ('.count($data['search_all']['users']['list']).')';
            }
            $data['search_all']['users']['columns_table'] = $arr_columns_user;
            $data['search_all']['users']['columns'] = $this->setColumns('users', array('count','name_user','subname_user','as_user','namefb_user','email_user','address_user','action'));
            $data['search_all']['users']['link_action'] = "/admin/users/edit/";
            $data['search_all']['users']['columns_id'] = "id_user";
            //end users

            //collection
            $arr_columns_coll = array('title','idea','technology');
            $data['search_all']['collection']['list'] = $this->getList_table_search('collection_model','getAll_easy','where_collection',$txtsearch,$arr_columns_coll,'orderBy');
            if(count($data['search_all']['collection']['list']) > 0) {
                $count_result += count($data['search_all']['collection']['list']);
                $data['search_all']['collection']['table_name'] = $this->lang->line('collection_list').' ('.count($data['search_all']['collection']['list']).')';
            }
            $data['search_all']['collection']['columns_table'] = $arr_columns_coll;
            $data['search_all']['collection']['columns'] = $this->setColumns('collection', array('count','title_admin','idea_admin','technology_admin','action'));
            $data['search_all']['collection']['link_action'] = "/admin/collection/viewDetail/";
            $data['search_all']['collection']['columns_id'] = "id_collection";
            //end collection

            //news
            $arr_columns_news = array('title');
            $data['search_all']['news']['list'] = $this->getList_table_search('news_model','getAll','wheres',$txtsearch,$arr_columns_news,'orderBy','','0');
            if(count($data['search_all']['news']['list']) > 0) {
                $count_result += count($data['search_all']['news']['list']);
                $data['search_all']['news']['table_name'] = $this->lang->line('news_list').' ('.count($data['search_all']['news']['list']).')';
            }
            $data['search_all']['news']['columns_table'] = $arr_columns_news;
            $data['search_all']['news']['columns'] = $this->setColumns('news', array('count','title_news'));
            $data['search_all']['news']['link_action'] = "/admin/news/edit/";
            $data['search_all']['news']['columns_id'] = "id_news";
            //end news

            //question
            $arr_columns_qst = array('title');
            $data['search_all']['question']['list'] = $this->getList_table_search('news_model','getAll','wheres',$txtsearch,$arr_columns_qst,'orderBy','','1');
            if(count($data['search_all']['question']['list']) > 0) {
                $count_result += count($data['search_all']['question']['list']);
                $data['search_all']['question']['table_name'] = $this->lang->line('question_list').' ('.count($data['search_all']['question']['list']).')';
            }
            $data['search_all']['question']['columns_table'] = $arr_columns_qst;
            $data['search_all']['question']['columns'] = $this->setColumns('question', array('count','title_question'));
            $data['search_all']['question']['link_action'] = "/admin/question/edit/";
            $data['search_all']['question']['columns_id'] = "id_news";
            //end question

            $data['heading'] = $this->lang->line('search_all').' <a>(Total '.$count_result.' results)</a>';
        } else {
            $data['heading'] = $this->lang->line('search_all').' <a>('.$this->lang->line('No_Keywords').')</a>';
        }
        $data['template'] = 'dashboard/results_all';
        $this->load->view("layout/layout", $data);

    }

    /*
     * get data table
     * $model: model name
     * $function_getAll: function getall of model
     * $function_where: function where of model
     * $keywords: key words search
     * $columns: array comlumns search
     * $orderBy: function order by for table, ASC or DESC, default: DESC
     * $val_orderby; value for order by, ASC or DESC, default: DESC
     * */
    public function getList_table_search($model = '', $function_getAll = '', $function_where = '', $keywords = '', $columns = array(), $orderBy = '', $val_orderby = '', $news_question = '')
    {
        $where = '';
        foreach($columns as $key) {
            $where .= $key." like '%$keywords%' OR ";
        }
        $where = rtrim($where, ' OR ');
        if($news_question != null) {
            $where .= ' AND type='.$news_question;
        }
        //set where
        $this->$model->$function_where($where);

        //set order by
        if($orderBy != null) {
            if($val_orderby == null) { $val_orderby = 'DESC';}
            $this->$model->$orderBy($val_orderby);
        }
        //return list
        return $this->$model->$function_getAll();
    }

    /*
     * set colum in search all
     * */
    public function setColumns($key = '', $name_columns = array())
    {
        $columns = array();
        foreach($name_columns as $name) {
            $columns[$key][]= $this->lang->line($name);
        }
        return $columns;
    }

}
