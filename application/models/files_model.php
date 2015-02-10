<?php

class Files_Model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    function upload($post,$filename)
    {
        $arr['userid'] = $this->session->userdata('userid');
        $arr['filename'] = $filename;
        $arr['fileaddress'] = $filename;
        $arr['uploadtime'] = time();

        if ( $this->db->insert('upload',$arr) ){
            return $this->db->insert_id();
        }
        else
            return FALSE;
        
    }
}