<?php include 'includes/header.php';?>
<style type="text/css">
/* Table Section Datatable */
#addPlanFilterTable_length,
#addPlanFilterTable_filter,
#addPlanFilterTable_info,
#addPlanFilterTable_paginate {
  display: none;
}

.sorting_asc,
.sorting {
  pointer-events: none;
}


.sorting_asc:after {
  content: '';
  display: none !important;
}

.sorting:after {
  content: '';
  display: none !important;
}

.sorting_asc:before {
  content: '';
  display: none !important; 
}

.sorting:before {
  content: '';
  display: none !important; 
}


  .alert{
    margin-top: 20px;
  }
</style>
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Add Filters on Items</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Plan Items Status</a></li>
                        <li class="breadcrumb-item active">Add Item Status</li>
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
                      $DietPlanid=0;
                      if(isset($_GET['planAdded']) && isset($_GET['dietplan_id'])){
                        if($_GET['planAdded']==1){
                          echo '<div class="alert alert-success">The Diet Plan has been added successfully! Now, Add Items In the Diet Plan</div>';
                        }else if($_GET['planAdded']==0){
                         echo '<div class="alert alert-warning">Error in adding diet plan</div>';
                        }
                        $DietPlanid = $_GET['dietplan_id']; 
                      }
                      

                    ?>
                      <?php
                     echo '<div class="alert alert-danger" id="item-error"></div>';
                     echo '<div class="alert alert-success" id="item-success"></div>';
                     ?>

                      <div class="card">
                            <div class="form-group">
                             <label for="">Choose A Diet Plan</label>
                                <div class="input-group">
                            <?php
                          $query  = mysqli_query($conn,"SELECT* FROM dietplan where dietplan_active=1");
                            echo '<select name="choosenPlan" id="choosenPlan" class="form-control" required>';
                            if(mysqli_num_rows($query)>0){
                              echo '<option selected disabled value="">Nothing Selected</option>';
                                while($mainRow = mysqli_fetch_array($query)){
                                 
                                  $plan_id =$mainRow['dietplan_id'];
                                   $dietplan_name = $mainRow['dietplan_name'];
                                   if($DietPlanid==  $plan_id )
                                     echo '<option value='.$plan_id.' selected>'.$dietplan_name.'</option>';
                                   else
                                       echo '<option value='.$plan_id.' >'.$dietplan_name.'</option>';

                            }
                            }else{
                              echo '<option selected disabled> No Diet Plan has Been Added Yet</option>';}
                            echo '</select>';


                            ?>

                          </div>
                          </div>

                         




                      </div>
                    <div class="card">
                       <div class="form-group">
                             <label for="">Show items base on category</label>
                           <select name=""  id="choosenCate" class="form-control">
                                <?php
                            $query1  = mysqli_query($conn,"SELECT* FROM category where category_active=1");
                            if(mysqli_num_rows($query1)>0){
                             // echo '<option value="" selected disabled>Choose Category</option>'; 
                             echo '<option value="all">ALL</option>'; 
                              while($r2 = mysqli_fetch_assoc($query1)){
                                $category_name = $r2['category_name'];
                                $categoryID = $r2['category_id'];
                                  echo '<option value='.$categoryID.'>'.$category_name.'</option>'; 
                              }
                            }else{
                              echo '<option selected disabled> No category has Been Added Yet</option>';
                            }
                           

                            ?>
                      </select>
                    </div>
                      <div class="table-responsive">
                        <table id="addPlanFilterTable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                       

                        <thead>
                            <tr>
                               <th>Item Name</th>
                          <!--      <th>Item Category</th> -->
                               <th>Choose Status</th>
                               <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                          <?php
                          $Rowcounter=0;
                          $query  = mysqli_query($conn,"SELECT* FROM items WHERE item_active=1");
                           if(mysqli_num_rows($query)>0){
                            while($r = mysqli_fetch_array($query)){
                                  $Rowcounter++;
                                    $item_id = $r['item_id'];
                                    $item_name = $r['item_name'];
                                    $category_id = $r['category_id'];

                            ?>
                          <tr id="<?php echo $Rowcounter; ?>" data-id="<?php  echo $category_id."_".$item_id;?>" class="<?php  echo $category_id."_".$item_id;?>">
                            <td>
                           <div class="input-group">

                                <p><span><?php  echo ucwords($item_name); ?></span></p>

                            </div>
                          </td>


                         
                            <td>
                                <div class="form-group">
                                  <select class="form-control chose_filter" id="<?php echo "select_cf".$Rowcounter; ?>"  data-id="<?php echo $item_id;?>" >
                                       <option selected disabled value="">Choose Status</option>
                                      <option value="allowed">Allowed</option>
                                      <option value="not allowed">Not Allowed</option>
                                      <option value="cautionary">Cautionary</option>
                                  </select>
                                </div>
                            </td>

                            <td>
                                <button class="btn btn-primary saveFilter" id="<?php echo "saveBtn".$Rowcounter; ?>" data-id="<?php echo $item_id; ?>" >Save</button>
                            </td>
                          </tr>
                          <?php
                                }//end for outer loop here
                           }//end outer number rows condition here

                        ?>
                        </tbody>
                      </table>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <!-- End Container fluid  -->
  <?php include 'includes/footer.php';?>
<script type="text/javascript">
  $(document).ready(function() {
      $('#addPlanFilterTable').DataTable();
  });
  </script>
  <script type="text/javascript" src="js/add-filter.js"></script>
