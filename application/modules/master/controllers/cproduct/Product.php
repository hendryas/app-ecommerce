<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    //Method default yang selalu dijalankan ketika mengakses controller Auth
    public function __construct()
    {
        parent::__construct();
        ini_set('date.timezone', 'Asia/Jakarta');
        $this->load->model('master/mproduct/product_model', 'modelProduct');
        // is_logged_in();
    }


    public function index()
    {
        $data['title'] = 'Insert Product | Admin | SatriaShop';
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();

        $data['color'] = $this->db->get('color')->result_array();
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['product'] = $this->modelProduct->dataProduct()->result_array();

        $this->load->view('templates/vheader/contentadmin/view_index', $data);
        $this->load->view('templates/vnavbar/navbaradmin/view_index');
        $this->load->view('templates/vleftsidebar/view_index', $data);
        $this->load->view('master/vproduct/view_index', $data);
        $this->load->view('templates/vfooter/contentadmin/view_index');
    }

    public function tambahProduct()
    {
        $id_kategori = $this->input->post('id_kategori');
        $nama_barang = htmlspecialchars($this->input->post('nama_barang'));
        $harga = htmlspecialchars($this->input->post('harga'));
        $berat = htmlspecialchars($this->input->post('berat'));
        $diskon_harga = htmlspecialchars($this->input->post('diskon_harga'));
        $deskripsi_barang = htmlspecialchars($this->input->post('deskripsi_barang'));
        $ukuran = $this->input->post('ukuran');
        $warna = $this->input->post('warna');
        $tipe = htmlspecialchars($this->input->post('tipe'));
        $stok = htmlspecialchars($this->input->post('stok'));
        $kode_product = random_string('alnum', 10);
        $image = $_FILES['image']['name'];
        $date_created = date('Y-m-d H:i:s');

        $dname = explode(".", $_FILES['image']['name']);
        $ext = end($dname);
        $new_image = $_FILES['image']['name'] = strtolower('product' . '_' . $kode_product  . '.' . $ext);

        if ($image) {
            $file_name1 = 'product' . '_' . $kode_product;
            $config1['upload_path']          = './assets/images/product_barang/';
            // $config1['allowed_types']        = 'doc|docx|pdf';
            $config1['allowed_types']        = 'jpg|png|jpeg';
            $config1['max_size']             = 3023;
            $config1['remove_space']         = TRUE;
            $config1['file_name']            = $file_name1;

            $this->load->library('upload', $config1);

            if ($this->upload->do_upload('image')) {
                $this->upload->data();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                redirect('master/cproduct/product');
            }
        }

        $data = [
            'id_kategori' => $id_kategori,
            'kode_product' => $kode_product,
            'nama_barang' => $nama_barang,
            'harga' => $harga,
            'berat' => $berat,
            'diskon_harga' => $diskon_harga,
            'deskripsi' => $deskripsi_barang,
            'ukuran' => $ukuran,
            'tipe' => $tipe,
            'warna' => $warna,
            'stok' => $stok,
            'image' => $new_image,
            'date_created' => $date_created
        ];

        $this->db->insert('barang', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Product sudah di tambahkan!</strong></div>');
        redirect('master/cproduct/product');
    }

    public function editProduct()
    {
        $id_barang = $this->input->post('id');
        $id_kategori = $this->input->post('id_kategori');
        $nama_barang = htmlspecialchars($this->input->post('nama_barang'));
        $harga = htmlspecialchars($this->input->post('harga'));
        $berat = htmlspecialchars($this->input->post('berat'));
        $diskon_harga = htmlspecialchars($this->input->post('diskon_harga'));
        $deskripsi_barang = htmlspecialchars($this->input->post('deskripsi_barang'));
        $ukuran = $this->input->post('ukuran');
        $warna = $this->input->post('warna');
        $tipe = htmlspecialchars($this->input->post('tipe'));
        $stok = htmlspecialchars($this->input->post('stok'));
        $kode_product = $this->input->post('kode_product');
        $image = $_FILES['image']['name'];
        $date_created = date('Y-m-d H:i:s');

        if ($image == NULL) {
            $product = $this->db->get_where('barang', ['id' => $id_barang])->row_array();
            $new_image = $product['image'];
        } else {
            $dname = explode(".", $_FILES['image']['name']);
            $ext = end($dname);
            $new_image = $_FILES['image']['name'] = strtolower('product' . '_' . $kode_product  . '.' . $ext);
        }

        if ($image) {
            $file_name1 = 'product' . '_' . $kode_product;
            $config1['upload_path']          = './assets/images/product_barang/';
            // $config1['allowed_types']        = 'doc|docx|pdf';
            $config1['allowed_types']        = 'jpg|png|jpeg';
            $config1['max_size']             = 3023;
            $config1['remove_space']         = TRUE;
            $config1['file_name']            = $file_name1;

            $this->load->library('upload', $config1);

            if ($this->upload->do_upload('image')) {
                $this->upload->data();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                redirect('master/cproduct/product');
            }
        }

        $data = [
            'id_kategori' => $id_kategori,
            'kode_product' => $kode_product,
            'nama_barang' => $nama_barang,
            'harga' => $harga,
            'berat' => $berat,
            'diskon_harga' => $diskon_harga,
            'deskripsi' => $deskripsi_barang,
            'ukuran' => $ukuran,
            'tipe' => $tipe,
            'warna' => $warna,
            'stok' => $stok,
            'image' => $new_image,
            'date_created' => $date_created
        ];
        $this->db->where('id', $id_barang);
        $this->db->update('barang', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Product berhasil di rubah!</strong></div>');
        redirect('master/cproduct/product');
    }

    public function deleteProduct($id)
    {
        $id_barang = decrypt_url($id);
        $this->db->where('id', $id_barang);
        $this->db->delete('barang');
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Product sudah di hapus!</strong></div>');
        redirect('master/cproduct/product');
    }
}
