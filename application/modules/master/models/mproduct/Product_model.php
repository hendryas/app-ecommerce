<?php
class Product_model extends CI_Model
{
    public function dataProduct()
    {
        $this->db->select('barang.*');
        $this->db->select('color.warna warna2');
        $this->db->from('barang');
        $this->db->join('color', 'color.id = barang.warna');
        $query = $this->db->get();
        return $query;
    }
}
