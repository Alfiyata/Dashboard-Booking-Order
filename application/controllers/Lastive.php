<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lastive extends CI_Controller {

	public function index()
	{
		// check_not_login();
		$this->navbar->load('navbar', 'lastive/index');
        // $this->load->view('lastive/index');

	}
}
