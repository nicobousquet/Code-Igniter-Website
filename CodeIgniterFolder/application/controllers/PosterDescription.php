<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PosterDescription extends CI_Controller
{
	// PosterDescription controller for a web application built using the CodeIgniter framework
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

	// Method that is executed when the PosterDescription controller is accessed without specifying a particular method
	// The default value for the $id parameter is 3
	public function index($id = 21)
	{
		// Load the navbar and posterdescription views, passing in data from the PhotosModel
		$data = array('photo' => $this->PhotosModel->select_photo_by_id($id));
		$this->load->view('navbar', $data);
		$this->load->view('posterdescription', $data);
	}
}
