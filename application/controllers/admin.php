<?php
class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->helper(array('url','form'));
        $this->load->model('passage_model');
        $this->load->model('files_model');
        $this->load->model('notice_model');
        $this->load->model('count_model');
        $this->load->library('pagination');
    }


        /*默认加载
         *如果存在session，
         *判断权限进入相应页面，
         *否则，进入登录界面
         * */
    function index()
    {
        
        $session = $this->session->all_userdata();
        //$data['class'] =  isset($session['class'])?$session['class']:0;
        if(!isset($session['class']))
            $this->session->set_userdata(array('class'=>0));
        if(isset($session['old']))
            $data['count'] = $this->count_model->showcount();
        else {
            $data['count'] = $this->count_model->count();
            $this->session->set_userdata(array('old'=>1));
        }
        if (isset($session['userid'])) {
            $data['session'] = $session;
            $data['rows'] = $this->admin_model->fetch_all();
            $data['class'] = $this->session->userdata('class');
            $this->load->view('./admin/index',$data);
              
        }
        else {
            $this->load->view('./admin/login');
        }        
    }

   function setclass()
    {
        $class = 1  ;//(int)$this->input->get('class');
        if(!in_array($class, array(1,2,3,4)))
        {
            $this->session->set_userdata(array('class'=>0));
            $res['status'] = 0;
            $res['msg'] = 'CLASS NOT FOUND';
        }
        else 
        {   
            if( ($this->session->userdata('power') != $class) AND ($this->session->userdata('power') != 0) )
            {
                $this->session->set_userdata(array('class'=>0));
                $res['status'] = 0;
                $res['msg'] ='YOU HAVE NO ACCESS';
            }
            else
            {
                $this->session->set_userdata(array('class'=>$class));
                $res['status'] = 1;
                $res['msg'] = 'SUCCESS';
            }
        }
        print_r($res);
        //echo json_encode($res);
    }
    

        /*管理员和教师登录*/
    function login()
    {
        $post = $this->input->post();

        if ($post['username'] == '' OR $post['password'] == '')
        {
            $res['msg'] = '请输入完整的用户名或密码';
            $res['status'] = 0;
        }    
        else {
            
            $result = $this->admin_model->do_login($post);
            if ($result) {
                $res['msg'] = 'OK';
                $res['status'] = 1;
            }
            else {
                $res['msg'] = '请输入正确的用户名密码';
                $res['status'] = 0;
            }
        }
        echo json_encode($res);
    }


    
        /*账号登出*/
    function logout()
    {
        $data = array('userid'=>'','name'=>'','ip'=>'','power'=>'','old'=>'','class'=>'');

        $this->session->unset_userdata($data);

        header('LOCATION:index');
    }


   function upload()
    {
        $session = $this->session->all_userdata();
        if(!isset($session['userid'])){
            $res['status'] = 0;
            $res['msg'] = '您无权进行此操作';
        }
        else
        {
            $rows = $this->files_model->fetch_all();
            $data['rows'] = $rows;
            $data['class'] = $session['class'];
            $this->load->view('./admin/upload',$data);
        }
    }

    function passli($limit=0)
    {
        $session = $this->session->all_userdata();
        if(!isset($session['userid'])){
            $res['status'] = 0;
            $res['msg'] = '您无权进行此操作';
        }
        else
        {   
            //pagination
            $config['base_url'] = base_url().'index.php/admin/passli';
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
            $rows = $this->passage_model->fetch_all($limit,$config['per_page']);
            $data['rows'] = $rows;
            $data['class'] = $session['class'];
            $this->load->view('./admin/page_list',$data);
        }
    }

     function notice($limit=0)
    {
        $session = $this->session->all_userdata();
        if(!isset($session['userid'])){
            $res['status'] = 0;
            $res['msg'] = '您无权进行此操作';
        }
        else
        {  
            $config['base_url'] = base_url().'index.php/admin/notice';
            $config['total_rows'] = $this->notice_model->count_all();
            $config['per_page'] = 2;
            $config['num_links'] = 3;
            $config['full_tag_open'] = '<p>';
            $config['full_tag_close'] = '</p>'; 
            $this->pagination->initialize($config);

            $limit = (int)$limit;
            if($limit<0 OR $limit>=$config['total_rows'])
                $limit = 0; 

            $rows = $this->notice_model->fetch_all($limit,$config['per_page']);
            $data['rows'] = $rows;
            $data['class'] = $session['class'];
            $this->load->view('./admin/news_list',$data);
        }
    }
      
   
        
}