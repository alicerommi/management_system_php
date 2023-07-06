<?php include 'includes/header.php'; ?>

<style type="text/css">
  @media screen and (max-width: 320px) {

  .panel .panel-heading .badge-list {
    justify-content: flex-start;
  }
}

@media screen and (max-width: 800px) {
  .panel .panel-heading .badge-list {
    justify-content: flex-start;
    width: 78%;
  }
}

@media screen and (max-width: 414px) {

  .panel .panel-heading .badge-list {
    justify-content: flex-start;
  }
}
</style>
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">View Mensajes</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="javascript:void(0)">Mensajes</a></li>
                        <li class="breadcrumb-item active">View All Mensajes</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-md-12 data-table-list">

                      <?php
                        if(isset($_GET['deleted'])){
                            if($_GET['deleted']==1 ){
                              echo '<div class="alert alert-danger">The Message Has Been Successfully Deleted</div>';
                            } elseif ( $_GET['deleted']==0) {
                              echo '<div class="alert alert-warning">Error in Deleting Message</div>';
                            }
                        }
                      ?>

                    <!--   <div class="alert alert-success">The Answer Has Been Successfully Send To Client</div> -->
                      <div class="panel panel-primary">
                          <div class="panel-heading"><h3 class="panel-title">View ALL Mensajes</h3>

                              <div class="badge-list">
                              <ul class="badge">
                                <?php
                                  $query = mysqli_query($conn,"SELECT* FROM contact where ans_status=1");
                                  $rowRead  = mysqli_num_rows($query);


                                   $query = mysqli_query($conn,"SELECT* FROM contact where ans_status=0");
                                  $rowNotRead  = mysqli_num_rows($query);

                                ?>
                                <li class="read">Read <span class="counter read-counter"><?php echo $rowRead; ?></span></li>
                                <li class="unread">UnRead <span class="counter unread-counter"><?php echo $rowNotRead; ?></span></li>
                              </ul>
                            </div>


                            </div>
                          <div class="panel-body">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                             
                              <thead>
                                <tr>
                                  <th>Name</th>
                                  <th>Email</th>
                                  <th>Phone# </th>
                                    <th>Date</th>
                                  <th>Mensaje</th>
                                  <th>Answered</th>
                                
                                  <th>Actions</th>
                                </tr>
                              </thead>
                           
                                  <?php 
                                    $query = mysqli_query($conn,"SELECT* from contact");
                                    if(mysqli_num_rows($query)>0){
                                      while($row = mysqli_fetch_array($query)){
                                          $contact_id = $row['contact_id'];
                                           $contact_uname = $row['contact_uname'];
                                           $contact_uemail = $row['contact_uemail'];
                                           $contact_msg = $row['contact_msg']; 
                                             $contact_msg = substr($contact_msg,0,25);
                                              $contact_reply = $row['contact_reply'];
                                              $ans_status= $row['ans_status'];
                                              $contact_phone = $row['contact_phone'];
                                              if($ans_status==1){
                                                $ans_status="Yes";
                                              }else{
                                                $ans_status="No";
                                              }
                                              

                                           $contact_recordDate = date("d-m-Y",strtotime($row['contact_recordDate']));
                                        if(strlen($contact_reply)==0){

                                       $res = '<tr style="background:white">
                                       <td >'.$contact_uname.'</td>
                                          <td >'.$contact_uemail.'</td>
                                            
                                              <td >'.$contact_phone.'</td>
                                           <td >'.$contact_recordDate.'</td>
                                          <td >'.$contact_msg.'</td> 
                                          <td >'.$ans_status.'</td>
                                         
                                        ';
                                        if($row['ans_status']==1){
                                          echo $res.  '<td>
                                            <a href="read_message.php?contact_id='.$contact_id.'" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-danger" href="actions/delete.php?message_id='.$contact_id.'"><i class="fa fa-trash"></i></a></td>
                                           </tr>';
                                           }else{
                                           echo $res.  '<td>
                                            <a href="read_message.php?contact_id='.$contact_id.'" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-danger" href="actions/delete.php?message_id='.$contact_id.'"><i class="fa fa-trash"></i></a></td>
                                           </tr>';
                                         }

                                    }else{
                                        $res= '<tr style="background:rgba(0,0,0,.05)">
                                          <td >'.$contact_uname.'</td>
                                           <td >'.$contact_uemail.'</td>
                                            
                                              <td >'.$contact_phone.'</td>
                                           <td >'.$contact_recordDate.'</td>
                                          <td >'.$contact_msg.'</td>  
                                           <td >'.$ans_status.'</td>
                                          ';

                                      if($row['ans_status']==1){
                                          echo $res.  '<td>
                                           <a href="read_message.php?contact_id='.$contact_id.'" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-danger" href="actions/delete.php?message_id='.$contact_id.'"><i class="fa fa-trash"></i></a></td>
                                           </tr>';
                                           }else{
                                           echo $res.  '<td>
                                           <a href="read_message.php?contact_id='.$contact_id.'" class="btn btn-info"><i class="fa fa-eye"></i></a>

                                    <a class="btn btn-danger" href="actions/delete.php?message_id='.$contact_id.'"><i class="fa fa-trash"></i></a></td>
                                           </tr>';
                                         }

                                    }
                                      }//end while
                                    }//end condition here 

                                  ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                    </div>
                </div>
                <!-- The Modal -->
                                                      
<?php include 'includes/footer.php'; ?>

   
    <!-- Data Table -->
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>