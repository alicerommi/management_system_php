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


                    <!--  <div class="col-md-12 text-right" style="padding: 0px;">
                          <a class="btn btn-warning" href="view-planfilters.php"><i class="fa fa-eye"></i>&nbsp;View All Items Filters </a>
                      </div> -->
                      <?php
                     echo '<div class="alert alert-danger" id="item-error"></div>';
                     echo '<div class="alert alert-success" id="item-success"></div>';
                     ?>

                      <div class="card">
                            <div class="form-group">
                             <label for="">Choose A Food Item</label>
                                <div class="input-group">

                            <?php
                            $query  = mysqli_query($conn,"SELECT* FROM items WHERE item_active=1");
                            echo '<select name="choosenItem" id="choosenItem" class="form-control" required>';

                            if(mysqli_num_rows($query)>0){
                              echo '<option selected disabled value="">Nothing Selected</option>';
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

                      </div>

                    <div class="card">

                      <div class="table-responsive">
                        <table id="addPlanFilterTable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                               <th> Diet Plan Name</th>
                               <th>Choose Status</th>
                               <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                          $Rowcounter=0;
                           $query  = mysqli_query($conn,"SELECT* FROM dietplan where dietplan_active=1");
                           echo '<input type="hidden" value='.mysqli_num_rows($query).' id="totalRows">';

                           if(mysqli_num_rows($query)>0){
                                 while($mainRow = mysqli_fetch_array($query)){
                                  $Rowcounter++;
                                  $plan_id =$mainRow['dietplan_id'];
                                   $dietplan_name = $mainRow['dietplan_name'];
                                 // echo $Rowcounter;
                            ?>
                          <tr id="<?php echo $Rowcounter; ?>">
                            <td>
                           <div class="input-group">

                                <p><span><?php  echo ucwords($dietplan_name); ?></span></p>

                            </div>
                          </td>

                            <td>
                                <div class="form-group">
                                  <select class="form-control chose_filter" id="<?php echo "select_cf".$Rowcounter; ?>"  data-id="<?php echo $plan_id;?>" >
                                       <option selected disabled value="">Choose Status</option>
                                      <option value="allowed">Allowed</option>
                                      <option value="not allowed">Not Allowed</option>
                                      <option value="cautionary">Cautionary</option>
                                  </select>
                                </div>
                            </td>

                            <td>
                                <button class="btn btn-primary saveFilter" id="<?php echo "saveBtn".$Rowcounter; ?>">Save</button>
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
