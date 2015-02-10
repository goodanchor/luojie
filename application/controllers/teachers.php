<?php
class Teachers extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->model('teachers_model');
    }
        /*添加老师
         * @parms 管理员权限 1
         * @parms $post->{username,password,name,title}
         * */
    function add_teachers()
    {
        $session = $this->session->all_userdata();
        $post = $this->input->post();
        if ( ! $session['userid'] OR ($session['power'] != 1)) {
            $res['msg'] = '您不是管理员，无法进行该操作';
            $res['status'] = 0;
        }
        else if ( $post['username'] == '' OR $post['password'] =='' OR $post['name'] =='' OR $post['title'] == '') {
            $res['msg'] ='请填写完整的教师信息';
            $res['status'] = 0;
        }
        else if($this->teachers_model->add($post)){
            $res['msg'] = 1;
            $res['status'] = '添加成功';
        }
        else {
            $res['msg'] = '添加失败';
            $res['status'] = 0;
        }
        echo json_encode($res);
    }


    
        /*删除一位老师
         * @parm $post['userid']
         * */
    function del_teachers()
    {
        $session = $this->session->all_userdata();
        $post = $this->input->post();
        if( ! isset($session['userid']) OR ($session['power'] != 1)){
            $res['status'] = 0;
            $res['msg'] = '您不是管理员，无法进行该操作';
        }
        else if ($this->teachers_model->delete($post)){
            $res['status'] = 1;
            $res['msg'] ='删除成功';
        }
        else {
            $res['status'] = 0;
            $res['msg'] = '删除失败';
        }
        echo json_encode($res);
    }


        /*修改老师信息
         *只有该老师或者管理员才能修改
         *如果修改密码，则密码不能为空
         *
         *
         * */
    function update_teachers()
    {
        $session = $this->session->all_userdata();
        $post = $this->input->post();
        if(isset($session['userid']) && ($session['userid'] == $post['userid'] OR $session['power'] == 1)){
            if (isset($post['password']) && $post['password'] == '') {
                $res['status'] = 0;
                $res['msg'] = '密码不能为空';
            }
            else if($this->teachers_model->update($post)) {
                $res['status'] = 1;
                $res['msg'] = '修改成功';
            }
            else {
                $res['status'] = 0;
                $res['msg'] = '修改失败';
            }
        }
        else {
            $res['status'] = 0;
            $res['msg'] = '您无权进行此操作';
        }
    }
    
}