<!-- start footer -->
<div class="footer">

    <div> <strong>Copyright</strong> <?php echo FOOTER ?> &copy; 2018 </div>
</div>
<!-- Go top -->
<a href="#" class="scrollup"><i class="fa fa-chevron-up"></i></a>
<!-- Go top -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url() ?>assets/js/vendor/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/vendor/validator.js"></script>
<!-- icheck -->
<script src="<?php echo base_url() ?>assets/js/vendor/icheck.js"></script>
<!-- bootstrap js -->
<script src="<?php echo base_url() ?>assets/js/vendor/tether.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/vendor/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/vendor/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/vendor/dataTables.bootstrap4.min.js"></script>
<!-- slimscroll js -->
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/vendor/jquery.slimscroll.js"></script>
<!-- pace js -->
<script src="<?php echo base_url() ?>assets/js/vendor/pace/pace.min.js"></script>
<!-- main js -->
<script src="<?php echo base_url() ?>assets/js/main.js"></script>

<script>
    $(function() {
        $('#myForm').validator();
    });

    $(document).ready(function() {
        var callbacks_list = $('.demo-callbacks ul');
        $('input.iCheck').on('ifCreated ifClicked ifChanged ifChecked ifUnchecked ifDisabled ifEnabled ifDestroyed', function(event) {
            callbacks_list.prepend('<li><span>#' + this.id + '</span> is ' + event.type.replace('if', '').toLowerCase() + '</li>');
        }).iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%'
        });
    });

</script>
<!-- demo  -->
<script src="<?php echo base_url() ?>assets/js/appdemo.js"></script>