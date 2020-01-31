<?php
class Users_model extends CI_Model{
    function view_users() {
        $result = $this->db->get('users');
        return $result;
    }

    function show_user($user_id, $email = '') {
        if($email != '') {
            $this->db->where('email',$email);
        } else {
            $this->db->where('id',$user_id);
        }
        $result = $this->db->get('users', 1);
        return $result;
    }

    function update_users($data, $user_id) {
        $this->db->where('id',$user_id);
        $result = $this->db->update('users',$data);
        return $result;
    }

    function add_users($data) {
        $result = $this->db->insert('users',$data);
        return $result;   
    }
}