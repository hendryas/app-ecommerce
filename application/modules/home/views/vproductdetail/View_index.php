<div class="page-wrapper">
    <!-- Page Content-->
    <div class="page-content">

        <div class="container-fluid">
            <!-- Page-Title -->
            <?php $this->load->view('templates/vbreadcrumb/view_index'); ?>
            <!-- end page title end breadcrumb -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <img src="<?php echo base_url('assets/images/product_barang/') . $productdetail['image']; ?>" alt="" class=" mx-auto  d-block" height="400">
                                </div>
                                <!--end col-->
                                <div class="col-lg-6 align-self-center">
                                    <div class="single-pro-detail">
                                        <p class="mb-1"><?php echo $productdetail['nama_barang']; ?></p>
                                        <div class="custom-border mb-3"></div>
                                        <h3 class="pro-title"><?php echo $productdetail['nama_barang']; ?></h3>

                                        <h2 class="pro-price"><?php echo number_format($productdetail['diskon_harga'], 0); ?> <span><del><?php echo number_format($productdetail['harga'], 0); ?></del></span></h2>
                                        <h6 class="text-muted font-13">Deskripsi :</h6>
                                        <p><?php echo $productdetail['deskripsi']; ?></p>
                                        <ul class="list-unstyled pro-features border-0">
                                            <li>Stok : <?php echo $productdetail['stok']; ?> </li>
                                            <li>Warna : <?php echo $productdetail['warna2']; ?> </li>
                                            <?php if (is_numeric($productdetail['ukuran']) == true) : ?>
                                                <!-- kosong -->
                                            <?php elseif (is_string($productdetail['ukuran']) == true) : ?>
                                                <li>Ukuran : <?php echo $productdetail['ukuran'] ?> </li>
                                            <?php endif; ?>

                                            <?php if ($productdetail['tipe'] == '-') : ?>
                                                <!-- kosong -->
                                            <?php else : ?>
                                                <li>Tipe : <?php echo $productdetail['tipe'] ?> </li>
                                            <?php endif; ?>
                                        </ul>
                                        <?php
                                        echo form_open('home/ccart/cart/add');
                                        echo form_hidden('id', $productdetail['id']);
                                        echo form_hidden('price', $productdetail['diskon_harga']);
                                        echo form_hidden('name', $productdetail['nama_barang']);
                                        echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                                        ?>
                                        <div class="quantity mt-3 ">
                                            <input class="form-control" type="number" min="1" value="1" id="example-number-input" name="qty">
                                            <button type="submit" href="" class="btn btn-gradient-primary text-white px-4 d-inline-block sa-mixin"><i class="mdi mdi-cart mr-2"></i>Add to Cart</button>
                                        </div>
                                        <?php echo form_close(); ?>
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

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="pro-order-box">
                                        <i class="mdi mdi-truck-fast text-success"></i>
                                        <h4 class="header-title">Fast Delivery</h4>
                                        <p class="text-muted mb-0">
                                            Dengan jasa kurir yang sudah bekerja sama dengan kami, Anda dapat menghemat waktu dan biaya pengiriman.
                                        </p>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-3">
                                    <div class="pro-order-box">
                                        <i class="mdi mdi-refresh text-danger"></i>
                                        <h4 class="header-title">Returns in 30 Days</h4>
                                        <p class="text-muted mb-0">
                                            Jika barang tidak sesuai, Anda dapat mengembalikan barang dalam waktu 30 hari.
                                        </p>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-3">
                                    <div class="pro-order-box">
                                        <i class="mdi mdi-headset text-warning"></i>
                                        <h4 class="header-title">Online Support 24/7</h4>
                                        <p class="text-muted mb-0">
                                            Support center kami online 24 Jam, Anda dapat menghubungi kami melalui email atau telepon.
                                        </p>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-3">
                                    <div class="pro-order-box mb-0">
                                        <i class="mdi mdi-wallet text-purple"></i>
                                        <h4 class="header-title">Secure Payment</h4>
                                        <p class="text-muted mb-0">
                                            Pembayaran via transfer bank,dan kami menjamin keamanan pembayaran anda.
                                        </p>
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

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="mt-0">Product Yang Mungkin Anda Suka</h5>
                            <p class="text-muted mb-3 font-14">
                            </p>
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                    <div class="row">
                        <?php foreach ($product as $p) : ?>
                            <div class="col-lg-4">
                                <div class="card e-co-product">
                                    <a href="">
                                        <img src="<?php echo base_url('assets/images/product_barang/') . $p['image']; ?>" alt="" class="img-fluid">
                                    </a>
                                    <div class="card-body product-info">
                                        <a href="" class="product-title"><?= $p['nama_barang']; ?></a>
                                        <div class="d-flex justify-content-between my-2">
                                            <p class="product-price"><?= number_format($p['harga'], 0); ?> <span class="ml-2"><del><?= number_format($p['diskon_harga'], 0); ?></del></span></p>

                                        </div>
                                        <button class="btn btn-gradient-primary btn-round px-3 btn-sm waves-effect waves-light"><i class="mdi mdi-cart mr-1"></i> Add To Cart</button>
                                        <button class="btn btn-dark  btn-sm waves-effect waves-light wishlist" data-toggle="tooltip" data-placement="top" title="Wishlist"><i class="mdi mdi-heart"></i></button>
                                        <button class="btn btn-dark  btn-sm waves-effect waves-light quickview" data-toggle="tooltip" data-placement="top" title="Quickview"><i class="mdi mdi-magnify"></i></button>
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end card-->
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!--end row-->
                </div>
                <!--end col-->

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