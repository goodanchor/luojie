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

    function index($class='xhykzzhsy')
    {   
         switch($class)
         {
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
        $data['class'] = $class;
        $session = $this->session->all_userdata();
        if(isset($session['old']))
            $data['count'] = $this->count_model->showcount();
        else {
            $data['count'] = $this->count_model->count();
            $this->session->set_userdata(array('old'=>1));
        }
        if($rows = $this->notice_model->fetch_all(0,5,$class)){
            $data['status'] = 1;
            $data['rows'] = $rows;
        }
        else {
            $data['status'] = 0;
            $data['msg'] = '无公告';
        }
        $this->load->view('homepage',$data);
    }


    function news($class='xhykzzhsy',$pid=1)
    {
        $pid = (int)$pid;
        if($row = $this->notice_model->fetch_one($pid))
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
         switch($class)
         {
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
        $data['class'] = $class;
        $this->load->view('news',$data);
        
    }

    function newslist($class='xhykzzhsy',$limit=0)
    {       
        $this->load->library('pagination');
        //pagination
         $config['base_url'] = base_url().'index.php/show/newslist/'.$class;
         switch($class)
         {
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
         $config['total_rows'] = $this->notice_model->count_all($class);;
         $config['per_page'] = 10;
         $config['num_links'] = 3;
         $config['full_tag_open'] = '<p class="pageination">';
         $config['full_tag_close'] = '</p>'; 
         $config['anchor_class'] = "font-size=16 ";
         $this->pagination->initialize($config);

         $limit = (int)$limit;
         if($limit<0 OR $limit>=$config['total_rows'])
            $limit = 0;

        if($rows = $this->notice_model->fetch_all($limit,$config['per_page'],$class)){
            $data['status'] = 1;
            $data['rows'] = $rows;
        }
        else {
            $data['status'] = 0;
            $data['rows'] = array();
        }
        $data['class'] = $class;
        $this->load->view('newslist',$data);
    }


    function article($class='xhykzzhsy',$pid=1)
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
        switch($class)
         {
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
        $data['class'] = $class;
        $this->load->view('article',$data);
    }

    function articlelist($class='xhykzzhsy',$limit=0)
    {

       
        $this->load->library('pagination');
        //pagination
        $config['base_url'] = base_url().'index.php/show/articlelist/'.$class;
          switch($class)
         {
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

        $config['total_rows'] = $this->passage_model->count_all($class);;
        //$config['first_url'] = base_url().'index.php/admin/passli/0';
        $config['per_page'] = 10;
        $config['num_links'] = 3;
        $config['full_tag_open'] = '<p class="pageination">';
        $config['full_tag_close'] = '</p>';
        $this->pagination->initialize($config);

        $limit = (int)$limit;
        if($limit<0 OR $limit>=$config['total_rows'])
            $limit = 0;

        if($rows = $this->passage_model->fetch_all($limit,$config['per_page'],$class))
        {
            $data['status'] = 1;
            $data['rows'] = $rows;
        }
        else 
        {
            $data['status'] = 0;
            $data['rows'] = array();
        }
        $data['class'] = $class;
        $this->load->view('articlelist',$data);
    }



    function files($class='xhykzzhsy',$limit=0)
    {   

         $this->load->library('pagination');
        //pagination
         $config['base_url'] = base_url().'index.php/show/files/'.$class;
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
        $config['total_rows'] = $this->files_model->count_all($class);;
        //$config['first_url'] = base_url().'index.php/admin/passli/0';
        $config['per_page'] = 10;
        $config['num_links'] = 3;
        $config['full_tag_open'] = '<p class="pageination">';
        $config['full_tag_close'] = '</p>';
        $this->pagination->initialize($config);

        $limit = (int)$limit;
        if($limit<0 OR $limit>=$config['total_rows'])
            $limit = 0;

        if($rows = $this->files_model->fetch_all($limit,$config['per_page'],$class)){
            $data['status'] = 1;
            $data['rows'] = $rows;
        }
        else {
            $data['status'] = 0;
        }
        $data['class'] = $class;
        //print_r($data);
        $this->load->view('filelist',$data);
    }




    function captcha()
    {
        $this->load->model('captcha_model');
        $this->captcha_model->show('captcha');
    }
}