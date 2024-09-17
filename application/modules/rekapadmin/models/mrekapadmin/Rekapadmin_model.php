<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekapadmin_model extends CI_Model
{
    public function pesanan()
    {
        $this->db->select('rekap_pembayaran_pelanggan.*');
        $this->db->from('rekap_pembayaran_pelanggan');
        $this->db->where('status_order', 0);
        $this->db->order_by('tgl_order', 'desc');

        $query = $this->db->get();
        return $query;
    }

    public function pesanan_diproses()
    {
        $this->db->select('rekap_pembayaran_pelanggan.*');
        $this->db->from('rekap_pembayaran_pelanggan');
        $this->db->where('status_order', 1);
        $this->db->order_by('tgl_order', 'desc');

        $query = $this->db->get();
        return $query;
    }

    public function pesanan_dikirim()
    {
        $this->db->select('rekap_pembayaran_pelanggan.*');
        $this->db->from('rekap_pembayaran_pelanggan');
        $this->db->where('status_order', 2);
        $this->db->order_by('tgl_order', 'desc');

        $query = $this->db->get();
        return $query;
    }

    public function pesanan_diterima()
    {
        $this->db->select('rekap_pembayaran_pelanggan.*');
        $this->db->from('rekap_pembayaran_pelanggan');
        $this->db->where('status_order', 3);
        $this->db->order_by('tgl_order', 'desc');

        $query = $this->db->get();
        return $query;
    }

    public function update_order($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('rekap_pembayaran_pelanggan', $data);
    }
}
