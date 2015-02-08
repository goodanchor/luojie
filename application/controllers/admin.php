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
                    $this->load->view('admin_index',$data);
                    break;
                case 0 :
                    $this->load->view('teacher',$data);
                    break;
                default:
                    $this->load->view('Error');
            }
        }
        else {
            header('LOCATION : login');
        }
            
    }

        /*管理员和教师登录*/
    function login()
    {
            /*设置验证规则
             *3 parms
             *filed 表单域名
             *name 作为参数返回错误信息
             *rules 验证规则
             */
        $this->form_validation->set_rules('username','用户名','trim|required|min_length[5]|max_length[16]|xss_clean');
        $this->form_validation->set_rules('password','密码'，'trim|required|min_length[6]|max_length[16]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('');
        }
        else {
            $post = $this->input->post();
            $res = $this->admin_model->do_login($post);
            if ($res) {
                header('LOCATION : index');
            }
            else {
                $this->form_validation->set_message('error','用户名或密码错误');
                $this->load->view('login');
            }
        }
    }


    
        /*账号登出*/
    function logout()
    {
        $data = array('userid'=>'','name'=>'','ip'=>'','power'=>'');

        $this->session->unset_userdata($data);
        
        header('LOCATION : login');
    }

    function upload_file()
    {
        
        $config['upload_path'] = './uploads/';
        $config['max_size'] = '1000';
        $config['encrypt_name'] = 'TRUE';

        $this->load->library('upload',$config);

        if ( ! $this->upload->do_upload()) {
            $error = array('error'=>$this->upload->display_errors());

            $this->load->view('',$error);
        }
        else {
            $data = $this->upload->data();
            $res = $this->admin_model->upload($data);
        }
    }
    
    
}