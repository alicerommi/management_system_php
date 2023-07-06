<div class="modal fade bs-example-modal-lg in"  id="customMODAL" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title" id="myLargeModalLabel"></h4>
                                                    </div>
                                                    <div class="modal-body" id="modalData">
                                                      
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div>
            <footer class="footer text-right">
                     <?php echo date("Y"); ?> © Instant Energy.
                </footer>
            </div>
<script>
            var resizefunc = [];
        </script>

        <!-- CUSTOM JS -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/jquery.app.js"></script>
              <script type="text/javascript" src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="assets/plugins/colorpicker/bootstrap-colorpicker.js"></script>
        <script type="text/javascript" src="assets/plugins/jquery-multi-select/jquery.multi-select.js"></script>
        <script type="text/javascript" src="assets/plugins/jquery-multi-select/jquery.quicksearch.js"></script>
          <script src="assets/plugins/select2/dist/js/select2.min.js" type="text/javascript"></script>
          <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>
     <!--     <script src="assets/plugins/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.keyTable.min.js"></script> -->
        <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="assets/plugins/datatables/responsive.bootstrap.min.js"></script>
        
        <script type="text/javascript" src="assets/plugins/isotope/dist/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="assets/plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>

         <script type="text/javascript" src="assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
        <script type="text/javascript" src="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
        <!--form validation init-->
        <script src="assets/plugins/summernote/dist/summernote.min.js"></script>
        <!--Morris Chart-->
        
  <!--       <script src="assets/plugins/datatables/dataTables.scroller.min.js"></script> -->
	</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
        setTimeout(function(){
                $('#err_msg').empty();
        },10000);
   

            /// for hiding the insert,update, delete actions messages from the admin panel
        setTimeout (function(){
            $('.actions_messages').fadeOut('slow');
        },10000);

        // if a page reloaded or refreshed two time then alert will not visible
        if (performance.navigation.type == 1) {
            // console.info( "This page is reloaded" );
            $('.actions_messages').hide();
        }
});
</script>