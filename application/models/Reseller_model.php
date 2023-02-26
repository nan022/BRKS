<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Reseller_model extends CI_Model
{
    public $table = 'reseller';
    public $id = 'reseller.id';
    public function __construct()
    {
        parent::__construct();
    }
    public function get()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getById($id)
    {
        $this->db->from($this->table);;
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function update($where, $data)
    {
    $this->db->update($this->table, $data, $where);
    return $this->db->affected_rows();
    }
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
    public function getDataReseller()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getDataProduk()
    {
        $this->db->from('product');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDataVersion_all()
    {
        $this->db->from('tbversion');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDataProduct($idres)
    {
        return $this->db->get_where('product', ['id_res' => $idres])->result();
    }

    public function getDataVersion($idpro)
    {
        return $this->db->get_where('tbversion', ['id_pro' => $idpro])->result();
    }
}