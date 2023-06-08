<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BlobController extends CI_Controller {
 
	public function downloadBlob($fileId) {
		$this->load->model('User_model');
	    $file = $this->User_model->getBlobData($fileId);
	    $fileData = $file->file_data;
	    $fileName = $file->file_name;
        $fileType = $file->file_type;
        
         if ($fileData) {
	        // Set the appropriate headers for the file download
	        header('Content-Type: ' . $fileType);
	        header('Content-Disposition: attachment; filename="' . $fileName . '"');

	        // Output the file contents to the browser
	        echo $fileData;
	    } else {
	        // File not found, handle the error
	        echo 'File not found';
	    }

	}

}
