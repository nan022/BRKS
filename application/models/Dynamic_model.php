<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dynamic_model extends CI_Model
{

    public function getDataReseller()
    {
        return $this->db->get('reseller')->result_array();
    }

    public function getDataProduct($idres)
    {
        return $this->db->get_where('product', ['id_res' => $idres])->result();
    }

    public function getDataVersion($idpro)
    {
        return $this->db->get_where('tbversion', ['id_pro' => $idpro])->result();
    }

    public function create($input)
    {
        $this->db->insert('order_record1', $input);
        return $this->db->affected_rows();
    }
}
