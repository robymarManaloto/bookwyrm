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

    public function removeLender($transaction_id) {        
        $this->db->select('lender_id, book_id');
        $this->db->where('transaction_id', $transaction_id);
        $query = $this->db->get('booktransactions');
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $book_id = $row->book_id;
            $lender_id = $row->lender_id;

            $this->db->select('file_id');
            $this->db->where('book_id', $book_id);
            $query = $this->db->get('books');
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $file_id = $row->file_id;

                $query = $this->db->query('
                    SELECT borrower_id
                    FROM booktransactions
                    WHERE borrower_id IS NOT NULL AND book_id = ' . $this->db->escape($book_id) . ';
                ');
                $rows = $query->result();

                $this->db->where('book_id', $book_id);
                $this->db->delete('booktransactions');

                $this->db->where('book_id', $book_id);
                $this->db->delete('books');

                foreach ($rows as $row) {
                    $this->db->where('borrower_id', $row->borrower_id);
                    $this->db->delete('borrowers');
                }

                $this->db->where('lender_id', $lender_id);
                $this->db->delete('lenders');

                $this->db->where('file_id', $file_id);
                $this->db->delete('files');
            }
        }
    }

    public function removeOwnBook($transaction_id) {        
        $this->db->select('borrower_id');
        $this->db->where('transaction_id', $transaction_id);
        $query = $this->db->get('booktransactions');
        
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $borrower_id = $row->borrower_id;
        }

        $this->db->where('transaction_id', $transaction_id);
        $this->db->delete('booktransactions');

        $this->db->where('borrower_id', $borrower_id);
        $this->db->delete('borrowers');
    }

    public function updateBook($data, $book_id) {
        $this->db->where('book_id', $book_id);
        $this->db->update('books', $data);
    }

}
