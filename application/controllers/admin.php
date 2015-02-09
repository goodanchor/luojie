<?php
class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->helper(array('url','form'));
        $this->load->library('form_validation');
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
            switch($session['power']){
                case 1 :
                    $this->load->view('./admin/index',$data);
                    break;
                case 0 :
                    $this->load->view('./admin/index',$data);
                    break;
                default:
                    $this->load->view('Error');
            }
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
            $this->load->view('./admin/upload');
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
            $this->load->view('./admin/edit_page');
        }
    }

    
        /*文件上传*/
    function upload_file()
    {
            /*设置上传路径*/
        $path = base_url().'/public/uploads';

        if( ! file_exists($path) ) {
            mkdir($path,0777);
        }
            /*上传配置*/
        $config['upload_path'] = $path.'/';
        $config['max_size'] = '1000';
        $config['encrypt_name'] = 'TRUE';

        $this->load->library('upload',$config);
            /*上传，*/
        if ( ! $this->upload->do_upload()) {
            $error = array('error'=>$this->upload->display_errors());

            $this->load->view('./admin/upload',$error);
        }
        else {
                /*写入数据库*/
            $post = $this->input->post();
            $data = $this->upload->data();
            $res = $this->admin_model->upload($data,$post);
            if ($res) {
                $this->load->view('success');
            }
            else {
                $filed['error'] = 'failed to upload';
                $this->load->view('./admin/upload',$filed);
            }            
        }
    }
        
}