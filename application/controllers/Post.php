<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function create_post() {
            $username = $this->session->userdata('user_id');
            
            $this->load->model('User_model');
            $user_id = $this->User_model->get_user_by_username($username)->user_id;

            $this->load->model('User_post');
            $this->User_post->upload_file(array(
                'file_name' => $_FILES['userfile']['name'],
                'file_type' => $_FILES['userfile']['type'],
                'file_data' => file_get_contents($_FILES['userfile']['tmp_name']),
                'file_size' => $_FILES['userfile']['size']
                ));

            $next_id = $this->User_post->get_last_file_id()->file_id;
            $this->User_post->create_post(array(
                'user_id' => $user_id,
                'file_id' => $next_id,
                'category_id' => $this->input->post('categories'),
                'post_description' => $this->input->post('post_description'),
                'monetized' => 0
                ));
                        
            // Redirect to a success page or any other page
            redirect('/home/feed', 'refresh');

    }


    public function like() {
        // Retrieve the post ID from the AJAX request
        $postId = $this->input->post('post_id');

        $this->load->model('User_post');
        $likes = $this->User_post->addLike($postId);

        // Return the updated like count as a JSON response
        $response = array('success' => true, 'likes' => $likes);
        echo json_encode($response);
    }

    public function add_comment() {
        // Load the comment model
        $this->load->model('User_post');

        // Validate the form input
        $this->form_validation->set_rules('post_id', 'Post ID', 'required');
        $this->form_validation->set_rules('comment_text', 'Comment Content', 'required');

        if ($this->form_validation->run() == FALSE) {
            redirect('/home/feed', 'refresh');
        } else {
            // Form validation succeeded, insert the comment into the database
            $post_id = $this->input->post('post_id');
            $comment_text = $this->input->post('comment_text');

            $this->load->model('User_model');
            $user_id =  $this->User_model->get_user_by_username($this->session->userdata('user_id'))->user_id;

            $data = array(
                'post_id' => $post_id,
                'user_id' => $user_id,
                'comment_text' => $comment_text
            );

            $this->User_post->add_comment($data);

            // Redirect to a success page or any other page
            redirect('/home/feed', 'refresh');

        }
    }

     public function delete_post() {
        $this->load->model('User_post');
        $this->load->model('User_model');

        $post_id = $this->input->post('post_id');

        $this->User_post->delete_post($post_id);

        // Redirect to a success page or any other page
            redirect('/home/manage_post', 'refresh');
     }

    public function edit_post()
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
        $data['edit_data'] = $this->User_model->get_edit_post_data($user_id);
        $this->load->view('edit-post', $data);
        $this->load->view('layout/footer');
    }

    public function updatePost() {
        $post_id = $this->input->post('post_id');
        $this->load->model('User_post');
        $data = array(
            'post_description' => $this->input->post('post_description'),
            'category_id' => $this->input->post('categories')
        );
        $this->User_post->updatePost($data, $post_id);
        
        redirect('/home/manage_post', 'refresh');
    }

}
