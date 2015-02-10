<?php

class Files extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url','form'));
        $this->load->model('files_model');
    }

    function upload()
    {
       
            
        $post = $this->input->post();
        $targetFolder = $_SERVER['DOCUMENT_ROOT'].'/luojie/public/upload';
     
           
        $verifyToken = md5('smelltheflower'.$post['timestamp']);
        
        if ( ! empty($_FILES) && $post['token']==$verifyToken) {
           
   
            $tempFile = $_FILES['Filedata']['tmp_name'];
            $targetPath = $targetFolder;
            $targetFile = $targetPath.'/'.$_FILES['Filedata']['name'];
               
                 
            $fileTypes = array();
            $fileParts = pathinfo($_FILES['Filedata']['name']);

            
            move_uploaded_file($tempFile,$targetFile);
                
            if ($this->files_model->upload($post,$_FILES['Filedata']['name'])){
                echo '1';
            }
            else  {
                echo '0';
            }        
            
        }
        else {
            echo '0';
        }
        return ;
    }
  
    function del()
    {
        $session = $this->session->all_userdata();
        $post = $this->input->post();
        if(!isset($session['userid'])){
            $res['msg'] = '您无权进行该操作';
            $res['status'] = 0 ;
        }
        else{
            $row = $this->files_model->fetch_one($post['fileid']);
            $res = $this->files_model->delete($row);
            if($res){
                $res['msg'] = 'delete successfully';
                $res['status'] = 1;    
            }
            else {

                $res['msg'] = 'delete failed';
                $res['status'] = 0 ;   
            }

        }
        echo json_encode($res);
    }
 

}