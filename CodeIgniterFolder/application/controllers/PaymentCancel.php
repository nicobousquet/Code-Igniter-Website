<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Controller for the PaymentCancel page of a web application built using the CodeIgniter framework
class PaymentCancel extends CI_Controller
{
	// Constructor for the PaymentCancel controller
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

	// Method that displays the PaymentCancel page
	public function index()
	{
		// Retrieve the request value and pass it to the view
		$data["actual_request"] = $this->input->post('cartID');
		// Load the navbar and PaymentCancel views
		$this->load->view('navbar', $data);
		$this->load->view('paymentcancel.php', $data);
	}
}
