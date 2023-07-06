<?php include 'includes/header.php';?>
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">View Food Items</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Food Items</a></li>
                        <li class="breadcrumb-item active">View Food Items</li>
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
                          <a class="btn btn-warning" href="add-items.php"><i class="fa fa-plus"></i>&nbsp;Add Food Item</a>
                      </div>
                    <div class="card">
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                      <thead>
                          <tr>
                              <th>Item Name</th>
                              <th>Category Name</th>
                              <th>Added Date</th>
                              <th>Actions</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                               $query  ="SELECT* from items WHERE item_active=1";
                               $res = mysqli_query($conn,$query);
                               if(mysqli_num_rows($res)>0){
                                while($row = mysqli_fetch_array($res)) {
                                    $query2 = mysqli_query($conn,"SELECT* FROM category WHERE category_active=1");
                                     $row2 = mysqli_fetch_array($query2);
                                      $categoryname = $row2['category_name'];
                                      $item_name = $row['item_name'];
                                      $item_id = $row['item_id'];
                                      $category_id = $row2['category_id'];
                                      $item_recordDate = date("d-m-Y",strtotime($row['item_recordDate']));
                                      echo '<tr>
                                      <td>'.$item_name.'</td>
                                      <td>'.$categoryname.'</td>
                                      <td>'.$item_recordDate.'</td>
                                      <td>
                                      <a href="edit-item.php?item_id='.$item_id.'" class="btn btn-success btn-orange" name="button"><i class="fa fa-edit"></i> </a>
                                      <a type="button" class="btn btn-danger btn-orange" href="actions/delete.php?item_id='.$item_id.'"><i class="fa fa-trash"></i> </a>
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
