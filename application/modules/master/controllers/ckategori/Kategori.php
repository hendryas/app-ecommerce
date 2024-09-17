<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    //Method default yang selalu dijalankan ketika mengakses controller Auth
    public function __construct()
    {
        parent::__construct();
        ini_set('date.timezone', 'Asia/Jakarta');
        // is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Insert Kategori Product | Admin | SatriaShop';
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();

        $data['kategori'] = $this->db->get('kategori')->result_array();

        $this->load->view('templates/vheader/contentadmin/view_index', $data);
        $this->load->view('templates/vnavbar/navbaradmin/view_index');
        $this->load->view('templates/vleftsidebar/view_index', $data);
        $this->load->view('master/vkategori/view_index', $data);
        $this->load->view('templates/vfooter/contentadmin/view_index');
    }

    public function tambahkategori()
    {
        $nama_kategori = htmlspecialchars($this->input->post('nama_kategori'));
        $date_created = date('Y-m-d H:i:s');

        $data = [
            'kategori' => $nama_kategori,
            'date_created'  => $date_created
        ];

        $this->db->insert('kategori', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Kategori sudah di tambahkan!</strong></div>');
        redirect('master/ckategori/kategori');
    }

    public function editkategori()
    {
        $id = $this->input->post('id');
        $nama_kategori = htmlspecialchars($this->input->post('nama_kategori'));
        $date_created = date('Y-m-d H:i:s');

        $data = [
            'kategori' => $nama_kategori,
            'date_created'  => $date_created
        ];

        $this->db->where('id', $id);
        $this->db->update('kategori', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Kategori berhasil di edit!</strong></div>');
        redirect('master/ckategori/kategori');
    }

    public function deletekategori($id_kategori)
    {
        $id = decrypt_url($id_kategori);
        $this->db->where('id', $id);
        $this->db->delete('kategori');
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Kategori berhasil di hapus!</strong></div>');
        redirect('master/ckategori/kategori');
    }
}
