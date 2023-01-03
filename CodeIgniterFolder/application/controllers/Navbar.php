<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Navbar extends CI_Controller
{
	// Navbar controller for a web application built using the CodeIgniter framework
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

	// Method that logs in a user
	public function login()
	{
		// Attempt to retrieve the user from the database using the provided email and password
		$user = $this->UsersModel->select_user_by_email_and_password($_POST['email_login'], $_POST['password_login']);
		// If the user exists, set session variables for the user's name, email, and password
		if (count($user) > 0) {
			$this->session->set_userdata('login', $user[0]->first_name);
			$this->session->set_userdata('email', $_POST['email_login']);
			$this->session->set_userdata('password', true);
		} // If the user does not exist, set the password session variable to false
		else {
			$this->session->set_userdata('password', false);
		}
		// Redirect the user to the previous page
		redirect($_SERVER['HTTP_REFERER']);
	}

	// Method that logs out a user
	public function disconnect_user()
	{
		// Unset the session variables for the user's name, email, and password
		$this->session->unset_userdata('login');
		$this->session->unset_userdata('email', $_POST['email']);
		$this->session->unset_userdata('email', $_POST['email']);
		$this->session->unset_userdata('password');
		// Redirect the user to the previous page
		redirect($_SERVER['HTTP_REFERER']);
	}
}
