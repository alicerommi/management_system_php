<?php 
if(isset($_GET['planfilter_id'])){
  $planfilter_id = $_GET['planfilter_id'];
}else{
  echo "invalid paramters";
  die;
}
include 'includes/header.php';
?>
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Edit DietPlan Filters</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Plan Filters</a></li>
                        <li class="breadcrumb-item active">Edit Plan Filter</li>
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
                    //show the messages
                    if(isset($_GET['updated'])){
                        if($_GET['updated']==1){
                          echo '<div class="alert alert-success">The Filter details has been updated sucessfully</div>';
                        }else if($_GET['updated']==0){
                          echo '<div class="alert alert-warning">Error in updating the item filter</div>';
                        }
                    }


                    ?>
                    <div class="col-md-12 text-right" style="padding: 0px;">
                          <a class="btn btn-warning" href="view-planfilters.php"><i class="fa fa-th"></i>&nbsp;Back to Items Filters </a>
                      </div>


                   
                    <div class="card">
                      <form action="actions/update.php" method="post"> 
                        <div class="form-group">
                            <label for="">Choose Plan</label>
                          <div class="input-group">
                           
                            <?php
                            $filterPlanQuery = mysqli_query($conn,"SELECT * FROM planfilter WHERE planfilter_id = $planfilter_id and `planfilter_active`=1");
                            $row =  mysqli_fetch_assoc($filterPlanQuery);
                            $dietplan_id = $row['dietplan_id']; 


                            $query  = mysqli_query($conn,"SELECT* FROM dietplan where dietplan_active=1 and dietplan_id=$dietplan_id");
                            echo '<select name="choosenPlan" id="choosenPlan" class="form-control">';
                            if(mysqli_num_rows($query)>0){
                              while($r = mysqli_fetch_assoc($query)){
                                $dietplan_name = $r['dietplan_name'];
                                if($dietplan_id ==$r['dietplan_id'])
                               { 
                                  echo '<option value='.$dietplan_id.' selected>'.$dietplan_name.'</option>';
                                 }
                                else{
                                   $dietplan_id = $r['dietplan_id'];
                                    echo '<option value='.$dietplan_id.'>'.$dietplan_name.'</option>';
                                  } 
                              }//end while loop here
                            }else{
                              echo '<option selected disabled> No Diet Plan has Been Added Yet</option>';
                            }
                            echo '</select>';

                            ?>

                          </div>
                          </div>


                          <input type="hidden" name="planfilter_id" value="<?php echo $planfilter_id;?>">

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
                              <label>Choose Filter</label>
                              <select class="form-control" name="choosenFilter" >
                                  <option value="allowed">Allowed</option>
                                  <option value="not allowed">Not Allowed</option>
                                  <option value="cautionary">Cautionary</option>
                              </select>
                          </div>
                      
                        <div class="input-group">
                          <button type="submit" class="btn btn-primary btn-add" name="editPlanFilter" style="width: 151px !important;">Update Filter</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
            <!-- End Container fluid  -->
  <?php include 'includes/footer.php';?>
\