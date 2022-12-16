<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class UsersModel extends CI_Model
{
	protected string $table = 'Users';

	public function insert_new_user($first_name, $last_name, $email, $password)
	{
		$this->db->set('first_name', $first_name);
		$this->db->set('last_name', $last_name);
		$this->db->set('email', $email);
		$this->db->set('password', $password);
		return $this->db->insert($this->table);
	}

	public function select_user_by_email_and_password($email, $password)
	{
		return $this->db->select('*')
			->from($this->table)
			->where(array('email' => $email, 'password' => $password))
			->get()
			->result();
	}

	public function select_user_by_email($email)
	{
		return $this->db->select('*')
			->from($this->table)
			->where('email', $email)
			->get()
			->result();
	}
}