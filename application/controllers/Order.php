<?php
defined('BASEPATH') or exit('No direct script access allowed');

// SPOUT
require_once APPPATH . 'third_party/spout/src/Spout/Autoloader/autoload.php';
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use PhpParser\Node\Stmt\Echo_;

class Order extends CI_Controller
{

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
        $data['row'] = $this->M_order->get();
        $this->template->load('template', 'order/order_data', $data);
    }

    public function add()
    {
        $this->load->model('M_item');
        $item = $this->M_item->get()->result();
        $data = array(
            'item' => $item,
            'invoice' => $this->M_order->invoice_no(),
        );
        $this->template->load('template', 'order/order_form', $data);
    }

    public function create()
    {
        $post = $this->input->post(null, TRUE);
        $data = $this->M_order->add($post);
        $order = [
            'order_id'     => $data->order_id,
            'invoice'      => $data->invoice,
            'booking_name' => $data->booking_name,
            'date'         => $data->date,
            'type_name' => $data->type_name,
            'qty_booking'  => $data->qty_booking,
            'grand_total'  => $data->grand_total,
        ];
        // echo var_dump($data);exit;
        $this->load->view('order/invoice_order', $order);
    }

    public function upload_transfer($id)
    {
        $query = $this->M_order->view($id);
        // echo var_dump($query);exit;
        $data = array(
            'row' => $query
        );
        $this->template->load('template', 'order/order_upload_form', $data['row'][0]);
    }

    public function upload_transfer_file()
    {
        $config['upload_path']          = './uploads/orders/'; //tempat nampung file upload
        $config['allowed_types']        = 'gif|jpg|png|jpeg'; //file yg di izinkan
        $config['max_size']             = 1024;
        $config['file-name']            = 'order-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config); //library codeigniter upload

        $post = $this->input->post(null, TRUE);
        if ($this->upload->do_upload('image')) {
            $post['image'] = $this->upload->data('file_name');
            $this->M_order->addImage($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan');
            }
            redirect('order'); //redirect to halaman index order
        } else {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect('order');
        }
    }

    public function update_status($id)
    {
        $data = array(
            'status' => "Approved"
        );

        $this->db->where('order_id', $id);
        $this->db->update('t_order', $data);

        redirect('order');
    }

    public function reporting()
    {
        $this->template->load('template', 'order/report');
    }

    public function data_report()
    {
        $post = $this->input->post(null, TRUE);
        $data = $this->M_order->query_report($post);

        $userid = 'Admin';
        $filename = 'Report_Order';

        $path = 'uploads/report/';
        if(!is_dir($path)) {         
            mkdir("uploads/report/", 0777, true);
        }
        $filepath = $path.date('Ymd').'_'.$userid.'_'.$filename;

        $header = [
            'Name',  
            'Invoice',
            'Type Booking',
            'Date Booking', 
            'Total Payment',
            'Status',
        ];

        // Open the file for writing
        $file = fopen($filepath, 'w');

        // Write the header row
        fputcsv($file, $header);

        // Loop through the data and write each row to the file
        foreach($data as $order)
        {
            $row = [
                $order->booking_name,
                $order->invoice,
                $order->type_booking,
                $order->date,
                $order->grand_total,
                $order->status
            ];
            fputcsv($file, $row);
        }

        // Close the file
        fclose($file);

        // Set headers for file download
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($filepath) . '.csv"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));

        // Send file to browser
        readfile($filepath);
    }

}
