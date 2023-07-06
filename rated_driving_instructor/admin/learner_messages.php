<?php include 'includes/session_check.php'; ?>
<?php include 'includes/database_connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
<?php include 'includes/header_links.php';?>
<style type="text/css">
  .my_profile_image{
      border-radius: 50%;
      cursor : hand;
  }
  .users_status_active{
    float: right;
    width: 10px;
    height: 10px;
    background-color: #16da16;
    border-radius: 50%;
    margin-right: 10px;
    margin-top: 13px;
    border: 2px solid rgba(0, 0, 0, 0.26);
  }
  .users_status_not_active{
    float: right;
    width: 10px;
    height: 10px;
    background-color: gray;
    border-radius: 50%;
    margin-right: 10px;
    margin-top: 13px;
    border: 2px solid rgba(0, 0, 0, 0.26);
  }
  #messages{height:450px; overflow:scroll;overflow-x: hidden;}
</style>
</head>

<script>
    $(document).ready(function()
        {
        $(document).bind('keypress', function(e) {
            if(e.keyCode==13){
                 $('#my_form').submit();
                 $('#comment').val("");
             }
        });

    });
</script>

<script type="text/javascript">
function post()
{
          var comment = document.getElementById("comment").value;
          var senderID = document.getElementById("senderID").value;
          var recieverID = document.getElementById("recieverID").value;
          if(comment && senderID && recieverID)
          {
                $.ajax
                ({
                  type: 'post',
                  url: 'chatFiles/commentajax.php',
                  data: 
                  {
                     admin_comm:comment,
                     admin_id:senderID,
                     user_id:recieverID,
                     action:"add",
                  },
                  success: function (response) 
                  {
                    document.getElementById("comment").value="";
                    autoRefresh_div(senderID,recieverID);
                  }
                });
              }
        return false;
}//end post function
</script>
<script>
 function autoRefresh_div(senderID,recieverID)
 {
      $("#messages").load("chatFiles/load.php?admin_id="+senderID+"&user_id="+recieverID).show();
       scrollNow();
      // a function which will load data from other file after x seconds
}
//for refreshing the div element
function refresher() {
          var senderID = document.getElementById("senderID").value;
          var recieverID = document.getElementById("recieverID").value;
           autoRefresh_div(senderID,recieverID);
}
setInterval('refresher()', 2000);

</script>
<body>
     <!-- Preloader -->
      <!-- <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>  -->
    <div id="wrapper">
        <!-- Left navbar-header -->
             <?php include 'includes/navigation_header.php'; ?>  
        <!-- Left navbar-header end -->
        <!-- Page Content -->
            <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="index.php">Messages</a></li>
                            <li class="active">Leaners Messages</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!--row -->
                 <div class="white-box">
                <div class="row">
                            <!-- will contains the user which are online or offline -->
                            <div class="col-lg-3 b-r" id="users">
                               <center> <h3>All Learners</h3></center><hr/>
                                   <?php 
                                   //to get the instructor id 
                                   $query = mysqli_query($conn,"SELECT* FROM `admin` WHERE email='$admin_email'");
                                        $row = mysqli_fetch_array($query);
                                       // $instructorName = $row['name'];
                                        $adminID= $row['id']; //which is the admin id 
                                             //to get the all the learner 
                                        echo '<input type="hidden" id="adminID" value="'.$adminID.'">';
                                   $query = mysqli_query($conn,"SELECT * FROM users WHERE emailVeriStatus=1");
                                   if(mysqli_num_rows($query)>0){
                                            while($userRow = mysqli_fetch_array($query)){
                                                //get the user details 
                                                $userID = $userRow['id'];
                                                $username = ucwords($userRow['username']);
                                                $userEmail = $userRow['email'];
                                                $online_flag = $userRow['online_flag'];
                                                $userImage  = $userRow['image'];
                                                 //attach a green color if the user is online usign the flag value
                                                $str = "";
                                                 if($online_flag!=0){
                                                    $str =  "<span class='users_status_active'></span>"; 
                                                 }else{
                                                    $str = "<span class='users_status_not_active'></span>";
                                                 }   
                                                if($userImage==""){
                                                    echo "<a class='usersClicked' id='$userID' name='$username' alt='$username' type='button'><img class='my_profile_image' src='../user/images/default.png' height='35' width='35'/>&nbsp;&nbsp;"."<strong>".$username."</strong>".$str."</a><hr/>";
                                                }else{
                                                    echo "<a class='usersClicked' id='$userID' name='$username' alt='$username'><img class='my_profile_image' src='../user/images/$userImage' height='35' width='35'/>&nbsp;&nbsp;"."<strong>".$username."</strong>".$str."</a><hr/>";
                                                }
                                              //  echo "</ul>";

                                            }//end while loop here
                                     }// end if condition here 
                                   ?>
                            </div> 
                            <!-- will contains the messages of specific user-->
                            <div class="col-lg-9" > 
                            <center><h3>Message Container</h3></center><hr/>  
                                <div id="messages"></div>
                                    <div id="messageArea">
                                        <form method='post' id="my_form" name="my_form" onsubmit="return post();">
                                                    <input type="hidden"  id="senderID"/>
                                                    <input type="hidden"  id="recieverID"/>
                                                    <div class="form-group">
                                                        <textarea id="comment" class="form-control" rows="5" required></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" value="Send" id="btn" class="btn btn-success" name="btn"/>
                                                    </div>
                                        </form>
                                    </div>
                            </div>
                      </div>          
                </div>
                <!-- /.right-sidebar -->
            </div>
           <?php include('includes/footerText.php'); ?>
        </div>     
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
           <?php include 'includes/footer_links.php'; ?>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
        //hide the message area first 
        $('#messageArea').hide();
        $(document).on('click','.usersClicked',function(){
                //get user id 
               var userID = $(this).attr('id');
               //get instructor id
               var adminID = $("#adminID").val();
               //for sending request to page 
               var dataString = "user_id="+userID+"&admin_id="+adminID;
               $.ajax({
                    url:'chatFiles/load.php',
                    data:dataString,
                    method:"POST",
                    success:function(data){
                        $("#messages").html(data);
                        $("#messageArea").show();
                        $("#senderID").val(adminID);
                        $("#recieverID").val(userID);
                        scrollNow();
                    },
               });
        });
            /////////////////////////////////////////////////////////////////////////
//for loading the messages after putting a message to any one 
    //this function will scroll the div so that user can see the latest message
function scrollNow(){
                        $("div#messages, div").scrollTop(5000);
    }//end function
}); //end ready function 
</script>
