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
        $data['product'] = $this->Product_model->get();        
        $data['product'] = $this->Product_model->getData();        
        $this->load->view("layout/header", $data);
        $this->load->view("product/vw_product", $data);
        $this->load->view("layout/footer", $data);
    }

    function tambah()
    {
        $data['judul'] = "Halaman Tambah Data Product";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['product'] = $this->Product_model->get();
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
            // $upload_image = $_FILES['detail']['name'];
            // if ($upload_image) {
            //     $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
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

    public function detail($id)
    {
        $data['judul'] = "Halaman Detail product";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['product'] = $this->product_model->getById($id);
        $this->load->view("layout/header", $data);
        $this->load->view("product/vw_detail_product", $data);
        $this->load->view("layout/footer", $data);
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
        $data['judul'] = "Halaman Edit product";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['univ'] = $this->Universitas_model->get();
        $this->form_validation->set_rules('', 'Reseller Name', 'required', [
            'required' => 'Reseller Name Wajib di isi'
        ]);
        $this->form_validation->set_rules('address', 'address', 'required', [
            'required' => 'Address Wajib di isi'
        ]);
        $this->form_validation->set_rules('product_desc', 'product_desc', 'required', [
            'required' => 'Deskripsi product Wajib di isi'
        ]);
        $this->form_validation->set_rules('order_id', 'order_id', 'required', [
            'required' => 'Id Order Wajib di isi'
        ]);        
        $this->form_validation->set_rules('quantity', 'quantity', 'required', [
            'required' => 'Quantity Wajib di isi'
        ]);        
        $this->form_validation->set_rules('host_name', 'host_name', 'required', [
            'required' => 'Host Name Wajib di isi'
        ]);        
        $this->form_validation->set_rules('serial_number', 'serial_number', 'required', [
            'required' => 'Serial Number Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("product/vw_edit_product", $data);
            $this->load->view("layout/footer", $data);
        } else {
            $data = [
                '' => $this->input->post(''),
                'address' => $this->input->post('address'),
                'product_desc' => $this->input->post('product_desc'),
                'version' => $this->input->post('version'),
                'order_id' => $this->input->post('order_id'),
                'quantity' => $this->input->post('quantity'),
                'host_name' => $this->input->post('host_name'),
                'serial_number' => $this->input->post('serial_number'),
            ];
            $upload_image = $_FILES['detail']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/berkas/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('detail')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('detail', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $id = $this->input->post('id');
            $this->product_model->update(['id' => $id], $data, $upload_image);
            $this->session->set_flashdata('message', '<div class="m-alert m-alert--outline m-alert--outline-2x alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
            <strong>Yeay!!!</strong> Data Order product Berhasil di Ubah
        </div>');
            redirect('product');
        }
    }
}
