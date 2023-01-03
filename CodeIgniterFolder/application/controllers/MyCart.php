<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MyCart extends CI_Controller
{
	// MyCart controller for a web application built using the CodeIgniter framework
	public function __construct()
	{
		// Call the parent constructor
		parent::__construct();

		// Set default values for the login and password session variables if they are not already set
		if (!isset($this->session->login)) {
			$this->session->login = false;
		}
		if (!isset($this->session->password)) {
			$this->session->password = true;
		}
	}

	// Method that is executed when the MyCart controller is accessed without specifying a particular method
	public function index()
	{
		// If the email session variable is set, retrieve and display the user's cart data
		if (isset($_SESSION['email'])) {
			$user_cart = $this->get_user_cart();
			$cart_total_price = $this->get_cart_total_price($user_cart);
			$data = array('user_cart' => $user_cart, 'cart_total_price' => $cart_total_price);
			$this->load->view('navbar');
			$this->load->view('mycart', $data);
		} // If the email session variable is not set, redirect to the MyAccount controller
		else {
			redirect(site_url('MyAccount'));
		}
	}

	// Method that adds an item to the user's cart
	public function add_to_cart($id)
	{
		// If the email session variable is set, add the item to the cart
		if (isset($_SESSION['email'])) {
			// Determine the price of the item
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
			// Calculate the total price of the items being added to the cart
			$price = $price * $_POST['quantity'];
			// Insert the item into the cart and redirect to the MyCart controller
			$this->CartModel->insert_item_into_cart($_SESSION['email'], $id, $_POST['quantity'], $_POST['radio_buttons'], $price);
			redirect(site_url('MyCart'));
		} // If the email session variable is not set, redirect to the MyAccount controller
		else {
			redirect(site_url('MyAccount'));
		}
	}

	// Method that removes an item from the user's cart
	public function remove_item($poster_id, $quantity, $size)
	{
		// Remove the item from the cart and redirect to the MyCart controller
		$this->CartModel->delete_item($_SESSION['email'], $poster_id, $quantity, $size);
		redirect(site_url('MyCart'));
	}

	// Method that removes all items from the user's cart
	public function remove_all_items()
	{
		// Remove all items from the cart and redirect to the MyCart controller
		$this->CartModel->delete_all();
		redirect(site_url('MyCart'));
	}

	// Method that retrieves the user's cart data from the database
	public function get_user_cart()
	{
		return $this->CartModel->select_item_from_cart($_SESSION['email']);
	}

	// Method that calculates the total price of all items in the user's cart
	public function get_cart_total_price($user_cart)
	{
		$cart_price = 0;
		// Add up the price of each item in the cart
		for ($i = 0; $i < count($user_cart); $i++) {
			$cart_price += $user_cart[$i]->price;
		}
		// Return the total price of the items in the cart
		return $cart_price;
	}
}

