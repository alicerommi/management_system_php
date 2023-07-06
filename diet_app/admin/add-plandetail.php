<?php include 'includes/header.php';?>
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Add Plan Detail</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Plan Details</a></li>
                        <li class="breadcrumb-item active">Add Plan Detail</li>
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
                          <a class="btn btn-warning" href="view-plandetails.php"><i class="fa fa-eye"></i>&nbsp;View All Plan Details</a>
                      </div>

                    <?php
                    //show the messages
                    if(isset($_GET['added'])){
                        if($_GET['added']==1){
                          echo '<div class="alert alert-success">The Plan Details has been added successfully</div>';
                        }else if($_GET['added']==0){
                          echo '<div class="alert alert-warning">Error in adding Plan Details</div>';
                        }

                    }

                    if(isset($_GET['alreadyExists'])){
                      if($_GET['alreadyExists']==1){
                        echo '<div class="alert alert-warning">The choosen plan and item is already exists</div>';
                      }
                    }


                    ?>
                    <div class="card">
                      <form class="" action="actions/insert.php" method="post">
                        <div class="input-group">
                          <label for="">Plan Details Name</label>
                          <div class="input-group">
                            <input class="form-control" type="text" name="plandetailsName"  required maxlength="40">
                          </div>
                        </div>

                        <div class="form-group">
                            <label for="">Choose Plan</label>
                          <div class="input-group">
                           
                            <?php
                            $query  = mysqli_query($conn,"SELECT* FROM dietplan where dietplan_active=1");
                            echo '<select name="choosenPlan" id="choosenPlan" class="form-control">';
                            if(mysqli_num_rows($query)>0){
                              while($r = mysqli_fetch_assoc($query)){
                                $dietplan_id = $r['dietplan_id'];
                                $dietplan_name = $r['dietplan_name'];
                                echo '<option value='.$dietplan_id.'>'.$dietplan_name.'</option>'; 
                              }
                            }else{
                              echo '<option selected disabled> No Diet Plan has Been Added Yet</option>';
                            }
                            echo '</select>';

                            ?>

                          </div>
                          </div>


                          <div class="form-group">
                            
                             <label for="">Choose Item</label>
                                <div class="input-group">
                           
                            <?php
                            $query  = mysqli_query($conn,"SELECT* FROM items WHERE item_active=1");
                            echo '<select name="choosenItem" id="choosenItem" class="form-control">';
                            if(mysqli_num_rows($query)>0){
                              while($r = mysqli_fetch_assoc($query)){
                                $item_id = $r['item_id'];
                                $item_name = $r['item_name'];
                                echo '<option value='.$item_id.'>'.$item_name.'</option>'; 
                              }
                            }else{
                              echo '<option selected disabled> No Diet Plan has Been Added Yet</option>';
                            }
                            echo '</select>';

                            ?>

                          </div>
                          </div>


                          <div class="form-group">
                              <label>Plan Detail Description</label>
                              <textarea class="form-control" name="plandetailsDescription" rows="5" maxlength="500"></textarea>
                          </div>
                        


                        <div class="input-group">
                          <button type="submit" class="btn btn-primary btn-add" name="addPlanDetail" style="width: 151px !important;">Add Plan Details</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
            </div>


            <!-- End Container fluid  -->

  <?php include 'includes/footer.php';?>
