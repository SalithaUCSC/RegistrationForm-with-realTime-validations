<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
	}

	public function index()
	{
		$this->load->view('register');
	}

	public function checkUsername()
	{
		// check the username is already used one or not
		if($this->User_model->getUsername($_POST['username'])){
			echo '<label class="text-danger"><span><i class="fa fa-times" aria-hidden="true">
			</i> This user is already registered</span></label>';
		}
		else {
			// check the username length is greater than 5 or equal to 5
			if (strlen($_POST['username'])>=5) {
				echo '<label class="text-success"><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Username is available</span></label>';
			}
			else {
				echo '<label class="text-danger"><span><i class="fa fa-times" aria-hidden="true"></i> Username must contain at least 5 characters</span></label>';
			}			
		}
	}
	public function signUp()
	{
		$config['upload_path'] = './assets/images';   // uploading folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '2048000';   // max size in KB
		$config['max_width'] = '20000';    //  max resolution width
		$config['max_height'] = '20000';   //max resolution height
		// load CI libarary called upload 
		$this->load->library('upload', $config);
		// body of if clause will be executed when image uploading is failed
		if(!$this->upload->do_upload()){
			$errors = array('error' => $this->upload->display_errors());
			// This image is uploaded by default if the selected image is not uploaded
			$image = 'no_image.png';				
		}
		// body of else clause will be executed when image uploading is succeeded
		else{
			$data = array('upload_data' => $this->upload->data());
			$image = $_FILES['userfile']['name'];  //name must be userfile		
		}
        $this->User_model->insertUser($image);
        //set message to be shown when registration is completed
        $this->session->set_flashdata('success','<span><i class="fa fa-check-circle-o" aria-hidden="true">
			</i> User is registered!</span>');
        redirect('Register');		
	}
}
