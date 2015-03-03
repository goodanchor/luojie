<?php
class Notice extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->model('notice_model');
    }

    function edit($pid=0){
        $session = $this->session->all_userdata();
        if(!isset($session['userid'])){
            $res['msg'] = '您无权进行该操作';
            $res['status'] = 0 ;
        }
        else {
            $data['class'] = $session['class']; 
            if($pid==0)
                $this->load->view('./admin/edit_news',$data);
            else{
                $row = $this->notice_model->fetch_one($pid);
                    // print_r($row);
                $data['row'] = $row;
                $this->load->view('./admin/edit_news',$data);
            }
        }
    }

    function add_notice()
    {
        $session = $this->session->all_userdata();
        $post = $this->input->post();
        if(!isset($session['userid']) OR ($session['power']!=1)){
            $res['msg'] = '您无权进行该操作';
            $res['status'] = 0 ;
        }
        else if(!$post['title'] OR strlen($post['title'])>100){
            $res['msg'] = '请输入的公告标题或标题过长';
            $res['status'] = 0;
        }
        else if(!$post['content']) {
            $res['msg'] = '请输入公告内容';
            $res['status'] = 0;
        }
        else if ($this->notice_model->add($post)){
            $res['status'] = 1;
            $res['msg'] = '添加文章成功';
        }
        else {
            $res['status'] = 0;
            $res['msg'] = '添加文章失败';            
        }
        echo json_encode($res);
    }

    function del_notice()
    {
        $session = $this->session->all_userdata();
        $post = $this->input->post();
        if(!isset($session['userid']) OR ($session['power']!=1)){
            $res['msg'] = '您无权进行该操作';
            $res['status'] = 0 ;
        }
        else if ($this->notice_model->delete($post)){
            $res['msg'] = '删除成功';
            $res['status'] = 1;
        }
        else {
            $res['msg'] = '删除失败';
            $res['status'] = 0;
        }
        echo json_encode($res);
    }

    function update_notice()
    {
        $session = $this->session->all_userdata();
        $post = $this->input->post();
        if(!isset($session['userid'])  OR ($session['power']!=1)){
            $res['msg'] = '您无权进行该操作';
            $res['status'] = 0 ;
        }
        else if(!$post['title'] OR strlen($post['title'])>100){
            $res['msg'] = '请输入公告标题或标题过长';
            $res['status'] = 0;
        }
        else if(!$post['content']) {
            $res['msg'] = '请输入公告内容';
            $res['status'] = 0;
        }
        else if ($this->notice_model->update($post)){
            $res['status'] = 1;
            $res['msg'] = '修改公告成功';
        }
        else {
            $res['status'] = 0;
            $res['msg'] = '修改公告失败';            
        }
        echo json_encode($res);
    }
}