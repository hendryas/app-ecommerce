<!--====== START PAGE ======-->
<div class="container">
    <div class="row vh-100 ">
        <div class="col-12 align-self-center">
            <div class="auth-page">
                <div class="card auth-card shadow-lg">
                    <div class="card-body">
                        <div class="px-3">
                            <div class="auth-logo-box">
                                <a href="../dashboard/analytics-index.html" class="logo logo-admin"><img src="<?php echo base_url('assets/images/logo-sm.png'); ?>" height="55" alt="logo" class="auth-logo"></a>
                            </div>
                            <!--end auth-logo-box-->

                            <div class="text-center auth-logo-text">
                                <h4 class="mt-0 mb-3 mt-5">Halo, selamat datang di SatriaShop</h4>
                                <p class="text-muted mb-0">Silahkan login untuk melanjutkan.</p>
                            </div>
                            <!--end auth-logo-text-->

                            <?php echo $this->session->flashdata('message'); ?>

                            <form class="form-horizontal auth-form my-4" method="POST" action="<?php echo base_url('auth'); ?>">

                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <div class="input-group mb-3">
                                        <span class="auth-form-icon">
                                            <i class="dripicons-user"></i>
                                        </span>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" value="<?php echo set_value('username'); ?>">
                                    </div>
                                    <small class="text-danger"><?php echo form_error('username'); ?></small>
                                </div>
                                <!--end form-group-->

                                <div class="form-group">
                                    <label for="userpassword">Password</label>
                                    <div class="input-group mb-3">
                                        <input class="form-control" type="password" placeholder="Masukkan Password" id="password" name="password" data-toggle="password">
                                    </div>
                                    <small class="text-danger"><?php echo form_error('password'); ?></small>
                                </div>
                                <!--end form-group-->

                                <label for="captcha">Captcha</label>
                                <div class="input-group has-feedback">
                                    <div class="input-group-btn pr-3">
                                        <button type="button" class="btn btn-danger" disabled="disabled"><?php echo $captcha_img; ?></button>
                                    </div>
                                    <span class="auth-form-icon">
                                        <i class="ti-key"></i>
                                    </span>
                                    <input type="text" name="captcha" class="form-control" autocomplete="off" placeholder="Captcha" required="required">
                                    <!-- <div class="input-group-addon"><i class="fa fa-key"></i></div> -->
                                </div>
                                <?php echo "<small style='color:red;'>" . form_error('captcha') . "</small>"; ?><br>

                                <div class="form-group row mt-4">
                                    <!--end col-->
                                    <div class="col-sm-6">
                                        <a href="<?php echo base_url('auth/recovery_password'); ?>" class="text-muted font-13"><i class="dripicons-lock"></i> Lupa Password?</a>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end form-group-->

                                <div class="form-group mb-0 row">
                                    <div class="col-12 mt-2">
                                        <button class="btn btn-gradient-primary btn-round btn-block waves-effect waves-light" type="submit">Log In <i class="fas fa-sign-in-alt ml-1"></i></button>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end form-group-->
                            </form>
                            <!--end form-->
                        </div>
                        <!--end /div-->

                        <div class="m-3 text-center text-muted">
                            <p class="">Apakah kamu tidak punya akun ? <a href="<?php echo base_url('auth/registration'); ?>" class="text-primary ml-2">Klik Register</a></p>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end auth-page-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
</div>
<!--====== END PAGE ======-->