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

                            <h4 class="mt-0 header-title">Halaman Data Menu Management Level 1</h4>
                            <p class="text-muted m-b-30 font-14">
                                Pada halaman ini admin dapat menambahkan menu level 1,
                                mengedit menu level 1, serta menghapus menu level 1.
                                Untuk memulai penambahan menu level 1 silahkan klik tomboh <b>Tambah Menu level 1</b> dibawah ini.
                            </p>

                            <?php echo form_error('menu', '<div class="alert alert-danger text-center" role="alert">', '</div>'); ?>

                            <?php echo $this->session->flashdata('message'); ?>

                            <a href="#" class="btn btn-primary waves-effect waves-light mb-3" data-toggle="modal" data-target="#newMenuModal">Tambah Menu Level 1</a>

                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr class="text-center">
                                            <th>#</th>
                                            <th>Url Menu</th>
                                            <th>Nama Menu</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($menu as $m) : ?>
                                            <tr class="text-center">
                                                <th scope="row"><?php echo $no; ?></th>
                                                <td><?php echo $m['url']; ?></td>
                                                <td><?php echo $m['title']; ?></td>
                                                <td>
                                                    <a href="#" class="mr-3"><span class="btn btn-sm btn-success waves-effect waves-light" data-toggle="modal" data-target="#newEditMenuModal<?php echo $m['id']; ?>">Edit</span></a>
                                                    <a class="btn-hapus" href="<?php echo base_url('menu/deletemenu/') . encrypt_url($m['id']); ?>"><span class="btn btn-sm btn-danger waves-effect waves-light">Delete</span></a>
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


<!-- START TAMBAH MENU MODAL -->
<div class="modal fade" id="newMenuModal" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Tambah Menu Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url(); ?>menu" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="menu">URL Menu</label>
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="URL menu" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="menu_nama">Nama Menu</label>
                        <input type="text" class="form-control" id="menu_nama" name="menu_nama" placeholder="Nama menu" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="icon">Icon</label>
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Menu icon" autocomplete="off">
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
<!-- END TAMBAH MENU MODAL -->

<!-- START EDIT MENU MODAL -->
<?php
foreach ($menu as $m) :  ?>
    <div class="modal fade" id="newEditMenuModal<?php echo $m['id']; ?>" tabindex="-1" aria-labelledby="newEditMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newEditMenuModalLabel">Edit Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url(); ?>menu/editmenu" method="POST">
                    <input type="hidden" name="id" value="<?php echo encrypt_url($m['id']); ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="menu_edit">URL Menu</label>
                            <input type="text" class="form-control" id="menu_edit" name="menu_edit" placeholder="Nama Menu" autocomplete="off" value="<?php echo $m['url']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="menu_nama_edit">Nama Menu</label>
                            <input type="text" class="form-control" id="menu_nama_edit" name="menu_nama_edit" placeholder="Nama Menu" autocomplete="off" value="<?php echo $m['title']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="icon">Icon</label>
                            <input type="text" class="form-control" id="icon" name="icon" placeholder="Menu icon" autocomplete="off" value="<?php echo $m['icon']; ?>" required>
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
<!-- END EDIT MENU MODAL -->