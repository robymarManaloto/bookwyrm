<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_book extends CI_Model {

    public function get_last_file_id() {
        $query = $this->db->select('file_id')->order_by('file_id', 'desc')->limit(1)->get('files');
        return $query->row();
    }

    public function get_last_book_id() {
        $query = $this->db->select('book_id')->order_by('book_id', 'desc')->limit(1)->get('books');
        return $query->row();
    }
    
    public function get_last_lenders_id() {
        $query = $this->db->select('lender_id')->order_by('lender_id', 'desc')->limit(1)->get('lenders');
        return $query->row();
    }

    public function get_last_borrowers_id() {
        $query = $this->db->select('borrower_id')->order_by('borrower_id', 'desc')->limit(1)->get('borrowers');
        return $query->row();
    }

    public function upload_file($data) {
        $this->db->insert('files', $data);
    }

    public function create_books($data) {
        $this->db->insert('books', $data);
    }

    public function create_booktransactions($data) {
        $this->db->insert('booktransactions', $data);
    }

    public function create_borrowers($data) {
        $this->db->insert('borrowers', $data);
    }

    public function create_lenders($data) {
        $this->db->insert('lenders', $data);
    }


  
}
