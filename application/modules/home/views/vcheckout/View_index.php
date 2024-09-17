<div class="page-wrapper">

    <!-- Page Content-->
    <div class="page-content">

        <div class="container-fluid">
            <!-- Page-Title -->
            <?php $this->load->view('templates/vbreadcrumb/view_index'); ?>
            <!-- end page title end breadcrumb -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mt-0 mb-3">Pesanan</h4>
                            <div class="table-responsive shopping-cart">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Berat</th>
                                            <th>Price</th>
                                            <th width="100px">Quantity</th>
                                            <th>Total Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php $tot_berat = 0; ?>
                                        <?php foreach ($this->cart->contents() as $items) : ?>
                                            <?php
                                            $barang = $this->productdetail_model->dataProductDetail($items['id'])->row_array();
                                            $berat = $items['qty'] * $barang['berat'];
                                            $tot_berat = $tot_berat + $berat;
                                            ?>
                                            <tr>
                                                <td>
                                                    <p class="d-inline-block align-middle mb-0 product-name"><?php echo $items['name']; ?></p>
                                                </td>
                                                <td><?php echo $berat; ?> Gr</td>
                                                <td>Rp. <?php echo number_format($items['price'], 0); ?></td>
                                                <td><?php echo $items['qty']; ?></td>
                                                <td>Rp. <?php echo number_format($items['subtotal'], 0); ?></td>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!--end re-table-->
                            <div class="total-payment">
                                <table class="table mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="payment-title">Grand Total</td>
                                            <td>Rp. <?php echo number_format($this->cart->total(), 0); ?></td>
                                        </tr>
                                        <tr>
                                            <td class="payment-title">Total Berat</td>
                                            <td><?php echo $tot_berat; ?> Gr</td>
                                        </tr>
                                        <tr>
                                            <td class="payment-title">Ongkir</td>
                                            <td><label id="ongkir"></label></td>
                                        </tr>
                                        <tr>
                                            <td class="payment-title">Total Bayar</td>
                                            <td><label id="total_bayar"></label></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!--end table-->
                            </div>
                            <!--end total-payment-->
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->

                <div class="col-lg-6">
                    <div class="card">

                        <?php echo $this->session->flashdata('message'); ?>

                        <?php echo validation_errors('<div class="alert alert-danger text-center" role="alert">', '</div>'); ?>

                        <div class="card-body">
                            <?php
                            $no_order = date('Ymd') . strtoupper(random_string('alnum', 8));
                            ?>
                            <h4 class="header-title mt-0 mb-3">No.Order : <?php echo $no_order; ?></h4>
                            <h4 class="header-title mt-0 mb-3">Alamat Pengiriman</h4>
                            <form method="POST" action="<?php echo base_url('home/ccart/cart/proses_checkout'); ?>" class="mb-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nama <small class="text-danger font-13">*</small></label>
                                            <input type="text" name="nama" class="form-control" id="firstname" required>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Alamat Pengiriman<small class="text-danger font-13">*</small></label>
                                            <input type="text" name="alamat_penerima" class="form-control" required>
                                        </div>
                                    </div>
                                    <!--end col-->
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
                                            <label for="kota">Kota/Kabupaten</label><br>
                                            <select class="form-control" data-live-search="true" autocomplete="off" required name="kota" id="kota">
                                                <option value="">- Pilih Kota -</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="ekspedisi">Ekspedisi</label><br>
                                            <select class="form-control" data-live-search="true" autocomplete="off" required name="ekspedisi" id="ekspedisi">
                                                <option value="">- Pilih Ekspedisi -</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="paket">Paket</label><br>
                                            <select class="form-control" data-live-search="true" autocomplete="off" required name="paket" id="paket">
                                                <option value="">- Pilih Paket -</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--end row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Kota <small class="text-danger font-13">*</small></label>
                                            <input type="text" name="kota" class="form-control" id="city" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email Address <small class="text-danger font-13">*</small></label>
                                            <input type="email" name="email" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Kode Pos <small class="text-danger font-13">*</small></label>
                                            <input type="text" name="kode_pos" onkeypress="isInputNumber(event)" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>HP Penerima <small class="text-danger font-13">*</small></label>
                                            <input type="text" name="hp_penerima" class="form-control" onkeypress="isInputNumber(event)" required>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <!-- Simpan Transaksi -->
                                    <input name="no_order" value="<?php echo $no_order; ?>" hidden>
                                    <input name="estimasi" hidden>
                                    <input name="ongkir" hidden>
                                    <input name="berat" value="<?php echo $tot_berat; ?>" hidden>
                                    <input name="grand_total" value="<?php echo $this->cart->total(); ?>" hidden>
                                    <input name="total_bayar" hidden>
                                    <!-- End Simpan Transaksi -->
                                    <!-- Simpan Rinci Transaksi -->
                                    <?php
                                    $i = 1;
                                    foreach ($this->cart->contents() as $items) {
                                        echo form_hidden('qty' . $i++, $items['qty']);
                                    }
                                    ?>
                                    <!-- End Simpan Rinci Transaksi -->

                                </div>
                                <!--end row-->
                                <a href="<?php echo base_url('home/ccart/cart'); ?>" class="btn btn-primary px-3">Kembali ke keranjang</a>
                                <button type="submit" class="btn btn-success px-3">Bayar</button>
                            </form>
                            <!--end form-->
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->

                </div>
                <!--end col-->
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mt-0 mb-3">Pembayaran</h4>
                            <div class="billing-nav">
                                <ul class="nav nav-pills justify-content-center text-center mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-credit-card-tab" data-toggle="pill" href="#pills-credit-card"><i class="mdi mdi mdi-bank d-block mx-auto text-danger font-18"></i>Transfer</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-credit-card">
                                        <div class="demo-container">
                                            <div class="card-wrapper mb-4"></div>
                                            <div class="form-container">
                                                <p>Untuk melanjutkan transaksi, silahkan melakukan pembayaran melalui transfer bank yang tersedia di bawah ini : </p>
                                                <form class="bill-form">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="">Rekening</label>
                                                            <div class="form-group">
                                                                <input placeholder="Nama Rekening" class="form-control" type="tel" name="number" value="BCA" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="">No. Rekening</label>
                                                            <div class="form-group">
                                                                <input placeholder="Nomer Rekening" class="form-control" type="tel" name="number" value="1297675478" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <!--end col-->
                                                        <div class="col-md-6">
                                                            <label for="">Nama Rekening</label>
                                                            <div class="form-group">
                                                                <input placeholder="Nama Rekening" class="form-control" type="text" name="name" value="Januar Satria Ramadhan" disabled>
                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                    </div>
                                                    <!--end row-->

                                                </form>
                                                <!--end form-->
                                            </div>
                                            <!--end form-container-->
                                        </div>
                                        <!--end demo-->
                                    </div>
                                </div>
                                <!--end tab-content-->
                            </div>
                            <!--end billing-nav-->
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
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
        //masukkan data ke ekspedisi
        $("select[name=kota]").on("change", function() {
            $.ajax({
                type: "POST",
                url: "<?= base_url('home/ccart/cart/ekspedisi') ?>",
                success: function(hasil_ekspedisi) {
                    $("select[name=ekspedisi]").html(hasil_ekspedisi);
                }
            });
        });
        //masukkan data ke ongkos kirim
        $("select[name=ekspedisi]").on("change", function() {
            //mendapatkan ekspedisi terpilih
            var ekspedisi_terpilih = $("select[name=ekspedisi]").val();
            //mendapatkan id kota tujuan terpilih
            var id_kota_tujuan_terpilih = $("option:selected", "select[name=kota]").attr('id_kota');
            //mengambil data ongkos kirim
            var total_berat = <?php echo $tot_berat; ?>;

            $.ajax({
                type: "POST",
                url: "<?= base_url('admin/crajaongkir/rajaongkir/paket') ?>",
                data: 'ekspedisi=' + ekspedisi_terpilih + '&id_kota=' + id_kota_tujuan_terpilih + '&berat=' + total_berat,
                success: function(hasil_paket) {
                    $("select[name=paket]").html(hasil_paket);
                }
            });
        });
    });

    //
    $("select[name=paket]").on("change", function() {
        //menampilkan ongkir
        var dataongkir = $("option:selected", this).attr('ongkir');
        var reverse = dataongkir.toString().split('').reverse().join(''),
            ribuan_ongkir = reverse.match(/\d{1,3}/g);
        ribuan_ongkir = ribuan_ongkir.join(',').split('').reverse().join('');

        $("#ongkir").html("Rp. " + ribuan_ongkir);
        //menghitung total bayar
        var ongkir = $("option:selected", this).attr('ongkir');
        var data_total_bayar = parseInt(ongkir) + parseInt(<?= $this->cart->total() ?>);
        var reverse2 = data_total_bayar.toString().split('').reverse().join(''),
            ribuan_total_bayar = reverse2.match(/\d{1,3}/g);
        ribuan_total_bayar = ribuan_total_bayar.join(',').split('').reverse().join('');

        $("#total_bayar").html("Rp. " + ribuan_total_bayar);

        //estimasi dan ongkir
        var estimasi = $("option:selected", this).attr('estimasi');
        $("input[name=estimasi]").val(estimasi);
        $("input[name=ongkir]").val(dataongkir);
        $("input[name=total_bayar]").val(data_total_bayar);
    });
</script>