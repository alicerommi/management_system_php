<?php 
  if(isset($_GET['contact_id'])){
   $contact_id = $_GET['contact_id'];
  }else{
      echo "invalid Paramters";
      die;
  }
include 'includes/header.php';
      
 ?>
 <style type="text/css">
   .details {
   font-size: 16px;
    font-weight: 600;
    color: #000;}

      .msg{
   font-size: 15px;
    font-weight: 400;
    color: #000;}

   .details span{
      padding-left: 15px;


   }
 </style>
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Mensaje</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Users Mensaje</a></li>
                        <li class="breadcrumb-item active">Read Mensaje</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
           
                <div class="row">

                  <div class="col-md-12 text-right" >
                          <a class="btn btn-primary" href="view-messages.php"><i class="fa fa-eye"></i>&nbsp;Back To Mensajes List </a>
                      </div>
                      

                    <div class="col-md-12">
                            <?php
                        if(isset($_GET['replySend'])){
                          if($_GET['replySend']==1){
                            echo '<div class="alert alert-success">The Reply has been successfully send</div>';
                          }else if($_GET['replySend']==0){
                            echo '<div class="alert alert-warning">Error in sending reply</div>';
                          }
                        }
                      ?>

                        <div class="panel panel-primary panel-fill">
                            <div class="panel-heading">
                                <h3 class="panel-title">User Mensaje</h3>
                            </div>
                            <div class="panel-body">
                                  <?php

                                    $query = mysqli_query($conn,"select* from contact where  contact_id= $contact_id");
                                    $row = mysqli_fetch_array($query);
                                    $contact_msg =  $row['contact_msg'];
                                    $contact_phone = $row['contact_phone'];
                                    $contact_uemail = $row['contact_uemail'];
                                    $contact_reply = $row['contact_reply'];
                                    $contact_msg = $row['contact_msg'];


                                  echo  "<p class='details'>User Email:<span>". $contact_uemail."</span></p>";
                                  echo  "<p class='details'>User Phone Number:<span>". $contact_phone."</span></p>";
                                  echo  "<h2>User Message:</h2><p class='msg'>". $contact_msg."</span></p>";
                                  if(strlen($contact_reply)!=0){
                                      echo "<h2>Reply:</h2>";
                                      echo "<p class='msg'>".$contact_reply."</p>";
                                  }else{
                                   ?>

                                   <form method="post" action="actions/insert.php">
                                          <div class="form-group">
                                                <h3>Write Reply:</h3>
                                                <textarea type="text" rows="5" class="form-control" name="msgReply" required maxlength="500"></textarea>
                                          </div>
                                          <input type="hidden" name="m_id" value="<?php echo $contact_id;  ?>">
                                          <div class="form-group" id="replyBTN">
                                              <button class="btn btn-info"  type ="submit" name="commentReply" type="button">Send</button>
                                           </div>
                                  </form>
                               <?php  }?>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- End Container fluid  -->
    <?php include 'includes/footer.php'; ?>
   
