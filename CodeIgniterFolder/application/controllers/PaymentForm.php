<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PaymentForm extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!isset($this->session->login)) {
			$this->session->login = false;
		}

		if (!isset($this->session->password)) {
			$this->session->password = true;
		}
	}
	public function index() {
		$this->load->view('navbar');
		$this->load->view('paymentform.php');
	}
}
