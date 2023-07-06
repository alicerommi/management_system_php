<?php include 'includes/header.php'; ?>
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">View Unread Mensajes</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="javascript:void(0)">Mensajes</a></li>
                        <li class="breadcrumb-item active">View Unread Mensajes</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-md-12 data-table-list">
                      <div class="panel panel-primary">
                          <div class="panel-heading"><h3 class="panel-title">View All Unread Mensajes</h3>
                             
                            </div>
                          <div class="panel-body">
                            
                              <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                              <thead>
                                <tr>
                                  <th>Name</th>
                                  <th>Email</th>
                                  <th>Phone#</th>
                                    <th>Date</th>
                                  <th>Mensaje</th>
                                  <th>Actions</th>
                                </tr>
                              </thead>
                           
                                  <?php 
                                    $query = mysqli_query($conn,"SELECT* from contact  where ans_status=0");
                                    if(mysqli_num_rows($query)>0){
                                      while($row = mysqli_fetch_array($query)){
                                          $contact_id = $row['contact_id'];
                                           $contact_uname = $row['contact_uname'];
                                           $contact_uemail = $row['contact_uemail'];
                                           $contact_msg = $row['contact_msg']; 
                                             $contact_msg = substr($contact_msg,0,25);
                                              $contact_reply = $row['contact_reply'];
                                              $contact_phone = $row['contact_phone'];
                                              $ans_status= $row['ans_status'];
                                              if($ans_status==1){
                                                $ans_status="Yes";
                                              }else{
                                                $ans_status="No";
                                              }
                                           $contact_recordDate = date("d-m-Y",strtotime($row['contact_recordDate']));
                                     

                                       $res = '<tr style="background:white">
                                       <td >'.$contact_uname.'</td>
                                          <td >'.$contact_uemail.'</td>
                                            <td >'.$contact_phone.'</td>
                                           <td >'.$contact_recordDate.'</td>
                                          <td >'.$contact_msg.'</td>                                          
                                        ';
                                           echo $res.  '<td>
                                             <a href="read_message.php?contact_id='.$contact_id.'" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                           </tr>';
                                      }//end while
                                    }//end condition here 

                                  ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                    </div>
                </div>
             
            <!-- End Container fluid  -->
<?php include 'includes/footer.php'; ?>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>