<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {
	// get username from database
	public function getUsername($username)
	{	
		// find the username matched with the input
		$this->db->where('username' , $username);
		$query = $this->db->get('users');
		// check whether there are matching records
		if($query->num_rows()>0){
			return true;
		}
		else {
			return false;
		}
	}
	// store a user
	public function insertUser($image)
	{
        $data = array(
	        //assign user data into array elements
	        'user_id' => $this->input->post('user_id'),
	        'username' => $this->input->post('username'),
	        'fullname' => $this->input->post('fullname'),
	        'email' =>$this->input->post('email'),
	        'phone' =>$this->input->post('phone'),
	        'password' =>sha1($this->input->post('password')),
	        'image' => $image
	    );
		// insert data to the database
		$this->db->insert('users', $data);
	}
}
