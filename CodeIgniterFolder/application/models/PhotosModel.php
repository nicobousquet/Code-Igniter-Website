<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class PhotosModel extends CI_Model
{
	protected string $table = 'Photos';

	/**
	 * Selects photos by continent
	 *
	 * @param string $continent The continent to select photos from
	 * @return object The result of the query
	 */
	public function select_photos_by_continent($continent)
	{
		return $this->db->select('*')
			->from($this->table)
			->where('continent', $continent)
			->get()
			->result();
	}

	/**
	 * Selects a photo by ID
	 *
	 * @param int $id The ID of the photo to select
	 * @return object The result of the query
	 */
	public function select_photo_by_id($id)
	{
		return $this->db->select('*')
			->from($this->table)
			->where('id', $id)
			->get()
			->result();
	}
}
