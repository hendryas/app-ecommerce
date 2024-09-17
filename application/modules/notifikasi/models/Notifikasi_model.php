<?php

class Notifikasi_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function fetch_data_admin($v)
    {

        if ($v != '') {
            $this->db->set('status_notif', '1');
            $this->db->where('status_notif', '0');
            $this->db->update('notifikasi_admin');
            echo '0';
        }


        $this->db->limit(5);
        $this->db->from("notifikasi_admin");
        $this->db->join('status_pembayaran', 'status_pembayaran.id = notifikasi_admin.id_status_pembayaran');
        $this->db->join('user', 'user.nik = notifikasi_admin.nik');
        $this->db->order_by("notifikasi_admin.id", "DESC");
        $result = $this->db->get();
        $output = '';
        $config['base_url'] = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
        $config['base_url'] .= "://" . $_SERVER['HTTP_HOST'];
        $config['base_url'] .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

        if ($result->num_rows() > 0) {

            foreach ($result->result() as $row) {

                //var_dump($row);
                $output .= '<a href="' . $config['base_url'] . 'notifikasi" class="dropdown-item notify-item">
                <div class="notify-icon bg-primary"><i class="mdi mdi-message"></i></div>
                <p class="notify-details">' . $row->isi_notifikasi . '</span></p>
                <p class="text-muted text-right">' . date('H:i', strtotime($row->tanggal)) . ' ' . date('d/m/Y', strtotime($row->tanggal)) . '</p></a>';
            }
        } else {
            $output .= ' <a href="javascript:void(0);" class="dropdown-item notify-item">
            <div class="notify-icon bg-primary"><i class="mdi mdi-message"></i></div>
            <p class="notify-details"><span class="text-muted">Tidak ada notifikasi</span></p>
        </a>';
            //                    
        }


        $this->db->select();
        $this->db->from("notifikasi_admin");
        $this->db->where("status_notif", "0");
        $result1 = $this->db->get();
        $count = $result1->num_rows();

        $data = array('notification' => $output, 'unseen_notification' => $count);

        return json_encode($data);
    }

    public function fetch_data_member($v)
    {
        $where = array('nik' => $this->session->userdata('nik'), 'status_notif' => '0');
        if ($v != '') {
            $this->db->set('status_notif', '1');
            $this->db->where($where);
            $this->db->update('notifikasi_member');

            echo '0';
        }


        $this->db->limit(5);
        $this->db->from("notifikasi_member");
        $this->db->join('status_pembayaran', 'status_pembayaran.id = notifikasi_member.id_status_pembayaran');
        $this->db->where(['nik' => $this->session->userdata('nik')]);
        $this->db->order_by("notifikasi_member.id", "DESC");
        $result = $this->db->get();
        $output = '';
        $config['base_url'] = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
        $config['base_url'] .= "://" . $_SERVER['HTTP_HOST'];
        $config['base_url'] .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);


        if ($result->num_rows() > 0) {

            foreach ($result->result() as $row) {

                //var_dump($row);
                $output .= '<a href="' . $config['base_url'] . 'notifikasi" class="dropdown-item notify-item">
                <div class="notify-icon bg-primary"><i class="mdi mdi-message"></i></div>
                <p class="notify-details">' . $row->isi_notifikasi . '</span></p>
                <p class="text-muted text-right">' . date('H:i', strtotime($row->tanggal)) . ' ' . date('d/m/Y', strtotime($row->tanggal)) . '</p></a>';
            }
        } else {
            $output .= ' <a href="javascript:void(0);" class="dropdown-item notify-item">
            <div class="notify-icon bg-primary"><i class="mdi mdi-message"></i></div>
            <p class="notify-details"><span class="text-muted">Tidak ada notifikasi</span></p>
        </a>';
            //                    
        }


        $this->db->select();
        $this->db->from("notifikasi_member");
        $this->db->where($where);
        $result = $this->db->get();
        $count = $result->num_rows();

        $data = array('notification' => $output, 'unseen_notification' => $count);

        return json_encode($data);
    }

    public function fetch_data_keuangan($v)
    {

        if ($v != '') {
            $this->db->set('status_notif', '1');
            $this->db->where('status_notif', '0');
            $this->db->update('notifikasi_keuangan');
            echo '0';
        }


        $this->db->limit(5);
        $this->db->from("notifikasi_keuangan");
        $this->db->join('status_pembayaran', 'status_pembayaran.id = notifikasi_keuangan.id_status_pembayaran');
        $this->db->join('user', 'user.nik = notifikasi_keuangan.nik');
        $this->db->order_by("notifikasi_keuangan.id", "DESC");
        $result = $this->db->get();
        $output = '';
        $config['base_url'] = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
        $config['base_url'] .= "://" . $_SERVER['HTTP_HOST'];
        $config['base_url'] .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);


        if ($result->num_rows() > 0) {

            foreach ($result->result() as $row) {

                //var_dump($row);
                $output .= '<a href="' . $config['base_url'] . 'notifikasi" class="dropdown-item notify-item">
                <div class="notify-icon bg-primary"><i class="mdi mdi-message"></i></div>
                <p class="notify-details">' . $row->isi_notifikasi . '</span></p>
                <p class="text-muted text-right">' . date('H:i', strtotime($row->tanggal)) . ' ' . date('d/m/Y', strtotime($row->tanggal)) . '</p></a>';
            }
        } else {
            $output .= ' <a href="javascript:void(0);" class="dropdown-item notify-item">
            <div class="notify-icon bg-primary"><i class="mdi mdi-message"></i></div>
            <p class="notify-details"><span class="text-muted">Tidak ada notifikasi</span></p>
        </a>';
            //                    
        }


        $this->db->select();
        $this->db->from("notifikasi_keuangan");
        $this->db->where("status_notif", "0");
        $result1 = $this->db->get();
        $count = $result1->num_rows();

        $data = array('notification' => $output, 'unseen_notification' => $count);

        return json_encode($data);
    }

    public function getnotifikasi_admin()
    {
        $this->db->select();
        $this->db->from("notifikasi_admin");
        $this->db->join('status_pembayaran', 'status_pembayaran.id = notifikasi_admin.id_status_pembayaran');
        $this->db->join('user', 'user.nik = notifikasi_admin.nik');
        $this->db->order_by("notifikasi_admin.id", "DESC");

        $query = $this->db->get();
        return $query;
    }

    public function getnotifikasi_member()
    {
        $this->db->select();
        $this->db->from("notifikasi_member");
        $this->db->where(['nik' => $this->session->userdata('nik')]);
        $this->db->order_by("notifikasi_member.id", "DESC");
        $query = $this->db->get();
        return $query;
    }

    public function getnotifikasi_keuangan()
    {
        $this->db->select();
        $this->db->from("notifikasi_keuangan");
        $this->db->join('status_pembayaran', 'status_pembayaran.id = notifikasi_keuangan.id_status_pembayaran');
        $this->db->join('user', 'user.nik = notifikasi_keuangan.nik');
        $this->db->order_by("notifikasi_keuangan.id", "DESC");

        $query = $this->db->get();
        return $query;
    }
}
