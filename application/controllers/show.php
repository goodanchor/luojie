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

    function articlelist($class=1;$limit=0)
    {

         switch($class){
            case 'xhykzzhsy':
                $class = 1;
                break;
            case 'szdlyljsj':
                $class = 2;
                break;
            case 'wjylyjkjs':
                $class = 3;
                break;
            case 'qrsxt':
                $class = 4;
                break;
            default:
                $class = 1;
                break;
        }
        $this->load->library('pagination');
        //pagination
        $config['base_url'] = base_url().'index.php/show/articlelist';
        $config['total_rows'] = $this->passage_model->count_all();;
        //$config['first_url'] = base_url().'index.php/admin/passli/0';
        $config['per_page'] = 2;
        $config['num_links'] = 3;
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
        $this->pagination->initialize($config);

        $limit = (int)$limit;
        if($limit<0 OR $limit>=$config['total_rows'])
            $limit = 0;

        if($rows = $this->passage_model->fetch_all($limit,$config['per_page'])){
            $data['status'] = 1;
            $data['rows'] = $rows;
        }
        else {
            $data['status'] = 0;
            $data['rows'] = array();
        }
        $this->load->view('articlelist',$data);
    }



    function files($class=1,$limit=0)
    {
        switch($class){
            case 'xhykzzhsy':
                $class = 1;
                break;
            case 'szdlyljsj':
                $class = 2;
                break;
            case 'wjylyjkjs':
                $class = 3;
                break;
            case 'qrsxt':
                $class = 4;
                break;
            default:
                $class = 1;
                break;
        }
        if($rows = $this->files_model->fetch_all($limit,3,$class)){
            $data['status'] = 1;
            $data['rows'] = $rows;
        }
        else {
            $data['status'] = 0;
        }
        print_r($data);
        //$this->load->view('filelist',$data);
    }




    function captcha()
    {
        $this->load->model('captcha_model');
        $this->captcha_model->show('captcha');
    }
}