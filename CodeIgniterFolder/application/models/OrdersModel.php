<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class OrdersModel extends CI_Model
{
	protected string $table = 'Orders';

	public function insert_order($email_user, $order_id, $photo_id, $price, $size, $quantity, $date) {
		return $this->db->set('email_user', $email_user)
			->set('order_id', $order_id)
			->set('photo_id', $photo_id)
			->set('quantity', $quantity)
			->set('size', $size)
			->set('price', $price)
			->set('date', $date)
			->insert($this->table);
	}

	public function select_orders($email_user) {
		return $this->db->select('*')
			->from($this->table)
			->where('email_user', $email_user)
			->join('Photos', 'Photos.id = Orders.photo_id')
			->order_by('date',  'DESC', 'order_id')
			->get()
			->result();
	}
}
