<div class="page-wrapper">
    <!-- Page Content-->
    <div class="page-content">

        <div class="container-fluid">
            <!-- Page-Title -->
            <?php $this->load->view('templates/vbreadcrumb/view_index'); ?>
            <!-- end page title end breadcrumb -->
            <div class="row">
                <div class="col-lg">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Halaman Role Access</h4>
                            <p class="text-muted m-b-30 font-14">
                                Pada halaman ini admin dapat merubah hak akses menu pada setiap role.
                                Silahkan <b>Ceklis</b> untuk dapat memberikan hak akses menu.
                            </p>

                            <?php echo $this->session->flashdata('message'); ?>

                            <h4>Role : <?php echo $role['nama_role']; ?></h4>

                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr class="text-center">
                                            <th>#</th>
                                            <th>Menu</th>
                                            <th>Access</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($menu as $m) : ?>
                                            <tr class="text-center">
                                                <th scope="row"><?php echo $no; ?></th>
                                                <td><?php echo $m['title']; ?></td>
                                                <td>
                                                    <div class="form-check mb-4">
                                                        <input class="form-check-input" type="checkbox" <?php echo check_access($role['id'], $m['id']); ?> data-role="<?php echo encrypt_url($role['id']); ?>" data-menu="<?php echo $m['id']; ?>">
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php $no++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
                <!--end col-->
            </div>



        </div><!-- container -->

        <!-- Footer -->
        <?php $this->load->view('templates/vtextfooter/view_index'); ?>
        <!-- End Footer -->
        <!--end footer-->
    </div>
    <!-- end page content -->
</div>
<!-- end page-wrapper -->