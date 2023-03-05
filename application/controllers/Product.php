<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->model('Reseller_model');
    }

    public function index()
    {
        $data['judul'] = "Halaman Product";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['product'] = $this->Product_model->get();        
        $data['product'] = $this->Product_model->getData();        
        $this->load->view("layout/header", $data);
        $this->load->view("product/vw_product", $data);
        $this->load->view("layout/footer", $data);
    }

    function tambah()
    {
        $data['judul'] = "Halaman Tambah Data Product";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['product'] = $this->Reseller_model->get();
        // $data['product'] = $this->Product_model->getData();        
        $this->form_validation->set_rules('id_res', 'Reseller', 'required', [
            'required' => 'Reseller Wajib di isi',
        ]);
        $this->form_validation->set_rules('product_desc', 'Product Description', 'required', [
            'required' => 'Deskripsi product Wajib di isi'
        ]);            
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("product/vw_tambah_product", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'product_desc' => $this->input->post('product_desc'),
                'id_res' => $this->input->post('id_res'),
            ];

            $this->Product_model->insert($data);
            $this->session->set_flashdata('message', '
                    <script>
                        swal("Success!", "Berhasil Tambah Data!", {
                            icon : "success",
                        });
                    </script>
                    ');
            redirect('product');
        }
    }

    public function hapus($id)
    {
        $this->Product_model->delete($id);
        $this->session->set_flashdata('message', '
                    <script>
                        swal("Success!", "Berhasil Hapus Data!", {
                            icon : "success",
                        });
                    </script>
        ');
        redirect('product');
    }

    public function edit($id)
    {
        $data['judul'] = "Halaman Edit Product";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['reseller'] = $this->Product_model->getDataReseller();
        $data['product'] = $this->Product_model->getById($id);
        // $this->form_validation->set_rules('reseller', 'Reseller', 'required', [
        //     'required' => 'Reseller Wajib di isi',
        // ]);
        $this->form_validation->set_rules('product_desc', 'Product Description', 'required', [
            'required' => 'Deskripsi product Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("product/vw_edit_product", $data);
            $this->load->view("layout/footer", $data);
        } else {
            $data = [
                'product_desc' => $this->input->post('product_desc'),
                // 'id_res' => $this->input->post('nama'),
            ];

            $id = $this->input->post('id');
            $this->Product_model->update(['id' => $id], $data);
            $this->session->set_flashdata('message', '
                    <script>
                        swal("Success!", "Berhasil Edit Data!", {
                            icon : "success",
                        });
                    </script>
            ');
            redirect('Product');
        }
    }
}
