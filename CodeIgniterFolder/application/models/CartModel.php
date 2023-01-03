<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class CartModel extends CI_Model
{
	// The name of the table in the database this model is for
	protected string $table = 'Cart';

	/**
	 * Inserts a new item into the cart for the given user
	 *
	 * @param string $email_user The email of the user to insert the item for
	 * @param int $photo_id The ID of the photo the item represents
	 * @param int $quantity The number of items to insert
	 * @param string $size The size of the items to insert
	 * @param float $price The price of the items to insert
	 *
	 * @return bool Whether the insertion was successful
	 */
	public function insert_item_into_cart($email_user, $photo_id, $quantity, $size, $price)
	{
		return $this->db->set('email_user', $email_user)
			->set('photo_id', $photo_id)
			->set('quantity', $quantity)
			->set('size', $size)
			->set('price', $price)
			->insert($this->table);
	}

	/**
	 * Selects all items in the cart for the given user
	 *
	 * @param string $email The email of the user to select items for
	 *
	 * @return array The items in the user's cart
	 */
	public function select_item_from_cart($email)
	{
		return $this->db->select('*')
			->from($this->table)
			->where('email_user', $email)
			->join('Photos', 'Photos.id = Cart.photo_id')
			->get()
			->result();
	}

	/**
	 *
	 * Deletes an item from the cart table.
	 * @param string $email The email of the user.
	 * @param int $id The ID of the photo.
	 * @param int $quantity The quantity of the photo.
	 * @param string $size The size of the photo.
	 * @return bool Whether the item was deleted successfully or not.
	 */
	public function delete_item($email, $id, $quantity, $size)
	{
		return $this->db->where(array('email_user' => $email, 'photo_id' => (int)$id, 'quantity' => $quantity, 'size' => $size))
			->limit(1)
			->delete($this->table);
	}

	/**
	 *
	 * Deletes all items from the cart table.
	 * @return bool Whether all items were deleted successfully or not.
	 */
	public function delete_all()
	{
		return $this->db->empty_table($this->table);
	}
}
