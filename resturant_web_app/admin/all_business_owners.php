<?php
  include 'includes/header.php';
?>                  
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Datatable example</h3>
                                    </div>
                                    <div class="panel-body">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Owner ID</th>
                                                    <th>Owner Name</th>
                                                    <th>Owner Business Name</th>
                                                    <th>Added Date</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Jennifier</td>
                                                    <td>System Architect</td>
                                                    <td>2011/04/25</td>
                                                     <td></td>
                                                </tr>
                                           
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div> <!-- End Row -->

                        




                    </div> <!-- container -->
                               
                </div> <!-- content -->

          
      
<?php
        include 'includes/footer.php';
?>
<script src="assets/pages/datatables.init.js"></script>
 <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
 } );
 </script>
