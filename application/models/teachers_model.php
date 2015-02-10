<?php
class Teachers_Model extends CI_Model
{
    function __contruct()
    {
        parent::__contruct();
        $this->load->database();
        $this->load->library('session');
    }

        /*添加老师
         *add（）
         *
         * */
    function add($post)
    {
        $post['password'] = md5($post['password']);
        $post['ip'] = $this->session->userdata('ip_address');

        if($this->db->insert('user',$post)) {
            return $this->db->insert_id();
        }
        else
            return FALSE;
    }

    function delete($post)
    {
        if($this->db->delete('user',$post))
        {
            return TRUE;
        }
        return FALSE;
    }

    function update($post)
    {
        if(isset($post['password']))
            $post['password'] = md5($post['password']);
        
        if(!$post['userid'])
            return FALSE;
        else if($this->db->update('user',$post,array('userid'=>$post['userid']))) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

    function fetch_all($r = '*')
    {
        $this->db->select($r);
        $query = $this->db->get('user');
        if($rows = $query->result_array())
        {
            return $rows
        }
        return FALSE;
    }

    function fetch_one($userid)
    {
        $query =$this->db->get_where('user',array('userid'=>$userid));
        if($row = $query->row_array())
        {
            return $row;
        }
        return FALSE;
    }
}