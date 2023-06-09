<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_post extends CI_Model {

    public function get_last_file_id() {
        $query = $this->db->select('file_id')->order_by('file_id', 'desc')->limit(1)->get('files');
        return $query->row();
    }

    public function upload_file($data) {
        $this->db->insert('files', $data);
    }

    public function create_post($data) {
        $this->db->insert('posts', $data);
    }

    public function addLike($postId) {
        $currentLikes = $this->getLikes($postId);
        $newLikes = $currentLikes + 1;
        $this->db->where('post_id', $postId);
        $this->db->update('posts', array('likes' => $newLikes));
        return $newLikes;
    }

    public function getLikes($postId) {
        $this->db->select('likes');
        $this->db->where('post_id', $postId);
        $query = $this->db->get('posts');
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->likes;
        }
        return 0;
    }

    public function add_comment($data) {
        $this->db->insert('comments', $data);
    }
    
    public function delete_post($post_id) {
        $this->delete_comments_by_post($post_id);
        
        $this->db->select('file_id');
        $this->db->where('post_id', $post_id);
        $query = $this->db->get('posts');
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $file_id = $row->file_id;
            
        }

        $this->db->where('post_id', $post_id);
        $this->db->delete('posts');


        $this->delete_files_post($file_id);

        
    }

    public function delete_comments_by_post($post_id) {
        $this->db->where('post_id', $post_id);
        $this->db->delete('comments');
    }

    public function delete_files_post($file_id) {
        $this->db->where('file_id', $file_id);
        $this->db->delete('files');
    }

}
