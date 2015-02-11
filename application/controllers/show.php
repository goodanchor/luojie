<?php
class Show extends CI_Controller {
    function __construct()
    {
        parent::__construct();      
        $this->load->model('admin_model');
        $this->load->model('files_model');
        $this->load->model('count_model');
        $this->load->model('notice_model');
        $this->load->model('passage_model');
        $this->load->helper(array('url','form'));
    }

    function index()
    {
        $session = $this->session->all_userdata();
        if(isset($session['old']))
            $data['count'] = $this->count_model->showcount();
        else {
            $data['count'] = $this->count_model->count();
            $this->session->set_userdata(array('old'=>1));
        }
        if($rows = $this->notice_model->fetch_all()){
            $data['status'] = 1;
            $data['rows'] = $rows;
        }
        else {
            $data['status'] = 0;
            $data['msg'] = '无公告';
        }
        $this->load->view('homepage',$data);
                
    }

    function article($pid=0)
    {
        $pid = (int)$pid;
        if($row = $this->passage_model->fetch_one($pid))
        {
            $data['status'] = 1;
            $data['msg'] = 'success';   
            $data['row'] = $row;
        }
        else{
            $data['status'] = 0;
            $data['msg'] = '您查找的文章不存在或已删除';
            $data['row'] = array();
        }
        $this->load->view('article',$data);
        
    }

    function articlelist()
    {
        if($rows = $this->passage_model->fetch_all()){
            $data['status'] = 1;
            $data['rows'] = $rows;
        }
        else {
            $data['status'] = 0;
            $data['rows'] = array();
        }
        $this->load->view('filelist',$data);
    }
    
    function files()
    {
        if($rows = $this->files_model->fetch_all()){
            $data['status'] = 1;
            $data['rows'] = $rows;
        }
        else {
            $data['status'] = 0;
            $data['msg'] = '暂时无文件';
        }
        print_r($data);
        $this->load->view('file-list');
    }

    function captcha()
    {
        $conf = array('name'=>'captcha');
        $this->load->library('captcha',$conf);
        $this->captcha->show();
    }
}