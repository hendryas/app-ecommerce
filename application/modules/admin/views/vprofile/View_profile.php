<div class="page-wrapper">
    <!-- Page Content-->
    <div class="page-content">

        <div class="container-fluid">
            <!-- Page-Title -->
            <?php $this->load->view('templates/vbreadcrumb/view_index'); ?>
            <!-- end page title end breadcrumb -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body  met-pro-bg">
                            <div class="met-profile">
                                <div class="row">
                                    <div class="col-lg-4 align-self-center mb-3 mb-lg-0">
                                        <div class="met-profile-main">
                                            <div class="met-profile-main-pic">
                                                <img src="<?php echo base_url('assets/images/profiles/') . $user['image']; ?>" alt="profile-foto" class="rounded-circle">
                                                <span class="fro-profile_main-pic-change">
                                                    <i class="fas fa-camera"></i>
                                                </span>
                                            </div>
                                            <div class="met-profile_user-detail">
                                                <h5 class="met-user-name"><?php echo $user['nama']; ?></h5>
                                                <p class="mb-0 met-user-name-post">Administrator | UI/UX Designer | Developer Website</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4 ml-auto">
                                        <ul class="list-unstyled personal-detail">
                                            <li class=""><i class="dripicons-phone mr-2 text-info font-18"></i> <b> phone </b> : <?php echo $user['no_hp']; ?></li>
                                            <li class="mt-2"><i class="dripicons-mail text-info font-18 mt-2 mr-2"></i> <b> Email </b> : <?php echo decrypt_url($user['email']); ?></li>
                                            <li class="mt-2"><i class="dripicons-location text-info font-18 mt-2 mr-2"></i> <b>Alamat</b> : <?php echo $user['alamat']; ?></li>
                                        </ul>
                                        <div class="button-list btn-social-icon">
                                            <button type="button" class="btn btn-blue btn-circle">
                                                <i class="fab fa-facebook-f"></i>
                                            </button>

                                            <button type="button" class="btn btn-secondary btn-circle ml-2">
                                                <i class="fab fa-twitter"></i>
                                            </button>

                                            <button type="button" class="btn btn-pink btn-circle  ml-2">
                                                <i class="fab fa-dribbble"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <!--end f_profile-->
                        </div>
                        <!--end card-body-->
                        <div class="card-body">
                            <ul class="nav nav-pills mb-0" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" id="settings_detail_tab" data-toggle="pill" href="#settings_detail">Settings</a>
                                </li>
                            </ul>
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->

            <div class="row">
                <div class="col-12">
                    <div class="tab-content detail-list" id="pills-tabContent">
                        <div class="tab-pane fade" id="settings_detail">
                            <div class="row">
                                <div class="col-lg-12 col-xl-9 mx-auto">
                                    <div class="card">
                                        <div class="card-body">

                                            <?php echo form_error('menu', '<div class="alert alert-danger text-center" role="alert">', '</div>'); ?>

                                            <?php echo $this->session->flashdata('message'); ?>

                                            <div class="">
                                                <form class="form-horizontal form-material mb-0" method="POST" action="<?php echo base_url('admin/cadmin/admin/profile'); ?>">
                                                    <div class="form-group">
                                                        <input type="text" placeholder="ID User" class="form-control" name="id_user" value="<?php echo $user['id']; ?>" hidden>
                                                        <label for="nama">Nama</label>
                                                        <input type="text" placeholder="Full Name" class="form-control" name="nama" value="<?php echo $user['nama']; ?>">
                                                        <small class="text-danger"><?php echo form_error('nama'); ?></small>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <label for="email">Email</label>
                                                            <input type="email" placeholder="Email" class="form-control" name="email" id="example-email" value="<?php echo decrypt_url($user['email']); ?>">
                                                            <small class="text-danger"><?php echo form_error('email'); ?></small>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="password1">Password</label>
                                                            <input type="password" placeholder="password" class="form-control" name="password1" data-toggle="password" value="<?php echo decrypt_url($user['password']); ?>">
                                                            <small class="text-danger"><?php echo form_error('password1'); ?></small>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="password2">Re-password</label>
                                                            <input type="password" placeholder="Re-password" class="form-control" name="password2" data-toggle="password" value="<?php echo decrypt_url($user['password']); ?>">
                                                            <small class="text-danger"><?php echo form_error('password2'); ?></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <label for="no_hp">Nomor Handphone</label>
                                                            <input type="text" placeholder="Phone No" onkeypress="isInputNumber(event)" class="form-control" name="no_hp" value="<?php echo $user['no_hp']; ?>">
                                                            <small class="text-danger"><?php echo form_error('no_hp'); ?></small>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="alamat">Alamat</label>
                                                            <input type="text" placeholder="Alamat" class="form-control" name="alamat" value="<?php echo $user['alamat']; ?>">
                                                            <small class="text-danger"><?php echo form_error('alamat'); ?></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <button class="btn btn-gradient-primary btn-sm px-4 mt-3 float-right mb-0" type="submit">Update Profile</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end settings detail-->
                    </div>
                    <!--end tab-content-->

                </div>
                <!--end col-->
            </div>
            <!--end row-->

        </div><!-- container -->

        <footer class="footer text-center text-sm-left">
            <?php $this->load->view('templates/vtextfooter/view_index'); ?>
        </footer>
        <!--end footer-->
    </div>
    <!-- end page content -->
</div>
<!-- end page-wrapper -->