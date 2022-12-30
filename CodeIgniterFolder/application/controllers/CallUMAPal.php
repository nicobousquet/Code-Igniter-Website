<?php
defined('BASEPATH') or exit('No direct script access allowed');
class CallUMAPal extends CI_Controller
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
		$user_cart = $this->CartModel->select_item_from_cart($_SESSION['email']);
		$data = array('user_cart' => $user_cart, 'actual_request' => bin2hex(random_bytes(16)));
		$this->load->view('navbar', $data);
		$this->load->view('callumapal', $data);
	}
}
