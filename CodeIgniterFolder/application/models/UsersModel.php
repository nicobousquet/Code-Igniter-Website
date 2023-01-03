<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class UsersModel extends CI_Model
{
	protected string $table = 'Users';

	/**
	 * Insert a new user into the database
	 *
	 * @param string $first_name the user's first name
	 * @param string $last_name the user's last name
	 * @param string $email the user's email
	 * @param string $password the user's password
	 * @return boolean true if the insertion was successful, false otherwise
	 */
	public function insert_new_user($first_name, $last_name, $email, $password)
	{
		return $this->db->set('first_name', $first_name)
			->set('last_name', $last_name)
			->set('email', $email)
			->set('password', $password)
			->insert($this->table);
	}

	/**
	 * Select a user from the database using their email and password
	 *
	 * @param string $email the user's email
	 * @param string $password the user's password
	 * @return array an array of users matching the email and password
	 */
	public function select_user_by_email_and_password($email, $password)
	{
		return $this->db->select('*')
			->from($this->table)
			->where(array('email' => $email, 'password' => $password))
			->get()
			->result();
	}

	/**
	 * Select a user from the database using their email
	 *
	 * @param string $email the user's email
	 * @return array an array of users matching the email
	 */
	public function select_user_by_email($email)
	{
		return $this->db->select('*')
			->from($this->table)
			->where('email', $email)
			->get()
			->result();
	}
}
