<?php
class Operations_model extends CI_Model{
    function get_page($page_id){
        $this->db->where('id',$page_id);
        $result = $this->db->get('pages',1);
        return $result;
    }
}