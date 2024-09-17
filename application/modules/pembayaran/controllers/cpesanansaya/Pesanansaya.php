<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanansaya extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //jika tidak ada session,lempar ke auth
        // is_logged_in();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('pembayaran/mpembayaran/pembayaran_model', 'pembayaranModel');
    }

    public function bayar($id)
    {
        $data['title'] = 'Bayar Pesanan | Member | SatriaShop';
        $id_transaksi = decrypt_url($id);
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['DataPesanan'] = $this->pembayaranModel->detail_pesanan($id_transaksi);
        $data['DataTransferToko'] = $this->pembayaranModel->data_transfer_toko();

        $this->form_validation->set_rules('name', 'Atas Nama Pemilik Rekening', 'required|trim', [
            'required' => 'Atas Nama Pemilik Rekening tidak boleh kosong!',
        ]);
        $this->form_validation->set_rules('nama_bank', 'Nama Bank', 'required|trim', [
            'required' => 'Nama Bank tidak boleh kosong!',
        ]);
        $this->form_validation->set_rules('no_rek', 'Nomor Rekening', 'required|trim', [
            'required' => 'Nomor Rekening Tidak boleh Kosong!',
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/vheader/contenthome/view_index', $data);
            $this->load->view('templates/vnavbar/navbarmember/view_index', $data);
            $this->load->view('templates/vleftsidebar/view_index', $data);
            $this->load->view('vpesanansaya/view_index', $data);
            $this->load->view('templates/vfooter/contenthome/view_index');
        } else {
            $user = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();

            $no_order = htmlspecialchars($this->input->post('no_order', true));
            $name = htmlspecialchars($this->input->post('name', true));
            $nama_bank = htmlspecialchars($this->input->post('nama_bank', true));
            $no_rek = htmlspecialchars($this->input->post('no_rek', true));
            $nik = $this->session->userdata('nik');
            $image = $_FILES['image']['name'];

            $dname = explode(".", $_FILES['image']['name']);
            $ext = end($dname);
            $new_image = $_FILES['image']['name'] = strtolower('bukti_bayar' . '_' . $nik . '_'  . $no_order . '.' . $ext);

            if ($image) {
                $file_name1 = 'bukti_bayar' . '_' . $nik . '_'  . $no_order . '.' . $ext;
                $config['allowed_types'] = 'jpg|png';
                $config['max_size']     = '3048';
                $config['upload_path'] = './assets/images/bukti_bayar/';
                $config['remove_space'] = TRUE;
                $config['file_name'] = $file_name1;
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $this->upload->data();
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('pembayaran/cpesanansaya/pesanansaya/bayar/') . $id;
                }
            }

            $data = [
                'status_pembayaran'  => 1,
                'atas_nama'          => $name,
                'nama_bank'          => $nama_bank,
                'no_rek'             => $no_rek,
                'bukti_bayar'        => $new_image,
            ];

            $this->db->where('id', $id_transaksi);
            $this->db->update('rekap_pembayaran_pelanggan', $data);

            $id_status_pembayaran = '1';
            $status_notif = '0';
            $isi_notifikasi = ' Upload bukti pembayarn berhasil, silahkan menunggu verifikasi pembayaran dari admin.';
            $this->db->insert('notifikasi_member', [
                'nik' => $user['nik'],
                'nama' => $user['nama'],
                'isi_notifikasi' => $isi_notifikasi,
                'status_notif' => $status_notif,
                'id_status_pembayaran' => $id_status_pembayaran,
                'tanggal' => date('Y-m-d H:i:s')
            ]);

            $id_status_pembayaran = '1';
            $status_notif = '0';
            $isi_notifikasi = $user['nama'] . ' Berhasil upload bukti pembayaran, silahkan cek bukti pembayaran pembeli serta melakukan verifikasi pembayaran.';
            $this->db->insert('notifikasi_admin', [
                'nik' => $user['nik'],
                'nama' => $user['nama'],
                'isi_notifikasi' => $isi_notifikasi,
                'status_notif' => $status_notif,
                'id_status_pembayaran' => $id_status_pembayaran,
                'tanggal' => date('Y-m-d H:i:s')
            ]);

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            Bukti Pembayaran Berhasil di Upload!.</div>');
            redirect('pembayaran/crekappembayaran/rekappembayaran');
        }
    }

    public function diTerima($id)
    {
        $id_transaksi = decrypt_url($id);
        $data = [
            'status_order'  => 3,
        ];

        $this->db->where('id', $id_transaksi);
        $this->db->update('rekap_pembayaran_pelanggan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            Bukti Pembayaran Berhasil di Upload!.</div>');
        redirect('pembayaran/crekappembayaran/rekappembayaran');
    }
}
