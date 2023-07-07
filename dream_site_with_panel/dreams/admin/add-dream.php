<?php
 include 'includes/header.php';
    include 'includes/left_nav.php';
?>
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css">
        <link href="assets/plugins/summernote/dist/summernote.css" rel="stylesheet">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css">
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css">
<div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                       
                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title"><?php 
                                    echo "Add A Dream";
                                ?></h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Dream Lists</a></li>
                                    <li class="active">Add Dream Details</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                        <a class="btn btn-default pull pull-right" href="all-dreamLists.php" style="margin-bottom: 23px;">
                                    <i class="md md-keyboard-arrow-left"> </i>Back to Dream List
                         </a>
                        <div class="row">
                        	<?php
                        		if(isset($_GET['addStatus'])){
                        			if($_GET['addStatus']==0){
                        				echo '<div class="alert alert-danger">Error in Adding Dream Details</div>';
                        			}else if($_GET['addStatus']==1){
                        				echo '<div class="alert alert-success">Dream Details has been Added Successfully</div>';
                        			}
                        		}
                        	?>
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Enter the Details of Dream</h3>
                                    </div>
                                    <div class="panel-body">
                                       	<form method="post" action="actions/insert.php">
                                       		
                                       		<div class="form-group">
                                       			<label>Enter the Dream KeyWord:</label>	
                                       			<input type="text" name="dreamKeyword" required class="form-control" maxlength="30">
                                       		</div>

                                       		<div class="form-group">
                                       					<label>Enter the Dream Description:</label>
                                    					<textarea class="wysihtml5 form-control" rows="9" name="dreamDescription" maxlength="4000" required></textarea>
                                   			</div>
                                   			<div class="form-group">
                                   					<button type="submit" name="addDream" class="btn btn-success"> Save</button>
                                   			</div>
                                        </form>	
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php include 'includes/footer.html'; ?>

        <script type="text/javascript" src="assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
        <script type="text/javascript" src="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
        <script src="assets/plugins/summernote/dist/summernote.min.js"></script>
        <script>
            jQuery(document).ready(function(){
                $('.wysihtml5').wysihtml5();
            });
        </script>