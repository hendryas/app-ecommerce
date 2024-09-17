<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //jika tidak ada session,lempar ke auth
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('home/mcart/Cart_model', 'cartModel');
    }

    public function index()
    {
        $data['title'] = 'Keranjang Belanja | SatriaShop';
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();

        if (empty($this->cart->contents())) {
            redirect('home/chome/home');
        }

        $data['product'] = $this->db->get('barang')->result_array();
        $this->load->view('templates/vheader/contenthome/view_index', $data);
        $this->load->view('templates/vnavbar/navbarmember/view_index', $data);
        $this->load->view('templates/vleftsidebar/view_index', $data);
        $this->load->view('home/vcart/view_index', $data);
        $this->load->view('templates/vfooter/contenthome/view_index');
    }

    public function add()
    {
        $redirect_page = $this->input->post('redirect_page');
        $data = array(
            'id'      => $this->input->post('id'),
            'qty'     => $this->input->post('qty'),
            'price'   => $this->input->post('price'),
            'name'    => $this->input->post('name'),
            'options' => array('Size' => 'L', 'Color' => 'Red')
        );

        $this->cart->insert($data);
        redirect($redirect_page, 'refresh');
    }

    public function deletebarangcart($rowid)
    {
        $this->cart->remove($rowid);
        redirect('home/ccart/cart');
    }

    public function updatebarangcart()
    {
        $i = 1;
        foreach ($this->cart->contents() as $items) {
            $data = array(
                'rowid' => $items['rowid'],
                'qty'   => $this->input->post($i . '[qty]')
            );
            $this->cart->update($data);
            $i++;
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Barang sudah di update!</strong></div>');
        redirect('home/ccart/cart');
    }

    public function clearBarangCart()
    {
        $this->cart->destroy();
        redirect('home/ccart/cart');
    }

    public function checkout()
    {
        $data['title'] = 'Checkout | SatriaShop';
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();

        // if ($this->session->userdata('role_id') == NULL) {
        //     redirect('auth');
        // } else {
        $this->load->view('templates/vheader/contenthome/view_index', $data);
        $this->load->view('templates/vnavbar/navbarmember/view_index', $data);
        $this->load->view('templates/vleftsidebar/view_index', $data);
        $this->load->view('home/vcheckout/view_index', $data);
        $this->load->view('templates/vfooter/contenthome/view_index');
        // }
    }

    public function ekspedisi()
    {
        echo '<option value="jne">JNE</option>';
        echo '<option value="tiki">TIKI</option>';
        echo '<option value="pos">POS Indonesia</option>';
    }

    public function proses_checkout()
    {
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim', [
            'required' => 'Provinsi tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('kota', 'Kota', 'required|trim', [
            'required' => 'Kota tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('ekspedisi', 'Ekspedisi', 'required|trim', [
            'required' => 'Ekspedisi tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('paket', 'Paket', 'required|trim', [
            'required' => 'Paket tidak boleh kosong',
        ]);

        if ($this->form_validation->run() == false) {
            redirect('home/ccart/cart/checkout');
        } else {
            $user = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();
            $data = [
                'id_user' => $user['id'],
                'no_order' => $this->input->post('no_order'),
                'tgl_order' => date('Y-m-d H:i:s'),
                'nama_penerima' => $this->input->post('nama'),
                'provinsi' => $this->input->post('provinsi'),
                'kota' => $this->input->post('kota'),
                'alamat_penerima' => $this->input->post('alamat_penerima'),
                'kode_pos' => $this->input->post('kode_pos'),
                'ekspedisi' => $this->input->post('ekspedisi'),
                'paket' => $this->input->post('paket'),
                'estimasi' => $this->input->post('estimasi'),
                'ongkir' => $this->input->post('ongkir'),
                'berat' => $this->input->post('berat'),
                'grand_total' => $this->input->post('grand_total'),
                'total_bayar' => $this->input->post('total_bayar'),
                'hp_penerima' => $this->input->post('hp_penerima'),
                'status_pembayaran' => 0,
                'status_order' => 0,
                'date_created' => date('Y-m-d H:i:s'),
            ];
            $this->cartModel->simpan_transaksi($data);

            //simpak ke tbl rinci transaksi
            $i = 1;
            foreach ($this->cart->contents() as $items) {
                $data_rinci = array(
                    'no_order' => $this->input->post('no_order'),
                    'id_barang' => $items['id'],
                    'qty' => $this->input->post('qty' . $i++),
                );
                $this->cartModel->simpan_rinci_transaksi($data_rinci);
            }
            $id_status_pembayaran = '0';
            $status_notif = '0';
            $isi_notifikasi = ' Pesanan anda sedang di proses, silahkan untuk melakukan pembayaran melalui transfer bank yang sudah kami sediakan.';
            $this->db->insert('notifikasi_member', [
                'nik' => $user['nik'],
                'nama' => $user['nama'],
                'isi_notifikasi' => $isi_notifikasi,
                'status_notif' => $status_notif,
                'id_status_pembayaran' => $id_status_pembayaran,
                'tanggal' => date('Y-m-d H:i:s')
            ]);

            $id_status_pembayaran = '0';
            $status_notif = '0';
            $isi_notifikasi = $user['nama'] . ' Melakukan order barang, untuk melihat bukti pembayaran pembeli silahkan pergi ke rekap admin -> pembayaran pembeli';
            $this->db->insert('notifikasi_admin', [
                'nik' => $user['nik'],
                'nama' => $user['nama'],
                'isi_notifikasi' => $isi_notifikasi,
                'status_notif' => $status_notif,
                'id_status_pembayaran' => $id_status_pembayaran,
                'tanggal' => date('Y-m-d H:i:s')
            ]);

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            <strong>Pesanan sudah di tambahkan!</strong></div>');
            $this->cart->destroy();
            redirect('pembayaran/crekappembayaran/rekappembayaran');
        }
    }
}
