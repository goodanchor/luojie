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
        $targetFolder = base_url().'/public/uploads';

        if( ! file_exists($targetFolder)) {
            mkdir($targetFolder,0777);
        }

        $verifyToken = md5('unique_salt'.$post['timestamp']);
        
        if ( ! empty($_FILES) && $post['token']==$verifyToken) {
            $tempFile = $_FILES['Filedata']['tmp_name'];
            $targetPath = $targetFolder;
            $targetFile = rtrim($targetPath,'/').'/'.$_FILES['Filedata']['name'];
                /*validate the file type
                  */
            $fileTypes = array();
            $fileParts = pathinfo($_FILES['Filedata']['name']);

                //if (in_array($fileParts['extension'],$fileTypes)){
                move_upload_file($tempFile,$targetFile);
                    //}

                if ($this->files_model->upload($post,$_FILES['Filedata']['name'])){
                    echo '1';
                }
                else  {
                    echo '0';
                } 
                    
        }
        else {
            echo '1';
        }
        return ;
    }
        /*
    function delete()
    {
        $post = $this->input->post();
        if
    }
        */

}