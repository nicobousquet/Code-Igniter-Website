<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	// Home controller for a web application built using the CodeIgniter framework
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

	// Method that is executed when the Home controller is accessed without specifying a particular method
	public function index()
	{
		// Load the navbar and home views
		$this->load->view('navbar');
		$this->load->view('home');
	}
}
