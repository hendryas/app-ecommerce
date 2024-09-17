<div class="page-wrapper">
    <!-- Page Content-->
    <div class="page-content">

        <div class="container-fluid">
            <!-- Page-Title -->
            <?php $this->load->view('templates/vbreadcrumb/view_index'); ?>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-lg-3">
                    <div class="card card-eco">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h4 class="title-text mt-0">Total Pengguna</h4>
                                    <h3 class="font-weight-semibold mb-1"><?= count($pengguna) ?></h3>
                                </div>
                                <!--end col-->
                                <div class="col-4 text-center align-self-center">
                                    <!-- <span class="card-eco-icon">👳🏻</span> -->
                                    <i class="dripicons-user-group card-eco-icon  align-self-center"></i>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                            <div class="bg-pattern"></div>
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
                <div class="col-lg-3">
                    <div class="card card-eco">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h4 class="title-text mt-0">Total Barang</h4>
                                    <h3 class="font-weight-semibold mb-1"><?= count($barang) ?></h3>
                                </div>
                                <!--end col-->
                                <div class="col-4 text-center align-self-center">
                                    <!-- <span class="card-eco-icon">🛒</span> -->
                                    <i class="dripicons-cart card-eco-icon  align-self-center"></i>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                            <div class="bg-pattern"></div>
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->

            <div class="card">

                <!--end card-body-->
            </div>
            <!--end card-->

        </div><!-- container -->

        <!-- Footer -->
        <?php $this->load->view('templates/vtextfooter/view_index'); ?>
        <!-- End Footer -->
        <!--end footer-->
    </div>
    <!-- end page content -->
</div>
<!-- end page-wrapper -->