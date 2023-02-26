<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Select extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dynamic_model');
    }

    public function index()
    {
        $data['title'] = 'Data Order Record';
        $this->load->view('dynamicselect/index', $data);
    }

    public function add()
    {
        $data['reseller'] = $this->Dynamic_model->getDataReseller();
        $this->form_validation->set_rules('order_id', 'Order ID', 'trim|required');
        $this->form_validation->set_rules('quantity', 'Quantity', 'trim|required');
        if ($this->form_validation->run() == FALSE){
            $this->load->view('dynamicselect/getdata', $data);
        } else {

            $input = [
                'order_id' => htmlspecialchars($this->input->post('order_id'), true),
                'quantity' => htmlspecialchars($this->input->post('quantity'), true),
                'id_res' => $this->input->post('reseller'),
                'id_pro' => $this->input->post('product'),
                'id_ver' => $this->input->post('version'),
            ];

            if($this->Dynamic_model->create($input) > 0){
                $this->session->set_flashdata('status', 'Data Berhasil di simpan');
                redirect('Select');
            }else {
                $this->session->set_flashdata('status', 'Data Gagal di simpan');
                redirect('Select');
            }
            
        }

    }

    public function getProduct()
    {
        $idres = $this->input->post('id');
        $data = $this->Dynamic_model->getDataProduct($idres);
        $output = '<option value="">--Select Product--</option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->id . '"> ' . $row->product_desc . '</option>';
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function getVersion()
    {
        $idpro = $this->input->post('id');
        $data = $this->Dynamic_model->getDataVersion($idpro);
        $output = '<option value="">--Select Version-- </option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->id . '"> ' . $row->version_name . '</option>';
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
}
