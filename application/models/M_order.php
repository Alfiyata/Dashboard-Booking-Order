<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_order extends CI_Model
{

	// public function get($id = null)
	// {
	//     // echo json_encode('oke');
	// 	$ci =& get_instance();
	// 	$this->db->select('item.*, category.name as category_name, unit.name as unit_name');
	// 	$this->db->from('item');
	// 	$this->db->join('category', 'category.category_id = item.category_id');
	// 	$this->db->join('unit', 'unit.unit_id = item.unit_id');
	// 	if ($id !=null) {
	// 		$this->db->where('item_id', $id);
	// 	}
	// 	$this->db->where('item.created_by', $ci->session->userdata('userid'));
	// 	$query = $this->db->get();
	// 	return $query;
	// }

	public function invoice_no()
	{
		$sql = "SELECT MAX(substring(invoice,9,4)) AS invoice_no
				FROM t_order
				WHERE substring(invoice,3,6) = to_char(now(), 'YYYYMMDD')";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			$row = $query->row();
			$n   = (int)$row->invoice_no + 1;
			$no  = sprintf("%'.04d", $n);
			var_dump($no);exit;
		} else {
			$no = "0001";
		}
		$invoice = "LT" . date('ymd') . $no;
		return $invoice;
	}
}
