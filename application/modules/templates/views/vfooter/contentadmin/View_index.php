<!-- jQuery  -->
<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery-ui.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/metismenu.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/waves.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/feather.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.slimscroll.min.js'); ?>"></script>

<!-- App js -->
<script src="<?php echo base_url('assets/js/app.js'); ?>"></script>

<!-- File Upload  -->
<script src="<?php echo base_url('assets/plugins/dropify/js/dropify.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/pages/jquery.form-upload.init.js') ?>"></script>

<!-- Bootstrap Show Password Js -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap-show-password.min.js"></script>

<!-- Select Search Js -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap-select.min.js"></script>

<!-- Required datatable js -->
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap4.min.js'); ?>"></script>

<!-- Buttons examples -->
<script src="<?php echo base_url('assets/plugins/datatables/dataTables.buttons.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables/buttons.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables/jszip.min.js'); ?>"></script>
<!-- <script src="<?php echo base_url('assets/plugins/datatables/pdfmake.min.js'); ?>"></script> -->
<script src="<?php echo base_url('assets/plugins/datatables/vfs_fonts.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables/buttons.html5.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables/buttons.print.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables/buttons.colVis.min.js'); ?>"></script>

<!-- Responsive examples -->
<script src="<?php echo base_url('assets/plugins/datatables/dataTables.responsive.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables/responsive.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/pages/jquery.datatable.init.js'); ?>"></script>

<!-- Sweet Alert -->
<script src="<?php echo base_url('assets/js/promise-polyfill.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/sweetalert2.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/custom-sweetalert.js'); ?>"></script>

<script>
    <?= $this->session->flashdata('message'); ?>

    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?php echo base_url('admin/cadmin/admin/changeaccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?php echo base_url('admin/cadmin/admin/roleaccess/'); ?>" + roleId; //ini seperti redirect,namun di ajax
            }
        });
    });
</script>

<script>
    //==START==//
    //==Format Only input numbers==//
    function isInputNumber(evt) {
        var ch = String.fromCharCode(evt.which);
        if (!(/[0-9]/.test(ch))) {
            evt.preventDefault();
        }
    }
    //==END==//
    //==Format Only input numbers==//
</script>

<script>
    $('.btn-hapus').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');
        swal({
            title: 'Apakah kamu yakin?',
            text: "Ingin menghapus data ini!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            padding: '2em'
        }).then(function(result) {
            if (result.value) {
                document.location.href = href
            }
        });
    });
</script>

<script>
    $(document).ready(function() {

        //updating the view with notifications using ajax

        function load_unseen_notification(view = '')

        {

            $.ajax({

                url: "<?php echo base_url(); ?>Notifikasi/user_notifi",
                method: "POST",
                data: {
                    "view": view
                },
                dataType: "json",
                success: function(data)

                {

                    $('.dropdown-menu-lg').html(data.notification);
                    $('.count').show();
                    if (data.unseen_notification > 0) {

                        $('.count').html(data.unseen_notification);
                    } else if (data.unseen_notification == '') {

                        $('.count').hide();

                    }

                }

            });

        }

        load_unseen_notification();


        // load new notifications

        $(document).on('click', '.dropdown-toggle', function() {

            $('.count').html('');

            load_unseen_notification('yes');

        });

        setInterval(function() {

            load_unseen_notification();;

        }, 10000);

    });
</script>

</body>

</html>