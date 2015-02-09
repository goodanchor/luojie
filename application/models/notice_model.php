<?php
class Notice_Model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->loda->library('session');
    }
        /*
         *
         * */
    function add($post)
    {
        $arr = $post;
        $arr['userid'] = $this->session->userdata('userid');
        $arr['time'] = time();

        if($this->db->insert('notice',$arr)){
            return $this->db->insert_id();
        }
        else
            return FALSE;
    }

    function delete($post)
    {
        if($this->db->delete('notice',$post))
        {
            return TRUE;
        }
        return FALSE;
    }

    function update($post)
    {
        if(!isset(post['noticeid']))
            return FALSE;
        if ($this->db->update('notice',$post,array('noticeid'=>$post['noticeid'])))
        {
            return TRUE;
        }
        return FALSE;
    }

    function fetch_all()
    {
        $this->db->select('notice.noticeid,notice.title,notice.time,notice.userid,user.name');
        $this->db->from('notice');
        $this->db->join('user','user.userid=notice.userid');

        $query = $this->db->get();

        if($rows = $query->result_array()){
            return $rows;
        }
        return FALSE;
    }

    function fetch_one($noticeid)
    {
        $this->db->select('notice.noticeid,notice.title,notice.content,notice.time,notice.userid,user.name');
        $this->db->from('notice');
        $this->db->where('noticeid',$noticeid);
        $this->db->join('user','user.id=notice.userid');
        $query = $this->db->get();

        if($row = $query->row_array()){
            return $row;
        }
        return FALSE;
    }

}