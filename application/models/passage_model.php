<?php
class Passage_Model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    function add($post)
    {
        $arr['title'] = $post['title']; 
        $arr['userid'] = $this->session->userdata('userid');
        $arr['content'] = htmlspecialchars($post['content']);
        $arr['time'] = time();

        if($this->db->insert('passage',$arr)){
            return $this->db->insert_id();
        }
        else
            return FALSE;
    }

    function delete($post)
    {
        if($this->db->delete('passage',$post))
        {
            return TRUE;
        }
        return FALSE;
    }

    function update($post)
    {
        if(!isset($post['passageid']))
            return FALSE;
        $post['content'] = htmlspecialchars($post['myEditor']);
        if ($this->db->update('passage',$post,array('passageid'=>$post['passageid'])))
        {
            return TRUE;
        }
        return FALSE;
    }

    function fetch_all()
    {
        $this->db->select('passage.passageid,passage.title,passage.time,passage.userid,user.name');
        $this->db->from('passage');
        $this->db->join('user','user.userid=passage.userid');

        $query = $this->db->get();

        if($rows = $query->result_array()){
            return $rows;
        }
        return FALSE;
    }

    function fetch_one($passageid)
    {
        $this->db->select('passage.passageid,passage.title,passage.content,passage.time,passage.userid,user.name');
        $this->db->from('passage');
        $this->db->where('passageid',$passageid);
        $this->db->join('user','user.userid=passage.userid');
        $query = $this->db->get();

        if($row = $query->row_array()){
            return $row;
        }
        return FALSE;
    }

}