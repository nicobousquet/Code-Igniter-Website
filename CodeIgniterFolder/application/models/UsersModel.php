<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class UsersModel extends CI_Model
{
	protected string $table = 'Users';
	protected string $first_name = 'first_name';
	protected string $last_name = 'last_name';
	protected string $email = 'email';
	protected string $password = 'password';

	/**
	 * Insert a new user into the database
	 *
	 * @param string $first_name the user's first name
	 * @param string $last_name the user's last name
	 * @param string $email the user's email
	 * @param string $password the user's password
	 * @return boolean true if the insertion was successful, false otherwise
	 */
	public function insert_new_user(string $first_name, string $last_name, string $email, string $password): bool
	{
		return $this->db->set($this->first_name, $first_name)
			->set($this->last_name, $last_name)
			->set($this->email, $email)
			->set($this->password, $password)
			->insert($this->table);
	}

	/**
	 * Select a user from the database using their email and password
	 *
	 * @param string $email the user's email
	 * @param string $password the user's password
	 * @return array an array of users matching the email and password
	 */
	public function select_user_by_email_and_password(string $email, string $password): array
	{
		return $this->db->select('*')
			->from($this->table)
			->where(array($this->email => $email, $this->password => $password))
			->get()
			->result();
	}

	/**
	 * Select a user from the database using their email
	 *
	 * @param string $email the user's email
	 * @return array an array of users matching the email
	 */
	public function select_user_by_email(string $email): array
	{
		return $this->db->select('*')
			->from($this->table)
			->where($this->email, $email)
			->get()
			->result();
	}
}
