<?php
defined('BASEPATH') or exit('No direct script access allowed');

// PosterDescription controller for a web application built using the CodeIgniter framework
class PosterDescription extends CI_Controller
{
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
