<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lastive extends CI_Controller {

	public function index()
	{
		$this->navbar->load('navbar', 'lastive/index');

	}
}
