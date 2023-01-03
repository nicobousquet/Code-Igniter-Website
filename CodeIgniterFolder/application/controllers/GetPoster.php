<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GetPoster extends CI_Controller
{
	// GetPoster controller for a web application built using the CodeIgniter framework
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

	// Method that is executed when the GetPoster controller is accessed without specifying a particular method
	// The default value for the $continent parameter is 'Africa'
	public function index($continent = 'Africa')
	{
		// Load the navbar and getposter views, passing in data from the PhotosModel and the value of the $continent parameter
		$data = array('photos' => $this->PhotosModel->select_photos_by_continent($continent), 'continent' => $continent);
		$this->load->view('navbar', $data);
		$this->load->view('getposter', $data);
	}
}
