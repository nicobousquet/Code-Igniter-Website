<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MyOrders extends CI_Controller
{
	public function index()
	{
		// check if user is logged in before displaying page
		if (isset($_SESSION['email'])) {
			// get all orders for the logged in user
			$user_orders_tmp = $this->OrdersModel->select_orders($_SESSION['email']);
			$data = array();
			// check if user has any orders
			if (count($user_orders_tmp)) {
				// create array to store orders with product details
				$user_orders = array(array($user_orders_tmp[0]));
				$i = 0;
				// loop through all orders and add product details to array
				for ($j = 1; $j < count($user_orders_tmp); $j++) {
					if ($user_orders_tmp[$j]->order_id == $user_orders_tmp[$j - 1]->order_id) {
						array_push($user_orders[$i], $user_orders_tmp[$j]);
					} else {
						// add total price for each order
						$user_orders[$i]['order_price'] = $this->get_order_total_price($user_orders[$i]);
						$i++;
						array_push($user_orders, array($user_orders_tmp[$j]));
					}
				}
				// add total price for final order
				$user_orders[$i]['order_price'] = $this->get_order_total_price($user_orders[$i]);
				$data['user_orders'] = $user_orders;
			} else {
				// set empty array if user has no orders
				$data['user_orders'] = array();
			}
			$this->load->view('navbar');
			$this->load->view('myorders', $data);
		} else {
			redirect(site_url('MyAccount'));
		}
	}

	// function to calculate total price for an order
	public function get_order_total_price($user_order)
	{
		$cart_price = 0;
		// loop through products in order and add prices
		for ($i = 0; $i < count($user_order); $i++) {
			$cart_price += $user_order[$i]->price;
		}
		return $cart_price;
	}
}
