<div class="page-wrapper">
    <!-- Page Content-->
    <div class="page-content">

        <div class="container-fluid">
            <!-- Page-Title -->
            <?php $this->load->view('templates/vbreadcrumb/view_index'); ?>
            <!-- end page title end breadcrumb -->

            <!-- <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        </?/php echo $this->session->flashdata('message'); ?>
                    </div>
                </div>
            </div> -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!--end card-body-->

                        <div class="card-body">
                            <ul class="nav nav-pills mb-0" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="general_detail_tab" data-toggle="pill" href="#general_detail">Order</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="activity_detail_tab" data-toggle="pill" href="#activity_detail">Pesanan di proses</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="portfolio_detail_tab" data-toggle="pill" href="#portfolio_detail">Dikirim</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="settings_detail_tab" data-toggle="pill" href="#settings_detail">Selesai</a>
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
                        <div class="tab-pane fade show active" id="general_detail">
                            <div class="row">

                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">

                                            <?php echo $this->session->flashdata('message'); ?>

                                            <h4 class="mt-0 header-title">Table belum bayar</h4>
                                            <!-- <p class="text-muted mb-3">Use one of two modifier classes to make
                                                <code>&lt;thead&gt;</code>s appear light or dark gray.
                                            </p> -->

                                            <div class="table-responsive">
                                                <table class="table mb-0">
                                                    <thead class="thead-light">
                                                        <tr class="text-center">
                                                            <th>#</th>
                                                            <th>No. Order</th>
                                                            <th>Tanggal</th>
                                                            <th>Ekspedisi</th>
                                                            <th>Total Bayar</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no = 1; ?>
                                                        <?php foreach ($belum_bayar as $bb) : ?>
                                                            <tr class="text-center">
                                                                <th scope="row"><?php echo $no; ?></th>
                                                                <td><?php echo $bb['no_order']; ?></td>
                                                                <td><?php echo $bb['tgl_order']; ?></td>
                                                                <td>
                                                                    <?php echo $bb['ekspedisi']; ?> <br>
                                                                    Paket : <?php echo $bb['paket']; ?> <br>
                                                                    Ongkir : Rp. <?php echo number_format($bb['ongkir'], 0); ?>
                                                                </td>
                                                                <td>
                                                                    <b>Rp. <?php echo number_format($bb['total_bayar'], 0); ?></b> <br>
                                                                    <?php if ($bb['status_pembayaran'] == 0) : ?>
                                                                        <span class="badge badge-boxed  badge-soft-danger">Belum Bayar</span>
                                                                    <?php else : ?>
                                                                        <span class="badge badge-boxed  badge-soft-success">Sudah Bayar</span> <br>
                                                                        <span class="badge badge-boxed  badge-soft-primary">Menunggu diverifikasi</span>
                                                                    <?php endif; ?>

                                                                </td>
                                                                <?php if ($bb['status_pembayaran'] == 0) : ?>
                                                                    <td> <a href="<?= base_url('pembayaran/cpesanansaya/pesanansaya/bayar/' . encrypt_url($bb['id'])); ?>" class="mr-3"><span class="btn btn-sm btn-success waves-effect waves-light">Bayar</span></a></td>
                                                                <?php else : ?>
                                                                    <td> <button class="btn btn-sm btn-danger waves-effect waves-light" disabled>Menunggu Verifikasi</button></td>
                                                                <?php endif; ?>

                                                            </tr>
                                                            <?php $no++; ?>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                                <!--end /table-->
                                            </div>
                                            <!--end /tableresponsive-->
                                        </div>
                                        <!--end card-body-->
                                    </div>
                                    <!--end card-->
                                </div> <!-- end col -->
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end general detail-->

                        <div class="tab-pane fade" id="activity_detail">
                            <div class="row">

                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">

                                            <?php echo $this->session->flashdata('message'); ?>

                                            <h4 class="mt-0 header-title">Table belum bayar</h4>
                                            <!-- <p class="text-muted mb-3">Use one of two modifier classes to make
                <code>&lt;thead&gt;</code>s appear light or dark gray.
            </p> -->

                                            <div class="table-responsive">
                                                <table class="table mb-0">
                                                    <thead class="thead-light">
                                                        <tr class="text-center">
                                                            <th>#</th>
                                                            <th>No. Order</th>
                                                            <th>Tanggal</th>
                                                            <th>Ekspedisi</th>
                                                            <th>Total Bayar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no = 1; ?>
                                                        <?php foreach ($diproses as $bb) : ?>
                                                            <tr class="text-center">
                                                                <th scope="row"><?php echo $no; ?></th>
                                                                <td><?php echo $bb['no_order']; ?></td>
                                                                <td><?php echo $bb['tgl_order']; ?></td>
                                                                <td>
                                                                    <?php echo $bb['ekspedisi']; ?> <br>
                                                                    Paket : <?php echo $bb['paket']; ?> <br>
                                                                    Ongkir : Rp. <?php echo number_format($bb['ongkir'], 0); ?>
                                                                </td>
                                                                <td>
                                                                    <b>Rp. <?php echo number_format($bb['total_bayar'], 0); ?></b> <br>
                                                                    <?php if ($bb['status_pembayaran'] == 0) : ?>
                                                                        <span class="badge badge-boxed  badge-soft-danger">Belum Bayar</span>
                                                                    <?php else : ?>
                                                                        <span class="badge badge-boxed  badge-soft-success">Terverifikasi</span> <br>
                                                                        <span class="badge badge-boxed  badge-soft-primary">Diproses/Dikemas</span>
                                                                    <?php endif; ?>

                                                                </td>

                                                            </tr>
                                                            <?php $no++; ?>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                                <!--end /table-->
                                            </div>
                                            <!--end /tableresponsive-->
                                        </div>
                                        <!--end card-body-->
                                    </div>
                                    <!--end card-->
                                </div> <!-- end col -->
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end education detail-->

                        <div class="tab-pane fade" id="portfolio_detail">
                            <div class="row">

                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">

                                            <?php echo $this->session->flashdata('message'); ?>

                                            <h4 class="mt-0 header-title">Table belum bayar</h4>
                                            <div class="table-responsive">
                                                <table class="table mb-0">
                                                    <thead class="thead-light">
                                                        <tr class="text-center">
                                                            <th>#</th>
                                                            <th>No. Order</th>
                                                            <th>Tanggal</th>
                                                            <th>Ekspedisi</th>
                                                            <th>Total Bayar</th>
                                                            <th>No.Resi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no = 1; ?>
                                                        <?php foreach ($dikirim as $bb) : ?>
                                                            <tr class="text-center">
                                                                <th scope="row"><?php echo $no; ?></th>
                                                                <td><?php echo $bb['no_order']; ?></td>
                                                                <td><?php echo $bb['tgl_order']; ?></td>
                                                                <td>
                                                                    <?php echo $bb['ekspedisi']; ?> <br>
                                                                    Paket : <?php echo $bb['paket']; ?> <br>
                                                                    Ongkir : Rp. <?php echo number_format($bb['ongkir'], 0); ?>
                                                                </td>
                                                                <td>
                                                                    <b>Rp. <?php echo number_format($bb['total_bayar'], 0); ?></b> <br>
                                                                    <span class="badge badge-boxed  badge-soft-warning">Dikirim</span>
                                                                </td>
                                                                <td>
                                                                    No.Resi : <?= $bb['no_resi']; ?> <br>
                                                                    <button data-toggle="modal" data-target="#newDiterimaModal<?php echo $bb['id']; ?>" class="btn btn-sm btn-primary waves-effect waves-light">Diterima</button>
                                                                </td>
                                                            </tr>
                                                            <?php $no++; ?>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                                <!--end /table-->
                                            </div>
                                            <!--end /tableresponsive-->
                                        </div>
                                        <!--end card-body-->
                                    </div>
                                    <!--end card-->
                                </div> <!-- end col -->
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end portfolio detail-->

                        <div class="tab-pane fade" id="settings_detail">
                            <div class="row">

                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">

                                            <?php echo $this->session->flashdata('message'); ?>

                                            <h4 class="mt-0 header-title">Table belum bayar</h4>
                                            <div class="table-responsive">
                                                <table class="table mb-0">
                                                    <thead class="thead-light">
                                                        <tr class="text-center">
                                                            <th>#</th>
                                                            <th>No. Order</th>
                                                            <th>Tanggal</th>
                                                            <th>Ekspedisi</th>
                                                            <th>Total Bayar</th>
                                                            <th>No.Resi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no = 1; ?>
                                                        <?php foreach ($diterima as $bb) : ?>
                                                            <tr class="text-center">
                                                                <th scope="row"><?php echo $no; ?></th>
                                                                <td><?php echo $bb['no_order']; ?></td>
                                                                <td><?php echo $bb['tgl_order']; ?></td>
                                                                <td>
                                                                    <?php echo $bb['ekspedisi']; ?> <br>
                                                                    Paket : <?php echo $bb['paket']; ?> <br>
                                                                    Ongkir : Rp. <?php echo number_format($bb['ongkir'], 0); ?>
                                                                </td>
                                                                <td>
                                                                    <b>Rp. <?php echo number_format($bb['total_bayar'], 0); ?></b> <br>
                                                                    <span class="badge badge-boxed  badge-soft-success">Selesai</span>
                                                                </td>
                                                                <td>
                                                                    No.Resi : <?= $bb['no_resi']; ?> <br>
                                                                </td>
                                                            </tr>
                                                            <?php $no++; ?>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                                <!--end /table-->
                                            </div>
                                            <!--end /tableresponsive-->
                                        </div>
                                        <!--end card-body-->
                                    </div>
                                    <!--end card-->
                                </div> <!-- end col -->
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

        <!-- start footer -->
        <?php $this->load->view('templates/vtextfooter/view_index'); ?>
        <!--end footer-->
    </div>
    <!-- end page content -->
</div>
<!-- end page-wrapper -->

<!-- START MODAL DITERIMA -->
<?php foreach ($dikirim as $bb) : ?>
    <div class="modal fade" id="newDiterimaModal<?php echo $bb['id']; ?>" tabindex="-1" aria-labelledby="newDiterimaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newDiterimaModalLabel">Pesanan diterima</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('pembayaran/cpesanansaya/pesanansaya/diterima/') . encrypt_url($bb['id']); ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            Apakah anda yakin pesanan sudah diterima....?
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- END MODAL DITERIMA -->