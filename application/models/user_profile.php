<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_profile extends CI_Model {
    
    public function update_user($data, $username) {
        $this->db->where('username', $username);
        $this->db->update('users', $data);
    }

    public function update_profile_photo($photo, $username) {
        $this->db->where('username', $username);
        $this->db->update('users', $photo);
    }

    public function update_cover_photo($photo, $username) {
        $this->db->where('username', $username);
        $this->db->update('users', $photo);
    }

}
