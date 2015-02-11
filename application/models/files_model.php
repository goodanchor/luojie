<?php

class Files_Model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('file');
    }

    function upload($post,$filename,$fileaddress)
    {
        $arr['userid'] = $this->session->userdata('userid');
        $arr['filename'] = $filename;
        $arr['fileaddress'] = $fileaddress;
        $arr['uploadtime'] = time();

        if ( $this->db->insert('upload',$arr) ){
            return $this->db->insert_id();
        }
        else
            return FALSE;       
    }


    function fetch_all()
    {
        $this->db->select('upload.*,user.name');
        $this->db->from('upload');
        $this->db->join('user','user.userid=upload.userid');

        $query = $this->db->get();

        if($rows = $query->result_array()){
            return $rows;
        }
        return FALSE;
    }

    function fetch_one($fileid)
    {
        $this->db->select('upload.*,user.name');
        $this->db->from('upload');
        $this->db->where('fileid',$fileid);
        $this->db->join('user','user.userid=upload.userid');
        
        $query = $this->db->get();

        if($row = $query->row_array()){
            return $row;
        }
        return FALSE;
    }

    function delete($row)
    {
        $path = './public/upload/'.iconv("UTF-8","gb2312",$row['fileaddress']);
       if(@unlink($path)){
            $this->db->delete('upload',array('fileid'=>$row['fileid']));
            return TRUE;
        }
        return FALSE;
    }

    function download($fileid)
    {
        $this->load->helper('download');
        $query = $this->db->get_where('upload',array('fileid'=>$fileid));
        $row = $query->row_array();
        $fileaddress = $row['fileaddress'];
        $filename = $row['filename'];
        $data = './public/upload/'.$fileaddress;
        force_download($filename,$data);
    }
}