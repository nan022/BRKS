<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Version extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Version_model');
        $this->load->model('Product_model');
    }

    public function index()
    {
        $data['judul'] = "Halaman version";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['version'] = $this->Version_model->get();        
        $data['version'] = $this->Version_model->getData();        
        $this->load->view("layout/header", $data);
        $this->load->view("version/vw_version", $data);
        $this->load->view("layout/footer", $data);
    }

    function tambah()
    {
        $data['judul'] = "Halaman Tambah Data version";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['version'] = $this->Version_model->get();
        $data['version'] = $this->Version_model->getData();
        $data['version'] = $this->Version_model->getDataRes();
        $this->form_validation->set_rules('id_pro', 'Product', 'required', [
            'required' => 'Product Wajib di isi',
        ]);
        $this->form_validation->set_rules('version_name', 'Version Name', 'required', [
            'required' => 'Version Name Wajib di isi'
        ]);            
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("version/vw_tambah_version", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'version_name' => $this->input->post('version_name'),
                'id_pro' => $this->input->post('id_pro'),
            ];
            $this->Version_model->insert($data);
            $this->session->set_flashdata('message', '
                  <script>
                        swal("Success!", "Berhasil Tambah Data!", {
                            icon : "success",
                        });
                    </script>
            ');
            redirect('version');
        }
    }

    public function hapus($id)
    {
        $this->Version_model->delete($id);
        $this->session->set_flashdata('message', '
            <script>
                  swal("Success!", "Berhasil Hapus Data!", {
                  icon : "success",
                  });
            </script>'
      );
        redirect('version');
    }

    public function edit($id)
    {
        $data['judul'] = "Halaman Edit version";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['version'] = $this->Version_model->getById($id);
        $data['product'] = $this->Version_model->getDataProduct();
        $this->form_validation->set_rules('version_name', 'Version Name', 'required', [
            'required' => 'Version Name Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("version/vw_edit_version", $data);
            $this->load->view("layout/footer", $data);
        } else {
            $data = [
                'version_name' => $this->input->post('version_name'),
                // 'id_pro' => $this->input->post('id_pro'),
            ];

            $id = $this->input->post('id');
            $this->Version_model->update(['id' => $id], $data);
            $this->session->set_flashdata('message', '
                    <script>
                        swal("Success!", "Berhasil Edit Data!", {
                            icon : "success",
                        });
                    </script>
            ');
            redirect('version');
        }
    }
}
