<?php
class Passage extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->model('passage_model');
    }

    function edit($pid=0){
        $session = $this->session->all_userdata();
        if(!isset($session['userid'])){
            $res['msg'] = '您无权进行该操作';
            $res['status'] = 0 ;
        }
        else {
            if($pid==0)
                $this->load->view('./admin/edit_page');
            else{
                $row = $this->passage_model->fetch_one($pid);
                $data['row'] = $row;
                $this->load->view('./admin/edit_page',$data);
            }
        }
    }

    function add_passage()
    {
        $session = $this->session->all_userdata();
        $post = $this->input->post();
        if(!isset($session['userid'])){
            $res['msg'] = '您无权进行该操作';
            $res['status'] = 0 ;
        }
        else if(!$post['title'] OR strlen($post['title'])>100){
            $res['msg'] = '请输入文章标题或标题过长';
            $res['status'] = 0;
        }
        else if(!$post['content']) {
            $res['msg'] = '请输入文章内容';
            $res['status'] = 0;
        }
        else if ($this->passage_model->add($post)){
            $res['status'] = 1;
            $res['msg'] = '添加文章成功';
        }
        else {
            $res['status'] = 0;
            $res['msg'] = '添加文章失败';            
        }
        echo json_encode($res);
    }

    function del_passage()
    {
        $session = $this->session->all_userdata();
        $post = $this->input->post();
        if(!isset($session['userid'])){
            $res['msg'] = '您无权进行该操作';
            $res['status'] = 0 ;
        }
        else if ($this->passage_model->delete($post)){
            $res['msg'] = '删除成功';
            $res['status'] = 1;
        }
        else {
            $res['msg'] = '删除失败';
            $res['status'] = 0;
        }
        echo json_encode($res);
    }

    function update_passage()
    {
        $session = $this->session->all_userdata();
        $post = $this->input->post();
        if(!isset($session['userid'])){
            $res['msg'] = '您无权进行该操作';
            $res['status'] = 0 ;
        }
        else if(!$post['title'] OR strlen($post['title'])>100){
            $res['msg'] = '请输入文章标题或标题过长';
            $res['status'] = 0;
        }
        else if(!$post['content']) {
            $res['msg'] = '请输入文章内容';
            $res['status'] = 0;
        }
        else if ($this->passage_model->update($post)){
            $res['status'] = 1;
            $res['msg'] = '修改文章成功';
        }
        else {
            $res['status'] = 0;
            $res['msg'] = '修改文章失败';            
        }
        echo json_encode($res);
    }

    function imageup()
    {
        include 'Uploader.class.php';

        $config = array(
            "savePath" => "upload/" ,             //存储文件夹
            "maxSize" => 1000 ,                   //允许的文件最大尺寸，单位KB
            "allowFiles" => array( ".gif" , ".png" , ".jpg" , ".jpeg" , ".bmp" )  //允许的文件格式
                        );
        $Path = "./public/uploads/";

            //背景保存在临时目录中
        $config[ "savePath" ] = $Path;
        $up = new Uploader( "upfile" , $config );
        $type = $_REQUEST['type'];
        $callback=$_GET['callback'];

        $info = $up->getFileInfo();
            /**
             * 返回数据
             */
        if($callback) {
            echo '<script>'.$callback.'('.json_encode($info).')</script>';
        } else {
            echo json_encode($info);
        }  //背景保存在临时目录中
        $config[ "savePath" ] = $Path;
        $up = new Uploader( "upfile" , $config );
        $type = $_REQUEST['type'];
        $callback=$_GET['callback'];

        $info = $up->getFileInfo();
            /**
             * 返回数据
             */
        if($callback) {
            echo '<script>'.$callback.'('.json_encode($info).')</script>';
        } else {
            echo json_encode($info);
        }

    }
}