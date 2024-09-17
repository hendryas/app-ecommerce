<?php
function check_access($role_id, $id_menu_level_1)
{
    $ci = get_instance();

    //query lain, buat bikin di SP
    // $ci->db->get_where('user_access_menu',[
    //     'role_id' => $role_id,
    //     'menu_id' => $menu_id
    // ]);

    $ci->db->where('role_id', $role_id);
    $ci->db->where('id_menu_level_1', $id_menu_level_1);
    $result = $ci->db->get('user_access_menu');

    // var_dump($result->num_rows() > 0);
    // die;

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}
