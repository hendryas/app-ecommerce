 <!-- Left Sidenav -->
 <div class="left-sidenav">
     <ul class="metismenu left-sidenav-menu">
         <!-- Start Pembuatan Menu Level 1 -->
         <?php
            $role_id = $this->session->userdata('role_id');

            $this->db->select('menu_level_1.*');
            $this->db->from('menu_level_1');
            $this->db->join('user_access_menu', 'user_access_menu.id_menu_level_1 = menu_level_1.id');
            $this->db->where('user_access_menu.role_id', $role_id);
            $this->db->order_by('user_access_menu.id_menu_level_1', 'asc');

            $menu_1 = $this->db->get()->result_array();
            ?>
         <!-- End Pembuatan Menu Level 1 -->
         <?php foreach ($menu_1 as $m1) : ?>
             <li>

                 <!-- Start Pembuatan Menu Level 2 -->
                 <?php
                    $id_menu_level_1 = $m1['id'];
                    $role_id = $this->session->userdata('role_id');

                    $this->db->select('menu_level_2.*');
                    $this->db->from('menu_level_2');
                    $this->db->join('menu_level_1', 'menu_level_1.id = menu_level_2.id_menu_level_1');
                    $this->db->where('menu_level_2.id_menu_level_1', $id_menu_level_1);
                    $this->db->where('menu_level_2.is_active', 1);

                    $menu_2 = $this->db->get()->result_array();

                    ?>
                 <!-- End Pembuatan Menu Level 2 -->
                 <a href="javascript: void(0);"><i class="<?php echo $m1['icon']; ?>"></i><span><?php echo $m1['title']; ?></span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                 <ul class="nav-second-level" aria-expanded="false">
                     <?php foreach ($menu_2 as $m2) : ?>
                         <?php if ($m2['status_sub'] == 1) : ?>
                             <li class="nav-item"><a class="nav-link" href="<?php echo base_url($m2['url']); ?>"><i class="<?php echo $m2['icon']; ?>"></i><?php echo $m2['title']; ?></a></li>
                         <?php else : ?>
                             <li>
                                 <a href="javascript: void(0);"><i class="<?php echo $m2['icon']; ?>"></i><?php echo $m2['title']; ?> <span class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
                                 <!-- Start Pembuatan Menu Level 3 -->
                                 <?php
                                    $id_menu_level_2 = $m2['id'];
                                    $this->db->select('menu_level_3.*');
                                    $this->db->from('menu_level_3');
                                    $this->db->where(['menu_level_3.id_menu_level_2' => $id_menu_level_2]);
                                    $this->db->join('menu_level_2', 'menu_level_2.id = menu_level_3.id_menu_level_2');

                                    $menu_3 = $this->db->get()->result_array();
                                    ?>
                                 <!-- End Pembuatan Menu Level 3 -->
                                 <ul class="nav-second-level" aria-expanded="false">
                                     <?php foreach ($menu_3 as $m3) : ?>
                                         <li><a href="<?php echo base_url($m3['url']); ?>"><?php echo $m3['title']; ?></a></li>
                                     <?php endforeach; ?>
                                 </ul>
                             </li>
                         <?php endif; ?>
                     <?php endforeach; ?>
                 </ul>

             </li>
         <?php endforeach; ?>


     </ul>
 </div>
 <!-- end left-sidenav-->