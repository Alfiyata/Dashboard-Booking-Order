<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_unit extends CI_Model {

    public function get($id = null)
	{
		$ci =& get_instance();
		$this->db->from('unit');
		if ($id !=null) {
			$this->db->where('unit_id', $id);
		}
		$this->db->where('created_by', $ci->session->userdata('userid'));
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$ci =& get_instance();
		$params = [
			'name' => $post['unit_name'],
			'created_by' => $ci->session->userdata('userid'),
		];
		$this->db->insert('unit', $params);
	}

	public function edit($post)
	{
		$ci =& get_instance();
		$params = [
			'name' => $post['unit_name'],
			'created_by' => $ci->session->userdata('userid'),
			'updated' => date('Y-m-d H:i:s')
		];
		$this->db->where('unit_id', $post['id']);
		$this->db->update('unit', $params);
	}

    public function delete($id)
    {
        $this->db->where('unit_id', $id);
        $this->db->delete('unit');
    }

}