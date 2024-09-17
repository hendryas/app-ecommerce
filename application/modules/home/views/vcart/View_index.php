<div class="page-wrapper">

    <!-- Page Content-->
    <div class="page-content">

        <div class="container-fluid">
            <!-- Page-Title -->
            <?php $this->load->view('templates/vbreadcrumb/view_index'); ?>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <?php echo $this->session->flashdata('message'); ?>

                            <h4 class="header-title mt-0">Shopping Cart</h4>
                            <p class="mb-4 text-muted">Frogetor morden shopping cart.</p>
                            <?php echo form_open('home/ccart/cart/updatebarangcart'); ?>
                            <div class="table-responsive shopping-cart">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Berat</th>
                                            <th>Price</th>
                                            <th width="100px">Quantity</th>
                                            <th>Sub-Total</th>
                                            <th>Action</th>
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
                                                    <img src="../assets/images/products/img-5.png" alt="" height="52">
                                                    <p class="d-inline-block align-middle mb-0">
                                                        <a href="" class="d-inline-block align-middle mb-0 product-name"> <?php echo $items['name']; ?></a>
                                                        <br>
                                                        <!-- <span class="text-muted font-13">size-08 (Model 2019)</span> -->
                                                    </p>
                                                </td>
                                                <td><?php echo $berat; ?> Gr</td>
                                                <td>Rp. <?php echo number_format($items['price'], 0); ?></td>
                                                <td>
                                                    <?php echo form_input(array('name' => $i . '[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'min' => '0', 'size' => '5', 'type' => 'number', 'class' => 'form-control')); ?>
                                                    <!-- <input class="form-control w-25" type="number" value="2" id="example-number-input1"> -->
                                                </td>
                                                <td>Rp. <?php echo number_format($items['subtotal'], 0); ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('home/ccart/cart/deletebarangcart/') . $items['rowid']; ?>" class="text-dark"><i class="mdi mdi-close-circle-outline font-18"></i></a>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row justify-content-center">
                                <!--end col-->
                                <div class="col-md-12">
                                    <div class="total-payment">
                                        <h4 class="header-title">Total Payment</h4>
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="payment-title">Total</td>
                                                    <td class="text-dark"><strong>Rp. <?php echo number_format($this->cart->total(), 0); ?></strong></td>
                                                </tr>
                                                <tr>
                                                    <td class="payment-title">Total Berat</td>
                                                    <td class="text-dark"><strong><?php echo $tot_berat; ?> Gr</strong></td>
                                                </tr>
                                                <!-- <p><?php echo form_submit('', 'Update your Cart'); ?></p> -->

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 mt-3">
                                            <button class="btn btn-gradient-primary text-white px-4 d-inline-block">Update Cart</button>
                                            <a href="<?php echo base_url('home/ccart/cart/clearbarangcart'); ?>" class="btn btn-gradient-danger text-white px-4 d-inline-block">Delete Cart</a>
                                        </div>
                                    </div>
                                    <?php echo form_close(); ?>
                                    <div class="mt-4">
                                        <div class="row">
                                            <div class="col-6">
                                                <a href="<?php echo base_url('home/chome/home'); ?>" class="text-info"><i class="fas fa-long-arrow-alt-left mr-1"></i> Continue Shopping</a>
                                            </div>
                                            <div class="col-6 text-right">
                                                <a href="<?php echo base_url('home/ccart/cart/checkout'); ?>" class="text-info">Checkout <i class="fas fa-long-arrow-alt-right ml-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end card-body-->
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