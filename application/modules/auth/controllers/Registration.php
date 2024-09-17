<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registration extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //jika tidak ada session,lempar ke auth
        // is_logged_in();
        ini_set('date.timezone', 'Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = 'Registration - SatriaShop';
        // $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();

        $this->load->view('templates/vheader/authentication/view_index', $data);
        $this->load->view('vregistration/view_index', $data);
        $this->load->view('templates/vfooter/authentication/view_index');
    }

    public function register()
    {
        //ini untuk menghindari jika kembali ke auth,untuk tiap rolenya nanti di tambahkan jika perlu
        if ($this->session->userdata('nik')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('name', 'Name', 'required|trim', [
            'required' => 'Nama tidak boleh kosong.'
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Alamat tidak boleh kosong.'
        ]);

        $this->form_validation->set_rules('nik', 'NIK', 'required|trim|is_unique[user.nik]', [
            'required' => 'NIK tidak boleh kosong.',
            'is_unique' => 'NIK ini sudah terdaftar.',
        ]);

        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'required' => 'Username tidak boleh kosong.',
            'is_unique' => 'Username ini sudah terdaftar.',
        ]);

        $this->form_validation->set_rules('email', 'Email', 'required|trim', [
            'required' => 'Email tidak boleh kosong.'
        ]);

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [ //bener
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!',
            'required' => 'Password tidak boleh kosong.',
        ]);

        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [ //bener
            'required' => 'Password tidak boleh kosong.',
            'matches' => 'Password tidak sama!',
        ]);

        $this->form_validation->set_rules('nomor_handphone', 'Nomor Handphone', 'required|trim', [
            'required' => 'Nomer Handphone tidak boleh kosong.'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registration - SatriaShop';

            $this->load->view('templates/vheader/authentication/view_index', $data);
            $this->load->view('vregistration/view_index', $data);
            $this->load->view('templates/vfooter/authentication/view_index');
        } else {
            $name = htmlspecialchars($this->input->post('name'));
            $alamat = htmlspecialchars($this->input->post('alamat'));
            $nik = htmlspecialchars($this->input->post('nik'));
            $username = htmlspecialchars($this->input->post('username'));
            $email = htmlspecialchars($this->input->post('email'));
            $password = htmlspecialchars($this->input->post('password1'));
            $nomor_handphone = htmlspecialchars($this->input->post('nomor_handphone'));
            $role_id = 2;
            $is_active = 0;
            $date_created = date('Y-m-d H:i:s');

            $username_encrypt = encrypt_url($username); //enkripsi username
            $email_encrypt = encrypt_url($email); //enkripsi email
            $password_encrypt = encrypt_url($password); //enkripsi password

            $dname = explode(".", $_FILES['image']['name']);
            $ext = end($dname);
            $image = $_FILES['image']['name'] = strtolower('profile' . '_' . $nik . '.' . $ext);

            if ($image) {
                $file_name1 = 'profile' . '_' . $nik;
                $config['allowed_types'] = 'jpg|png';
                $config['max_size']     = '3048';
                $config['upload_path'] = './assets/images/profiles/';
                $config['remove_space'] = TRUE;
                $config['file_name'] = $file_name1;
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $this->upload->data();
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('auth/registration/register');
                }
            }

            $data = [
                'nama'          => $name,
                'nik'           => $nik,
                'alamat'        => $alamat,
                'email'         => $email_encrypt,
                'username'      => $username_encrypt,
                'password'      => $password_encrypt,
                'no_hp'         => $nomor_handphone,
                'image'         => $image,
                'role_id'       => 2,
                'is_active'     => 0,
                'date_created'  => $date_created
            ];

            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email'         => $email_encrypt,
                'token'         => $token,
                'date_created'  => time() //expired token
            ];

            $this->db->insert('user', $data);
            $this->db->insert('user_token', $user_token);

            //Setelah data masuk,Kirim email activasi
            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            <strong>Selamat akun anda sudah di buat!</strong> Silahkan cek email untuk mengaktivasi akunmu.</div>');
            redirect('auth');
        }
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp', //simple mail transfer protocol
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'satriashop072@gmail.com', //nama email pengirim
            'smtp_pass' => 'satria212', //pass email pengirim
            'smtp_port' => 465, //port smtp google
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('satriashop072@gmail.com', 'SatriaShop');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Verifikasi Akun');
            $this->email->message('Klik link untuk verifikasi akun : <a style="display: inline-block; width: 220px; height: 30px; background: #1C3FAA; color: #fff; text-decoration: none; border-radius: 5px; text-align: center; line-height: 30px; font-family: `Segoe UI`, Tahoma, Geneva, Verdana, sans-serif;" href="' . base_url() . 'auth/registration/verify?email=' . encrypt_url($this->input->post('email')) . '&token=' . urlencode($token) . '"> Aktivasi </a>'); // bisa di manpulasi memakai HTML
        } elseif ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Klik link untuk mereset password : <a style="display: inline-block; width: 220px; height: 30px; background: #1C3FAA; color: #fff; text-decoration: none; border-radius: 5px; text-align: center; line-height: 30px; font-family: `Segoe UI`, Tahoma, Geneva, Verdana, sans-serif;" href="' . base_url() . 'auth/registration/resetpassword?email=' . encrypt_url($this->input->post('email')) . '&token=' . urlencode($token) . '"> Reset Password </a>'); // bisa di manpulasi memakai HTML
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        //ambil email dari URL
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        // $user = $this->db->query("EXEC SP_get_email'" . $email . "'")->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            // $user_token = $this->db->query("EXEC SP_get_user_token'" . $token . "'")->row_array();

            if ($user_token) {
                //di beri waktu 1 hari
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">' . decrypt_url($email) . ' berhasil di aktivasi! Silahkan login.</div>');
                    redirect('auth');
                } else {

                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                    <strong>Token expired! </strong> Aktivasi akunmu gagal.</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                <strong>Salah token! </strong> Aktivasi akunmu gagal.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
            <strong>Salah email! </strong> Aktivasi akunmu gagal.</div>');
            redirect('auth');
        }
    }

    public function forgotPassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email tidak boleh kosong.',
            'valid_email' => 'Silahkan tuliskan Alamat Email dengan benar.'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Forgot Password';

            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/forgotpassword/view_forgot_password');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email'         => $email,
                    'token'         => $token,
                    'date_created'  => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
                <strong>Email berhasil dikirim! </strong> Silahkan cek email untuk mereset password.</div>');
                redirect('auth/forgotpassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                <strong>Email belum terdaftar atau teraktivasi! </strong> Silahkan gunakan email yang sudah terdaftar.</div>');
                redirect('auth/forgotpassword');
            }
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->query("EXEC SP_get_email'" . $email . "'")->row_array();
        //$user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                <strong>Reset password gagal! </strong> Wrong token.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
            <strong>Reset password gagal! </strong> Wrong email.</div>');
            redirect('auth');
        }
    }

    public function changePassword()
    {

        //cek jika sessionnya tidak ada reset_email
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]|callback_password_check', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!',
            'required' => 'Password tidak boleh kosong.'
        ]);
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|min_length[8]|matches[password1]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!',
            'required' => 'Password tidak boleh kosong.'
        ]);
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Ubah Password';

            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/forgotpassword/view_change_password');
            $this->load->view('templates/auth_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            //setelah reset,hapus dulu sessionnya
            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            <strong>Password berhasil di ubah! </strong> Silahkan login.</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('nik');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Anda sudah keluar! </strong> Silahkan login untuk melanjutkan kembali.</div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/accessblocked/view_blocked');
    }
}
