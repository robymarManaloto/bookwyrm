<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library(array('form_validation'));
        $this->load->library('session');
    }
    
    public function update() {
        
	    $this->form_validation->set_rules('first_name', 'First Name', 'required');
	    $this->form_validation->set_rules('last_name', 'Last Name', 'required');
	    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
	    $this->form_validation->set_rules('phone_number', 'Phone Number', 'required');
	    $this->form_validation->set_rules('biography', 'Biography', 'required');
	    $this->form_validation->set_rules('birthdate', 'Birthdate', 'required');
	    $this->form_validation->set_rules('city', 'City', 'required');
	    $this->form_validation->set_rules('country', 'Country', 'required');

        if ($this->form_validation->run() == FALSE) {
             $this->load->view('layout/header');
             $this->load->model('User_model');
        	 $data['user'] = $this->User_model->get_user_by_username($this->session->userdata('user_id'));
             $this->load->view('edit-profile',$data);
             $this->load->view('layout/footer');         
        } else {
            // Form validation passed, update the data in the database
            $data = array(
                'email' => $this->input->post('email'),
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'phone_number' => $this->input->post('phone_number'),
                'biography' => $this->input->post('biography'),
                'birthdate' => $this->input->post('birthdate'),
                'city' => $this->input->post('city'),
                'country' => $this->input->post('country')
            );
            
            // Assuming you have a model called 'User_profile' to update the data
            $username = $this->session->userdata('user_id');
            $this->load->model('User_profile');
            $this->User_profile->update_user($data, $username);
            
            // Redirect to a success page or any other page
            redirect('/home/edit_profile', 'refresh');
        }
    }


    public function profile_picture() {
    	    $this->load->model('User_profile');
    		$username = $this->session->userdata('user_id');
            $this->load->model('User_profile');

            $this->User_profile->update_profile_photo(array(
                'profile_picture' => file_get_contents($_FILES['photo']['tmp_name'])), $username);
            
            // Redirect to a success page or any other page
            redirect('/home/edit_profile', 'refresh');

    }

    public function cover_picture() {
    		$username = $this->session->userdata('user_id');
            $this->load->model('User_profile');
            $this->User_profile->update_cover_photo(array(
                'background_picture' => file_get_contents($_FILES['photo']['tmp_name'])), $username);
            
            // Redirect to a success page or any other page
            redirect('/home/edit_profile', 'refresh');
    }

}
