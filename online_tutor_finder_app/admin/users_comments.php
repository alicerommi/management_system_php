<?php
    include 'includes/header.php';
    include 'includes/left_nav.php';
     $query = mysqli_query($conn,"SELECT* FROM admin WHERE admin_email = '$admin_email'");
    $adminRow = mysqli_fetch_array($query);
    $admin_fullName = ucwords($adminRow['admin_name']);
    // $admin_image = $adminRow['admin_picture'];
?>
                   
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                               <!--  <h4 class="pull-left page-title">Welcome !</h4> -->
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">User Comments</a></li>
                                    <li class="active">View All Comments</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                         
                                           <div class="col-md-12" style="    margin-top: 20px;">
                                           
                                        <div class="panel panel-default panel-fill">
                                             <?php
                                                if(isset($_GET['deleted'])){
                                                        if($_GET['deleted']==1){
                                                            echo '<div class="alert alert-danger">The Comment Record Has been Successfully Deleted</div>';
                                                        }else if($_GET['deleted']==0){
                                                                  echo '<div class="alert alert-warning">Error in Deletion of Comment</div>';
                                                        }   
                                                }
                                            ?>
                                            <div class="panel-heading"> 
                                                <h3 class="panel-title">All Comments</h3> 
                                                
                                            </div> 
                                            <div class="panel-body">
                                                    <div id="datatable-responsive_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                   <thead>
                                                            <tr>
                                                                <th> Name</th>
                                                                <th>Email</th>
                                                                  <th>Comment Date</th>
                                                                <!--   <th>Account Status</th>
                                                                  <th>Contact Number</th> -->
                                                                <th>Actions</th>
                                                            </tr>
                                                    </thead>
                                            <tbody>
                                               <?php 
                                                $query = mysqli_query($conn,"SELECT * FROM `user_comments`");
                                                if(mysqli_num_rows($query)>0){
                                                  while($row=mysqli_fetch_array($query)){
                                                   // SELECT `comment_id`, `comment_uname`, `comment_uemail`, `comment_msg`, `comment_datetime` FROM `user_comments` WHERE 1
                                                    $comment_id= $row['comment_id'];
                                                    $comment_uname = $row['comment_uname'];
                                                    $comment_uemail = $row['comment_uemail'];
                                                    $comment_datetime = date("d-m-Y",strtotime($row['comment_datetime']));
                                                  
                                                    $comment_msg = $row['comment_msg'];
                                                    

                                                   // $row_recordDate = date("d-m-Y",strtotime($row['row_recordDate']));
                                                      echo '<tr>
                                                      <td>'.$comment_uname.'</td>
                                                        <td>'.$comment_uemail.'</td>
                                                        <td>'.$comment_datetime.'</td>
                                                        <td>
                                                       
                                                    <a  class="btn btn-danger" href="actions/delete.php?comment_id='.$comment_id.'"><i class="fa fa-trash"></i></a>
                                                    <a  class="btn btn-info viewmsg" id='.$comment_id.'><i class="fa fa-eye"></i></a>

                                                        </td>
                                                        </tr>';
                                                  }
                                                }
                                               ?> 
                                             
                                              



                                             </tbody>


                                             </table>   
                                         </div>
                                         </div>
                                         </div>

                                         </div>

                <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">USer Comment</h4>
      </div>
      <div class="modal-body" id="modalBody">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

                    </div> <!-- container -->
                               
                </div> <!-- content -->
<?php
    include 'includes/footer.html';
?>
<script type="text/javascript"> 
    $(document).ready(function() {
        $('#datatable').dataTable();

        $(document).on('click','.viewmsg',function(){
            var comment_id = $(this).attr('id');
            $.ajax({
              data:{comment_id:comment_id},
              method:'post',
              url:'actions/fetch.php',
              dataType:'JSON',
              success:function(data){
                 $('#modalBody').empty();
                $('#modalBody').append("<p>"+data[0]+"</p>");
                $("#myModal").modal('show');
              }
            });
        });
      });
</script>