<?php include 'includes/header.php';?>
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">View Plan Filters</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Plan Filters</a></li>
                        <li class="breadcrumb-item active">View DietPlan Filters</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">

                  <!-- Start: Datatable Section -->
                  <div class="col-md-12">
                  <?php
                  if(isset($_GET['itemDeleted'])){
                    if($_GET['itemDeleted']==1){
                      echo '<div class="alert alert-danger">The item has been deleted successfully</div>';
                    }else if($_GET['itemDeleted']==0){
                      echo '<div class="alert alert-warning">Error in deletion of item</div>';
                    } 
                  }
                  ?>
 <div class="col-md-12 text-right" style="padding: 0px;">
                          <a class="btn btn-warning" href="add-planfilter.php"><i class="fa fa-plus"></i>&nbsp;Add An Item Filter</a>
                      </div>

                    <div class="card">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                          <tr>
                              <th>DietPlan Name</th>
                              <th>Item Name</th>
                               <th>Filter</th>
                              <th>Added Date</th>
                              <th>Actions</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                          //SELECT `planfilter_id`, `item_id`, `dietplan_id`, `flag`, `planfilter_recordDate`, `planfilter_active` FROM `planfilter` WHERE 1
                               $query  ="SELECT * FROM planfilter where planfilter_active=1";
                               $res = mysqli_query($conn,$query);
                               if(mysqli_num_rows($res)>0){
                                while($row = mysqli_fetch_array($res)) {
                                  $flag  = $row['flag'];
                                  $item_id = $row['item_id'];
                                  //for getting the item name 
                                  $query1 = mysqli_query($conn,"select* from items where item_id=$item_id");
                                  $row1 = mysqli_fetch_array($query1);
                                  $item_name = $row1['item_name'];


                                  //for getting the plan name 
                                  $dietplan_id = $row['dietplan_id'];
                                  $query2 = mysqli_query($conn,"SELECT* from dietplan where dietplan_id=$dietplan_id");
                                  $row2 = mysqli_fetch_array($query2);
                                  $dietplan_name   = $row2['dietplan_name'];
                                  $planfilter_id  = $row['planfilter_id'];
                                      $planfilter_recordDate = date("d-m-Y",strtotime($row['planfilter_recordDate']));

                                      echo '<tr>
                                      <td>'.$item_name.'</td>
                                      <td>'.$dietplan_name.'</td>
                                      <td>'.$flag.'</td>
                                      <td>'.$planfilter_recordDate.'</td>
                                      <td>
                                      <a href="edit-planfilter.php?planfilter_id='.$planfilter_id.'" class="btn btn-success btn-orange" name="button"><i class="fa fa-edit"></i> </a>
                                      <a type="button" class="btn btn-danger btn-orange" href="actions/delete.php?planfilter_id='.$planfilter_id.'"><i class="fa fa-trash"></i> </a>
                                      </td>
                                      </tr>';
                                }
                               }
                              ?>
                      </tbody>
                  </table>
                </div>
                  </div>
                  <!-- End: Datatable Section -->
                </div>
            </div>
            <!-- End Container fluid  -->
  <?php include 'includes/footer.php';?>
  <script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
  });
  </script>
