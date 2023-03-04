<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class OrdersModel extends CI_Model
{
	protected string $table = 'Orders';
	protected string $email_user = 'email_user';
	protected string $photo_id = 'photo_id';
	protected string $quantity = 'quantity';
	protected string $size = 'size';
	protected string $price = 'price';
	protected string $date = 'date';
	protected string $order_id = 'order_id';

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
	public function insert_order(string $email_user, string $order_id, int $photo_id, float $price, string $size, int $quantity, string $date): bool
	{
		return $this->db->set('email_user', $email_user)
			->set($this->order_id, $order_id)
			->set($this->photo_id, $photo_id)
			->set($this->quantity, $quantity)
			->set($this->size, $size)
			->set($this->price, $price)
			->set($this->date, $date)
			->insert($this->table);
	}

	/**
	 * Retrieves the orders made by a particular user from the `Orders` table
	 *
	 * @param string $email_user The email of the user whose orders we want to retrieve
	 *
	 * @return array An array of objects representing the orders made by the user
	 */
	public function select_orders(string $email_user): array
	{
		return $this->db->select('*')
			->from($this->table)
			->where($this->email_user, $email_user)
			->join('Photos', 'Photos.id = Orders.photo_id')
			->select("STR_TO_DATE($this->date, '%d %b, %Y') AS date_converted", FALSE)
			->order_by('date_converted', 'DESC')
			->order_by($this->order_id)
			->get()
			->result();
	}
}
