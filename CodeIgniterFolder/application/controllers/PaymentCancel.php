<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PaymentCancel extends CI_Controller
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
		$data["actual_request"] = $this->input->post('cartID');
		$this->load->view('navbar', $data);
		$this->load->view('paymentcancel.php', $data);
	}
}
