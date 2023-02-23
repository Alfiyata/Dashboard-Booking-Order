<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	public function login($post)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('username', $post['username']);
		$this->db->where('password', $post['password']);
		$query = $this->db->get();
		return $query;
	}

	public function get($id = null)
	{
		$this->db->from('users');
		if ($id !=null) {
			$this->db->where('user_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params['name'] = $post['fullname'];
		$params['username'] = $post['user_name'];
		$params['gender'] = $post['gender'];
		$params['phone'] = $post['phone'];
		$params['password'] = $post['password'];
		$params['address'] = $post['address'] != "" ? $post['address'] : null;
		$params['level'] = $post['level'];
		$this->db->insert('users', $params);
	}

	public function add_register_user($post)
	{
		$params['name'] = $post['fullname'];
		$params['username'] = $post['user_name'];
		$params['gender'] = $post['gender'];
		$params['password'] = $post['password'];
		$params['phone'] = $post['phone'];
		$params['address'] = $post['address'] != "" ? $post['address'] : null;
		$params['level'] = 2;
		$this->db->insert('users', $params);
	}
	
	public function edit($post)
	{
		$params['name'] = $post['fullname'];
		$params['username'] = $post['user_name'];
		if(!empty($post['password']))
		{
			$params['password'] = $post['password'];
		}
		$params['address'] = $post['address'] != "" ? $post['address'] : null;
		$params['level'] = $post['level'];
		$this->db->where('user_id', $post['user_id']);
		$this->db->update('users', $params);
	}
	
	public function delete($id)
    {
		$this->db->where('user_id', $id);
		$this->db->delete('users');
    }


}
