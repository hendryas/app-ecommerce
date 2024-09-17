<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //jika tidak ada session,lempar ke auth
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('home/mhome/home_model', 'homeModel');
    }

    public function index()
    {
        $data['title'] = 'SatriaShop | Beli Product Murah Kualitas Terbaik';
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();

        $data['product'] = $this->db->get('barang')->result_array();
        $data['product_pakaian'] = $this->homeModel->getProductPakaian()->result_array();
        // var_dump(decrypt_url('Wjk0cFNxaEZIZERzM1ExTmxtMXk4UT09='));
        // die;
        $this->load->view('templates/vheader/contenthome/view_index', $data);
        $this->load->view('templates/vnavbar/navbarmember/view_index', $data);
        $this->load->view('templates/vleftsidebar/view_index', $data);
        $this->load->view('home/vhome/view_index', $data);
        $this->load->view('templates/vfooter/contenthome/view_index');
    }
}
