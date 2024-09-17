<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //jika tidak ada session,lempar ke auth
        // is_logged_in();
        date_default_timezone_set('Asia/Jakarta');
    }

    // public function index()
    // {
    //     $data['title'] = 'Rekap Pembayaran Pembeli | Admin | SatriaShop';
    //     $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();

    //     $this->load->view('templates/vheader/contentadmin/view_index', $data);
    //     $this->load->view('templates/vnavbar/navbaradmin/view_index', $data);
    //     $this->load->view('templates/vleftsidebar/view_index', $data);
    //     $this->load->view('vrekappembayaranmember/view_index', $data);
    //     $this->load->view('templates/vfooter/contentadmin/view_index');
    // }

    public function profile()
    {
        $data['title'] = 'Profile | Member | SatriaShop';
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();

        $this->load->view('templates/vheader/contenthome/view_index', $data);
        $this->load->view('templates/vnavbar/navbarmember/view_index', $data);
        $this->load->view('templates/vleftsidebar/view_index', $data);
        $this->load->view('vmemberprofile/view_index', $data);
        $this->load->view('templates/vfooter/contenthome/view_index');
    }
}
