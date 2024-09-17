<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function dataMenuLevelTiga()
    {
        $this->db->select('menu_level_3.*');
        $this->db->select('menu_level_2.title title2');
        $this->db->from('menu_level_3');
        $this->db->join('menu_level_2', 'menu_level_2.id = menu_level_3.id_menu_level_2');

        $query = $this->db->get();
        return $query;
    }

    public function deleteDataMenu($new_menu_id)
    {
        $this->db->where('id', $new_menu_id);
        $this->db->delete('menu_level_1');
    }

    public function deleteDataSubmenu($menu_id)
    {
        $this->db->where('id', $menu_id);
        $this->db->delete('user_sub_menu');
    }

    //====HAS SUB MENU====//
    public function getHasSubMenu()
    {
        $this->db->select('menu_level_2.*');
        $this->db->select('menu_level_1.title title2');
        $this->db->from('menu_level_2');
        $this->db->join('menu_level_1', 'menu_level_1.id = menu_level_2.id_menu_level_1');

        $query = $this->db->get();
        return $query;
    }

    public function deleteDataMenuLevelDua($id_menu_level_2)
    {
        $this->db->where('id', $id_menu_level_2);
        $this->db->delete('menu_level_2');
    }
}
