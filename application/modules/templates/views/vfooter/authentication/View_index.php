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