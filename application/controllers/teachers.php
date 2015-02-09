<?php
class Teachers extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->model('teachers_model');
    }

    function add_teachers()
    {
        $session = $this->session->all_userdata();
        if ( ! $session['userid'] OR ($session['power'] != 1)) {
            $res['error'] = '您不是管理员，无法进行该操作';
                /*待修改*/
            return FALSE;
        }

        $this->load->library('form_validation');

        $this->form_validation->set_rules('username','用户名','trim|required|min_length[5]|max_length[16]|xss_clean');
        $this->form_validation->set_rules('password','password','trim|required|min_length[5]|max_length[16]|xss_clean');
        $this->form_validation->set_rules('name','姓名','trim|required|min_length[2]|max_length[16]|xss_clean');
        $this->form_validation->set_rules('title','职称','trim|required|min_length[2]|max_length[10]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('');
        }
        else {
            $post = $this->input->post();
            $res = $this->teachers_model
        }
    }
}