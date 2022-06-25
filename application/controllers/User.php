<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
        check_not_login();

        $this->load->model('M_user');
        $data['row'] = $this->M_user->get();
		$this->template->load('template', 'user/user_data', $data);
	}

    public function add()
    {
        $this->template->load('template', 'user/add_form_user');
    }
}