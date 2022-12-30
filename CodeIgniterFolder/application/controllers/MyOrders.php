<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MyOrders extends CI_Controller
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
		$user_orders_tmp = $this->OrdersModel->select_orders($_SESSION['email']);
		if (count($user_orders_tmp)) {
			$user_orders = array(array($user_orders_tmp[0]));
			$i = 0;
			for ($j = 1; $j < count($user_orders_tmp); $j++) {
				if ($user_orders_tmp[$j]->order_id == $user_orders_tmp[$j - 1]->order_id) {
					array_push($user_orders[$i], $user_orders_tmp[$j]);
				} else {
					$user_orders[$i]['order_price'] = $this->get_order_total_price($user_orders[$i]);
					$i++;
					array_push($user_orders, array($user_orders_tmp[$j]));
				}
			}
			$user_orders[$i]['order_price'] = $this->get_order_total_price($user_orders[$i]);
			$data = array('user_orders' => $user_orders);
			$this->load->view('navbar', $data);
			$this->load->view('myorders', $data);
		} else {
			$data['user_orders'] = array();
			$this->load->view('navbar');
			$this->load->view('myorders', $data);
		}

	}

	public function get_order_total_price($user_order)
	{
		$cart_price = 0;
		for ($i = 0; $i < count($user_order); $i++) {
			$cart_price += $user_order[$i]->price;
		}
		return $cart_price;
	}
}
