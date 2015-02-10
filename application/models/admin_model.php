<?php
class Admin_Model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }
       
    function do_login($post)
    {
            /*验证账号密码
             *$post['username'],$post['password']
             *sucess=>返回TRUE，并将账号信息写入session
             * fail =>返回FALSE
             * */
        $arr['username'] = $post['username'];
        $arr['password'] = md5($post['password']);

        $query = $this->db->get_where('user',$arr);

        if ($row = $query->row_array()) {
            $data['ip'] = $this->session->userdata('ip_address');
            $data['name'] = $row['name'];
            $data['userid'] = $row['userid'];
            $data['power'] = $row['power'];
            $this->db->where('userid',$row['userid']);
            $this->db->update('user',$data);
            $this->session->set_userdata($data);
            return TRUE;
        }
        else
            return FALSE;
    }


    function upload($data,$post)
    {
        $arr['userid'] = $this->session->userdata('userid');
        if ( ! $arr['userid'])
            return FALSE;
        $arr['filename'] = $data['orig_name'];
        $arr['fileaddress'] = $data['file_name'];
        $arr['uploadtime'] = time();
        $arr['description'] = $post['description'];

        if( $this->db->insert('upload',$arr) ) {
            return $this->db->insert_id();
        }
        else
            return FALSE;
    }

     function fetch_all()
    {
        /*$this->db->select('upload.*,user.name');
        $this->db->from('upload');
        $this->db->join('user','user.userid=upload.userid');*/
        $this->db->order_by('dowloadtimes','desc');
        $query = $this->db->get('upload');

        if($rows = $query->result_array()){
            return $rows;
        }
        return FALSE;
    }
}