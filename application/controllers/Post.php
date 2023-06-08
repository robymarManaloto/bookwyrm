<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    // public function create_post() {
    //     $config['upload_path'] = './uploads/';
    //     $config['allowed_types'] = 'pdf|doc|docx|ppt|pptx|epub|txt';
    //     $config['max_size'] = 2048; // Maximum file size in KB

    //     $this->load->library('upload', $config);

    //     if ($this->upload->do_upload('userfile')) {
    //         $fileData = $this->upload->data();
    //         $file_path = $fileData['full_path'];

    //         // Read the file data
    //         $file_data = file_get_contents($file_path);

    //         // Prepare the data to be inserted into the database
    //         $data = array(
    //             'file_name' => $fileData['file_name'],
    //             'file_type' => $fileData['file_ext'],
    //             'file_data' => $file_data
    //         );

    //         // Insert the data into the database
    //         $this->db->insert('files', $data);

    //         // Delete the temporary file
    //         unlink($file_path);

    //         echo 'File uploaded successfully.';
    //     } else {
    //         echo 'File upload failed.';
    //     }
    // }



}
