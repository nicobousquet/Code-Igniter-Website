<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Navbar extends CI_Controller
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

	public function login()
	{
		$user = $this->UsersModel->select_user_by_email_and_password($_POST['email_login'], $_POST['password_login']);
		if (count($user) > 0) {
			$this->session->set_userdata('login', $user[0]->first_name);
			$this->session->set_userdata('email', $_POST['email_login']);
			$this->session->set_userdata('password', true);
		} else {
			$this->session->set_userdata('password', false);
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function disconnect_user()
	{
		$this->session->unset_userdata('login');
		$this->session->unset_userdata('email', $_POST['email']);
		$this->session->unset_userdata('email', $_POST['email']);
		$this->session->unset_userdata('password');
		redirect($_SERVER['HTTP_REFERER']);
	}
}
