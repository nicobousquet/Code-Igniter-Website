<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MyAccount extends CI_Controller
{
	// MyAccount controller for a web application built using the CodeIgniter framework
	public function __construct()
	{
		// Call the parent constructor
		parent::__construct();

		// Set default values for the login and password session variables if they are not already set
		if (!isset($this->session->login)) {
			$this->session->login = false;
		}
		if (!isset($this->session->password)) {
			$this->session->password = true;
		}
	}

	// Method that is executed when the MyAccount controller is accessed without specifying a particular method
	// The default value for the $data parameter is an empty array
	public function index($data = array())
	{
		// Load the navbar and myaccount views, passing in the value of the $data parameter
		$this->load->view('navbar', $data);
		$this->load->view('myaccount', $data);
	}

	// Method that checks if the provided email is already in use by another user
	public function email_used($email)
	{
		// Retrieve user data from the UsersModel based on the provided email
		$user = $this->UsersModel->select_user_by_email($_POST['email']);

		// If the number of users with the provided email is greater than 0, return true; otherwise, return false
		if (count($user) > 0) {
			return true;
		}
		return false;
	}

	// Method that adds a new user to the database
	public function add_new_user()
	{
		// If the provided email is not already in use, insert the new user into the database and set the login session variable
		if (!$this->email_used($_POST['email'])) {
			$this->UsersModel->insert_new_user($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['password']);
			$this->session->set_userdata('login', $_POST['fname']);
			$this->session->set_userdata('email', $_POST['email']);

			// Redirect to the Home controller
			redirect('Home');
		}
		// If the provided email is already in use, pass the email_used data to the index method and load the myaccount view
		else {
			$data = array('email_used' => true);
			$this->index($data);
		}
	}
}
