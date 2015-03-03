<?php
class Notice_Model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }
        /*
         *
         * */
    function add($post)
    {
        $arr = $post;
        $arr['content'] = htmlspecialchars($post['content']);
        $arr['userid'] = $this->session->userdata('userid');
        $arr['cases'] = $this->session->userdata('class');
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
        if(!isset($post['noticeid']))
            return FALSE;
        $post['content'] = htmlspecialchars($post['content']);
        if ($this->db->update('notice',$post,array('noticeid'=>$post['noticeid'])))
        {
            return TRUE;
        }
        return FALSE;
    }

    function count_all($cases=NULL)
    {
        $query = $this->db->get_where('notice',array('cases'=>$cases));
        return $query->num_rows;
    }

    function fetch_all($limit=NULL,$perpage=NULL,$cases=NULL)
    {
        $this->db->select('notice.noticeid,notice.title,notice.time,notice.userid,user.name');
        $this->db->from('notice');
        $this->db->where('cases',$cases);
        $this->db->join('user','user.userid=notice.userid');
        $this->db->order_by('time','desc');
        $this->db->limit($perpage,$limit);

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
        $this->db->join('user','user.userid=notice.userid');
        $query = $this->db->get();

        if($row = $query->row_array()){
            return $row;
        }
        return FALSE;
    }

}