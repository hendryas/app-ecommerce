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

                            <h4 class="mt-0 header-title">Master Kategori Product</h4>
                            <p class="text-muted m-b-30 font-14">
                                Pada halaman master kategori product, admin dapat menambahkan kategori product,
                                mengedit kategori product, serta menghapus kategori product.
                                Untuk memulai penambahan kategori product silahkan klik tomboh <b>Tambah Kategori</b> dibawah ini.
                            </p>

                            <?php echo $this->session->flashdata('message'); ?>

                            <a href="#" class="btn btn-primary waves-effect waves-light mb-3" data-toggle="modal" data-target="#newKategoriModal">Tambah Kategori</a>

                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr class="text-center">
                                            <th>#</th>
                                            <th>Kategori</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($kategori as $k) : ?>
                                            <tr class="text-center">
                                                <th scope="row"><?php echo $no; ?></th>
                                                <td><?php echo $k['kategori']; ?></td>
                                                <td>
                                                    <a href="#" class="mr-3"><span class="btn btn-sm btn-success waves-effect waves-light" data-toggle="modal" data-target="#newEditKategoriModal<?php echo $k['id']; ?>">Edit</span></a>
                                                    <a class="btn-hapus" href="<?php echo base_url('master/ckategori/kategori/deletekategori/') . encrypt_url($k['id']); ?>"><span class="btn btn-sm btn-danger waves-effect waves-light">Delete</span></a>
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

<!-- START TAMBAH Kategori MODAL -->
<div class="modal fade" id="newKategoriModal" tabindex="-1" aria-labelledby="newKategoriModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newKategoriModalLabel">Tambah Kategori Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url(); ?>master/ckategori/kategori/tambahkategori" method="POST">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="nama_kategori">Nama Kategori</label><br>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Nama Kategori" autocomplete="off" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END TAMBAH Kategori MODAL -->

<!-- START EDIT Kategori MODAL -->
<?php
foreach ($kategori as $k) :  ?>
    <div class="modal fade" id="newEditKategoriModal<?php echo $k['id']; ?>" tabindex="-1" aria-labelledby="newEditKategoriModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newEditKategoriModalLabel">Edit Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url(); ?>master/ckategori/kategori/editkategori" method="POST">
                    <input type="hidden" name="id" value="<?php echo $k['id']; ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_kategori">Nama Kategori</label><br>
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Nama Kategori" autocomplete="off" value="<?php echo $k['kategori']; ?>" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- END EDIT Kategori MODAL -->