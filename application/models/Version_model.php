<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Version_model extends CI_Model
{
    public $table = 'tbversion';
    public $id = 'tbversion.id';
    public function __construct()
    {
        parent::__construct();
    }
    public function get()
    {
        $this->db->from('tbversion');
        $query = $this->db->get();
        return $query->result_array();
    }
    // public function getById($id)
    // {
    //     $this->db->select('m.*,u.nama as product');
    //     $this->db->from('product m');
    //     $this->db->join('product u', 'm.id = u.id');
    //     $this->db->where('m.id',$id);
    //     $query = $this->db->get();
    //     return $query->row_array();
    // }
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
    public function getData()
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->join('tbversion', 'tbversion.id_pro = product.id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDataRes()
    {
        $this->db->select('*');
        $this->db->from('reseller');
        $this->db->join('product', 'product.id_res = reseller.id');
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
    public function getDataProduct()
    {
        $this->db->from('product');
        $query = $this->db->get();
        return $query->result_array();
    }
}