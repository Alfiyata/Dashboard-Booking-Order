<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_not_login();
        // check_admin();
        $this->load->model('M_category');
        // $this->load->library('form_validation');
    }

	public function index()
	{

		$data['row'] = $this->M_category->get();
		$this->template->load('template', 'product/category/category_data', $data);
	}

	public function add()
	{
		$category = new stdClass();
		$category->category_id = null;
		$category->name = null;
		$data = array(
			'page' => 'add',
			'row' => $category
		);
		$this->template->load('template', 'product/category/category_form', $data);
	}

	public function edit($id)
	{
		$query = $this->M_category->get($id);
		if($query->num_rows() > 0)
		{
			$category = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $category
			);
			$this->template->load('template', 'product/category/category_form', $data);
		}
		else
		{
			echo "<script>alert('Data tidak ditemmukan');";
			echo "window.location='".site_url('category')."';</script>";
		}
	}
	
	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add']))
		{
			$this->M_category->add($post);
		}
		elseif (isset($_POST['edit']))
		{
			$this->M_category->edit($post);
		}

		if($this->db->affected_rows() > 0)
		{
			$this->session->set_flashdata('success', 'Data berhasil di simpan');
		}
		redirect('category');
	}

	public function delete($id)
	{
		$this->M_category->delete($id);
		if($this->db->affected_rows() > 0)
		{
			$this->session->set_flashdata('success', 'Data berhasil di hapus');
		}
		redirect('category');
	}
}