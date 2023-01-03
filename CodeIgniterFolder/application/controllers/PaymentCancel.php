<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Controller for the PaymentCancel page of a web application built using the CodeIgniter framework
class PaymentCancel extends CI_Controller
{
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
