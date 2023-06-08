<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function create_user($data)
    {
        $this->db->insert('users', $data);
    }

    public function get_user_by_username($username)
    {
        $this->db->where('username', $username);
        return $this->db->get('users')->row();
    }

    public function get_categories()
    {
       $query = $this->db->get('categories');
       return $query->result();
    }
    
    public function update_Password($username,$data)
    {
        $this->db->where('username', $username);
        $this->db->update('users', $data);
    }


}
