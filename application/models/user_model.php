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

    public function get_avail_books()
    {
        $query = $this->db->query('
                SELECT 
                    b.*,
                    CONCAT(u.first_name," ",u.last_name) AS lender_name
                FROM books b
                JOIN booktransactions bt ON b.book_id = bt.book_id
                JOIN lenders l ON l.lender_id = bt.lender_id
                JOIN users u ON l.user_id = u.user_id
        ');
       return $query->result();
    }

    public function get_edit_data($book_id)
    {
       $query = $this->db->query('
                SELECT * FROM books WHERE book_id = ' . $this->db->escape($book_id) . ' LIMIT 1;
        ');
       return $query->result();
    }

    public function get_books_owned()
    {
        $query = $this->db->query('
                SELECT 
                    b.*,
                    CONCAT(u.first_name," ",u.last_name) AS lender_name,
                    br.borrower_id,
                    bt.transaction_id,
                    bt.due_date
                FROM books b
                JOIN booktransactions bt ON b.book_id = bt.book_id
                JOIN borrowers br ON br.borrower_id = bt.borrower_id
                JOIN users u ON br.user_id = u.user_id
        ');
       return $query->result();
    }

    public function get_books_len($user_id)
    {
        $query = $this->db->query('
                SELECT 
                    b.*,
                    CONCAT(u.first_name," ",u.last_name) AS lender_name,
                    l.lender_id,
                    bt.transaction_id
                FROM books b
                JOIN booktransactions bt ON b.book_id = bt.book_id
                JOIN lenders l ON l.lender_id = bt.lender_id
                JOIN users u ON l.user_id = u.user_id
                WHERE l.user_id = ' . $this->db->escape($user_id) . '
        ');
       return $query->result();
    }

    public function get_posts()
    {
       $this->incrementViewsCount();
       
       $query = $this->db->query('
        SELECT p.post_id, p.post_description, DATE_FORMAT(p.post_date,"%M %e, %Y %H %p") AS date, CONCAT(u.first_name," ",u.last_name) AS name, u.profile_picture, c.category_name category_name, p.likes, p.views, f.*, 
            CASE
                WHEN f.file_size >= 1048576 THEN CONCAT(f.file_size / 1048576, " MB")
                WHEN f.file_size >= 1024 THEN CONCAT(f.file_size / 1024, " KB")
                ELSE CONCAT(f.file_size, " bytes")
            END AS converted_size
        FROM posts p
        JOIN users u ON p.user_id = u.user_id
        JOIN categories c ON p.category_id = c.category_id
        JOIN files f ON p.file_id = f.file_id
        ;
        ');
       
       return $query->result();
    }
    
    public function get_posts_id($user_id)
    {
       $this->incrementViewsCount();
       
       $query = $this->db->query('
        SELECT p.post_id, p.post_description, DATE_FORMAT(p.post_date,"%M %e, %Y %H %p") AS date, CONCAT(u.first_name," ",u.last_name) AS name, u.profile_picture, c.category_name category_name, p.likes, p.views, f.*, 
            CASE
                WHEN f.file_size >= 1048576 THEN CONCAT(f.file_size / 1048576, " MB")
                WHEN f.file_size >= 1024 THEN CONCAT(f.file_size / 1024, " KB")
                ELSE CONCAT(f.file_size, " bytes")
            END AS converted_size
        FROM posts p
        JOIN users u ON p.user_id = u.user_id
        JOIN categories c ON p.category_id = c.category_id
        JOIN files f ON p.file_id = f.file_id
        WHERE 
            p.user_id = ' . $this->db->escape($user_id) . '
        ;
        ');
       
       return $query->result();
    }



     public function incrementViewsCount() {
        $this->db->query('
            UPDATE posts SET views = views + 1 WHERE post_id > 0;   
            ');
      }


    public function get_comments()
    {
       $query = $this->db->query("
        SELECT
            c.*,
            CONCAT(u.first_name,'',u.last_name) AS name,
            u.profile_picture,
            CASE
                WHEN TIMESTAMPDIFF(YEAR, c.timestamp, NOW()) > 0 THEN CONCAT(TIMESTAMPDIFF(YEAR,  c.timestamp, NOW()), ' year', IF(TIMESTAMPDIFF(YEAR,  c.timestamp, NOW()) > 1, 's', ''), ' ago')
                WHEN TIMESTAMPDIFF(MONTH, c.timestamp, NOW()) > 0 THEN CONCAT(TIMESTAMPDIFF(MONTH,  c.timestamp, NOW()), ' month', IF(TIMESTAMPDIFF(MONTH,  c.timestamp, NOW()) > 1, 's', ''), ' ago')
                WHEN TIMESTAMPDIFF(WEEK, c.timestamp, NOW()) > 0 THEN CONCAT(TIMESTAMPDIFF(WEEK,  c.timestamp, NOW()), ' week', IF(TIMESTAMPDIFF(WEEK,  c.timestamp, NOW()) > 1, 's', ''), ' ago')
                WHEN TIMESTAMPDIFF(MINUTE, c.timestamp, NOW()) > 0 THEN CONCAT(TIMESTAMPDIFF(MINUTE,  c.timestamp, NOW()), ' minute', IF(TIMESTAMPDIFF(MINUTE,  c.timestamp, NOW()) > 1, 's', ''), ' ago')
                ELSE 'Just now'
            END AS relative_time
        FROM
            comments as c
        JOIN users u ON c.user_id = u.user_id;
        ");
       return $query->result();
    }

    public function getBlobData($file_id) {
        $this->db->where('file_id', $file_id);
        return $this->db->get('files')->row();
    }

    public function update_Password($username,$data)
    {
        $this->db->where('username', $username);
        $this->db->update('users', $data);
    }

    public function totals($user_id) {
            $query = $this->db->query("
                SELECT 
                    SUM(views) AS total_views, 
                    SUM(likes) AS total_likes,
                    COUNT(*) AS total_documents
                FROM 
                    posts
                WHERE 
                    user_id = " . $this->db->escape($user_id) . "
            ");

            return $query->result();
    }



}
