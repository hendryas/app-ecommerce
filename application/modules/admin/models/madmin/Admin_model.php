<?php

class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function data_setting()
    {
        $this->db->select('*');
        $this->db->from('setting');
        $this->db->where('id', 1);

        return $this->db->get()->row_array();
    }
}
