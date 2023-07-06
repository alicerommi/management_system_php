<?php include 'includes/header.php';?>
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Messages</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Messages</li>
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
                      if(isset($_GET['deleted'])){
                        if($_GET['deleted']==1){
                          echo '<div class="alert alert-danger">The Messages Has Been Deleted Successfully</div>';
                        }else if($_GET['deleted']==0){
                          echo '<div class="alert alert-warning">Error in deletion of message</div>';
                        }
                      }
                    ?>

                    <div class="card">
                    <table id="messagesTable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                      <thead>
                          <tr>
                              <th style="width: 131px;">Username</th>
                              <th>Email</th>
                              <th>Date</th>
                              <th>Message</th>
                              <th>Actions</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                          $query = mysqli_query($conn,"SELECT* FROM messages where message_active=1");
                          while($row = mysqli_fetch_array($query)){
                           // SELECT `message_id`, `message_uname`, `message_email`, `message_msg`, `message_recordDate`, `message_active` FROM `messages` WHERE 1
                            $message_id = $row['message_id'];
                            $message_uname = $row['message_uname'];
                            $message_email = $row['message_email'];
                            $message_msg = substr($row['message_msg'],0,25);
                            $message_recordDate = date("d-m-Y",strtotime($row['message_recordDate']));

                                echo'<tr>
                              <td>'.$message_uname.'</td>
                              <td>'.$message_email.'</td>
                              <td>'.$message_recordDate.'</td>
                              <td>'.$message_msg.'</td>
                              <td>
                                <button type="btuton"  data-toggle="modal" class="btn btn-success btn-orange" id="viewmessage"  data-id="'.$message_id.'" data-target="#mesageModal" name="button"><i class="fa fa-eye"></i> </button>
                                <a href="actions/delete.php?message_id='.$message_id.'" class="btn btn-danger btn-orange" name="button"><i class="fa fa-trash"></i> </a>
                              </td>
                          </tr>';
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
              <div class="modal" id="mesageModal">
                <div class="modal-dialog credit-dialog">
                  <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">User Message</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body modal-credit" id="modal-Body">
                      <div class="credit-view">
                        <div class="availabe-crdt">
                          <p id="userMSG"></p>
                        </div>
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
    $('#messagesTable').DataTable();
    $(document).on('click','#viewmessage',function(){
      //$('#exampleModal').modal('show');
      var msg_id = $(this).attr('data-id');
    //  alert(msg_id);
      $.ajax({
        url:'actions/fetch.php',
        data:{msg_id:msg_id},
        dataType:'JSON',
        method:'POST',
        success:function(data){
          $("#userMSG").empty();
          $("#userMSG").html(data.message_msg);
        }
      
      });
    

    });//end click fn here
  });
  </script>
  <script type="text/javascript">
  //$('#myModal').on('shown.bs.modal', function () {
    //$('#myInput').trigger('focus');
  //});
  </script>
