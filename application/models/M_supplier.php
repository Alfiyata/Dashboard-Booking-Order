<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_supplier extends CI_Model {

    public function get($id = null)
	{
		$this->db->from('supplier');
		if ($id !=null) {
			$this->db->where('supplier_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params = [
			'name' => $post['supplier_name'],
			'phone' => $post['supplier_phone'],
			'address' => $post['supplier_address'],
			'description' => empty($post['desc']) ? null : $post['desc'],
			'created' => date('Y-m-d H:i:s')
		];
		$this->db->insert('supplier', $params);
	}

	public function edit($post)
	{
		$params = [
			'name' => $post['supplier_name'],
			'phone' => $post['supplier_phone'],
			'address' => $post['supplier_address'],
			'description' => empty($post['desc']) ? null : $post['desc'],
			'updated' => date('Y-m-d H:i:s')
		];
		$this->db->where('supplier_id', $post['id']);
		$this->db->update('supplier', $params);
	}

    public function delete($id)
    {
        $this->db->where('supplier_id', $id);
        $this->db->delete('supplier');
    }

}