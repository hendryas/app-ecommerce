<!-- Left Sidenav -->

<!-- end left-sidenav-->

<div class="page-wrapper">

    <!-- Page Content-->
    <div class="page-content">

        <div class="container-fluid">
            <!-- Page-Title -->
            <?php $this->load->view('templates/vbreadcrumb/view_index'); ?>
            <!-- end page title end breadcrumb -->
            <div class="row">
                <?php foreach ($product as $p) : ?>
                    <div class="col-lg-3">
                        <?php
                        echo form_open('home/ccart/cart/add');
                        echo form_hidden('id', $p['id']);
                        echo form_hidden('qty', 1);
                        echo form_hidden('price', $p['diskon_harga']);
                        echo form_hidden('name', $p['nama_barang']);
                        echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                        ?>
                        <div class="card e-co-product">

                            <a href="<?php echo base_url('home/cproductdetail/productdetail/productdetail/') . encrypt_url($p['id']); ?>">
                                <img src="<?php echo base_url('assets/images/product_barang/') . $p['image']; ?>" alt="" class="img-fluid">
                            </a>
                            <div class="card-body product-info">
                                <a href="" class="product-title"><?php echo $p['nama_barang']; ?></a>
                                <div class="d-flex justify-content-between my-2">
                                    <p class="product-price"><?php echo number_format($p['diskon_harga'], 0); ?> <span class="ml-2"><del><?php echo number_format($p['harga'], 0); ?></del></span></p>
                                </div>
                                <button type="submit" class="btn btn-gradient-primary btn-round px-3 btn-sm waves-effect waves-light sa-mixin"><i class="mdi mdi-cart mr-1"></i> Add To Cart</button>
                                <button class="btn btn-dark  btn-sm waves-effect waves-light wishlist" data-toggle="tooltip" data-placement="top" title="Wishlist"><i class="mdi mdi-heart"></i></button>
                                <button class="btn btn-dark  btn-sm waves-effect waves-light quickview" data-toggle="tooltip" data-placement="top" title="Quickview"><i class="mdi mdi-magnify"></i></button>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                        <?php echo form_close(); ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <!--end row-->

            <div class="row">
                <div class="col-12">
                    <div class="card offer-box">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mx-auto">
                                    <div class="offer-content text-center justify-content-center">
                                        <p class="text-muted">Monsoon Sale</p>
                                        <h3 class="mb-3">Save Up To 50% Off</h3>
                                        <hr class="thick">
                                        <h5 class="text-muted">This Offer One Week Available Only</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->

            <div class="row">
                <?php foreach ($product_pakaian as $pp) : ?>
                    <div class="col-lg-3">
                        <?php
                        echo form_open('home/ccart/cart/add');
                        echo form_hidden('id', $pp['id']);
                        echo form_hidden('qty', 1);
                        echo form_hidden('price', $pp['diskon_harga']);
                        echo form_hidden('name', $pp['nama_barang']);
                        echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                        ?>
                        <div class="card e-co-product">

                            <a href="<?php echo base_url('home/cproductdetail/productdetail/productdetail/') . encrypt_url($pp['id']); ?>">
                                <img src="<?php echo base_url('assets/images/product_barang/') . $pp['image']; ?>" alt="" class="img-fluid">
                            </a>
                            <div class="card-body product-info">
                                <a href="" class="product-title"><?php echo $pp['nama_barang']; ?></a>
                                <div class="d-flex justify-content-between my-2">
                                    <p class="product-price">Rp.<?php echo number_format($pp['diskon_harga'], 0); ?> <span class="ml-2"><del>Rp.<?php echo number_format($pp['harga'], 0); ?></del></span></p>
                                </div>
                                <button type="submit" class="btn btn-gradient-primary btn-round px-3 btn-sm waves-effect waves-light sa-mixin"><i class="mdi mdi-cart mr-1"></i> Add To Cart</button>
                                <button class="btn btn-dark  btn-sm waves-effect waves-light wishlist" data-toggle="tooltip" data-placement="top" title="Wishlist"><i class="mdi mdi-heart"></i></button>
                                <button class="btn btn-dark  btn-sm waves-effect waves-light quickview" data-toggle="tooltip" data-placement="top" title="Quickview"><i class="mdi mdi-magnify"></i></button>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                        <?php echo form_close(); ?>
                    </div>
                <?php endforeach; ?>
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