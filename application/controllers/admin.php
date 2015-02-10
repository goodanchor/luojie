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
    }


        /*默认加载
         *如果存在session，
         *判断权限进入相应页面，
         *否则，进入登录界面
         * */
    function index()
    {
        $session = $this->session->all_userdata();
        if (isset($session['userid'])) {
            $data['session'] = $session;
            $data['$rows'] = $this->admin_model->fetch_all();
            $this->load->view('./admin/index',$data);
              
        }
        else {
            $this->load->view('./admin/login');
                // header('LOCATION : login');
        }
            
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
        $data = array('userid'=>'','name'=>'','ip'=>'','power'=>'');

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
            $this->load->view('./admin/upload',$data);
        }
    }

    function passli()
    {
        $session = $this->session->all_userdata();
        if(!isset($session['userid'])){
            $res['status'] = 0;
            $res['msg'] = '您无权进行此操作';
        }
        else
        {
            $rows = $this->passage_model->fetch_all();
            $data['rows'] = $rows;
            $this->load->view('./admin/page_list',$data);
        }
    }

     function notice()
    {
        $session = $this->session->all_userdata();
        if(!isset($session['userid'])){
            $res['status'] = 0;
            $res['msg'] = '您无权进行此操作';
        }
        else
        {
            $rows = $this->notice_model->fetch_all();
            $data['rows'] = $rows;
            $this->load->view('./admin/news_list',$data);
        }
    }
      
   
        
}