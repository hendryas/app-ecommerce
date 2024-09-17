<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Productdetail extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //jika tidak ada session,lempar ke auth
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('mproductdetail/productdetail_model', 'modelPD');
    }

    public function productDetail($id)
    {
        $data['title'] = 'Product Detail | SatriaShop | Beli Product Murah Kualitas Terbaik';
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();
        $id_product = decrypt_url($id);

        $data['productdetail'] = $this->modelPD->dataProductDetail($id_product)->row_array();
        $data['product'] = $this->modelPD->dataProductRandom()->result_array();

        $this->load->view('templates/vheader/contenthome/view_index', $data);
        $this->load->view('templates/vnavbar/navbarmember/view_index', $data);
        $this->load->view('templates/vleftsidebar/view_index', $data);
        $this->load->view('home/vproductdetail/view_index', $data);
        $this->load->view('templates/vfooter/contenthome/view_index');
    }
}
