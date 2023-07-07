<?php
    if(isset($_GET['alphabetDesID'])){
        $alphabet_des_id = intval($_GET['alphabetDesID']);
    }else{  
        echo "Invalid Parameters";
        die;
    }
    include 'includes/header.php';
    include 'includes/left_nav.php';
    // $query = mysqli_query($conn,"SELECT* FROM admin WHERE admin_email = '$admin_email'");
    // $adminRow = mysqli_fetch_array($query);
    // $admin_fullName = ucwords($adminRow['admin_name']);
    // $admin_image = $adminRow['admin_picture'];
?>
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css">
        <link href="assets/plugins/summernote/dist/summernote.css" rel="stylesheet">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css">
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css">

          
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
                                <h4 class="pull-left page-title">Edit Alphabet Decription</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Dream</a></li>
                                    <li><a href="#">Alphabet Decription</a></li>
                                    <li class="active">Edit Alphabet Description</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                        <div class="row">
                            <?php
                            //for showing the php feedback messages on the submission of form
                            if(isset($_GET['editDesStatus'])){
                                    if($_GET['editDesStatus']==1){
                                        echo '<div class="alert alert-success">The Description of Alphabet Has Been Updated</div>';
                                    }else if($_GET['editDesStatus']==0){
                                         echo '<div class="alert alert-warning">Error in Updating Description</div>';
                                    }
                            }
                           ?> 
                            <div class="col-sm-9">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Add Alphabet Description</h3></div>
                                    <div class="panel-body">
                                        <div class="form">
                                            <form class="cmxform form-horizontal tasi-form" method="post" action="actions/update.php" >
                                                
                                                <?php
                                                    $query = mysqli_query($conn,"SELECT* FROM alphabets_description WHERE alphabet_des_id=$alphabet_des_id");
                                                    //print_r($query);

                                                    if(mysqli_num_rows($query)>0){
                                                        $row = mysqli_fetch_array($query);
                                                        $alphabet_description = $row['alphabet_description'];
                                                        $alphabet_idEdit = $row['alphabet_id']; 
                                                        echo '<input type="hidden" name="alphabet_des_id" value='.$alphabet_des_id.'>';
                                                    }
                                                ?>
                                                <div class="form-group">
                                                        <label>Choose Alphabet </label>
                                                        <select class="form-control" name="alphabetChosen" required>
                                                                    <option disabled selected>Nothing Selected</option> 
                                                                    <?php
                                                                        $query = mysqli_query($conn,"SELECT* FROM alphabets_table");
                                                                        if(mysqli_num_rows($query)>0){
                                                                            while ($row= mysqli_fetch_array($query)) {
                                                                                $alphabet = $row['alphabet'];
                                                                                $alphabet_id = $row['alphabet_id'];
                                                                                if($alphabet_id==$alphabet_idEdit){
                                                                                     echo '<option value='.$alphabet_id.' selected>'.$alphabet.'</option>'; 
                                                                                }else{
                                                                                echo '<option value='.$alphabet_id.'>'.$alphabet.'</option>'; 
                                                                                }
                                                                            }
                                                                        }
                                                                    ?>  
                                                        </select>
                                                        <a href="add-alphabets.php">Add New Alphabet</a>   
                                                </div>

                                                <div class="form-group">
                                                    <label>Enter the Alphabet Description</label>
                                                    <textarea class="wysihtml5 form-control" rows="9" name="alphabetDescription" maxlength="4000" required><?php 
                                                    echo  $alphabet_description;?></textarea>
                                                </div>
                                                
                                                <div class="form-group">
                                                    
                                                        <button class="btn btn-success waves-effect waves-light" type="submit" name="EditAlphaDes">Save</button>
                                                       <!--  <button class="btn btn-default waves-effect" type="button">Cancel</button> -->
                                                   
                                                </div>
                                            </form>




                                        </div> <!-- .form -->
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div>
                          

                
                    </div> <!-- container -->
                               
                </div> <!-- content -->
<?php
    include 'includes/footer.html';
?>
 <script type="text/javascript" src="assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
        <script type="text/javascript" src="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
        <script src="assets/plugins/summernote/dist/summernote.min.js"></script>
        <script>
            jQuery(document).ready(function(){
                $('.wysihtml5').wysihtml5();
            });
        </script>