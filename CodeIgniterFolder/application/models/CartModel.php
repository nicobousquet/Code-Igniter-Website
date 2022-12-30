<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class CartModel extends CI_Model
{
	protected string $table = 'Cart';

	public function insert_item_into_cart($email_user, $photo_id, $quantity, $size, $price)
	{
		return $this->db->set('email_user', $email_user)
			->set('photo_id', $photo_id)
			->set('quantity', $quantity)
			->set('size', $size)
			->set('price', $price)
			->insert($this->table);
	}

	public function select_item_from_cart($email)
	{
		return $this->db->select('*')
			->from($this->table)
			->where('email_user', $email)
			->join('Photos', 'Photos.id = Cart.photo_id')
			->get()
			->result();
	}

	public function delete_item($email, $id, $quantity, $size)
	{
		return $this->db->where(array('email_user' => $email, 'photo_id' => (int)$id, 'quantity' => $quantity, 'size' => $size))
			->limit(1)
			->delete($this->table);
	}

	public function delete_all()
	{
		return $this->db->empty_table($this->table);
	}
}
