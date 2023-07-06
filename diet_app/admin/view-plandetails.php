<?php include 'includes/header.php';?>
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">View All Plan Details</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Plan Details</a></li>
                        <li class="breadcrumb-item active">View Plan Detail</li>
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

                     <div class="col-md-12 text-right" style="padding: 0px;">
                          <a class="btn btn-warning" href="add-plandetail.php"><i class="fa fa-plus"></i>&nbsp;Add Plan Detail</a>
                      </div>
                  <?php
                  if(isset($_GET['itemDeleted'])){
                    if($_GET['itemDeleted']==1){
                      echo '<div class="alert alert-danger">The item has been deleted successfully</div>';
                    }else if($_GET['itemDeleted']==0){
                      echo '<div class="alert alert-warning">Error in deletion of item</div>';
                    } 
                  }
                  ?>
                    <div class="card">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                          <tr>
                              <th>Plan Detail Name</th>
                              <th>Item Name</th>
                              <th>Category Name</th>
                             
                              <th>Added Date</th>
                              <th>Actions</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                               $query  ="SELECT* from plandetail WHERE plandetails_active=1";
                               $res = mysqli_query($conn,$query);
                               if(mysqli_num_rows($res)>0){
                                while($row = mysqli_fetch_array($res)) {
                                  $dietplan_id = $row['dietplan_id'];
                                  $plandetail_id = $row['plandetail_id'];
                                  $plandetail_name = $row['plandetail_name'];
                                  $plandetail_description  = $row['plandetail_description'];
                                    $plandetail_recordDate = date("d-m-Y",strtotime($row['plandetail_recordDate'])); 
                                  $item_id   = $row['item_id'];
                                  

                                    $query2 = mysqli_query($conn,"SELECT* FROM dietplan WHERE dietplan_id=$dietplan_id AND dietplan_active=1");
                                     $row2 = mysqli_fetch_array($query2);
                                     $dietplan_name = $row2['dietplan_name'];
                                      $dietplan_description = $row2['dietplan_description'];
                                      $query3 = mysqli_query($conn,"SELECT* FROM items WHERE item_id = $item_id AND item_active=1");
                                      $row3 = mysqli_fetch_array($query3);
                                      $item_name = $row3['item_name'];
                                    
                                      $category_id = $row3['category_id'];

                                      $query4 = mysqli_query($conn,"SELECT * FROM `category` WHERE category_id=category_id and category_active=1");
                                      $row4 = mysqli_fetch_array($query4);
                                      //$categ
                                      $categoryname = $row4['category_name']; 
                                      echo '<tr>
                                      <td>'.$plandetail_name.'</td>
                                      <td>'.$item_name.'</td>
                                      <td>'.$categoryname.'</td>
                                      <td>'.$plandetail_recordDate.'</td>
                                      <td>
                                      <a href="edit-item.php?plandetail_id='.$plandetail_id.'" class="btn btn-success btn-orange" name="button"><i class="fa fa-edit"></i> </a>
                                      <a type="button" class="btn btn-danger btn-orange" href="actions/delete.php?plandetail_id='.$plandetail_id.'"><i class="fa fa-trash"></i> </a>
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