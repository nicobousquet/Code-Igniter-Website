<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class OrdersModel extends CI_Model
{
	protected string $table = 'Orders';

	/**
	 * Inserts a new order into the `Orders` table
	 *
	 * @param string $email_user The email of the user who made the order
	 * @param string $order_id The unique id for the order
	 * @param int $photo_id The id of the photo that was ordered
	 * @param float $price The price of the order
	 * @param string $size The size of the photo that was ordered
	 * @param int $quantity The quantity of photos ordered
	 * @param string $date The date the order was made
	 *
	 * @return bool Whether the insertion was successful or not
	 */
	public function insert_order($email_user, $order_id, $photo_id, $price, $size, $quantity, $date)
	{
		return $this->db->set('email_user', $email_user)
			->set('order_id', $order_id)
			->set('photo_id', $photo_id)
			->set('quantity', $quantity)
			->set('size', $size)
			->set('price', $price)
			->set('date', $date)
			->insert($this->table);
	}

	/**
	 * Retrieves the orders made by a particular user from the `Orders` table
	 *
	 * @param string $email_user The email of the user whose orders we want to retrieve
	 *
	 * @return array An array of objects representing the orders made by the user
	 */
	public function select_orders($email_user)
	{
		return $this->db->select('*')
			->from($this->table)
			->where('email_user', $email_user)
			->join('Photos', 'Photos.id = Orders.photo_id')
			->order_by('date', 'DESC', 'order_id')
			->get()
			->result();
	}
}
