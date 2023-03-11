<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_order extends CI_Model
{
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
			where substring(a.invoice FROM 3 FOR 6) = to_char(now(), 'YYMMDD');";
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
}
