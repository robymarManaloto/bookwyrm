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
        $data['user'] = $this->User_model->get_user_by_username($this->session->userdata('user_id'));
        $data['categories'] = $this->User_model->get_categories();
        $this->load->view('home', $data);
        $this->load->view('layout/footer');
	}

	public function edit_profile()
	{
		
		if($this->session->has_userdata('user_id') == 0){
			redirect('/');
		}

		$this->load->view('layout/header');
		$this->load->model('User_model');
        $data['user'] = $this->User_model->get_user_by_username($this->session->userdata('user_id'));
        $data['current_function'] = __FUNCTION__;
         $data['categories'] = $this->User_model->get_categories();
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
        $data['user'] = $this->User_model->get_user_by_username($this->session->userdata('user_id'));
        $data['current_function'] = __FUNCTION__;
        $data['categories'] = $this->User_model->get_categories();
        $this->load->view('account-settings', $data);
        $this->load->view('layout/footer');
	}
}
