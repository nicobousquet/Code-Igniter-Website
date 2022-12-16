<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class PhotosModel extends CI_Model
{
	protected string $table = 'Photos';

	public function select_photos_by_continent($continent)
	{
		return $this->db->select('*')
			->from($this->table)
			->where('continent', $continent)
			->get()
			->result();
	}

	public function select_photo_by_id($id)
	{
		return $this->db->select('*')
			->from($this->table)
			->where('id', $id)
			->get()
			->result();
	}
}
