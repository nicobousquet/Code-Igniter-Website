<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PaymentSuccess extends CI_Controller
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
		$data["actual_request"] = $_POST['cartID'];
		$user_cart = unserialize(base64_decode($_POST['user_cart']));
		$date = date("d M, Y");
		for ($i=0; $i<count($user_cart); $i++) {
			$this->OrdersModel->insert_order($_SESSION['email'], $_POST['cartID'], $user_cart[$i]->photo_id, $user_cart[$i]->price, $user_cart[$i]->size, $user_cart[$i]->quantity, $date);
			$this->CartModel->delete_all();
		}
		$this->load->view('navbar', $data);
		$this->load->view('paymentsuccess.php', $data);
	}
}
