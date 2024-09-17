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

<!-- Sweet-Alert  -->
<script src="<?php echo base_url('assets/plugins/sweet-alert2/sweetalert2.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/pages/jquery.sweet-alert.init.js'); ?>"></script>

<!-- File Upload  -->
<script src="<?php echo base_url('assets/plugins/dropify/js/dropify.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/pages/jquery.form-upload.init.js') ?>"></script>

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

</body>

</html>