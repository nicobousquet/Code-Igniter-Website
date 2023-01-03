<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GetPoster extends CI_Controller
{
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
