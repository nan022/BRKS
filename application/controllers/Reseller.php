<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reseller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Reseller_model');
    }

    public function index()
    {
        $data['judul'] = "Halaman reseller";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['reseller'] = $this->Reseller_model->get();        
        $this->load->view("layout/header", $data);
        $this->load->view("reseller/vw_reseller", $data);
        $this->load->view("layout/footer", $data);
    }

    function tambah()
    {
        $data['judul'] = "Halaman Tambah Data Order reseller";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama', 'Reseller Name', 'required', [
            'required' => 'Reseller Name Wajib di isi'
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'required', [
            'required' => 'Alamat Wajib di isi'
        ]);
        $this->form_validation->set_rules('company', 'company', 'required', [
            'required' => 'Company Wajib di isi'
        ]);
        $this->form_validation->set_rules('tenant_id', 'tenant_id', 'required', [
            'required' => 'Tenant Id Wajib di isi'
        ]);           
        $this->form_validation->set_rules('host_name', 'host_name', 'required', [
            'required' => 'Host Name Wajib di isi'
        ]);        
        $this->form_validation->set_rules('serial_number', 'serial_number', 'required', [
            'required' => 'Serial Number Wajib di isi'
        ]);        
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("reseller/vw_tambah_reseller", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'company' => $this->input->post('company'),
                'tenant_id' => $this->input->post('tenant_id'),
                'host_name' => $this->input->post('host_name'),
                'serial_number' => $this->input->post('serial_number'),
            ];
            $this->Reseller_model->insert($data);
            $this->session->set_flashdata('message', '
                    <script>
                        swal("Success!", "Berhasil Tambah Data!", {
                            icon : "success",
                        });
                    </script>
            ');
            redirect('reseller');
        }
    }

    public function detail($id)
    {
        $data['judul'] = "Halaman Detail reseller";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['reseller'] = $this->reseller_model->getById($id);
        $this->load->view("layout/header", $data);
        $this->load->view("reseller/vw_detail_reseller", $data);
        $this->load->view("layout/footer", $data);
    }

    public function hapus($id)
    {
        $this->Reseller_model->delete($id);
        $this->session->set_flashdata('message', '
                    <script>
                        swal("Success!", "Berhasil Hapus Data!", {
                            icon : "success",
                        });
                    </script>
        ');
        redirect('reseller');
    }

    public function edit($id)
    {
        $data['judul'] = "Halaman Edit reseller";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['reseller'] = $this->Reseller_model->getById($id);
        $this->form_validation->set_rules('nama', 'Reseller Name', 'required', [
            'required' => 'Reseller Name Wajib di isi'
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'required', [
            'required' => 'Alamat Wajib di isi'
        ]);
        $this->form_validation->set_rules('company', 'company', 'required', [
            'required' => 'Company Wajib di isi'
        ]);
        $this->form_validation->set_rules('tenant_id', 'tenant_id', 'required', [
            'required' => 'Tenant Id Wajib di isi'
        ]);           
        $this->form_validation->set_rules('host_name', 'host_name', 'required', [
            'required' => 'Host Name Wajib di isi'
        ]);        
        $this->form_validation->set_rules('serial_number', 'serial_number', 'required', [
            'required' => 'Serial Number Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("reseller/vw_edit_reseller", $data);
            $this->load->view("layout/footer", $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'company' => $this->input->post('company'),
                'tenant_id' => $this->input->post('tenant_id'),
                'host_name' => $this->input->post('host_name'),
                'serial_number' => $this->input->post('serial_number'),
            ];
            $id = $this->input->post('id');
            $this->Reseller_model->update(['id' => $id], $data);
            $this->session->set_flashdata('message', '
                    <script>
                        swal("Success!", "Berhasil Update Data!", {
                            icon : "success",
                        });
                    </script>
            ');
            redirect('Reseller');
        }
    }
}
