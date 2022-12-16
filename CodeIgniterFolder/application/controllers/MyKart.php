<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MyKart extends CI_Controller
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
			$user_kart = $this->KartModel->select_item_from_kart($_SESSION['email']);
			$data = array('user_kart' => $user_kart);
			$this->load->view('navbar');
			$this->load->view('mykart', $data);
		} else {
			redirect(site_url('MyAccount'));
		}
	}

	public function add_to_kart($continent, $id)
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
			$this->KartModel->insert_item_into_kart($_SESSION['email'], $id, $_POST['quantity'], $_POST['radio_buttons'], $price);
			redirect(site_url('MyKart'));
		} else {
			redirect(site_url('MyAccount'));
		}
	}

	public function remove_item($poster_id, $quantity, $size)
	{
		$this->KartModel->delete_item($_SESSION['email'], $poster_id, $quantity, $size);
		redirect(site_url('MyKart'));
	}

	public function remove_all_items()
	{
		$this->KartModel->delete_all();
		redirect(site_url('MyKart'));
	}
}
