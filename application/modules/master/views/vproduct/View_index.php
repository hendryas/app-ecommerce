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

                            <h4 class="mt-0 header-title">Master Product</h4>
                            <p class="text-muted m-b-30 font-14">
                                Pada halaman master product, admin dapat menambahkan product atau barang yang akan di posting di e-commerce,
                                mengedit product atau barang yang sudah diposting, serta menghapus product atau barang yang sudah diposting.
                                Untuk memulai penambahan product atau barang silahkan klik tomboh <b>Tambah Product</b> dibawah ini.
                            </p>

                            <?php echo $this->session->flashdata('message'); ?>


                            <a href="#" class="btn btn-primary waves-effect waves-light mb-3" data-toggle="modal" data-target="#newProductModal">Tambah Product</a>

                            <a href="<?= base_url('rekapadmin/crekapadmin/rekapadmin'); ?>" class="btn btn-primary waves-effect waves-light mb-3">Rekap Admin</a>

                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr class="text-center">
                                            <th>#</th>
                                            <th>Nama Barang</th>
                                            <th>Harga</th>
                                            <th>Berat</th>
                                            <th>Diskon Harga</th>
                                            <th>Deskripsi</th>
                                            <th>Ukuran</th>
                                            <th>Tipe</th>
                                            <th>Warna</th>
                                            <th>Stok</th>
                                            <th>Gambar</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($product as $p) : ?>
                                            <tr class="text-center">
                                                <th scope="row"><?php echo $no; ?></th>
                                                <td><?php echo $p['nama_barang']; ?></td>
                                                <td>Rp.<?php echo number_format($p['harga'], 0); ?></td>
                                                <td><?php echo $p['berat']; ?> Gr</td>
                                                <td>Rp.<?php echo number_format($p['diskon_harga'], 0); ?></td>
                                                <td><?php echo $p['deskripsi']; ?></td>

                                                <?php if (is_string($p['ukuran'])) : ?>
                                                    <td><?php echo $p['ukuran']; ?></td>
                                                <?php elseif ($p['ukuran'] == 0) : ?>
                                                    <td> Tidak Ada </td>
                                                <?php endif; ?>

                                                <td><?php echo $p['tipe']; ?></td>
                                                <td><?php echo $p['warna2']; ?></td>
                                                <td><?php echo $p['stok']; ?></td>
                                                <td> <img src="<?php echo base_url('assets/images/product_barang/') . $p['image']; ?>" width="200" height="150" alt="Gambar Product"> </td>
                                                <td>
                                                    <a href="#" class="mr-3"><span class="btn btn-sm btn-success waves-effect waves-light" data-toggle="modal" data-target="#newEditProductModal<?php echo $p['id']; ?>">Edit</span></a>
                                                    <a class="btn-hapus" href="<?php echo base_url('master/cproduct/product/deleteproduct/') . encrypt_url($p['id']); ?>"><span class="btn btn-sm btn-danger waves-effect waves-light">Delete</span></a>
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

<!-- START TAMBAH Product MODAL -->
<div class="modal fade" id="newProductModal" tabindex="-1" aria-labelledby="newProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newProductModalLabel">Tambah Product Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url(); ?>master/cproduct/product/tambahproduct" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_kategori">Kategori</label><br>
                        <select class="form-control selectpicker" data-live-search="true" autocomplete="off" required name="id_kategori" id="id_kategori">
                            <option value="">- Pilih Tipe -</option>
                            <option value="0">- Tidak Ada -</option>
                            <?php foreach ($kategori as $k) : ?>
                                <option value="<?php echo $k['id']; ?>"><?php echo $k['kategori']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label><br>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label><br>
                        <input type="text" class="form-control" id="harga1" name="harga" placeholder="Harga" autocomplete="off" onkeypress="isInputNumber(event)" required>
                    </div>
                    <div class="form-group">
                        <label for="berat">Berat (Gr)</label><br>
                        <input type="number" class="form-control" id="berat" min="0" name="berat" placeholder="Berat dalam satuan gram" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="diskon_harga">Diskon Harga</label><br>
                        <input type="text" class="form-control" id="diskon_harga3" name="diskon_harga" placeholder="Diskon Harga" autocomplete="off" onkeypress="isInputNumber(event)" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_barang">Deskripsi Barang</label><br>
                        <textarea class="form-control" name="deskripsi_barang" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="ukuran">Ukuran</label><br>
                        <select class="form-control selectpicker" data-live-search="true" autocomplete="off" required name="ukuran" id="ukuran">
                            <option value="">- Pilih Tipe -</option>
                            <option value="0">- Tidak Ada -</option>
                            <option value="S">- S -</option>
                            <option value="M">- M -</option>
                            <option value="L">- L -</option>
                            <option value="XL">- XL -</option>
                            <option value="XXL">- XXL -</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="warna">Warna</label><br>
                        <select class="form-control selectpicker" data-live-search="true" autocomplete="off" required name="warna" id="warna">
                            <option value="">- Pilih Tipe -</option>
                            <option value="0">- Tidak Ada -</option>
                            <?php foreach ($color as $c) : ?>
                                <option value="<?php echo $c['id']; ?>"><?php echo $c['warna']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tipe">Tipe</label><br>
                        <input type="text" class="form-control" id="tipe" name="tipe" placeholder="Tipe" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label><br>
                        <input type="text" class="form-control" id="stok" name="stok" placeholder="Stok" autocomplete="off" onkeypress="isInputNumber(event)" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Upload Foto</label>
                        <div class="card shadow-lg">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">File Upload</h4>
                                <p class="text-muted mb-3">Upload gambar disini</p>
                                <input type="file" id="input-file-now" name="image" class="dropify" required />
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                        <small>Upload foto ukuran 4x6 Maksimal 3MB | Ukuran 420x420</small>
                        <!--end form-group-->
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
<!-- END TAMBAH Product MODAL -->

<!-- START EDIT Product MODAL -->
<?php
foreach ($product as $p) :  ?>
    <div class="modal fade" id="newEditProductModal<?php echo $p['id']; ?>" tabindex="-1" aria-labelledby="newEditProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newEditProductModalLabel">Edit Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url(); ?>master/cproduct/product/editproduct" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $p['id']; ?>">
                    <input type="hidden" name="kode_product" value="<?php echo $p['kode_product']; ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="id_kategori">Kategori</label><br>
                            <select class="form-control selectpicker" data-live-search="true" autocomplete="off" required name="id_kategori" id="id_kategori">
                                <option value="">- Pilih Tipe -</option>
                                <option value="0">- Tidak Ada -</option>
                                <?php foreach ($kategori as $k) : ?>
                                    <option value="<?php echo $k['id']; ?>"><?php echo $k['kategori']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label><br>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang" autocomplete="off" value="<?php echo $p['nama_barang']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label><br>
                            <input type="text" class="form-control" id="harga2" name="harga" placeholder="Harga" autocomplete="off" onkeypress="isInputNumber(event)" value="<?php echo $p['harga']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="berat">Berat (Gr)</label><br>
                            <input type="number" class="form-control" id="berat" name="berat" min="0" placeholder="Berat dalam satuan gram" autocomplete="off" value="<?php echo $p['berat']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="diskon_harga">Diskon Harga</label><br>
                            <input type="text" class="form-control" id="diskon_harga4" name="diskon_harga" placeholder="Diskon Harga" autocomplete="off" onkeypress="isInputNumber(event)" value="<?php echo $p['diskon_harga']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi_barang">Deskripsi Barang</label><br>
                            <textarea class="form-control" name="deskripsi_barang" rows="5" required><?php echo $p['deskripsi'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="ukuran">Ukuran</label><br>
                            <select class="form-control selectpicker" data-live-search="true" autocomplete="off" required name="ukuran" id="ukuran">
                                <option value="">- Pilih Tipe -</option>
                                <option value="0">- Tidak Ada -</option>
                                <option value="S">- S -</option>
                                <option value="M">- M -</option>
                                <option value="L">- L -</option>
                                <option value="XL">- XL -</option>
                                <option value="XXL">- XXL -</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="warna">Warna</label><br>
                            <select class="form-control selectpicker" data-live-search="true" autocomplete="off" required name="warna" id="warna">
                                <option value="">- Pilih Tipe -</option>
                                <option value="0">- Tidak Ada -</option>
                                <?php foreach ($color as $c) : ?>
                                    <option value="<?php echo $c['id']; ?>"><?php echo $c['warna']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tipe">Tipe</label><br>
                            <input type="text" class="form-control" id="tipe" name="tipe" placeholder="Tipe" autocomplete="off" value="<?php echo $p['tipe'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label><br>
                            <input type="text" class="form-control" id="stok" name="stok" placeholder="Stok" autocomplete="off" onkeypress="isInputNumber(event)" value="<?php echo $p['stok'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Upload Foto</label>
                            <div class="card shadow-lg">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">File Upload</h4>
                                    <p class="text-muted mb-3">Upload gambar disini</p>
                                    <input type="file" id="input-file-now" name="image" class="dropify" />
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                            <small>Upload foto ukuran 4x6 Maksimal 3MB | Ukuran 420x420</small>
                            <!--end form-group-->
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
<!-- END EDIT Product MODAL -->

<!-- <script>
    var rupiah1 = document.getElementById("harga1");
    rupiah1.addEventListener("keyup", function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah1.value = formatRupiah1(this.value, "Rp. ");
    });

    /* Fungsi formatRupiah */
    function formatRupiah1(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
    }
</script> -->

<!-- <script>
    var rupiah2 = document.getElementById("harga2");
    rupiah2.addEventListener("keyup", function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah2.value = formatRupiah2(this.value, "Rp. ");
    });

    /* Fungsi formatRupiah */
    function formatRupiah2(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
    }
</script> -->

<!-- <script>
    var rupiah3 = document.getElementById("diskon_harga3");
    rupiah3.addEventListener("keyup", function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah3.value = formatRupiah3(this.value, "Rp. ");
    });

    /* Fungsi formatRupiah */
    function formatRupiah3(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
    }
</script>

<script>
    var rupiah4 = document.getElementById("diskon_harga4");
    rupiah4.addEventListener("keyup", function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah4.value = formatRupiah4(this.value, "Rp. ");
    });

    /* Fungsi formatRupiah */
    function formatRupiah4(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
    }
</script> -->