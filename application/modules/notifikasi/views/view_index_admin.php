<div class="wrapper">
    <div class="container-fluid">

        <!-- Page-Title -->
        <div class="row mt-3">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group float-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#"><?php echo $title; ?></a></li>
                        </ol>
                    </div>
                    <h4 class="page-title"><?php echo $title; ?></h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <!--====START CONTENT HERE =====-->
        <div class="col-lg-10">
            <div class="card m-b-30">
                <div class="card-body-light">


                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger text-center" role="alert">
                            <?php echo validation_errors(); ?>
                        </div>
                    <?php endif; ?>

                    <?php echo $this->session->flashdata('message'); ?>


                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <th class="text-center">
                                <?php foreach ($notifikasi_admin as $notif) : ?>
                                    <tr class="font-18">

                                        <td><i class="mdi mdi-message-alert mdi-25px"></i> <?php echo $notif['isi_notifikasi']; ?></td>
                                        <td class="text-right text-muted"><span class="text-danger">
                                                <?php echo date('H:i', strtotime($notif['tanggal'])); ?></span> <?php echo date('d/m/Y', strtotime($notif['tanggal'])); ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </th>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
        <!--====END CONTENT HERE =====-->

    </div> <!-- end container -->
</div>
<!-- end wrapper -->