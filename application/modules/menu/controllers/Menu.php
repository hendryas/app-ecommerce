<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //jika tidak ada session,lempar ke auth
        // is_logged_in();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Menu_model', 'menuModel');
    }

    public function index()
    {
        $data['title'] = 'Menu Management (Level 1) | Admin | SatriaShop';
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('menu_level_1')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required', [
            'required' => 'Field URL menu tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('menu_nama', 'Nama Menu', 'required', [
            'required' => 'Field nama menu tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/vheader/contentadmin/view_index', $data);
            $this->load->view('templates/vnavbar/navbaradmin/view_index', $data);
            $this->load->view('templates/vleftsidebar/view_index', $data);
            $this->load->view('menu/view_index', $data);
            $this->load->view('templates/vfooter/contentadmin/view_index');
        } else {
            $url_menu = htmlspecialchars($this->input->post('menu'));
            $nama_menu = htmlspecialchars($this->input->post('menu_nama'));
            $icon = htmlspecialchars($this->input->post('icon'));
            $data = [
                'url'           => $url_menu,
                'title'         => $nama_menu,
                'icon'          => $icon,
                'date_created'  => date('Y-m-d H:i:s')
            ];

            $this->db->insert('menu_level_1', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            <strong>Menu baru telah ditambahkan!</strong></div>');
            redirect('menu');
        }
    }

    public function menuLevel3()
    {
        $data['title'] = 'Menu Management (Level 3) | Admin | SatriaShop';
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();

        $data['menuleveltiga'] = $this->menuModel->dataMenuLevelTiga()->result_array();
        $data['menuleveldua'] = $this->db->get('menu_level_2')->result_array();

        // var_dump($data['subMenu']);
        // die;

        $this->form_validation->set_rules('title', 'Title', 'required', [
            'required' => 'Field title submenu tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('id_menu_level_2', 'Menu Level 2', 'required', [
            'required' => 'Field menu level 2 tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('url', 'URL', 'required', [
            'required' => 'Field url submenu tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('icon', 'Menu', 'required', [
            'required' => 'Field icon submenu tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/vheader/contentadmin/view_index', $data);
            $this->load->view('templates/vnavbar/navbaradmin/view_index', $data);
            $this->load->view('templates/vleftsidebar/view_index', $data);
            $this->load->view('menu/view_menuleveltiga', $data);
            $this->load->view('templates/vfooter/contentadmin/view_index');
        } else {
            $data = [
                'id_menu_level_2' => htmlspecialchars($this->input->post('id_menu_level_2')),
                'url' => htmlspecialchars($this->input->post('url')),
                'title' => htmlspecialchars($this->input->post('title')),
                'icon' => htmlspecialchars($this->input->post('icon')),
                'is_active' => htmlspecialchars($this->input->post('is_active')),
                'date_created' => date('Y-m-d H:i:s')
            ];
            // var_dump($data);
            // die;
            $this->db->insert('menu_level_3', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            <strong>Menu level 3 baru telah ditambahkan!</strong></div>');
            redirect('menu/menulevel3');
        }
    }

    public function deleteMenu($menu_id)
    {
        $new_menu_id = decrypt_url($menu_id);
        $this->menuModel->deleteDataMenu($new_menu_id);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data menu telah dihapus!</strong></div>');
        redirect('menu');
    }

    public function editMenu()
    {
        $menu_id = $this->input->post('id');
        $new_id = decrypt_url($menu_id);

        $url_menu = htmlspecialchars($this->input->post('menu_edit'));
        $nama_menu = htmlspecialchars($this->input->post('menu_nama_edit'));
        $icon = htmlspecialchars($this->input->post('icon'));
        $data = [
            'url' => $url_menu,
            'title' => $nama_menu,
            'icon' => $icon,
            'date_created' => date('Y-m-d H:i:s')
        ];

        $this->db->where('id', $new_id);
        $this->db->update('menu_level_1', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data menu telah diubah!</strong></div>');
        redirect('menu');
    }

    public function deleteMenuLevelTiga($menu_id)
    {
        $new_menu_id = decrypt_url($menu_id);
        $this->db->where('id', $new_menu_id);
        $this->db->delete('menu_level_3');

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data menu level 3 telah dihapus!</strong></div>');
        redirect('menu/menulevel3');
    }

    public function editMenuLevelTiga()
    {
        $id = $this->input->post('id');
        $id_menu_level_2 = $this->input->post('id_menu_level_2');

        $data = [
            'title' => htmlspecialchars($this->input->post('title')),
            'id_menu_level_2' => $id_menu_level_2,
            'url' => htmlspecialchars($this->input->post('url')),
            'icon' => htmlspecialchars($this->input->post('icon')),
            'is_active' => htmlspecialchars($this->input->post('is_active')),
            'date_created' => date('Y-m-d H:i:s')
        ];


        $this->db->where('id', $id);
        $this->db->update('menu_level_3', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data Menu level 3 telah diubah!</strong></div>');
        redirect('menu/menulevel3');
    }

    //==== HAS SUB MENU ====//
    public function menuLevel2()
    {
        $data['title'] = 'Menu Management (Level 2) | Admin | SatriaShop';
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();

        $data['menuleveldua'] = $this->menuModel->getHasSubMenu()->result_array();
        $data['menu'] = $this->db->get('menu_level_1')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required', [
            'required' => 'Field title submenu level 2 tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('menu_id', 'Menu', 'required', [
            'required' => 'Field menu submenu level 2 tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('url', 'URL', 'required', [
            'required' => 'Field url submenu level 2 tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('icon', 'Menu', 'required', [
            'required' => 'Field icon submenu level 2 tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('status_sub', 'Status Level Submenu', 'required', [
            'required' => 'Field Status Submenu Level 2 tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/vheader/contentadmin/view_index', $data);
            $this->load->view('templates/vnavbar/navbaradmin/view_index', $data);
            $this->load->view('templates/vleftsidebar/view_index', $data);
            $this->load->view('menu/view_menuleveldua', $data);
            $this->load->view('templates/vfooter/contentadmin/view_index');
        } else {
            $data = [
                'id_menu_level_1' => htmlspecialchars($this->input->post('menu_id')),
                'url' => htmlspecialchars($this->input->post('url')),
                'title' => htmlspecialchars($this->input->post('title')),
                'icon' => htmlspecialchars($this->input->post('icon')),
                'is_active' => htmlspecialchars($this->input->post('is_active')),
                'status_sub' => htmlspecialchars($this->input->post('status_sub')),
                'date_created' => date('Y-m-d H:i:s')
            ];

            $this->db->insert('menu_level_2', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            <strong>Menu Level 2 baru telah ditambahkan!</strong></div>');
            redirect('menu/menulevel2');
        }
    }

    public function editMenuLevel2()
    {
        $id = $this->input->post('id');
        $id_menu_level_1 = $this->input->post('id_menu_level_1');

        $data = [
            'id_menu_level_1' => $id_menu_level_1,
            'url' => htmlspecialchars($this->input->post('url')),
            'title' => htmlspecialchars($this->input->post('title')),
            'icon' => htmlspecialchars($this->input->post('icon')),
            'is_active' => htmlspecialchars($this->input->post('is_active')),
            'status_sub' => htmlspecialchars($this->input->post('status_sub')),
            'date_created' => date('Y-m-d H:i:s')
        ];

        $this->db->where('id', $id);
        $this->db->update('menu_level_2', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data Menu level 2 telah diubah!</strong></div>');
        redirect('menu/menulevel2');
    }

    public function deletemenuleveldua($id_menu_level_2)
    {
        $this->menuModel->deleteDataMenuLevelDua($id_menu_level_2);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data Menu level 2 telah dihapus!</strong></div>');
        redirect('menu/menulevel2');
    }
}
