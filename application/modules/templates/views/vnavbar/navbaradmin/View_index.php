<!-- Top Bar Start -->
<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <?php if ($this->session->userdata('role_id') == 1) : ?>
            <a href="<?php echo base_url('admin/cadmin/admin'); ?>" class="logo">
            <?php elseif ($this->session->userdata('role_id') == 2) : ?>
                <a href="<?php echo base_url('projects/projects-index.html'); ?>" class="logo">
                <?php elseif ($this->session->userdata('role_id') == 3) : ?>
                    <a href="<?php echo base_url('projects/projects-index.html'); ?>" class="logo">
                    <?php endif; ?>
                    <span>
                        <img src="<?php echo base_url('assets/images/logo-sm.png'); ?>" alt="logo-small" class="logo-sm">
                    </span>
                    </a>
    </div>
    <!--end logo-->
    <!-- Navbar -->
    <nav class="navbar-custom">
        <ul class="list-unstyled topbar-nav float-right mb-0">
            <!-- <li class="hidden-sm">
                <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="javascript: void(0);" role="button" aria-haspopup="false" aria-expanded="false">
                    English <img src="<?php echo base_url('assets/images/flags/us_flag.jpg'); ?>" class="ml-2" height="16" alt="" /> <i class="mdi mdi-chevron-down"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                </div>
            </li> -->

            <!-- start notification-->
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="mdi mdi-bell-outline noti-icon"></i>
                    <span class="badge badge-success badge-pill noti-icon-badge count"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-lg">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <span class="badge badge-danger float-right">80</span>
                        <h5>Notification</h5>
                    </div>

                    <div class="slimscroll" style="max-height: 230px;">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-success"><i class="mdi mdi-message"></i></div>
                            <p class="notify-details">Belum ada notifikasi<span class="text-muted"><?php echo $this->session->flashdata('message'); ?></span></p>
                        </a>
                    </div>

                    <!-- All-->
                    <a href="javascript:void(0);" class="dropdown-item notify-all">
                        View All
                    </a>

                </div>

            </li>
            <!-- end notification-->

            <li class="dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <?php if ($this->session->userdata('role_id') == 1) : ?>
                        <img src="<?php echo base_url('assets/images/profiles/') . $user['image']; ?>" alt="profile-user" class="rounded-circle" />
                    <?php elseif ($this->session->userdata('role_id') == 2) : ?>
                        <img src="<?php echo base_url('assets/images/users/user-1.png'); ?>" alt="profile-user" class="rounded-circle" />
                    <?php elseif ($this->session->userdata('role_id') == 3) : ?>
                        <img src="<?php echo base_url('assets/images/users/user-1.png'); ?>" alt="profile-user" class="rounded-circle" />
                    <?php endif; ?>

                    <?php if ($this->session->userdata('role_id') == true) : ?>
                        <span class="ml-1 nav-user-name hidden-sm"> <?php echo $user['nama']; ?> <i class="mdi mdi-chevron-down"></i> </span>
                    <?php else : ?>
                        <span class="ml-1 nav-user-name hidden-sm"> User <i class="mdi mdi-chevron-down"></i> </span>
                    <?php endif; ?>

                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <?php if ($this->session->userdata('role_id') == 1) : ?>
                        <a class="dropdown-item" href="<?php echo base_url('admin/cadmin/admin/profile'); ?>"><i class="ti-user text-muted mr-2"></i> Profile</a>
                    <?php elseif ($this->session->userdata('role_id') == 2) : ?>
                        <a class="dropdown-item" href="#"><i class="ti-user text-muted mr-2"></i> Profile</a>
                    <?php elseif ($this->session->userdata('role_id') == 3) : ?>
                        <a class="dropdown-item" href="#"><i class="ti-user text-muted mr-2"></i> Profile</a>
                    <?php endif; ?>

                    <div class="dropdown-divider mb-0"></div>
                        <a class="dropdown-item" href="<?php echo base_url('home/chome/home') ?>"><i class="fas fa-key text-muted mr-2"></i> User</a>
                    <!-- <a class="dropdown-item" data-toggle="modal" data-target="#logoutFromSubMenuModal" href="#"><i class="ti-power-off text-muted mr-2"></i> Logout</a> -->
                </div>
            </li>
        </ul>
        <!--end topbar-nav-->

        <ul class="list-unstyled topbar-nav mb-0">
            <li>
                <button class="nav-link button-menu-mobile waves-effect waves-light">
                    <i class="ti-menu nav-icon"></i>
                </button>
            </li>
            <!-- <li class="hide-phone app-search">
                <form role="search" class="">
                    <input type="text" id="AllCompo" placeholder="Search..." class="form-control">
                    <a href=""><i class="fas fa-search"></i></a>
                </form>
            </li> -->
        </ul>
    </nav>
    <!-- end navbar-->
</div>
<!-- Top Bar End -->

<!-- START LOGOUT FROM NAVBAR MENU MODAL -->
<div class="modal fade" id="logoutFromSubMenuModal" tabindex="-1" aria-labelledby="logoutFromSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutFromSubMenuModalLabel">Apakah kamu akan keluar?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Klik tombol "Logout" untuk keluar dari halaman, klik "Close" untuk membatalkan.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a class="btn btn-primary" href="<?php echo base_url(); ?>auth/logout">Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- END LOGOUT FROM NAVBAR MENU MODAL -->