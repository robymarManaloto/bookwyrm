<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->library('session');

    }

	public function index()
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

        $this->load->view('manage-books', $data);
        $this->load->view('layout/footer');
	}

}
