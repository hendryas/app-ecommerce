<div class="page-wrapper">
    <!-- Page Content-->
    <div class="page-content">

        <div class="container-fluid">
            <!-- Page-Title -->
            <?php $this->load->view('templates/vbreadcrumb/view_index'); ?>
            <!-- end page title end breadcrumb -->
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">No. Rekening Toko</h4>
                            <p class="text-muted m-b-30 font-14">
                                Silahkan transfer pada rekening toko dibawah ini sebesar : <br>
                                <b class="text-danger">No. Rekening : 1297675478 / BCA (Januar Satria Ramadhan)</b> <br>
                            <h3 class="text-primary">Rp. <?= number_format($DataPesanan['total_bayar'], 0); ?>.-</h3>
                            </p>

                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr class="text-center">
                                            <th>#</th>
                                            <th>Nama Bank</th>
                                            <th>Nomor Rekening</th>
                                            <th>Atas Nama</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($DataTransferToko as $dtf) : ?>
                                            <tr class="text-center">
                                                <th scope="row"><?php echo $no; ?></th>
                                                <td><?php echo $dtf['nama_bank']; ?></td>
                                                <td><?php echo $dtf['no_rek']; ?></td>
                                                <td><?php echo $dtf['atas_nama']; ?></td>
                                            </tr>
                                            <?php $no++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mx-auto">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Upload Bukti Pembayaran</h4>
                            <p class="text-muted m-b-30 font-14">
                                Jika sudah melakukan pembayaran, silahkan upload bukti pembayaran anda di form dibawah ini.
                            </p>

                            <?php echo $this->session->flashdata('message'); ?>

                            <div class="row">
                                <div class="col-lg-12">
                                    <form class="form-horizontal auth-form my-4" enctype="multipart/form-data" method="POST" action="<?php echo base_url('pembayaran/cpesanansaya/pesanansaya/bayar/') . encrypt_url($DataPesanan['id']); ?>">

                                        <div class="form-group">
                                            <label for="name">Atas Nama</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="no_order" name="no_order" placeholder="Nomer Order" value="<?= $DataPesanan['no_order']; ?>" hidden>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Nama Pemilik Rekening" value="<?php echo set_value('name'); ?>" required>
                                            </div>
                                            <small class="text-danger"><?php echo form_error('name'); ?></small>
                                            <small>Tulis Nama Pemilik Bank</small>
                                        </div>

                                        <div class="form-group">
                                            <label for="nama_bank">Nama Bank</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="nama_bank" name="nama_bank" placeholder="Nama Bank" value="<?php echo set_value('nama_bank'); ?>" required>
                                            </div>
                                            <small class="text-danger"><?php echo form_error('nama_bank'); ?></small>
                                            <small>Tulis Nama Bank</small>
                                        </div>

                                        <div class="form-group">
                                            <label for="no_rek">No. Rekening</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="no_rek" name="no_rek" placeholder="Nomer Rekening" value="<?php echo set_value('no_rek'); ?>" required>
                                            </div>
                                            <small class="text-danger"><?php echo form_error('no_rek'); ?></small>
                                            <small>Tulis Nomer Rekening Bank</small>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Bukti Bayar</label>
                                            <div class="card shadow-lg">
                                                <div class="card-body">
                                                    <h4 class="mt-0 header-title">File Upload</h4>
                                                    <p class="text-muted mb-3">Upload gambar disini</p>
                                                    <input type="file" id="input-file-now" name="image" class="dropify" required />
                                                </div>
                                                <!--end card-body-->
                                            </div>
                                            <!--end card-->
                                            <small>Upload foto Maksimal 3MB</small>
                                            <!--end form-group-->
                                        </div>
                                        <!--end form-group-->

                                        <div class="form-group mb-0 row">
                                            <div class="col-6">
                                                <button class="btn btn-gradient-warning btn-round btn-block waves-effect waves-light" onclick="history.back()">Go Back</button>
                                            </div>
                                            <div class="col-6">
                                                <button class="btn btn-gradient-primary btn-round btn-block waves-effect waves-light" type="submit">Submit</button>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end form-group-->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->

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