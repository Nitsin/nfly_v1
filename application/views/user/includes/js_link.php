<!-- jQuery 2.1.4 -->
<script src="<?php echo base_url(); ?>/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script type="text/javascript" src="<?php echo base_url(); ?>dist/js/jquery-ias.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    	// Infinite Ajax Scroll configuration
        jQuery.ias({
            container : '.stack_view', // main container where data goes to append
            item: '.box', // single items
            pagination: '.nav_link', // page navigation
            next: '.nav_link a', // next page selector
            loader: '<img src="<?php echo base_url(); ?>dist/img/ajax-loader.gif" style="margin-left:48%;margin-bottom:2%"/>', // loading gif
            triggerPageThreshold: 100 // show load more if scroll more than this
        });
    });
</script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo base_url(); ?>/bootstrap/js/bootstrap.min.js"></script>






<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>/dist/js/app.min.js"></script>

</body>
</html>
