<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_customer extends CI_Model {

    public function get($id = null)
	{
		$this->db->from('customer');
		if ($id !=null) {
			$this->db->where('customer_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params = [
			'name'    => $post['customer_name'],
			'gender'  => $post['gender'],
			'phone'   => $post['customer_phone'],
			'address' => $post['customer_address'],
			'created' => date('Y-m-d H:i:s')
		];
		$this->db->insert('customer', $params);
	}

	public function edit($post)
	{
		$params = [
			'name'    => $post['customer_name'],
			'gender'  => $post['gender'],
			'phone'   => $post['customer_phone'],
			'address' => $post['customer_address'],
			'updated' => date('Y-m-d H:i:s')
		];
		$this->db->where('customer_id', $post['id']);
		$this->db->update('customer', $params);
	}

    public function delete($id)
    {
        $this->db->where('customer_id', $id);
        $this->db->delete('customer');
    }

}