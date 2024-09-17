<div class="page-wrapper">
    <!-- Page Content-->
    <div class="page-content">

        <div class="container-fluid">
            <!-- Page-Title -->
            <!-- end page title end breadcrumb -->
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="card mt-5">
                        <!--end card-body-->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <div class="">
                                        <h3 class="mb-0"><b>Laporan Bulanan</b></h3>
                                        <h6 class="mb-0"><b>Bulan :</b> <?= $bulan; ?>/<?= $tahun; ?></h6>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-md-3">

                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive project-invoice">
                                        <table class="table table-bordered mb-0">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>No.Order</th>
                                                    <th>Tanggal</th>
                                                    <th>Total</th>
                                                </tr>
                                                <!--end tr-->
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                <?php $grand_total = 0; ?>
                                                <?php foreach ($laporan as $lap) : ?>
                                                    <?php
                                                    $grand_total = $grand_total +  $lap['grand_total'];
                                                    ?>
                                                    <tr class="text-center">
                                                        <th scope="row"><?php echo $no; ?></th>
                                                        <td><?php echo $lap['no_order']; ?></td>
                                                        <td><?php echo $lap['tgl_order']; ?></td>
                                                        <td>Rp.<?php echo number_format($lap['grand_total'], 0); ?></td>
                                                    </tr>
                                                    <?php $no++; ?>
                                                <?php endforeach; ?>
                                                <!--end tr-->
                                                <tr class="bg-black text-white">
                                                    <th colspan="2" class="border-0"></th>
                                                    <td class="border-0 font-14"><b>Grand Total</b></td>
                                                    <td class="border-0 font-14">Rp.<b><?= number_format($grand_total, 0); ?></b></td>
                                                </tr>
                                                <!--end tr-->
                                            </tbody>
                                        </table>
                                        <!--end table-->
                                    </div>
                                    <!--end /div-->
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->

                            <hr>
                            <div class="row d-flex justify-content-center">

                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="float-right d-print-none">
                                        <a href="javascript:window.print()" class="btn btn-gradient-info"><i class="fa fa-print"></i></a>

                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->

        </div><!-- container -->

        <!-- Footer -->
        <?php $this->load->view('templates/vtextfooter/view_index'); ?>
        <!-- End Footer -->
    </div>
    <!-- end page content -->
</div>
<!-- end page-wrapper -->