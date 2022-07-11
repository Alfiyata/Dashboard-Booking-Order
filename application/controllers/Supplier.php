<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_not_login();
        // check_admin();
        $this->load->model('M_supplier');
        // $this->load->library('form_validation');
    }

	public function index()
	{

		$data['row'] = $this->M_supplier->get();
		$this->template->load('template', 'supplier/supplier_data', $data);
	}

	public function add()
	{
		$supplier = new stdClass();
		$supplier->supplier_id = null;
		$supplier->name = null;
		$supplier->phone = null;
		$supplier->address = null;
		$supplier->description = null;
		$data = array(
			'page' => 'add',
			'row' => $supplier
		);
		$this->template->load('template', 'supplier/supplier_form', $data);
	}

	public function edit($id)
	{
		$query = $this->M_supplier->get($id);
		if($query->num_rows() > 0)
		{
			$supplier = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $supplier
			);
			$this->template->load('template', 'supplier/supplier_form', $data);
		}
		else
		{
			echo "<script>alert('Data tidak ditemmukan');";
			echo "window.location='".site_url('supplier')."';</script>";
		}
	}
	
	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add']))
		{
			$this->M_supplier->add($post);
		}
		elseif (isset($_POST['edit']))
		{
			$this->M_supplier->edit($post);
		}

		if($this->db->affected_rows() > 0)
		{
			$this->session->set_flashdata('success', 'Data berhasil di simpan');
		}
		redirect('supplier');
	}

	public function delete($id)
	{
		$this->M_supplier->delete($id);
		if($this->db->affected_rows() > 0)
		{
			$this->session->set_flashdata('success', 'Data berhasil di hapus');
		}
		redirect('supplier');
	}
}