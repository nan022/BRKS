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
            // $upload_image = $_FILES['detail']['name'];
            // if ($upload_image) {
            //     $config['allowed_types'] = 'gif|jpg|png|jpeg';
            //     $config['max_size'] = '2048';
            //     $config['upload_path'] = './assets/img/berkas/';
            //     $this->load->library('upload', $config);
            //     if ($this->upload->do_upload('detail')) {
            //         $new_image = $this->upload->data('file_name');
            //         $this->db->set('detail', $new_image);
            //     } else {
            //         echo $this->upload->display_errors();
            //     }
            // }
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

    // public function edit($id)
    // {
    //     $data['judul'] = "Halaman Edit reseller";
    //     $data['user'] = $this->db->get_where('user', ['tenant_id' => $this->session->userdata('tenant_id')])->row_array();
    //     $data['univ'] = $this->reseller_model->get();
    //     $data['reseller'] = $this->reseller_model->getById($id);
    //     $this->form_validation->set_rules('nama_mhs', 'nama reseller', 'required', [
    //         'required' => 'nama reseller Wajib di isi'
    //     ]);
    //     $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required', [
    //         'required' => 'Jenis Kelamin Wajib di isi'
    //     ]);
    //     $this->form_validation->set_rules('no_hp', 'Nomor Hp', 'required|integer', [
    //         'required' => 'Nomor Hp reseller Wajib di isi',
    //         'integer' => 'NO HP harus Angka'
    //     ]);
    //     $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required', [
    //         'required' => 'Kecamatan Wajib di isi'
    //     ]);
    //     $this->form_validation->set_rules('bank', 'nama Bank', 'required', [
    //         'required' => 'nama Bank Wajib di isi'
    //     ]);
    //     $this->form_validation->set_rules('no_rek', 'Nomor Rekening', 'required', [
    //         'required' => 'Nomor Rekening Wajib di isi'
    //     ]);
    //     $this->form_validation->set_rules('prodi', 'Program Studi', 'required', [
    //         'required' => 'Program Studi Wajib di isi',
    //     ]);
    //     $this->form_validation->set_rules('semester', 'Semester', 'required', [
    //         'required' => 'Semester reseller Wajib di isi',
    //     ]);
    //     $this->form_validation->set_rules('id_univ', 'reseller', 'required', [
    //         'required' => 'reseller Wajib di isi',
    //     ]);
    //     $this->form_validation->set_rules('tahun_akademik', 'Tahun Akademik', 'required', [
    //         'required' => 'Tahun Akademik Wajib di isi',
    //     ]);
    //     if ($this->form_validation->run() == false) {
    //         $this->load->view("layout/header", $data);
    //         $this->load->view("reseller/vw_ubah_reseller", $data);
    //         $this->load->view("layout/footer", $data);
    //     } else {
    //         $data = [
    //             'nama_mhs' => $this->input->post('nama_mhs'),
    //             'jk' => $this->input->post('jk'),
    //             'no_hp' => $this->input->post('no_hp'),
    //             'kecamatan' => $this->input->post('kecamatan'),
    //             'bank' => $this->input->post('bank'),
    //             'no_rek' => $this->input->post('no_rek'),
    //             'prodi' => $this->input->post('prodi'),
    //             'semester' => $this->input->post('semester'),
    //             'id_univ' => $this->input->post('id_univ'),
    //             'tahun_akademik' => $this->input->post('tahun_akademik'),
    //         ];
    //         $id = $this->input->post('id');
    //         $this->reseller_model->update(['id' => $id], $data);
    //         $this->session->set_flashdata('message', '<div class="m-alert m-alert--outline m-alert--outline-2x alert alert-success alert-dismissible fade show" role="alert">
    //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //         </button>
    //         <strong>Yeay!!!</strong> Data reseller berhasil di Ubah
    //     </div>');
    //         redirect('reseller');
    //     }
    // }
}
