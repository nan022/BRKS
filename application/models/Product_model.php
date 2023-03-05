<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{
    public $table = 'product';
    public $id = 'product.id';
    public function __construct()
    {
        parent::__construct();
    }
    public function get()
    {
        // $this->db->select('*');
        // $this->db->from('reseller');
        // $this->db->join('product', 'product.id_res = reseller.id');
        // $query = $this->db->get();
        // return $query->result_array();
        $this->db->from('product');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getById($id)
    {
        $this->db->select('m.*,u.nama as reseller');
        $this->db->from('product m');
        $this->db->join('reseller u', 'm.id_res = u.id');
        $this->db->where('m.id',$id);
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
    public function getData()
    {
        $this->db->select('product.*, reseller.nama');
        $this->db->from('product');
        $this->db->join('reseller', 'product.id_res = reseller.id');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_by_id($id)
    {
        $this->db->from($this->table);;
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function getDataReseller()
    {
        $this->db->from('reseller');
        $query = $this->db->get();
        return $query->result_array();
    }
}