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

                            <h4 class="mt-0 header-title">Halaman Data Menu Management Level 3</h4>
                            <p class="text-muted m-b-30 font-14">
                                Pada halaman ini admin dapat menambahkan menu level 3,
                                mengedit menu level 3, serta menghapus menu level 3.
                                Untuk memulai penambahan menu level 3 silahkan klik tomboh <b>Tambah Menu level 3</b> dibawah ini.
                            </p>

                            <?php if (validation_errors()) : ?>
                                <div class="alert alert-danger text-center" role="alert">
                                    <?php echo validation_errors(); ?>
                                </div>
                            <?php endif; ?>

                            <?php echo $this->session->flashdata('message'); ?>

                            <a href="#" class="btn btn-primary waves-effect waves-light mb-3" data-toggle="modal" data-target="#newMenuLevel3Modal">Tambahkan submenu level 3 baru</a>
                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr class="text-center">
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Menu Level 2</th>
                                            <th>Url</th>
                                            <th>Icon</th>
                                            <th>Active</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($menuleveltiga as $mlt) : ?>
                                            <tr class="text-center">
                                                <th scope="row"><?php echo $no; ?></th>
                                                <td><?php echo $mlt['title']; ?></td>
                                                <td><?php echo $mlt['title2']; ?></td>
                                                <td><?php echo $mlt['url']; ?></td>
                                                <td><?php echo $mlt['icon']; ?></td>
                                                <?php if ($mlt['is_active'] == 1) : ?>
                                                    <td>
                                                        <p>Aktif</p>
                                                    </td>
                                                <?php elseif ($mlt['is_active'] == 0) : ?>
                                                    <td>
                                                        <p>Tidak Aktif</p>
                                                    </td>
                                                <?php endif; ?>
                                                <td>
                                                    <a href="#"><span class="btn btn-sm btn-success waves-effect waves-light" data-toggle="modal" data-target="#newEditMenuLevelTigaModal<?php echo $mlt['id']; ?>">Edit</span></a>
                                                    <a class="btn-hapus" href="<?php echo base_url('menu/deletemenuleveltiga/') . encrypt_url($mlt['id']); ?>"><span class="btn btn-sm btn-danger waves-effect waves-light">Delete</span></a>
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

<!-- START TAMBAH SUBMENU MODAL -->
<div class="modal fade" id="newMenuLevel3Modal" tabindex="-1" aria-labelledby="newMenuLevel3ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuLevel3ModalLabel">Tambah Sub Menu Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url(); ?>menu/menulevel3" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <select name="id_menu_level_2" id="id_menu_level_2" class="form-control selectpicker" data-live-search="true" required>
                            <option value="">Select Menu Level 2</option>
                            <?php foreach ($menuleveldua as $mld) : ?>
                                <option value="<?php echo $mld['id']; ?>"><?php echo $mld['title']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Active?
                            </label>
                        </div>
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
<!-- END TAMBAH SUBMENU MODAL -->

<!-- START EDIT SUBMENU MODAL -->
<?php
foreach ($menuleveltiga as $mlt) :  ?>
    <div class="modal fade" id="newEditMenuLevelTigaModal<?php echo $mlt['id']; ?>" tabindex="-1" aria-labelledby="newEditMenuLevelTigaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newEditMenuLevelTigaModalLabel">Edit Sub Menu Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url(); ?>menu/editmenuleveltiga" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <input name="id" type="hidden" value="<?php echo $mlt['id']; ?>">
                            <input name="menu_id" type="hidden" value="<?php echo $mlt['id_menu_level_2']; ?>">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Menu title" autocomplete="off" value="<?php echo $mlt['title']; ?>">
                        </div>
                        <div class="form-group">
                            <select name="id_menu_level_2" id="id_menu_level_2" class="form-control selectpicker" data-live-search="true" required>
                                <option value="">Select Menu Level 2</option>
                                <?php foreach ($menuleveldua as $mld) : ?>
                                    <option value="<?php echo $mld['id']; ?>"><?php echo $mld['title']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url" autocomplete="off" value="<?php echo $mlt['url']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon" autocomplete="off" value="<?php echo $mlt['icon']; ?>">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                                <label class="form-check-label" for="is_active">
                                    Active?
                                </label>
                            </div>
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
<!-- END EDIT SUBMENU MODAL -->