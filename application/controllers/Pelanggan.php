<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('M_customer');
    }
	
	public function index()
	{
		
		echo json_encode("oke");exit;
		$data['row'] = $this->M_customer->get();
		$this->template->load('template', 'customer/customer_data', $data);
	}

	public function add()
	{
		$customer              = new stdClass();
		$customer->customer_id = null;
		$customer->name        = null;
		$customer->gender      = null;
		$customer->phone       = null;
		$customer->address     = null;
		$data = array(
			'page' => 'add',
			'row' => $customer
		);
		$this->template->load('template', 'customer/customer_form', $data);
	}

	public function edit($id)
	{
		$query = $this->M_customer->get($id);
		if($query->num_rows() > 0)
		{
			$customer = $query->row();
			$data = array(
				'page' => 'edit',
				'row'  => $customer
			);
			$this->template->load('template', 'customer/customer_form', $data);
		}
		else
		{
			echo "<script>alert('Data tidak ditemmukan');";
			echo "window.location='".site_url('customer')."';</script>";
		}
	}
	
	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add']))
		{
			$this->M_customer->add($post);
		}
		elseif (isset($_POST['edit']))
		{
			$this->M_customer->edit($post);
		}

		if($this->db->affected_rows() > 0)
		{
			$this->session->set_flashdata('success', 'Data berhasil di simpan');
		}
		redirect('customer');
	}

	public function delete($id)
	{
		$this->M_customer->delete($id);
		if($this->db->affected_rows() > 0)
		{
			$this->session->set_flashdata('success', 'Data berhasil di hapus');
		}
		redirect('customer');
	}
}