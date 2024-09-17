<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Recovery_password extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Recovery Password - SatriaShop';
        // $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();

        $this->load->view('templates/vheader/authentication/view_index', $data);
        $this->load->view('vrecoverypassword/view_index', $data);
        $this->load->view('templates/vfooter/authentication/view_index');
    }
}
