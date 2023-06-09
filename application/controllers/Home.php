<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->library('session');

    }
    
	public function index()
	{
		if($this->session->has_userdata('user_id') == 1){
			redirect('home/feed');
		}
		$this->load->view('layout/header');
        $this->load->view('login');
        $this->load->view('layout/footer');
	}

	public function feed()
	{
		
		if($this->session->has_userdata('user_id') == 0){
			redirect('/');
		}

		$this->load->view('layout/header');
		$this->load->model('User_model');

        $data['posts'] = $this->User_model->get_posts();
        $data['comments'] = $this->User_model->get_comments();

        //GLOBAL
        $data['current_function'] = __FUNCTION__;
        $data['user'] = $this->User_model->get_user_by_username($this->session->userdata('user_id'));
        $data['categories'] = $this->User_model->get_categories();
        $data['totals'] = $this->User_model->totals($this->User_model->get_user_by_username($this->session->userdata('user_id'))->user_id);
        $data['totals_books'] = $this->User_model->totals_books($this->User_model->get_user_by_username($this->session->userdata('user_id'))->user_id);

        $this->load->view('home', $data);
        $this->load->view('layout/footer');
	}

	public function category()
	{
		
		if($this->session->has_userdata('user_id') == 0){
			redirect('/');
		}

		$this->load->view('layout/header');
		$this->load->model('User_model');

        $data['posts'] = $this->User_model->get_posts();
        $data['comments'] = $this->User_model->get_comments();
		$data['category_id'] =  $this->input->get('category_id');

        //GLOBAL
        $data['current_function'] = __FUNCTION__;
        $data['user'] = $this->User_model->get_user_by_username($this->session->userdata('user_id'));
        $data['categories'] = $this->User_model->get_categories();
        $data['totals'] = $this->User_model->totals($this->User_model->get_user_by_username($this->session->userdata('user_id'))->user_id);
        $data['totals_books'] = $this->User_model->totals_books($this->User_model->get_user_by_username($this->session->userdata('user_id'))->user_id);

        $this->load->view('home_category', $data);
        $this->load->view('layout/footer');
	}


	public function search()
	{
		
		if($this->session->has_userdata('user_id') == 0){
			redirect('/');
		}

		$this->load->view('layout/header');
		$this->load->model('User_model');
		$search =  $this->input->post('search');

        $data['documents'] = $this->User_model->get_document_filter($search);
        $data['books'] = $this->User_model->get_book_filter($search);

        $data['comments'] = $this->User_model->get_comments();


        //GLOBAL
        $data['current_function'] = __FUNCTION__;
        $data['user'] = $this->User_model->get_user_by_username($this->session->userdata('user_id'));
        $data['categories'] = $this->User_model->get_categories();
        $data['totals'] = $this->User_model->totals($this->User_model->get_user_by_username($this->session->userdata('user_id'))->user_id);
        $data['totals_books'] = $this->User_model->totals_books($this->User_model->get_user_by_username($this->session->userdata('user_id'))->user_id);

        $this->load->view('home_search', $data);
        $this->load->view('layout/footer');
	}

	public function edit_profile()
	{
		
		if($this->session->has_userdata('user_id') == 0){
			redirect('/');
		}

		$this->load->view('layout/header');

		$this->load->model('User_model');


      	//GLOBAL
      	$data['current_function'] = __FUNCTION__;
      	$data['user'] = $this->User_model->get_user_by_username($this->session->userdata('user_id'));
        $data['categories'] = $this->User_model->get_categories();
        $data['totals'] = $this->User_model->totals($this->User_model->get_user_by_username($this->session->userdata('user_id'))->user_id);
        $data['totals_books'] = $this->User_model->totals_books($this->User_model->get_user_by_username($this->session->userdata('user_id'))->user_id);

        $this->load->view('edit-profile', $data);
        $this->load->view('layout/footer');
	}


	public function account_settings()
	{
		
		if($this->session->has_userdata('user_id') == 0){
			redirect('/');
		}

		$this->load->view('layout/header');
		$this->load->model('User_model');

        
        //GLOBAL
        $data['current_function'] = __FUNCTION__;
        $data['user'] = $this->User_model->get_user_by_username($this->session->userdata('user_id'));
        $data['categories'] = $this->User_model->get_categories();
        $data['totals'] = $this->User_model->totals($this->User_model->get_user_by_username($this->session->userdata('user_id'))->user_id);
        $data['totals_books'] = $this->User_model->totals_books($this->User_model->get_user_by_username($this->session->userdata('user_id'))->user_id);

        $this->load->view('account-settings', $data);
        $this->load->view('layout/footer');
	}

	public function manage_post()
	{
		
		if($this->session->has_userdata('user_id') == 0){
			redirect('/');
		}

		$this->load->view('layout/header');
		$this->load->model('User_model');

		$user = $this->User_model->get_user_by_username($this->session->userdata('user_id'))->user_id;

        $data['posts'] = $this->User_model->get_posts_id($user);
        
        //GLOBAL
        $data['current_function'] = __FUNCTION__;
        $data['user'] = $this->User_model->get_user_by_username($this->session->userdata('user_id'));
        $data['categories'] = $this->User_model->get_categories();

        $this->load->view('manage-posts', $data);
        $this->load->view('layout/footer');
	}


	public function view_credits()
	{
		
		if($this->session->has_userdata('user_id') == 0){
			redirect('/');
		}

		$this->load->view('layout/header');
		$this->load->model('User_model');

        $data['posts'] = $this->User_model->get_posts();
        $data['comments'] = $this->User_model->get_comments();

        //GLOBAL
        $data['current_function'] = __FUNCTION__;
        $data['user'] = $this->User_model->get_user_by_username($this->session->userdata('user_id'));
        $data['categories'] = $this->User_model->get_categories();
        $data['totals'] = $this->User_model->totals($this->User_model->get_user_by_username($this->session->userdata('user_id'))->user_id);
        $data['totals_books'] = $this->User_model->totals_books($this->User_model->get_user_by_username($this->session->userdata('user_id'))->user_id);

        $this->load->view('view-credits', $data);
        $this->load->view('layout/footer');
	}


	public function view_documents()
	{
		
		if($this->session->has_userdata('user_id') == 0){
			redirect('/');
		}

		$this->load->view('layout/header');

		$this->load->model('User_model');

		$username = $this->session->userdata('user_id');
        $this->load->model('User_model');
        $user_id = $this->User_model->get_user_by_username($username)->user_id;

		$data['posts'] = $this->User_model->get_posts_id($user_id);

      	//GLOBAL
      	$data['current_function'] = __FUNCTION__;
      	$data['user'] = $this->User_model->get_user_by_username($this->session->userdata('user_id'));
        $data['categories'] = $this->User_model->get_categories();
        $data['totals'] = $this->User_model->totals($this->User_model->get_user_by_username($this->session->userdata('user_id'))->user_id);
        $data['totals_books'] = $this->User_model->totals_books($this->User_model->get_user_by_username($this->session->userdata('user_id'))->user_id);

        $this->load->view('documents', $data);
        $this->load->view('layout/footer');
	}

	public function view_books()
	{
		
		if($this->session->has_userdata('user_id') == 0){
			redirect('/');
		}

		$this->load->view('layout/header');


		$username = $this->session->userdata('user_id');
        $this->load->model('User_model');
        $user_id = $this->User_model->get_user_by_username($username)->user_id;

		$data['books'] = $this->User_model->get_books_id($user_id);

      	//GLOBAL
      	$data['current_function'] = __FUNCTION__;
      	$data['user'] = $this->User_model->get_user_by_username($this->session->userdata('user_id'));
        $data['categories'] = $this->User_model->get_categories();
        $data['totals'] = $this->User_model->totals($this->User_model->get_user_by_username($this->session->userdata('user_id'))->user_id);
        $data['totals_books'] = $this->User_model->totals_books($this->User_model->get_user_by_username($this->session->userdata('user_id'))->user_id);

        $this->load->view('books', $data);
        $this->load->view('layout/footer');
	}


}
