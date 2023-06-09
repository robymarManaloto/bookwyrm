<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');


    }

	public function index()
	{
		if($this->session->has_userdata('user_id') == 0){
			redirect('/');
		}

        $username = $this->session->userdata('user_id');
        $this->load->model('User_model');
        $user_id = $this->User_model->get_user_by_username($username)->user_id;

		$this->load->view('layout/header');
        $this->load->model('User_model');


        //GLOBAL
        $data['current_function'] = __FUNCTION__;
        $data['categories'] = $this->User_model->get_categories();
        $data['avail_books'] = $this->User_model->get_avail_books();
        $data['books_owned'] = $this->User_model->get_books_owned($user_id);
        $data['books_len'] = $this->User_model->get_books_len($user_id);

        $this->load->view('manage-books', $data);
        $this->load->view('layout/footer');
	}

    public function addBook() {
            $username = $this->session->userdata('user_id');
            $this->load->model('User_model');
            $user_id = $this->User_model->get_user_by_username($username)->user_id;

            $this->load->model('User_book');
            $this->User_book->upload_file(array(
                'file_name' => $_FILES['file']['name'],
                'file_type' => $_FILES['file']['type'],
                'file_data' => file_get_contents($_FILES['file']['tmp_name']),
                'file_size' => $_FILES['file']['size']
                ));
            
            $next_file_id = $this->User_book->get_last_file_id()->file_id;
            $data = array(
                    'file_id' => $next_file_id,
                    'title' => $this->input->post('title'),
                    'author' => $this->input->post('author'),
                    'description' => $this->input->post('description'),
                    'publication_date' => $this->input->post('publication_date'),
                    'isbn' => $this->input->post('isbn')
                );
            $this->User_book->create_books($data);

            $this->User_book->create_lenders(array('user_id' => $user_id));

            $next_book_id = $this->User_book->get_last_book_id()->book_id;
            $next_lender_id = $this->User_book->get_last_lenders_id()->lender_id;
            $data = array(
                    'lender_id' => $next_lender_id,
                    'book_id' => $next_book_id
                );
            $this->User_book->create_booktransactions($data);

             // Redirect to a success page or any other page
            redirect('/book', 'refresh');
    }

    public function addOwned() {
        $this->load->model('User_model');
        $username = $this->session->userdata('user_id');
        $user_id = $this->User_model->get_user_by_username($username)->user_id;

        $this->load->model('User_book');
        $this->User_book->create_borrowers(array('user_id' => $user_id));
        $next_borrower_id = $this->User_book->get_last_borrowers_id()->borrower_id;

        $book_id = $this->input->post('book_id');
        $data = array(
            'borrower_id' => $next_borrower_id,
            'book_id' => $book_id,
            'due_date' => date('Y-m-d H:i:s', strtotime('+1 week'))
        );
        $user_id =  $this->User_book->create_booktransactions($data);

         // Redirect to a success page or any other page
        redirect('/book', 'refresh');
    }

    public function removeOwned() {
        $transaction_id = $this->input->post('transaction_id');
        $this->load->model('User_book');
        $this->User_book->removeOwnBook($transaction_id);

        redirect('/book', 'refresh');
    }

    public function removeLend() {
        $transaction_id = $this->input->post('transaction_id');
        $this->load->model('User_book');
        $this->User_book->removeLender($transaction_id);
        
        redirect('/book', 'refresh');
    }

    public function editLend() {
        if($this->session->has_userdata('user_id') == 0){
            redirect('/');
        }

        $username = $this->session->userdata('user_id');
        $this->load->model('User_model');
        $user_id = $this->User_model->get_user_by_username($username)->user_id;

        $this->load->view('layout/header');
        $this->load->model('User_model');
        //GLOBAL
        $book_id = $this->input->post('book_id');

        $data['current_function'] = __FUNCTION__;
        $data['categories'] = $this->User_model->get_categories();
        $data['avail_books'] = $this->User_model->get_avail_books();
        $data['books_owned'] = $this->User_model->get_books_owned();
        $data['books_len'] = $this->User_model->get_books_len($user_id);
        $data['edit_data'] = $this->User_model->get_edit_data($book_id);
        $this->load->view('edit-books', $data);
        $this->load->view('layout/footer');
    }

    public function updateBook() {
        $book_id = $this->input->post('book_id');
        $this->load->model('User_book');
        $data = array(
            'title' => $this->input->post('title'),
            'author' => $this->input->post('author'),
            'description' => $this->input->post('description'),
            'publication_date' => $this->input->post('publication_date'),
            'isbn' => $this->input->post('isbn')
        );
        $this->User_book->updateBook($data, $book_id);
        
        redirect('/book', 'refresh');
    }

}
