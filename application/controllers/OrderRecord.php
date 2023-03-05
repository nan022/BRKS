<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OrderRecord extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Order_model');
        $this->load->model('Reseller_model');
        $this->load->model('Reseller_model');
    }

    public function index()
    {
        $data['judul'] = "Halaman Order";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['order_r'] = $this->Order_model->get();
        $data['order'] = $this->Order_model->getDataOrder();
        $this->load->view("layout/header", $data);
        $this->load->view("order/vw_order_record", $data);
        $this->load->view("layout/footer", $data);
    }
    
    public function getProductEdt()
    {
        $idres = $this->input->post('id');
        $data = $this->Reseller_model->getDataProduct($idres);
        $output = '<option value="">--Select Product--</option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->id . '" selected> ' . $row->product_desc . ' + ' .$row->id. '</option>';
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function getProduct()
    {
        $productId = $this->input->post('product');
        $idres = $this->input->post('id');
        $data = $this->Reseller_model->getDataProduct($idres);
        $output = '<option value="">--Select Product--</option>';
        foreach ($data as $row) {
            if($productId){ //Edit
                if($productId == $row->id){
                    $output .= '<option value="' . $row->id . '" selected> ' . $row->product_desc . '</option>';
                }else{
                    $output .= '<option value="' . $row->id . '"> ' . $row->product_desc . '</option>';
                }
            }else{ //Tambah
                $output .= '<option value="' . $row->id . '"> ' . $row->product_desc . '</option>';
            }
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function getVersion()
    {
        $versionId = $this->input->post('version');
        $idpro = $this->input->post('id');
        $data = $this->Reseller_model->getDataVersion($idpro);
        $output = '<option value="">--Select Version--</option>';
        foreach ($data as $row) {
            if($versionId){ //Edit
                if($versionId == $row->id){
                    $output .= '<option value="' . $row->id . '" selected> ' . $row->version_name . '</option>';
                }else{
                    $output .= '<option value="' . $row->id . '"> ' . $row->version_name . '</option>';
                }
            }else{ //Tambah
                $output .= '<option value="' . $row->id . '"> ' . $row->version_name . '</option>';
            }
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function getVersionEdt()
    {
        $idpro = $this->input->post('id');
        $data = $this->Reseller_model->getDataVersion($idpro);
        $output = '<option value="">--Select Version--</option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->id . '" selected> ' . $row->version_name . '</option>';
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    function tambah()
    {
        $data['judul'] = "Halaman Tambah Data Order Order";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['res'] = $this->Reseller_model->get();
        $data['reseller'] = $this->Reseller_model->getDataReseller();           
        $this->form_validation->set_rules('order_id', 'Order Id', 'required', [
            'required' => 'Id Order Wajib di isi'
        ]);        
        $this->form_validation->set_rules('quantity', 'Quantity', 'required', [
            'required' => 'Quantity Wajib di isi'
        ]);                       
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("order/vw_tambah_order", $data);
            $this->load->view("layout/footer", $data);
        } else {
            $input = [
                'order_id' => htmlspecialchars($this->input->post('order_id'), true),
                'quantity' => htmlspecialchars($this->input->post('quantity'), true),
                'id_res' => $this->input->post('id_res'),
                'id_pro' => $this->input->post('product'),
                'id_ver' => $this->input->post('version'),
            ];

            $upload_image = $_FILES['detail']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'jpg|jpeg|png';
                // $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
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
            if($this->Order_model->create($input, $upload_image) > 0){
                $this->session->set_flashdata('status', 'Data Berhasil di simpan');
                $this->session->set_flashdata('message', '
                    <script>
                        swal("Success!", "Berhasil Tambah Data!", {
                            icon : "success",
                        });
                    </script>
                ');
                redirect('OrderRecord');
            }else {
                $this->session->set_flashdata('status', 'Data Gagal di simpan');
                redirect('OrderRecord');
            }
        }
    }

    public function hapus($id)
    {
        $this->Order_model->delete($id);
        $this->session->set_flashdata('message', '
            <script>
                swal("Success!", "Berhasil Hapus Data!", {
                    icon : "success",
                });
            </script>'
        );
        redirect('OrderRecord');
    }

    public function editData($id, $type)
    {
        $data['judul'] = "Halaman Edit Order Record";
        $data['reseller'] = $this->Reseller_model->getDataReseller();
        $data['produk'] = $this->Reseller_model->getDataProduk();
        $data['version'] = $this->Reseller_model->getDataVersion_all();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $dataRecord = $this->Order_model->getByIdOrderRecord($id);
        // var_dump($dataRecord);
        // die();

        if ($type == 'edit') {
            $data['byId'] = $dataRecord;
            $this->form_validation->set_rules('order_id', 'Order Id', 'required', [
                'required' => 'Id Order Wajib di isi'
            ]);        
            $this->form_validation->set_rules('quantity', 'Quantity', 'required', [
                'required' => 'Quantity Wajib di isi'
            ]);

            if($this->form_validation->run() == FALSE){
                $this->load->view("layout/header", $data);
                $this->load->view("order/vw_edit_order", $data);
                $this->load->view("layout/footer", $data);
            } else {
                $input = [
                    'order_id' => htmlspecialchars($this->input->post('order_id'), true),
                    'quantity' => htmlspecialchars($this->input->post('quantity'), true),
                    'detail' => htmlspecialchars($this->input->post('detail'), true),
                    'id_res' => $this->input->post('reseller'),
                    'id_pro' => $this->input->post('product'),
                    'id_ver' => $this->input->post('version'),
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
                if($this->Order_model->update(array('id_ord' => $this->input->post('id_ord')), $input) > 0){
                    $this->session->set_flashdata('message', '
                        <script>
                            swal("Success!", "Berhasil Perbarui Data!", {
                                icon : "success",
                            });
                        </script>
                    ');
                    redirect('OrderRecord');
                }else {
                    $this->session->set_flashdata('status', 'Data Gagal di simpan');
                    redirect('OrderRecord');
                }
            }
        } else {
            $this->output->set_content_type('application/json')->set_output(json_encode($dataRecord));
        }
    }
}
