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
                             <img src="../assets/images/404.jpg" alt="" class="d-block mx-auto mt-4" height="250">
                             <div class="text-center auth-logo-text mb-4">

                                 <?php if ($this->session->userdata('role_id') == 1) : ?>
                                     <h4 class="mt-0 mb-3 mt-5">Halaman ini tidak dapat diakses, silahkan klik tombol <b>Back to Dashboard</b> untuk kembali kehalaman awal</h4>
                                 <?php elseif ($this->session->userdata('role_id') == 2) : ?>
                                     <h4 class="mt-0 mb-3 mt-5">Halaman ini tidak dapat diakses, silahkan klik tombol <b>Back to Main Menu</b> untuk kembali kehalaman awal</h4>
                                 <?php elseif ($this->session->userdata('role_id') == 3) : ?>
                                     <h4 class="mt-0 mb-3 mt-5">Halaman ini tidak dapat diakses, silahkan klik tombol <b>Back to Dashboard</b> untuk kembali kehalaman awal</h4>
                                 <?php endif; ?>

                                 <?php if ($this->session->userdata('role_id') == 1) : ?>
                                     <a href="<?php echo base_url('admin/cadmin/admin'); ?>" class="btn btn-sm btn-gradient-primary">Back to Dashboard</a>
                                 <?php elseif ($this->session->userdata('role_id') == 2) : ?>
                                     <a href="<?php echo base_url('home/chome/home'); ?>" class="btn btn-sm btn-gradient-primary">Back to Main Menu</a>
                                 <?php elseif ($this->session->userdata('role_id') == 3) : ?>
                                     <a href="<?php echo base_url('keuangan/ckeuangan/keuangan'); ?>" class="btn btn-sm btn-gradient-primary">Back to Dashboard</a>
                                 <?php endif; ?>

                             </div>
                             <!--end auth-logo-text-->
                         </div>
                         <!--end /div-->
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
 <!--end container-->