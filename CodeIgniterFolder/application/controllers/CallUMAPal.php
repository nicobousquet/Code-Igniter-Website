<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Controller for the CallUMAPal page of a web application built using the CodeIgniter framework
class CallUMAPal extends CI_Controller
{
	// Constructor for the CallUMAPal controller
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

	// Method that displays the CallUMAPal page
	public function index()
	{
		// Retrieve the user's cart from the database
		$user_cart = $this->CartModel->select_item_from_cart($_SESSION['email']);
		// Generate a random, 16-byte request value and pass it along with the user's cart to the view
		$data = array('user_cart' => $user_cart, 'actual_request' => bin2hex(random_bytes(16)));
		// Load the navbar and CallUMAPal views
		$this->load->view('navbar', $data);
		$this->load->view('callumapal', $data);
	}
}
