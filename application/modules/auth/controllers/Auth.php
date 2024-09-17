<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    //Method default yang selalu dijalankan ketika mengakses controller Auth
    public function __construct()
    {
        parent::__construct();
        ini_set('date.timezone', 'Asia/Jakarta');
    }

    public function index()
    {
        $username = $this->session->userdata('username');
        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        //ini untuk menghindari jika kembali ke auth,untuk tiap rolenya nanti di tambahkan jika perlu
        // var_dump($this->session->userdata('nik'));
        // die;

        if ($this->session->userdata('username')) {
            if ($user['role_id'] == 1) {
                redirect('admin/cadmin/admin');
            } elseif ($user['role_id'] == 2) {
                redirect('home/chome/home');
            } elseif ($user['role_id'] == 3) {
                redirect('keuangan/ckeuangan/keuangan');
            }
        }

        //Buat rules ketika login
        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Username tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('captcha', 'Kode Captcha', 'required', [
            'required' => 'Kode captcha harus di isi'
        ]);

        if ($this->form_validation->run() == false) {
            // === CAPTCHA CI ===
            $word = array_merge(range('0', '9'), range('A', 'Z'));
            $acak = shuffle($word);
            $str  = substr(implode($word), 0, 5);

            // Menyimpan huruf acak tersebut kedalam session
            $data_ses = array('captcha_str' => $str);
            $this->session->set_userdata($data_ses);

            $view['captcha_img'] = $str;

            $data['title'] = 'Login - SatriaShop';
            $view['error'] = '';

            // === END CAPTCHA CI ===

            $this->load->view('templates/vheader/authentication/view_index', $data);
            $this->load->view('vlogin/view_index', $view);
            $this->load->view('templates/vfooter/authentication/view_index');
        } else {
            //Ketika validasi success
            $this->_login();
        }
    }

    //Method _login
    private function _login()
    {
        $username = $this->input->post('username');
        $encrypt_username = encrypt_url($username);
        $password = $this->input->post('password');
        $encrypt_password = encrypt_url($password);
        //dari sini $user datanya di dapatkan semuanya
        // $user = $this->db->query("EXEC Sp_Get_User_by_NIK'" . $nik . "'")->row_array(); //SP
        $user = $this->db->get_where('user', ['username' => $encrypt_username])->row_array(); //dapet 1 baris,atau kita dapat 1 baris data dari nik ini
        $user_password = $user['password']; //cek password di database

        // Jika usernya ada
        if ($user) {
            //jika usernya aktif
            if ($user['is_active'] == 1) {
                // cek password
                if ($user_password == $encrypt_password) {
                    // jika kode captha nya benar
                    if ($this->input->post('captcha') == $this->session->userdata('captcha_str')) {
                        // jika data benar
                        $data = [
                            'id' => $user['id'], // ketambah id
                            'username' => $user['username'],
                            'nik' => $user['nik'],
                            'role_id' => $user['role_id']
                        ];
                        $this->session->set_userdata($data);
                        if ($user['role_id'] == 1) {
                            redirect('admin/cadmin/admin');
                        } elseif ($user['role_id'] == 2) {
                            redirect('home/chome/home');
                        } elseif ($user['role_id'] == 3) {
                            redirect('keuangan');
                        }
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                        <strong>Kode captha salah!</strong> Silahkan coba lagi.</div>');
                        redirect('auth');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                    <strong>Password salah!</strong> Silahkan coba lagi.</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                <strong>Akun ini belum di aktivasi!</strong> Silahkan cek email anda untuk mengaktivasi Akun anda.</div>');
                redirect('auth');
            }
        } else {
            // Jika usernya gak ada
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
            <strong>Akun belum terdaftar!</strong> Silahkan registrasi terlebih dahulu.</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Anda sudah keluar! </strong> Silahkan login untuk melanjutkan kembali.</div>');
        redirect('auth');
    }

    public function logoutmember()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Anda sudah keluar! </strong> Silahkan login untuk melanjutkan kembali.</div>');
        redirect('home/chome/home');
    }

    public function blocked()
    {
        $data['title'] = 'Halaman Tidak Dapat di Akses | SatriaShop';

        $this->load->view('templates/vheader/authentication/view_index', $data);
        $this->load->view('vblock/view_index');
        $this->load->view('templates/vfooter/authentication/view_index');
    }
}
