<?php
    include 'includes/header.php';
    include 'includes/left_nav.php';
    // $admin_image = $adminRow['admin_picture'];
?>
  <!-- Dropzone css -->
        <link href="assets/plugins/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css">
        
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css">
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css">
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css">

        <script src="assets/js/modernizr.min.js"></script>

          
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Upload Excel File</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Camera</a></li>
                                    <li class="active">Upload File</li>
                                </ol>
                            </div>
                        </div>

                      <div class="row">
                                
                                <!-- Your awesome content goes here -->
                              
                                    <div class="col-sm-12">
                                        <?php if(isset($_GET['uploadStatus'])){
                                            if($_GET['uploadStatus']==1){
                                                echo '<div class="alert alert-success">The Excel File Has Been Uploaded Successfully</div>';
                                            }
                                        } 
                                            if(isset($_GET['fileFlag'])){
                                                    if($_GET['fileFlag']==1){
                                                        echo '<div class="alert alert-danger">The File Format is Not Supported</div>';
                                                    }
                                             }
                                        ?>

                                            <div class="panel panel-default">
                                                <div class="panel-heading"><h3 class="panel-title">Upload File</h3></div>
                                                     <div class="panel-body">
                                                        <form action="actions/insert.php"  method="post" enctype="multipart/form-data">
                                                            <label>Choose An Excel File To Upload</label>
                                                              <div class="form-group">
                                                                    <input name="excelFile" type="file" class="form-control" required>
                                                              </div>
                                                              <div class="form-group">
                                                                    <button type="submit" name="uploadExcFile" class="btn btn-success">Upload</button>    

                                                              </div>
                                                        </form>
                                                    </div>
                                            </div>
                                    </div>
                       
                        <!-- end row -->                

                
                    </div> <!-- container -->
                               
                </div> <!-- content -->
<?php
    include 'includes/footer.html';
?>
  <!-- jQuery  -->
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

        <!-- Page Specific JS Libraries -->
        <script src="assets/plugins/dropzone/dist/dropzone.js"></script>