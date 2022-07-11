<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model('M_user');
        $this->load->library('form_validation');
    }

	public function index()
	{
        $data['row'] = $this->M_user->get();
		$this->template->load('template', 'user/user_data', $data);
	}

    public function add()
    {

        $this->form_validation->set_rules('fullname', 'Name', 'required');
        $this->form_validation->set_rules('user_name', 'User Name', 'required|min_length[5]|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Pasword', 'required|min_length[5]');
        $this->form_validation->set_rules('repassword', 'Confrim Password', 'required|matches[password]',
            array('matches' => '%s not be same')
        );
        $this->form_validation->set_rules('level', 'Level', 'required');

        $this->form_validation->set_message('required', '%s is empty, please input');
        $this->form_validation->set_message('min_length', '{field} at least must be 5 character');
        $this->form_validation->set_message('is_unique', '%s not available, please change');

        if ($this->form_validation->run() == FALSE)
        {
            $this->template->load('template', 'user/add_form_user');
        }
        else
        {
            $post = $this->input->post(null, TRUE);
            $this->M_user->add($post);
            if($this->db->affected_rows() > 0)
            {
                $this->session->set_flashdata('success', 'Add user');
            }
            redirect('user');
        }
        
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('fullname', 'Name', 'required');
        $this->form_validation->set_rules('user_name', 'User Name', 'required|min_length[5]|callback_username_check');
        if($this->input->post('password'))
        {
            $this->form_validation->set_rules('password', 'Pasword', 'min_length[5]');
            $this->form_validation->set_rules('repassword', 'Confrim Password', 'matches[password]',
                array('matches' => '%s not be same')
            );
        }
        if($this->input->post('repassword'))
        {
            $this->form_validation->set_rules('repassword', 'Confrim Password', 'matches[password]',
                array('matches' => '%s not be same')
            );
        }
        $this->form_validation->set_rules('level', 'Level', 'required');

        $this->form_validation->set_message('required', '%s is empty, please input');
        $this->form_validation->set_message('min_length', '{field} at least must be 5 character');
        $this->form_validation->set_message('is_unique', '%s not available, please change');

        if ($this->form_validation->run() == FALSE)
        {
            $query = $this->M_user->get($id);
            if($query->num_rows() > 0)
            {
                $data['row'] = $query->row();
                $this->template->load('template', 'user/edit_form_user', $data);
            }
            else
            {
                echo "<script>alert('Data not found');";
                echo "window.location='".site_url('user')."';</script>";
            }
        }
        else
        {
            $post = $this->input->post(null, TRUE);
            $this->M_user->edit($post);
            if($this->db->affected_rows() > 0)
            {
                $this->session->set_flashdata('success', 'Edit user');
            }
            redirect('user');
        }
        
    }

    function username_check()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM users WHERE username = '$post[user_name]' AND user_id != '$post[user_id]'");
        if($query->num_rows() > 0)
        {
            $this->form_validation->set_message('username_check', '{field} not available');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    public function delete()
    {
        $id = $this->input->post('user_id');
        $this->M_user->delete($id);

        if($this->db->affected_rows() > 0)
        {
            $this->session->set_flashdata('success', 'Delete user');
        }
        redirect('user');
    }
}