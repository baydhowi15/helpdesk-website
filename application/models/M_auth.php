<?php  

class M_auth extends CI_Model
{
	public $id = 'id_users';

	function insert($data)
	{
		$this->db->insert('users',$data);
	}

	function get_username_user($id)
	{
		$this->db->where('username', $id);
		return $this->db->get('users')->row();
	}
}