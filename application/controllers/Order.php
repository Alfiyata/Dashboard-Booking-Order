<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        check_not_login();
        // check_admin();
        $this->load->model(['M_order']);
        // $this->load->library('form_validation');
    }

	public function index()
	{

		$this->load->model('M_customer');
        $customer = $this->M_customer->get()->result();
        $data = array(
            'customer' => $customer,
            'invoice' => $this->M_order->invoice_no(),
        );
		$this->template->load('template', 'order/order_form', $data);
	}



}