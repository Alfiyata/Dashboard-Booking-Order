<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_item extends CI_Model {

    public function get($id = null)
	{
		$this->db->from('item');
		if ($id !=null) {
			$this->db->where('item_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params = [
			'name' => $post['item_name'],
		];
		$this->db->insert('item', $params);
	}

	public function edit($post)
	{
		$params = [
			'name' => $post['item_name'],
			'updated' => date('Y-m-d H:i:s')
		];
		$this->db->where('item_id', $post['id']);
		$this->db->update('item', $params);
	}

    public function delete($id)
    {
        $this->db->where('item_id', $id);
        $this->db->delete('item');
    }

}