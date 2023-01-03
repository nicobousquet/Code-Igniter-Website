<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	// Method that is executed when the Home controller is accessed without specifying a particular method
	public function index()
	{
		// Load the navbar and home views
		$this->load->view('navbar');
		$this->load->view('home');
	}
}
