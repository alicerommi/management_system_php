<?php 
if(isset($_GET['dietplan_id'])){
$dietplan_id = $_GET['dietplan_id'];
}else{
  echo 'invalid paramters';
  die;
}
include 'includes/header.php';?>
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Edit Plan</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Diet Plans</a></li>
                        <li class="breadcrumb-item active">Edit Plan</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                  <div class="col-md-12">
                    <?php
                      if(isset($_GET['planEdited'])){
                        if($_GET['planEdited']==1){
                          echo '<div class="alert alert-success">The Diet Plan has been Updated successfully</div>';
                        }else if($_GET['planEdited']==0){
                         echo '<div class="alert alert-warning">Error in Editing diet plan</div>';
                        }
                      }
                    ?>

                    <?php
                      $select = mysqli_query($conn,"SELECT* FROM dietplan where dietplan_id=$dietplan_id ");
                      $row = mysqli_fetch_assoc($select);
                      $dietplan_name = $row['dietplan_name'];
                      $dietplan_description = $row['dietplan_description'];

                    ?>
                    <div class="card">
                      <form class="" action="actions/update.php" method="post">
                        <input type="hidden" name="dietplan_id" value="<?php echo $dietplan_id; ?>">
                        <div class="input-group">

                          <label for="">Plan Name</label>
                          <div class="input-group">
                            <input class="form-control" type="text" name="planName"  value="<?php echo $dietplan_name; ?>" maxlength="40" required placeholder="Write Plan Name">
                          </div>
                        </div>
                        <div class="input-group" style="margin-top: 15px;">
                          <label for="">Description</label>
                          <div class="input-group">
                            <textarea class="form-control" name="planDescription" rows="8" cols="80" placeholder="Write Plan Description" required><?php echo $dietplan_description; ?></textarea>
                          </div>
                        </div>

                        <div class="input-group">
                          <button type="submit" class="btn btn-primary btn-Edit" name="EditPlan">Edit Plan</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
            <!-- End Container fluid  -->
  <?php include 'includes/footer.php';?>
