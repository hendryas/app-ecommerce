<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekappembayaran extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //jika tidak ada session,lempar ke auth
        // is_logged_in();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('pembayaran/mpembayaran/pembayaran_model', 'pembayaranModel');
    }

    public function index()
    {
        $data['title'] = 'Riwayat Pemesanan | Member | SatriaShop';
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['belum_bayar'] = $this->pembayaranModel->belum_bayar($data['user']['id'])->result_array();
        $data['diproses'] = $this->pembayaranModel->diproses($data['user']['id'])->result_array();
        $data['dikirim'] = $this->pembayaranModel->dikirim($data['user']['id'])->result_array();
        $data['diterima'] = $this->pembayaranModel->diterima($data['user']['id'])->result_array();

        $this->load->view('templates/vheader/contenthome/view_index', $data);
        $this->load->view('templates/vnavbar/navbarmember/view_index', $data);
        $this->load->view('templates/vleftsidebar/view_index', $data);
        $this->load->view('vrekappembayaranmember/view_index', $data);
        $this->load->view('templates/vfooter/contenthome/view_index');
    }
}
