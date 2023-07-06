<?php 
include 'includes/session_check.php';
include 'includes/database_connection.php';
if(isset($_GET['ins_id'])){
  $ins_id = $_GET['ins_id'];
}else{
  echo "Unknown Parameters";
  die;
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'includes/header_links.php';?>
</head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
           <?php 
            include 'includes/navigation_header.php'; ?>

        <!-- Left navbar-header end -->
          <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">All Instructors</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="instructors.php">Instructors</a></li>
                            <li class="active">View Instructors Reviews</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Comments & Reviews of Learner</h3><hr/>
                            <div class="comment-center">
                                <?php //get the reviews of instructors 
                                  $query = mysqli_query($conn,"SELECT usrs.*, ins_rev.* from users usrs, instructor_reviews ins_rev WHERE usrs.id = ins_rev.user_id AND ins_rev.ins_id=$ins_id");
                                  while($row = mysqli_fetch_array($query)){
                                    //getting data from the users table
                                    $username = $row['username'];
                                   // print_r($row);
                                    $image = $row['image'];
                                    //getting data from the instructor_reviews table
                                    $overall_rating = $row['overall_rating'];
                                    $hospitality_rating = $row['hospitality_rating'];
                                    $service_rating = $row['service_rating'];
                                    $review_msg = $row['review_msg'];
                                    $recordDateTime = $row['recordDateTime'];
                                    $date = new DateTime($recordDateTime);
                                    $review_date = $date->format('F d, Y H:i');
                                    $imageUser = '<img src="../user/images/'.$image.'" alt="user" class="img-circle">';
                                ?>
                                <div class="comment-body">
                                    <div class="user-img"> 
                                      <?php
                                          if(strlen($image)>0)
                                              echo $imageUser;
                                            else 
                                              echo '<img src="../user/images/default.png" alt="user" class="img-circle">';
                                      ?>
                                    </div>
                                    <div class="mail-contnet">
                                        <h5><?php echo ucwords($username); ?></h5>
                                         <span class="mail-desc">
                                         <?php echo $review_msg; ?>
                                        </span>
                                        <?php
                                              if($overall_rating==0){
                                                 // echo '<span>0</span>';
                                                }
                                                else
                                                    {
                                                      echo '<span><strong>Overall Rating</strong></span>';
                                                      for($i=0;$i<$overall_rating;$i++){
                                                            echo '<i class="fa fa-star" aria-hidden="true" style="float:right;"></i>';
                                                      }
                                                       echo "<br/>"; 
                                                    } 

                                            if($hospitality_rating==0){
                                                 // echo '<span>0</span>';
                                            }
                                            else
                                                {
                                                     echo '<span><strong>Hospitality Rating</strong></span>';
                                                  for($i=0;$i<$hospitality_rating;$i++){
                                                        echo '<i class="fa fa-star" aria-hidden="true" style="float:right;"></i>';
                                                  }
                                                  echo "<br/>";
                                                } 
                                                 if($service_rating==0){
                                                 // echo '<span>0</span>';
                                            }
                                            else
                                                {
                                                     echo '<span><strong>Service Rating</strong></span>';
                                                  for($i=0;$i<$service_rating;$i++){
                                                        echo '<i class="fa fa-star" aria-hidden="true" style="float:right;"></i>';
                                                  }
                                                  echo "<br/>";
                                                } 
                                        ?> 
                                        <!--  <span class="label label-rouded label-info">PENDING</span> -->
                                         <span class="time pull-right"><?php # echo $review_date; ?></span>
                                    </div>
                                </div>
                                <?php } //end while loop?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.right-sidebar -->
            </div>
           <?php include('includes/footerText.php'); ?>
        </div>     
    </div>
           <?php include 'includes/footer_links.php'; ?>
<script>
    $(document).ready(function() {
    $('#allinstructors').DataTable();
    responsive: true;
} );
</script>
</body>
</html>