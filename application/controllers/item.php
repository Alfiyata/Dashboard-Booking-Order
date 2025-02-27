<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class item extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_not_login();
        // check_admin();
        $this->load->model(['M_item', 'M_category', 'M_unit']);
        // $this->load->library('form_validation');
    }

	public function index()
	{

		$data['row'] = $this->M_item->get();
		$data['user_id'] = $this->M_item->user_id();
		// echo json_encode($data['user_id']);exit;
		$this->template->load('template', 'product/item/item_data', $data);
	}

	public function add()
	{
		$item = new stdClass();
		$item->item_id = null;
        $item->barcode = null;
		$item->name = null;
        $item->price = null;
		$item->category_id = null;

        $query_category = $this->M_category->get();

		$query_unit = $this->M_unit->get();
		$unit[null] = '-Pilih-';
		foreach ($query_unit->result() as $unt) {
			$unit[$unt->unit_id] = $unt->name;
		}

		$data = array(
			'page' => 'add',
			'row' => $item,
            'category' => $query_category,
			'unit' => $unit, 'selectedunit' => null,
		);
		
		$this->template->load('template', 'product/item/item_form', $data);
	}

	public function edit($id)
	{
		$query = $this->M_item->get($id);
		if($query->num_rows() > 0)
		{
			$item = $query->row();
			$query_category = $this->M_category->get();

			$query_unit = $this->M_unit->get();
			$unit[null] = '-Pilih-';
			foreach ($query_unit->result() as $unt) {
				$unit[$unt->unit_id] = $unt->name;
			}

			$data = array(
				'page' => 'edit',
				'row' => $item,
				'category' => $query_category,
				'unit' => $unit, 'selectedunit' => $item->unit_id,
			);
			$this->template->load('template', 'product/item/item_form', $data);
		}
		else
		{
			echo "<script>alert('Data tidak ditemmukan');";
			echo "window.location='".site_url('item')."';</script>";
		}
	}
	
	public function process()
	{
		$config['upload_path']          = './uploads/product/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 1024;
		$config['file-name']            = 'item-'.date('ymd').'-'.substr(md5(rand()),0,10);
		$this->load->library('upload', $config);

		$post = $this->input->post(null, TRUE);
		
		if(isset($_POST['add']))
		{
			if($this->M_item->check_barcode($post['barcode'])->num_rows() > 0)
			{
				$this->session->set_flashdata('error', "Barcode $post[barcode] sudah terpakai item lain");
				redirect('item/add');
			}
			else
			{
				if(@$_FILES['image']['name'] != null)
				{
					if($this->upload->do_upload('image'))
					{
						$post['image'] = $this->upload->data('file_name');
						$this->M_item->add($post);
						if($this->db->affected_rows() > 0)
						{
							$this->session->set_flashdata('success', 'Data berhasil di simpan');
						}
						redirect('item');
					}
					else
					{
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						redirect('item/add');
					}
				}
					else
					{
						$post['image'] = null;
						$this->M_item->add($post);
						if($this->db->affected_rows() > 0)
						{
							$this->session->set_flashdata('success', 'Data berhasil di simpan');
						}
						redirect('item');
					}
			}
		}
		elseif (isset($_POST['edit']))
		{
			if($this->M_item->check_barcode($post['barcode'], $post['id'])->num_rows() > 0)
			{
				$this->session->set_flashdata('error', "Barcode $post[barcode] sudah terpakai item lain");
				redirect('item/edit/'.$post['id']);
			}
			else
			{
				if(@$_FILES['image']['name'] != null)
				{
					if($this->upload->do_upload('image'))
					{
						$item = $this->M_item->get($post['id'])->row();
						if($item->image != null){
							$target_file = './uploads/product/'.$item->image;
							unlink($target_file);
						}

						$post['image'] = $this->upload->data('file_name');
						$this->M_item->edit($post);
						if($this->db->affected_rows() > 0)
						{
							$this->session->set_flashdata('success', 'Data berhasil di simpan');
						}
						redirect('item');
					}
					else
					{
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						redirect('item/add');
					}
				}
					else
					{
						$post['image'] = null;
						$this->M_item->edit($post);
						if($this->db->affected_rows() > 0)
						{
							$this->session->set_flashdata('success', 'Data berhasil di simpan');
						}
						redirect('item');
					}
			}
		}
	}

	public function delete($id)
	{
		$item = $this->M_item->get($id['id'])->row();
		if($item->image != null){
			$target_file = './uploads/product/'.$item->image;
			unlink($target_file);
		}
    
		$this->M_item->delete($id);
		if($this->db->affected_rows() > 0)
		{
			$this->session->set_flashdata('success', 'Data berhasil di hapus');
		}
		redirect('item');
	}
}