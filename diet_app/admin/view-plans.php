<?php include 'includes/header.php';?>
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">View All Plans</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Diet Plans</a></li>
                        <li class="breadcrumb-item active">ALL Diet Plans</li>
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
                          <a class="btn btn-warning" href="add-plan.php"><i class="fa fa-plus"></i>&nbsp;Add A Plan</a>
                      </div>


                  <?php
                  if(isset($_GET['itemDeleted'])){
                    if($_GET['itemDeleted']==1){
                      echo '<div class="alert alert-danger">The Plan has been deleted successfully</div>';
                    }else if($_GET['itemDeleted']==0){
                      echo '<div class="alert alert-warning">Error in deletion of item</div>';
                    }
                  }



                  ?>

                    <div class="card">
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                      <thead>
                          <tr>
                              <th>Plan Name</th>
                              <th>Added Date</th>
                              <th>Actions</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                               $query  ="SELECT* from `dietplan` WHERE dietplan_active=1";
                               $res = mysqli_query($conn,$query);
                               if(mysqli_num_rows($res)>0){
                                while($row = mysqli_fetch_array($res)) {
                                      $dietplan_id   = $row['dietplan_id'];
                                      $dietplan_name   = $row['dietplan_name'];
                                      $dietplan_description   = $row['dietplan_description'];
                                      $recordDate = date("d-m-Y",strtotime($row['dietplan_recordDate']));
                                      echo '<tr>
                                      <td>'.$dietplan_name.'</td>
                                      <td>'.$recordDate.'</td>
                                      <td>
                                      <button class="btn btn-info view" id="'.$dietplan_id.'" data-toggle="modal" data-target="#exampleModal" ><i class="fa fa-eye"></i></button>
                                      <a href="edit-plan.php?dietplan_id='.$dietplan_id.'" class="btn btn-success btn-orange" name="button"><i class="fa fa-edit"></i> </a>
                                      <a type="button" class="btn btn-danger btn-orange" href="actions/delete.php?dietplan_id='.$dietplan_id.'"><i class="fa fa-trash"></i> </a>
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



  <!-- basic modal -->
              <div class="modal" id="exampleModal">
                <div class="modal-dialog credit-dialog">
                  <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Diet Plan Description</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body modal-credit" id="modal-Body">
                        <div class="availabe-crdt">
                      </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                    </div>

                  </div>
                </div>
              </div>

            <!-- End Container fluid  -->
  <?php include 'includes/footer.php';?>
  <script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();

    $(document).on('click','.view',function(){
        var dietplan_id = $(this).attr('id');
        $.ajax({
          url:'actions/fetch.php',
          method:'post',
          data:{
            dietplan_id:dietplan_id
          },
          success:function(data){
            $('.availabe-crdt').empty();
              $('.availabe-crdt').html(data);
               $('#myModal').modal('show');
          }
        });
    });
  });
  </script>
