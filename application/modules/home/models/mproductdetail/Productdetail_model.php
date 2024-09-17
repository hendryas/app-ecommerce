<?php

class Productdetail_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function dataProductRandom()
    {
        $this->db->select('barang.*');
        $this->db->from('barang');
        $this->db->order_by('rand()');
        // $this->db->limit(1);
        $query = $this->db->get();
        return $query;
    }

    public function dataProductDetail($id)
    {
        $this->db->select('barang.*');
        $this->db->select('color.warna warna2');
        $this->db->where('barang.id', $id);
        $this->db->from('barang');
        $this->db->join('color', 'color.id = barang.warna');

        $query = $this->db->get();
        return $query;
    }
}
