<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PosterDescription extends CI_Controller
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

	public function index($id = 3)
	{
		$data = array('photo' => $this->PhotosModel->select_photo_by_id($id));
		$this->load->view('navbar', $data);
		$this->load->view('posterdescription', $data);
	}
}
