<?php
class Count_Model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');                        
    }

    function count()
    {
        $date = date('d');
        $query =  $this->db->get('count');     
        if(!($num=$query->num_rows)){
            $arr = array('date'=>$date,'today'=>1);
            $this->db->insert('count',$arr);
        }
        else {
            $rows = $query->result_array();
            $rows[$num-1]['counts']++;
            $rows[$num-1]['countall']++;
            
            if($rows[$num-1]['date'] == $date)
            {
                $this->db->where('date',$date);
                $this->db->update('count',$rows[$num-1]);
                return $row = $rows[$num-1];
            }
            else{
                $counts = $rows[$num-1]['counts'];
                $countall = $rows[$num-1]['countall'];
                $arr = array('date'=>$date,'today'=>1,'counts'=>1,'countall'=>$countall);
                    // $this->db->insert('count',$arr);
                if($num-1)
                    $this->db->delete('count',array('today'=>0));
                $this->db->update('count',array('today'=>0),array('today'=>1));
                $this->db->insert('count',$arr);
                return $row = $arr;
            }

        }                
    }

    function showcount()
    {
        $date = date('d');
        $query = $this->db->get_where('count',array('date'=>$date));
        return $row = $query->row_array();
    }
}