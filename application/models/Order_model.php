<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Order_model extends CI_Model
{
    public $table = 'order_record1';
    public $id = 'order_record1.id_ord';
    public function __construct()
    {
        parent::__construct();
    }
    public function get()
    {
        $this->db->select('*');
        $this->db->from('reseller');
        $this->db->join('order_record', 'order_record.id_res = reseller.id');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getById($id)
    {
        $this->db->select('*');
        $this->db->from('order_record1');
        $this->db->join('reseller', 'order_record1.id_res = reseller.id');
        $this->db->join('product', 'order_record1.id_pro = product.id');
        $this->db->join('tbversion', 'order_record1.id_ver = tbversion.id');
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
    public function create($input)
    {
        $this->db->insert('order_record1', $input);
        return $this->db->affected_rows();
    }
    public function getDataOrder()
    {
        $this->db->select('*');
        // $this->db->select('order_record.id_ord id_order, reseller.id_ord id_reseller');
        $this->db->from('order_record1');
        $this->db->join('reseller', 'order_record1.id_res = reseller.id');
        $this->db->join('product', 'order_record1.id_pro = product.id');
        $this->db->join('tbversion', 'order_record1.id_ver = tbversion.id');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getByIdOrderRecord($id)
    {
        return $this->db->get_where('order_record1',['id_ord'=> $id])->row_array();
    }
}