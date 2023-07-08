<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Controller for the PaymentSuccess page of a web application built using the CodeIgniter framework
class PaymentSuccess extends CI_Controller
{
	// Method that displays the PaymentSuccess page
	public function index() {
		// Retrieve the request value and pass it to the view
		$data["actual_request"] = $_POST['cartID'];
		// Decode the user's cart from the POST request and unserialize it
		$user_cart = unserialize(base64_decode($_POST['user_cart']));
		// Get the current date
		$date = date("d M, Y");
		// Insert each item in the user's cart into the orders table in the database
		for ($i=0; $i<count($user_cart); $i++) {
			$this->OrdersModel->insert_order($_SESSION['email'], $_POST['cartID'], $user_cart[$i]->photo_id, $user_cart[$i]->price, $user_cart[$i]->size, $user_cart[$i]->quantity, $date);
			// Clear the user's cart
			$this->CartModel->delete_all();
		}
		// Load the navbar and PaymentSuccess views
		$this->load->view('navbar', $data);
		$this->load->view('paymentsuccess.php', $data);
	}
}
