<!-- Top Bar Start -->
<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <?php if ($this->session->userdata('role_id') == 1) : ?>
            <a href="<?php echo base_url('admin/cadmin/admin'); ?>" class="logo">
            <?php elseif ($this->session->userdata('role_id') == 2) : ?>
                <a href="<?php echo base_url('home/chome/home'); ?>" class="logo">
                <?php elseif ($this->session->userdata('role_id') == 3) : ?>
                    <a href="<?php echo base_url('projects/projects-index.html'); ?>" class="logo">
                    <?php endif; ?>
                    <span>
                        <?php if ($this->session->userdata('role_id') == NULL) : ?>
                            <img src="<?php echo base_url('assets/images/logo-sm.png'); ?>" alt="logo-small" class="logo-sm pt-4" width="25px">
                        <?php else : ?>
                            <img src="<?php echo base_url('assets/images/logo-sm.png'); ?>" alt="logo-small" class="logo-sm">
                        <?php endif; ?>
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
            <?php
            $keranjang = $this->cart->contents();
            $jml_item = 0;
            foreach ($keranjang as $k) {
                $jml_item = $jml_item + $k['qty'];
            }
            ?>
            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="fas fa-shopping-cart noti-icon"></i>
                    <span class="badge badge-danger badge-pill noti-icon-badge"><?php echo $jml_item; ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-lg pt-0">

                    <h6 class="dropdown-item-text font-15 m-0 py-3 bg-primary text-white d-flex justify-content-between align-items-center">
                        Keranjang <span class="badge badge-light badge-pill"><?php echo $jml_item; ?></span>
                    </h6>
                    <div class="slimscroll notification-list">
                        <!-- item-->
                        <?php if (empty($keranjang)) : ?>
                            <a href="#" class="dropdown-item py-3">
                                <p>Keranjang Belanja Kosong</p>
                            </a>
                        <?php else : ?>
                            <?php foreach ($keranjang as $k) : ?>
                                <?php $barang = $this->productdetail_model->dataProductDetail($k['id'])->row_array(); ?>
                                <a href="#" class="dropdown-item py-3">
                                    <small class="float-right text-muted pl-2"> <i class="fas fa-calculator"></i> Rp.<?php echo $this->cart->format_number($k['subtotal']); ?></small>
                                    <div class="media">
                                        <div class="avatar-md bg-white">
                                            <img style="width: 20; height: 20px;" src="<?php echo base_url('assets/images/product_barang/') . $barang['image']; ?>" alt="gambar-barang" srcset="">
                                            <!-- <i class="la la-cart-arrow-down text-white"></i> -->
                                        </div>
                                        <div class="media-body align-self-center ml-2 text-truncate">
                                            <h6 class="my-0 font-weight-normal text-dark"><?php echo $k['name']; ?></h6>
                                            <small class="text-muted mb-0"><?php echo $k['qty']; ?> x Rp.<?php echo number_format($k['price'], 0); ?></small>
                                        </div>
                                        <!--end media-body-->
                                    </div>
                                    <!--end media-->
                                </a>
                            <?php endforeach; ?>

                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item py-3">
                                <!-- <small class="float-right text-muted pl-2">10 min ago</small> -->
                                <div class="media">
                                    <!-- <div class="avatar-md bg-success">
                                    <i class="la la-group text-white"></i>
                                </div> -->
                                    <div class="media-body align-self-center ml-2 text-truncate">
                                        <h6 class="my-0 font-weight-normal text-dark">Total :</h6>
                                        <small class="text-muted mb-0">Rp.<?php echo $this->cart->format_number($this->cart->total()); ?></small>
                                    </div>
                                    <!--end media-body-->
                                </div>
                                <!--end media-->
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="<?php echo base_url('home/ccart/cart'); ?>" class="dropdown-item text-center text-primary">
                                View Cart <i class="fi-arrow-right"></i>
                            </a>
                            <a href="<?php echo base_url('home/ccart/cart/checkout'); ?>" class="dropdown-item text-center text-primary">
                                Checkout <i class="fi-arrow-right"></i>
                            </a>
                        <?php endif; ?>
                        <!--end-item-->
                    </div>
                    <!-- All-->
                </div>
            </li>

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
                        <img src="<?php echo base_url('assets/images/profiles/') . $user['image']; ?>" alt="profile-user" class="rounded-circle" />
                    <?php elseif ($this->session->userdata('role_id') == 3) : ?>
                        <img src="<?php echo base_url('assets/images/users/user-1.png'); ?>" alt="profile-user" class="rounded-circle" />
                    <?php endif; ?>

                    <?php if ($this->session->userdata('role_id') == true) : ?>
                        <span class="ml-1 nav-user-name hidden-sm"> <?php echo $user['nama']; ?> <i class="mdi mdi-chevron-down"></i> </span>
                    <?php else : ?>
                        <!-- <span class="ml-1 nav-user-name hidden-sm"> Admin <i class="mdi mdi-chevron-down"></i> </span> -->
                    <?php endif; ?>

                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <?php if ($this->session->userdata('role_id') == 1) : ?>
                        <a class="dropdown-item" href="<?php echo base_url('admin/cadmin/admin/profile'); ?>"><i class="ti-user text-muted mr-2"></i> Profile</a>
                    <?php elseif ($this->session->userdata('role_id') == 2) : ?>
                        <a class="dropdown-item" href="<?php echo base_url('member/cmember/member/profile'); ?>"><i class="ti-user text-muted mr-2"></i> Profile</a>
                    <?php elseif ($this->session->userdata('role_id') == 3) : ?>
                        <a class="dropdown-item" href="#"><i class="ti-user text-muted mr-2"></i> Profile</a>
                    <?php else : ?>
                        <!-- <a class="dropdown-item" href="<?php echo base_url('auth') ?>"><i class="fas fa-key text-muted mr-2"></i> Admin</a> -->
                        <a class="dropdown-item" href="<?php echo base_url('master/cproduct/product') ?>"><i class="fas fa-key text-muted mr-2"></i> Admin</a>
                    <?php endif; ?>

                    <div class="dropdown-divider mb-0"></div>
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
                <a class="btn btn-primary" href="<?php echo base_url(); ?>auth/logoutmember">Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- END LOGOUT FROM NAVBAR MENU MODAL -->