<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PaymentForm extends CI_Controller
{
	public function index() {
		if (isset($_SESSION['email'])) {
			$this->load->view('navbar');
			$this->load->view('paymentform.php');
		} else {
			redirect(site_url('MyAccount'));
		}
	}
}
