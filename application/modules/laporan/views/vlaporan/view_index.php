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

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            <h4 class="mt-0 header-title">Laporan Harian</h4>
                                            <?php echo form_open('laporan/claporan/laporan/lap_harian'); ?>
                                            <div class="row">

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="tanggal">Tanggal</label>
                                                        <select name="tanggal" id="tanggal" class="form-control">
                                                            <?php
                                                            $mulai = 1;
                                                            for ($i = $mulai; $i < $mulai + 31; $i++) {
                                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="bulan">Bulan</label>
                                                        <select name="bulan" id="bulan" class="form-control">
                                                            <?php
                                                            $mulai = 1;
                                                            for ($i = $mulai; $i < $mulai + 12; $i++) {
                                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="tahun">Tahun</label>
                                                        <select name="tahun" id="tahun" class="form-control">
                                                            <?php
                                                            $mulai = date('Y') - 1;
                                                            for ($i = $mulai; $i < $mulai + 7; $i++) {
                                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-gradient-purple btn-block">Cetak Laporan</button>
                                                    </div>
                                                </div>

                                            </div>
                                            <?php echo form_close(); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            <h4 class="mt-0 header-title">Laporan Bulanan</h4>
                                            <?php echo form_open('laporan/claporan/laporan/lap_bulanan'); ?>
                                            <div class="row">

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="bulan">Bulan</label>
                                                        <select name="bulan" id="bulan" class="form-control">
                                                            <?php
                                                            $mulai = 1;
                                                            for ($i = $mulai; $i < $mulai + 12; $i++) {
                                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="tahun">Tahun</label>
                                                        <select name="tahun" id="tahun" class="form-control">
                                                            <?php
                                                            $mulai = date('Y') - 1;
                                                            for ($i = $mulai; $i < $mulai + 7; $i++) {
                                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-gradient-purple btn-block">Cetak Laporan</button>
                                                    </div>
                                                </div>

                                            </div>
                                            <?php echo form_close(); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            <h4 class="mt-0 header-title">Laporan Tahun</h4>
                                            <?php echo form_open('laporan/claporan/laporan/lap_tahunan'); ?>
                                            <div class="row">

                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="tahun">Tahun</label>
                                                        <select name="tahun" id="tahun" class="form-control">
                                                            <?php
                                                            $mulai = date('Y') - 1;
                                                            for ($i = $mulai; $i < $mulai + 7; $i++) {
                                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-gradient-purple btn-block">Cetak Laporan</button>
                                                    </div>
                                                </div>

                                            </div>
                                            <?php echo form_close(); ?>
                                        </div>
                                    </div>
                                </div>
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