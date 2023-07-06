
<?php
if(isset($_GET['project_id'])){
  $project_id = $_GET['project_id'];
}else{
  echo 'Invalid Paramters';
  die;
}


 include 'includes/header.php'; ?>
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Edit Project Detail</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Our Projects</a></li>
                        <li class="breadcrumb-item active">Edit Project Detail</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                 <!-- Start Page Content -->
                 <div class="row">
                     <div class="col-sm-12">

                        <?php

                        if(isset($_GET['updateStatus'])){
                          if($_GET['updateStatus']==1){
                             echo '<div class="alert alert-success">The Project Details Has Been Updated</div>';
                          }else if($_GET['updateStatus']){
                              echo '<div class="alert alert-warning">Error in Updating the Project Details</div>';
                          }
                        }
                        ?>
                         <div class="panel panel-primary">
                             <div class="panel-heading"><h3 class="panel-title">Update Project Information</h3></div>
                             <div class="panel-body" style="padding: 2em 0;">
                                 <div class="form">
                                  <?php
                                  //get the project details 

                                  $query = mysqli_query($conn,"SELECT* FROM projects WHERE project_id = $project_id");
                                  $row = mysqli_fetch_array($query);
                                        $project_name = $row['project_name'];
                                        $project_location = $row['project_location'];
                                        $project_desctiption = $row['project_desctiption'];
                                        $project_services = $row['project_services'];
                                        $project_amenties = $row['project_amenties']; 
                                        $project_info  = $row['project_info'];
                                        $project_recordDate = date("d-m-Y",strtotime($row['project_recordDate']));


                                  ?>
                                   </div>
                                     <form class="cmxform form-horizontal tasi-form project-form"  action = "actions/update.php" id="commentForm" method="POST" >

                                        <input type="hidden" name="project_id" value="<?php echo $project_id; ?>">
                                         <div class="col-md-6" style="padding: 0">
                                           <div class="form-group">
                                             <label for="pname" class="control-label col-lg-8">Project Name</label>
                                             <div class="col-lg-12">
                                               <input class="form-control" id="pname" name="pname" required="" aria-required="true" type="text" value="<?php echo $project_name; ?>">
                                             </div>
                                           </div>
                                           <div class="form-group">
                                               <label for="description" class="control-label col-lg-2">Description</label>
                                               <div class="col-lg-12">
                                                   <textarea class="form-control" id="description" name="description" required="" aria-required="true" ><?php echo $project_desctiption; ?></textarea>
                                               </div>
                                           </div>
                                           <div class="form-group">
                                             <label for="amenties" class="control-label col-lg-2">Amenties</label>
                                             <div class="col-lg-12">
                                               <textarea class="form-control" id="amenties" name="amenties" required="" aria-required="true"><?php echo $project_amenties; ?></textarea>
                                             </div>
                                           </div>

                                         </div>
                                         <div class="col-md-6" style="padding: 0;">
                                           <div class="form-group">
                                             <label for="location" class="control-label col-lg-2">Location</label>
                                             <div class="col-lg-12">
                                               <input class="form-control" id="location" name="location" required="" aria-required="true" type="text" value="<?php echo $project_location; ?>">
                                             </div>
                                           </div>

                                           <div class="form-group">
                                               <label for="services" class="control-label col-lg-8">Services</label>
                                               <div class="col-lg-12">
                                                   <textarea class="form-control" id="services" name="services" required="" aria-required="true"><?php echo $project_services; ?></textarea>
                                               </div>
                                           </div>
                                           <div class="form-group">
                                               <label for="info" class="control-label col-lg-8">Project Info</label>
                                               <div class="col-lg-12">
                                                   <textarea class="form-control" id="info" name="info" required="" aria-required="true"><?php echo $project_info;?> </textarea>
                                               </div>
                                           </div>
                                           <div class="form-group text-right">
                                               <div class="col-lg-offset-2 col-lg-12">
                                                   <button class="btn btn-primary waves-effect waves-light" type="submit" name="updateproject">Update</button>
                                                   <button class="btn btn-default waves-effect" type="button">Cancel</button>
                                               </div>
                                           </div>
                                         </div>
                                     </form>
                                 </div> <!-- .form -->
                             </div> <!-- panel-body -->
                         </div> <!-- panel -->
                     </div>
                 </div>

</div>


            <!-- End Container fluid  -->

<?php include 'includes/footer.php'; ?>
