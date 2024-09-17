<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //jika tidak ada session,lempar ke auth
        // is_logged_in();
        $this->load->model('madmin/Admin_model', 'adminModel');
    }

    public function index()
    {
        $data['title'] = 'Dashboard | Admin | SatriaShop';
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['barang'] = $this->db->get('barang')->result_array();
        $data['pengguna'] = $this->db->get_where('user', ['role_id' => 2])->result_array();

        $this->load->view('templates/vheader/contentadmin/view_index', $data);
        $this->load->view('templates/vnavbar/navbaradmin/view_index', $data);
        $this->load->view('templates/vleftsidebar/view_index', $data);
        $this->load->view('admin/vdashboard/view_index', $data);
        $this->load->view('templates/vfooter/contentadmin/view_index');
    }

    public function Role()
    {
        $data['title'] = 'Role | Admin | SatriaShop';
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();

        $data['role'] = $this->db->get('role')->result_array();

        $this->form_validation->set_rules('nama_role', 'Nama Role', 'required|trim', [
            'required' => 'Field role tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/vheader/contentadmin/view_index', $data);
            $this->load->view('templates/vnavbar/navbaradmin/view_index', $data);
            $this->load->view('templates/vleftsidebar/view_index', $data);
            $this->load->view('admin/view_role', $data);
            $this->load->view('templates/vfooter/contentadmin/view_index');
        } else {
            $data = [
                'nama_role' => htmlspecialchars($this->input->post('nama_role')),
                'date_created' => date('Y-m-d H:i:s')
            ];
            $this->db->insert('role', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            <strong>Role baru telah ditambahkan!</strong></div>');
            redirect('admin/cadmin/admin/role');
        }
    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access | Admin | SatriaShop';
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();

        $role_id = decrypt_url($role_id);
        // var_dump($role_id);
        // die;

        $data['role'] = $this->db->get_where('role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('menu_level_1')->result_array();

        $this->load->view('templates/vheader/contentadmin/view_index', $data);
        $this->load->view('templates/vnavbar/navbaradmin/view_index', $data);
        $this->load->view('templates/vleftsidebar/view_index', $data);
        $this->load->view('admin/view_roleaccess', $data);
        $this->load->view('templates/vfooter/contentadmin/view_index');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_idd = $this->input->post('roleId');
        $role_id = decrypt_url($role_idd);

        $data = [
            'role_id' => $role_id,
            'id_menu_level_1' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        //yang gak ada,menjadi ada 0 < 1
        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Access telah di ubah!</strong> </div>');
    }

    public function deleteRole($role_id)
    {
        $role_id = decrypt_url($role_id);
        $this->db->where('id', $role_id);
        $this->db->delete('role');

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data role telah dihapus!</strong></div>');
        redirect('admin/cadmin/admin/role');
    }

    public function editRole()
    {
        $id = $this->input->post('id');

        $data = [
            'nama_role' => htmlspecialchars($this->input->post('nama_role'))
        ];
        $this->db->where('id', $id);
        $this->db->update('role', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data role telah diubah!</strong></div>');
        redirect('admin/cadmin/admin/role');
    }

    public function profile()
    {
        $data['title'] = 'Profile | Admin | SatriaShop';
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();

        //Buat rules ketika login
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama tidak boleh kosong',
        ]);

        $this->form_validation->set_rules('email', 'Email', 'required|trim', [
            'required' => 'Email tidak boleh kosong'
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

        $this->form_validation->set_rules('no_hp', 'Nomer Handphone', 'required', [
            'required' => 'Nomer Handphone harus di isi'
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required' => 'Alamat harus di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/vheader/contentadmin/view_index', $data);
            $this->load->view('templates/vnavbar/navbaradmin/view_index', $data);
            $this->load->view('templates/vleftsidebar/view_index', $data);
            $this->load->view('admin/vprofile/view_profile', $data);
            $this->load->view('templates/vfooter/contentadmin/view_index');
        } else {
            $id_user = $this->input->post('id_user');
            $nama = htmlspecialchars($this->input->post('nama'));
            $email = htmlspecialchars($this->input->post('email'));
            $password = htmlspecialchars($this->input->post('password1'));
            $no_hp = htmlspecialchars($this->input->post('no_hp'));
            $alamat = htmlspecialchars($this->input->post('alamat'));

            $email_encrypt = encrypt_url($email); //enkripsi email
            $password_encrypt = encrypt_url($password); //enkripsi password

            $data = [
                'nama'      => $nama,
                'email'     => $email_encrypt,
                'password'  => $password_encrypt,
                'no_hp'     => $no_hp,
                'alamat'    => $alamat
            ];

            $this->db->where('id', $id_user);
            $this->db->update('user', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            <strong>Profile berhasil diperbaharui!</strong> </div>');
            redirect('admin/cadmin/admin/profile');
        }
    }

    public function setting()
    {
        $data['title'] = 'Setting | Admin | SatriaShop';
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['setting'] = $this->adminModel->data_setting();

        $this->form_validation->set_rules('nama_toko', 'Nama Toko', 'required', [
            'required' => 'Nama toko tidak boleh kosong.'
        ]);
        $this->form_validation->set_rules('kota', 'Kota', 'required', [
            'required' => 'Kota tidak boleh kosong.'
        ]);
        $this->form_validation->set_rules('alamat_toko', 'Alamat Toko', 'required', [
            'required' => 'Alamat Toko tidak boleh kosong.'
        ]);
        $this->form_validation->set_rules('no_telepon', 'Nomor Telepon', 'required', [
            'required' => 'Nomor Telepon tidak boleh kosong.'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/vheader/contentadmin/view_index', $data);
            $this->load->view('templates/vnavbar/navbaradmin/view_index', $data);
            $this->load->view('templates/vleftsidebar/view_index', $data);
            $this->load->view('admin/vsetting/view_index', $data);
            $this->load->view('templates/vfooter/contentadmin/view_index');
        } else {
            $data = [
                'nama_toko' => htmlspecialchars($this->input->post('nama_toko')),
                'lokasi' => htmlspecialchars($this->input->post('kota')),
                'alamat_toko' => htmlspecialchars($this->input->post('alamat_toko')),
                'no_telepon' => htmlspecialchars($this->input->post('no_telepon')),
            ];

            $this->db->where('id', 1);
            $this->db->update('setting', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            <strong>Data setting berhasil diperbaharui!</strong> </div>');
            redirect('admin/cadmin/admin/setting');
        }
    }
}
