<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_order extends CI_Model
{

	public function get()
	{
		$ci = &get_instance();
		if ($ci->session->userdata('level') == "1") {
			$row = $this->db->select('a.*, b.name as type_name')
				->from('t_order a')
				->join('item b', 'a.type_booking = b.item_id')
				->order_by('a.order_id', 'desc')
				->get()
				->result();
		} else {
			$row = $this->db->select('a.*, b.name as type_name')
				->from('t_order a')
				->join('item b', 'a.type_booking = b.item_id')
				->where('a.user_id', $ci->session->userdata('userid'))
				->order_by('a.order_id', 'desc')
				->get()
				->result();
		}
		// $query = $this->db->get();
		return $row;
	}

	public function invoice_no()
	{
		$sql = "SELECT count(cast(
			substring(a.invoice FROM 3 FOR 2) ||
			substring(a.invoice FROM 5 FOR 2) ||
			substring(a.invoice FROM 7 FOR 2) as integer))
			as counter,
			max(
			substring(a.invoice FROM 3 FOR 2) ||
			substring(a.invoice FROM 5 FOR 2) ||
			substring(a.invoice FROM 7 FOR 2))
			as date
			from t_order a
			where substring(a.invoice FROM 3 FOR 6) = to_char(now(), 'YYMMDD')";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		if ($result["counter"] > 0) {
			$counter = $result["counter"] + 1;
			$leading_zeros = str_pad($counter, 4, '0', STR_PAD_LEFT);
			$n = $result["date"] . $leading_zeros;
			$no  = sprintf("%'.04d", $n);
		} else {
			$no = date('ymd') . "0001";
		}
		$invoice = "LT" . $no;
		return $invoice;
	}

	public function view($id)
	{
		$row = $this->db->select('a.order_id')
			->from('t_order a')
			->where('a.order_id', $id)
			->get()
			->result();
		return $row;
	}

	public function add($post)
	{
		$user_id = $this->fungsi->user_login()->user_id;
		// echo var_dump($check);exit;
		$string = $post['typebooking'];
		$array = explode("|", $string);
		$string1 = $array[0];
		$formattedDate = date("Y-m-d H:i:s", strtotime($post['datetime']));
		$params = [
			'user_id' => $user_id,
			'invoice' => $post['invoice'],
			'date' => $formattedDate,
			'booking_name' => $post['booking_name'],
			'type_booking' => $string1,
			'qty_booking' => $post['person_booking'],
			'grand_total' => $post['grand_total'],
			'created' => date('Y-m-d'),
			'status' => 'PENDING',
		];
		// echo json_encode($params);exit;
		$this->db->insert('t_order', $params);
		$lastId = $this->db->insert_id();
		// $row = $this->db->where('order_id', $lastId)->get('t_order')->row();
		$row = $this->db->select('a.*, b.name as type_name')
			->from('t_order a')
			->join('item b', 'a.type_booking = b.item_id')
			->where('a.order_id', $lastId)
			->get()
			->row();
		// echo var_dump($row);exit;
		return $row;
	}

	public function addImage($post)
	{
		$params = [
			'transfer_image' => $post['image']
		];
		$this->db->where('order_id', $post['order_id']);
		$this->db->update('t_order', $params);
	}

	public function query_report($post)
	{
		// echo var_dump($post);exit;
		$row = $this->db->select('a.*')
			->from('t_order a')
			->where('a.created >=', $post['start_date'])
			->where('a.created <=', $post['end_date'])
			->get()
			->result();

			return $row;
	}
}
