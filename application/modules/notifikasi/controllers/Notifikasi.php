<?php
class Notifikasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        ini_set('date.timezone', 'Asia/Jakarta');
        $this->load->model('Notifikasi_model');
    }
    public function index()
    {
        $data['title'] = 'Notifikasi | SatriaShop';
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();

        $data['notifikasi_admin'] = $this->Notifikasi_model->getnotifikasi_admin()->result_array();
        $data['notifikasi_member'] = $this->Notifikasi_model->getnotifikasi_member()->result_array();
        $data['role'] = $this->db->get_where('user', [
            'role_id' => $this->session->userdata('role_id'),
            'nik' => $this->session->userdata('nik')
        ])->row_array();

        if ($data['role']['role_id'] == 1) {
            $this->load->view('templates/vheader/contentadmin/view_index', $data);
            $this->load->view('templates/vnavbar/navbaradmin/view_index', $data);
            $this->load->view('templates/vleftsidebar/view_index', $data);
            $this->load->view('notifikasi/view_index_admin', $data);
            $this->load->view('templates/vfooter/contentadmin/view_index');
        } elseif ($data['role']['role_id'] == 2) {
            $this->load->view('templates/vheader/contenthome/view_index', $data);
            $this->load->view('templates/vnavbar/navbarmember/view_index', $data);
            $this->load->view('templates/vleftsidebar/view_index', $data);
            $this->load->view('notifikasi/view_index_member', $data);
            $this->load->view('templates/vfooter/contenthome/view_index');
        }
    }
    public function user_notifi()
    {
        $data['role'] = $this->db->get_where('user', [
            'role_id' => $this->session->userdata('role_id'),
            'nik' => $this->session->userdata('nik')
        ])->row_array();

        if ($data['role']['role_id'] == 1) {

            $v = $this->input->post('view');

            echo  $op = $this->Notifikasi_model->fetch_data_admin($v);

            return $op;
        } elseif ($data['role']['role_id'] == 2) {

            $v = $this->input->post('view');

            echo  $op = $this->Notifikasi_model->fetch_data_member($v);

            return $op;
        } elseif ($data['role']['role_id'] == 3) {

            $v = $this->input->post('view');

            echo  $op = $this->Notifikasi_model->fetch_data_keuangan($v);

            return $op;
        }
    }
}
