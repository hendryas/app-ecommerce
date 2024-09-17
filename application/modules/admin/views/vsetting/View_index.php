<div class="page-wrapper">
    <!-- Page Content-->
    <div class="page-content">

        <div class="container-fluid">
            <!-- Page-Title -->
            <?php $this->load->view('templates/vbreadcrumb/view_index'); ?>
            <!-- end page title end breadcrumb -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Setting Website</h4>
                            <p class="text-muted m-b-30 font-14">
                            </p>

                            <?php echo $this->session->flashdata('message'); ?>

                            <!-- <a href="#" class="btn btn-primary waves-effect waves-light mb-3" data-toggle="modal" data-target="#newSettingModal">Setting Modal</a> -->

                            <?php echo form_open('admin/cadmin/admin/setting') ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="provinsi">Provinsi</label><br>
                                        <select class="form-control" data-live-search="true" autocomplete="off" required name="provinsi" id="provinsi">
                                            <option value="">- Pilih Provinsi -</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="kota">Kota</label><br>
                                        <select class="form-control" data-live-search="true" autocomplete="off" required name="kota" id="kota">
                                            <option value="">- Pilih Kota -</option>
                                            <option value="<?php echo $setting['lokasi']; ?>"> <?php echo $setting['lokasi']; ?> </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="nama_toko">Nama Toko</label><br>
                                        <input type="text" class="form-control" id="nama_toko" name="nama_toko" placeholder="Nama Toko" autocomplete="off" value="<?php echo $setting['nama_toko']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="no_telepon">Nomor Telepon</label><br>
                                        <input type="text" class="form-control" onkeypress="isInputNumber(event)" id="no_telepon" name="no_telepon" placeholder="Nomor Telepon" autocomplete="off" value=" <?php echo $setting['no_telepon']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="alamat_toko">Alamat Toko</label><br>
                                        <input type="text" class="form-control" id="alamat_toko" name="alamat_toko" placeholder="Alamat Toko" autocomplete="off" value="<?php echo $setting['alamat_toko']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-gradient-primary text-white px-4 d-inline-block mb-5">Simpan</button>
                            <a href="<?php echo base_url('admin/cadmin/admin'); ?>" class="btn btn-gradient-warning text-white px-4 d-inline-block mb-5">Kembali</a>
                            <?php echo form_close() ?>


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

<script>
    $(document).ready(function() {
        //masukkan data ke provinsi
        $.ajax({
            type: "POST",
            url: "<?= base_url('admin/crajaongkir/rajaongkir/provinsi') ?>",
            success: function(hasil_provinsi) {
                // console.log(hasil_provinsi);
                $("select[name=provinsi]").html(hasil_provinsi);
            }
        });
        //masukkan data ke kota
        $("select[name=provinsi]").on("change", function() {
            var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");

            $.ajax({
                type: "POST",
                url: "<?= base_url('admin/crajaongkir/rajaongkir/kota') ?>",
                data: 'id_provinsi=' + id_provinsi_terpilih,
                success: function(hasil_kota) {
                    // console.log(hasil_kota);
                    $("select[name=kota]").html(hasil_kota);
                }
            });
        });
    });
</script>