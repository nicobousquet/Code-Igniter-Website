<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MyAccount extends CI_Controller
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

	public function index($data = array())
	{
		$this->load->view('navbar', $data);
		$this->load->view('myaccount', $data);
	}

	public function email_used($email)
	{
		$user = $this->UsersModel->select_user_by_email($_POST['email']);
		if (count($user) > 0) {
			return true;
		}
		return false;
	}

	public function add_new_user()
	{
		if (!$this->email_used($_POST['email'])) {
			$this->UsersModel->insert_new_user($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['password']);
			$this->session->set_userdata('login', $_POST['fname']);
			$this->session->set_userdata('email', $_POST['email']);
			redirect('Home');
		} else {
			$data = array('email_used' => true);
			$this->index($data);
		}
	}
}
