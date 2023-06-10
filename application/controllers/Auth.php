<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
    }


    public function register() {
        // Set validation rules
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('terms', 'Terms & Conditions', 'required');
        $this->form_validation->set_rules('phone_number', 'Phone Number', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');


        if ($this->form_validation->run() == FALSE) {
                // Authentication failed, show an error message
                $data['error_message_register'] = 'Authentication failed';
                $this->load->view('layout/header');
                $this->load->view('login', $data);
                $this->load->view('layout/footer');
        } else {

            //ADD USER IN THE DATABASE
            $this->load->model('User_model');
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT), // Hash the password
                'email' => $this->input->post('email'),
                'profile_picture' => file_get_contents(base_url('assets/images/').
                    'profile.jpg'),
                'background_picture' => file_get_contents(base_url('assets/images/').
                    'cover.jpg'),                
                'phone_number' => $this->input->post('phone_number'),
                'city' => $this->input->post('city'),
                'country' => $this->input->post('country')
            );
            $this->User_model->create_user($data);
            $this->session->set_userdata('user_id', $this->input->post('username'));

            redirect('home/feed');
        }
    }

    public function login() {
        // Set validation rules
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Validation failed, show the login form again
            $this->load->view('layout/header');
            $this->load->view('login', $data);
            $this->load->view('layout/footer');
        } else {
            // Validation succeeded, process the login request
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $this->load->model('User_model');
            $user =  $this->User_model->get_user_by_username($username);
            if (password_verify($password, $user->password)) {
                $this->session->set_userdata('user_id', $username);
                redirect('home/feed');
            } else {
                // Authentication failed, show an error message
                $data['error_message'] = 'Invalid username or password';
                $this->load->view('layout/header');
                $this->load->view('login', $data);
                $this->load->view('layout/footer');
            }
        }
    }


    public function update_password()
    {

       // Validation rules
        $this->form_validation->set_rules('old_password', 'Old Password', 'required');
        $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');

        if ($this->form_validation->run() === FALSE) {
            // Validation failed, show the form with errors
            $this->load->view('layout/header');
            $this->load->model('User_model');
            $data['user'] = $this->User_model->get_user_by_username($this->session->userdata('user_id'));
            $this->load->view('account-settings', $data);
            $this->load->view('layout/footer');
        } else {
            // Validation passed, update the password
            $old_password = $this->input->post('old_password');
            $new_password = $this->input->post('new_password');

            // Check if the old password matches the one stored in the database
            $user_id = $this->session->userdata('user_id'); // Assuming you have a user session

            $this->load->model('User_model');
            $user =  $this->User_model->get_user_by_username($user_id);

            if (password_verify($old_password, $user->password)) {
                // Old password is correct, update the password
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $this->load->model('User_model');
                $this->User_model->update_Password($user_id, array('password' => $hashed_password));

                // Redirect to start
                $this->session->sess_destroy();
                redirect('/');
            } else {
                // Old password is incorrect, show error message
                $data['error'] = 'The old password is incorrect.';
                $this->load->view('layout/header');
                $this->load->model('User_model');
                $data['user'] = $this->User_model->get_user_by_username($this->session->userdata('user_id'));
                $data['error_message'] = 'Your password and confirm_password must match';
                $this->load->view('account-settings', $data);
                $this->load->view('layout/footer');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        // Redirect to the login page
        redirect('/');
    }
}