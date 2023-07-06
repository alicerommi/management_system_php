<?php include 'includes/header.php';?>
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Add Plan</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Diet Plans</a></li>
                        <li class="breadcrumb-item active">Add Plan</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                  <div class="col-md-12">

                     <div class="col-md-12 text-right" style="padding: 0px;">
                          <a class="btn btn-warning" href="view-plans.php"><i class="fa fa-eye"></i>&nbsp;View All Plans</a>
                      </div>

                    <?php
                      if(isset($_GET['planAdded'])){
                        if($_GET['planAdded']==1){
                          echo '<div class="alert alert-success">The Diet Plan has been added successfully</div>';
                        }else if($_GET['planAdded']==0){
                         echo '<div class="alert alert-warning">Error in adding diet plan</div>';
                        }
                      }
                    ?>
                    <div class="card">
                      <form class="" action="actions/insert.php" method="post">
                        <div class="input-group">
                          <label for="">Plan Name</label>
                          <div class="input-group">
                            <input class="form-control" type="text" name="planName"  maxlength="40" required placeholder="Write Plan Name">
                          </div>
                        </div>
                        <div class="input-group" style="margin-top: 15px;">
                          <label for="">Description</label>
                          <div class="input-group">
                            <textarea class="form-control" name="planDescription" rows="8" cols="80" placeholder="Write Plan Description" required></textarea>
                          </div>
                        </div>
                        <div class="input-group">
                          <button type="submit" class="btn btn-primary btn-add" name="addPlan">Add Plan</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
            <!-- End Container fluid  -->
  <?php include 'includes/footer.php';?>
