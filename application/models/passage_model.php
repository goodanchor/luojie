<?php
class Passage_Model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->loda->library('session');
    }

    function add($post)
    {
        $arr = $post;
        $arr['userid'] = $this->session->userdata('userid');
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
        if(!isset(post['passageid']))
            return FALSE;
        if ($this->db->update('passage',$post,array('passageid'=>$post['passageid'])))
        {
            return TRUE;
        }
        return FALSE;
    }

}