<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MyCart extends CI_Controller
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

	public function index()
	{
		if (isset($_SESSION['email'])) {
			$user_cart = $this->get_user_cart();
			$cart_total_price = $this->get_cart_total_price($user_cart);
			$data = array('user_cart' => $user_cart, 'cart_total_price' => $cart_total_price);
			$this->load->view('navbar');
			$this->load->view('mycart', $data);
		} else {
			redirect(site_url('MyAccount'));
		}
	}

	public function add_to_cart($id)
	{
		if (isset($_SESSION['email'])) {
			$price = 100000;
			switch ($_POST['radio_buttons']) {
				case '40x50':
					$price = 29.99;
					break;
				case '50x70':
					$price = 39.99;
					break;
				case '60x90':
					$price = 59.99;
					break;
				case '100x150':
					$price = 79.99;
					break;
				case '120x180':
					$price = 99.99;
					break;
			}
			$price = $price * $_POST['quantity'];
			$this->CartModel->insert_item_into_cart($_SESSION['email'], $id, $_POST['quantity'], $_POST['radio_buttons'], $price);
			redirect(site_url('MyCart'));
		} else {
			redirect(site_url('MyAccount'));
		}
	}

	public function remove_item($poster_id, $quantity, $size)
	{
		$this->CartModel->delete_item($_SESSION['email'], $poster_id, $quantity, $size);
		redirect(site_url('MyCart'));
	}

	public function remove_all_items()
	{
		$this->CartModel->delete_all();
		redirect(site_url('MyCart'));
	}

	public function get_user_cart() {
		return $this->CartModel->select_item_from_cart($_SESSION['email']);
}
	public function get_cart_total_price($user_cart) {
		$cart_price = 0;
		for ($i=0; $i<count($user_cart); $i++) {
			$cart_price += $user_cart[$i]->price;
		}
		return $cart_price;
	}
}
