<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{
    public function lap_harian($tanggal, $bulan, $tahun)
    {
        $this->db->select('rekap_pembayaran_pelanggan.*');
        $this->db->select('tbl_rinci_transaksi.qty');
        $this->db->select('barang.*');
        $this->db->from('rekap_pembayaran_pelanggan');
        $this->db->where('DAY(rekap_pembayaran_pelanggan.tgl_order)', $tanggal);
        $this->db->where('MONTH(rekap_pembayaran_pelanggan.tgl_order)', $bulan);
        $this->db->where('YEAR(rekap_pembayaran_pelanggan.tgl_order)', $tahun);
        $this->db->where('rekap_pembayaran_pelanggan.status_pembayaran', 1);
        $this->db->join('tbl_rinci_transaksi', 'tbl_rinci_transaksi.no_order = rekap_pembayaran_pelanggan.no_order');
        $this->db->join('barang', 'barang.id = tbl_rinci_transaksi.id_barang');


        $query = $this->db->get();
        return $query;
    }

    public function lap_bulanan($bulan, $tahun)
    {
        $this->db->select('rekap_pembayaran_pelanggan.*');
        $this->db->select('tbl_rinci_transaksi.qty');
        $this->db->select('barang.*');
        $this->db->from('rekap_pembayaran_pelanggan');
        $this->db->where('MONTH(rekap_pembayaran_pelanggan.tgl_order)', $bulan);
        $this->db->where('YEAR(rekap_pembayaran_pelanggan.tgl_order)', $tahun);
        $this->db->where('rekap_pembayaran_pelanggan.status_pembayaran', 1);
        $this->db->join('tbl_rinci_transaksi', 'tbl_rinci_transaksi.no_order = rekap_pembayaran_pelanggan.no_order');
        $this->db->join('barang', 'barang.id = tbl_rinci_transaksi.id_barang');


        $query = $this->db->get();
        return $query;
    }

    public function lap_tahunan($tahun)
    {
        $this->db->select('rekap_pembayaran_pelanggan.*');
        $this->db->select('tbl_rinci_transaksi.qty');
        $this->db->select('barang.*');
        $this->db->from('rekap_pembayaran_pelanggan');
        $this->db->where('YEAR(rekap_pembayaran_pelanggan.tgl_order)', $tahun);
        $this->db->where('rekap_pembayaran_pelanggan.status_pembayaran', 1);
        $this->db->join('tbl_rinci_transaksi', 'tbl_rinci_transaksi.no_order = rekap_pembayaran_pelanggan.no_order');
        $this->db->join('barang', 'barang.id = tbl_rinci_transaksi.id_barang');


        $query = $this->db->get();
        return $query;
    }
}
