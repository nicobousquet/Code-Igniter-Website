<?php
// This file is a controller for the PaymentForm page.

defined('BASEPATH') or exit('No direct script access allowed');

class PaymentForm extends CI_Controller
{
	// This function handles the rendering of the PaymentForm page.
	// If the user is not logged in, he will be redirected to the MyAccount page.
	public function index() {
		if (isset($_SESSION['email'])) {
			// Load the navbar and PaymentForm views.
			$this->load->view('navbar');
			$this->load->view('paymentform.php');
		} else {
			// Redirect the user to the MyAccount page.
			redirect(site_url('MyAccount'));
		}
	}
}
