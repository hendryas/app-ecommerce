<!-- Log In page -->
<div class="container">
    <div class="row vh-100 ">
        <div class="col-12 align-self-center">
            <div class="auth-page">
                <div class="card auth-card shadow-lg">
                    <div class="card-body">
                        <div class="px-3">
                            <div class="auth-logo-box">
                                <a href="../dashboard/analytics-index.html" class="logo logo-admin"><img src="../assets/images/logo-sm.png" height="55" alt="logo" class="auth-logo"></a>
                            </div>
                            <!--end auth-logo-box-->

                            <div class="text-center auth-logo-text">
                                <h4 class="mt-0 mb-3 mt-5">Form halaman registrasi SatriaShop</h4>
                                <p class="text-muted mb-0">Silahkan mengisi form yang ada dibawah ini.</p>
                            </div>
                            <!--end auth-logo-text-->


                            <form class="form-horizontal auth-form my-4" enctype="multipart/form-data" method="POST" action="<?php echo base_url('auth/registration/register'); ?>">

                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <div class="input-group">
                                        <span class="auth-form-icon">
                                            <i class="dripicons-user-id"></i>
                                        </span>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama" value="<?php echo set_value('name'); ?>" required>
                                    </div>
                                    <small class="text-danger"><?php echo form_error('name'); ?></small>
                                    <small>Tulis nama lengkap</small>
                                </div>

                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <div class="input-group">
                                        <span class="auth-form-icon">
                                            <i class="far fa-id-card"></i>
                                        </span>
                                        <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK" onkeypress="isInputNumber(event)" maxlength="16" value="<?php echo set_value('nik'); ?>" required>
                                    </div>
                                    <small class="text-danger"><?php echo form_error('nik'); ?></small>
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <div class="input-group">
                                        <span class="auth-form-icon">
                                            <i class="dripicons-home"></i>
                                        </span>
                                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" value="<?php echo set_value('alamat'); ?>" required>
                                    </div>
                                    <small class="text-danger"><?php echo form_error('alamat'); ?></small>
                                </div>

                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <div class="input-group">
                                        <span class="auth-form-icon">
                                            <i class="dripicons-user"></i>
                                        </span>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" value="<?php echo set_value('username'); ?>" required>
                                    </div>
                                    <small class="text-danger"><?php echo form_error('username'); ?></small>
                                </div>
                                <!--end form-group-->

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <div class="input-group">
                                        <span class="auth-form-icon">
                                            <i class="dripicons-mail"></i>
                                        </span>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" value="<?php echo set_value('email'); ?>" required>
                                    </div>
                                    <small class="text-danger"><?php echo form_error('email'); ?></small>
                                </div>
                                <!--end form-group-->

                                <div class="form-group">
                                    <label for="password1">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password1" name="password1" placeholder="Masukkan Password" data-toggle="password" required>
                                    </div>
                                    <small class="text-danger"><?php echo form_error('password1'); ?></small>
                                    <small>Password minimal 8 karakter</small>
                                </div>
                                <!--end form-group-->

                                <div class="form-group">
                                    <label for="password2">Konfirmasi Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password2" name="password2" placeholder="Masukkan Konfirmasi Password" data-toggle="password" required>
                                    </div>
                                    <small class="text-danger"><?php echo form_error('password2'); ?></small>

                                    <div class="form-group mt-3">
                                        <label for="nomor_handphone">Nomor Handphone</label>
                                        <div class="input-group">
                                            <span class="auth-form-icon">
                                                <i class="dripicons-phone"></i>
                                            </span>
                                            <input type="text" class="form-control" id="nomor_handphone" name="nomor_handphone" placeholder="Masukkan Nomor Handphone" onkeypress="isInputNumber(event)" value="<?php echo set_value('nomor_handphone'); ?>" required>
                                        </div>
                                        <small class="text-danger"><?php echo form_error('nomor_handphone'); ?></small>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Upload Foto</label>
                                        <div class="card shadow-lg">
                                            <div class="card-body">
                                                <h4 class="mt-0 header-title">File Upload</h4>
                                                <p class="text-muted mb-3">Upload gambar disini</p>
                                                <input type="file" id="input-file-now" name="image" class="dropify" required />
                                            </div>
                                            <!--end card-body-->
                                        </div>
                                        <!--end card-->
                                        <small>Upload foto ukuran 4x6 Maksimal 3MB</small>
                                        <!--end form-group-->
                                    </div>
                                    <!--end form-group-->

                                    <div class="form-group mb-0 row">
                                        <div class="col-12 mt-2">
                                            <button class="btn btn-gradient-primary btn-round btn-block waves-effect waves-light" type="submit">Register <i class="fas fa-sign-in-alt ml-1"></i></button>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end form-group-->
                            </form>
                            <!--end form-->
                        </div>
                        <!--end /div-->

                        <div class="m-3 text-center text-muted">
                            <p class="">Sudah memiliki akun ? <a href="<?php echo base_url('auth') ?>" class="text-primary ml-2">Log in</a></p>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end auth-card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
</div>
<!--end container-->