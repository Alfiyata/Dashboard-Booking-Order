<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
        $this->load->library('form_validation');
    }

    public function index()
	{
        $this->navbar->load('registration', 'registration');
	}

    public function add()
    {
            $post = $this->input->post(null, TRUE);
            $this->M_user->add_register_user($post);
            if($this->db->affected_rows() > 0)
            {
                $this->session->set_flashdata('success', 'Registration');
            }
            redirect('/');

    }

}