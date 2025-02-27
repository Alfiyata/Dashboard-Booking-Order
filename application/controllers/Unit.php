<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_not_login();
        // check_admin();
        $this->load->model('M_unit');
        // $this->load->library('form_validation');
    }

	public function index()
	{

		$data['row'] = $this->M_unit->get();
		$this->template->load('template', 'product/unit/unit_data', $data);
	}

	public function add()
	{
		$unit = new stdClass();
		$unit->unit_id = null;
		$unit->name = null;
		$data = array(
			'page' => 'add',
			'row' => $unit
		);
		$this->template->load('template', 'product/unit/unit_form', $data);
	}

	public function edit($id)
	{
		$query = $this->M_unit->get($id);
		if($query->num_rows() > 0)
		{
			$unit = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $unit
			);
			$this->template->load('template', 'product/unit/unit_form', $data);
		}
		else
		{
			echo "<script>alert('Data tidak ditemmukan');";
			echo "window.location='".site_url('unit')."';</script>";
		}
	}
	
	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add']))
		{
			$this->M_unit->add($post);
		}
		elseif (isset($_POST['edit']))
		{
			$this->M_unit->edit($post);
		}

		if($this->db->affected_rows() > 0)
		{
			$this->session->set_flashdata('success', 'Data berhasil di simpan');
		}
		redirect('unit');
	}

	public function delete($id)
	{
		$this->M_unit->delete($id);
		if($this->db->affected_rows() > 0)
		{
			$this->session->set_flashdata('success', 'Data berhasil di hapus');
		}
		redirect('unit');
	}
}