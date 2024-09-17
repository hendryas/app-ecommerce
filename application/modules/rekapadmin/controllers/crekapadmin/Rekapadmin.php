<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekapadmin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //jika tidak ada session,lempar ke auth
        // is_logged_in();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('mrekapadmin/Rekapadmin_model', 'rekapadmin');
    }

    public function index()
    {
        $data['title'] = 'Rekap Pembayaran Pembeli | Admin | SatriaShop';
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['belum_bayar'] = $this->rekapadmin->pesanan()->result_array();
        $data['pesanan_diproses'] = $this->rekapadmin->pesanan_diproses()->result_array();
        $data['pesanan_dikirim'] = $this->rekapadmin->pesanan_dikirim()->result_array();
        $data['pesanan_diterima'] = $this->rekapadmin->pesanan_diterima()->result_array();

        $this->load->view('templates/vheader/contentadmin/view_index', $data);
        $this->load->view('templates/vnavbar/navbaradmin/view_index', $data);
        $this->load->view('templates/vleftsidebar/view_index', $data);
        $this->load->view('vrekappembayaranmember/view_index', $data);
        $this->load->view('templates/vfooter/contentadmin/view_index');
    }

    public function proses($id)
    {
        $id = decrypt_url($id);
        $data = [
            'status_order' => 1
        ];
        $this->rekapadmin->update_order($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        Pesanan Berhasil di Proses/Dikemas!.</div>');
        redirect('rekapadmin/crekapadmin/rekapadmin');
    }

    public function kirim($id)
    {
        $id = decrypt_url($id);
        $data = [
            'status_order' => 2,
            'no_resi' => htmlspecialchars($this->input->post('no_resi')),
        ];
        $this->rekapadmin->update_order($data, $id);

        $id_status_pembayaran = '1';
        $status_notif = '0';
        $isi_notifikasi = ' Pesanan berhasil dikirim, silahkan cek nomer resi anda di riwayat pesanan.';
        $this->db->insert('notifikasi_member', [
            'nik' => '',
            'nama' => '',
            'isi_notifikasi' => $isi_notifikasi,
            'status_notif' => $status_notif,
            'id_status_pembayaran' => $id_status_pembayaran,
            'tanggal' => date('Y-m-d H:i:s')
        ]);

        $id_status_pembayaran = '1';
        $status_notif = '0';
        $isi_notifikasi = 'Pesanan Berhasil dikirim';
        $this->db->insert('notifikasi_admin', [
            'nik' => '',
            'nama' => '',
            'isi_notifikasi' => $isi_notifikasi,
            'status_notif' => $status_notif,
            'id_status_pembayaran' => $id_status_pembayaran,
            'tanggal' => date('Y-m-d H:i:s')
        ]);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
       Pesanan Berhasil di Kirim!.</div>');
        redirect('rekapadmin/crekapadmin/rekapadmin');
    }
}
