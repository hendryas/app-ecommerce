<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //jika tidak ada session,lempar ke auth
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('laporan/mlaporan/laporan_model', 'laporanModel');
    }

    public function index()
    {
        $data['title'] = 'Laporan Penjualan | Admin | SatriaShop';
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();

        // var_dump(decrypt_url('Wjk0cFNxaEZIZERzM1ExTmxtMXk4UT09='));
        // die;

        $this->load->view('templates/vheader/contentadmin/view_index', $data);
        $this->load->view('templates/vnavbar/navbaradmin/view_index');
        $this->load->view('templates/vleftsidebar/view_index', $data);
        $this->load->view('laporan/vlaporan/view_index', $data);
        $this->load->view('templates/vfooter/contentadmin/view_index');
    }

    public function lap_harian()
    {
        $data['title'] = 'Laporan Harian Penjualan | Admin | SatriaShop';
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();


        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data['laporan'] = $this->laporanModel->lap_harian($tanggal, $bulan, $tahun)->result_array();

        $data['tanggal'] = $tanggal;
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;

        $this->load->view('templates/vheader/contentadmin/view_index', $data);
        $this->load->view('templates/vnavbar/navbaradmin/view_index');
        $this->load->view('templates/vleftsidebar/view_index', $data);
        $this->load->view('laporan/vlaporanharian/view_index', $data);
        $this->load->view('templates/vfooter/contentadmin/view_index');
    }

    public function lap_bulanan()
    {
        $data['title'] = 'Laporan Bulanan Penjualan | Admin | SatriaShop';
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();

        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data['laporan'] = $this->laporanModel->lap_bulanan($bulan, $tahun)->result_array();

        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;

        $this->load->view('templates/vheader/contentadmin/view_index', $data);
        $this->load->view('templates/vnavbar/navbaradmin/view_index');
        $this->load->view('templates/vleftsidebar/view_index', $data);
        $this->load->view('laporan/vlaporanbulanan/view_index', $data);
        $this->load->view('templates/vfooter/contentadmin/view_index');
    }

    public function lap_tahunan()
    {
        $data['title'] = 'Laporan Tahunan Penjualan | Admin | SatriaShop';
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();

        $tahun = $this->input->post('tahun');

        $data['laporan'] = $this->laporanModel->lap_tahunan($tahun)->result_array();

        $data['tahun'] = $tahun;

        $this->load->view('templates/vheader/contentadmin/view_index', $data);
        $this->load->view('templates/vnavbar/navbaradmin/view_index');
        $this->load->view('templates/vleftsidebar/view_index', $data);
        $this->load->view('laporan/vlaporantahunan/view_index', $data);
        $this->load->view('templates/vfooter/contentadmin/view_index');
    }
}
