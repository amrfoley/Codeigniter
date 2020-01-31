<?php
class Page_model extends CI_Model{
    function get_page($page_id){
        $this->db->where('id',$page_id);
        $result = $this->db->get('pages',1);
        return $result;
    }

    function update($data, $page_id) {
        $this->db->where('id',$page_id);
        $result = $this->db->update('pages',$data);
        return $result;
    }
}