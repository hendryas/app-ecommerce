<?php

class Home_model extends CI_Model
{
    public function getProductPakaian()
    {
        $this->db->select('barang.*');
        $this->db->from('barang');
        $this->db->where('id_kategori', 5);
        $this->db->order_by('rand()');

        $query = $this->db->get();
        return $query;
    }
}
