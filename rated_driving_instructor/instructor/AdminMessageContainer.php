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
          var action  = "addMessage" ; //added by the instructor 
          if(comment && senderID && recieverID)
          {
                $.ajax
                ({
                  type: 'post',
                  url: 'chatFiles/commentajax.php',
                  data: 
                  {
                     ins_comm:comment,
                     ins_id:senderID,
                     admin_id:recieverID,
                     action:action,
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
      $("#messages").load("chatFiles/load.php?ins_id="+senderID+"&admin_id="+recieverID+"&messages=admin").show();
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
                            <li><a href="index.php">Instructor</a></li>
                            <li class="active">Message Container</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!--row -->
                 <div class="white-box">
                <div class="row">
                            <!-- will contains the user which are online or offline -->
                            <div class="col-lg-3 b-r" id="users">
                               <center> <h3>Administrator</h3></center><hr/>
                                   <?php 
                                   //get the id of instructor whose session is currently running
                                   $queryINSID  = mysqli_query($conn,"SELECT* FROM instructor WHERE email='$ins_email'");
                                   $rowINS = mysqli_fetch_array($queryINSID);
                                   $ins_id = $rowINS['id'];
                                   //to get the admin id 
                                   $count = 0;
                                   //$query = mysqli_query($conn,"select inad_chat.*, admin.* from admin_ins_chat inad_chat, admin admin where admin.id=inad_chat.admin_id and inad_chat.ins_id=$ins_id");
                                        echo '<input type="hidden" id="instructorID" value='.$ins_id.'>';
                                   $query = mysqli_query($conn,"SELECT * FROM admin WHERE  id IN (SELECT admin_id FROM admin_ins_chat WHERE ins_id=$ins_id)");
                                   if(mysqli_num_rows($query)>0){
                                            while($Row = mysqli_fetch_array($query)){
                                                //get the user details 
                                                $adminID = $Row['id'];
                                                $adminname = ucwords($Row['name']);
                                                $adminEmail = $Row['email'];
                                                $online_flag = $Row['online_flag'];
                                                $adminImage  = $Row['image'];
                                                 //attach a green color if the user is online usign the flag value
                                                $str = "";
                                                 if($online_flag!=0){
                                                    $str =  "<span class='users_status_active'></span>"; 
                                                 }else{
                                                    $str = "<span class='users_status_not_active'></span>";
                                                 }   
                                               // echo "<ul>";
                                                if($adminImage==""){
                                                    echo "<a class='usersClicked' id='$adminID' name='$adminname' alt='$adminname' type='button'><img class='my_profile_image' src='../user/images/default.png' height='35' width='35'/>&nbsp;&nbsp;"."<strong>".$adminname."</strong>".$str."</a><hr/>";
                                                }else{
                                                    echo "<a class='usersClicked' id='$adminID' name='$adminname' alt='$adminname'><img class='my_profile_image' src='../user/images/$adminImage' height='35' width='35'/>&nbsp;&nbsp;"."<strong>".$adminname."</strong>".$str."</a><hr/>";
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
                                    <!--  <input type="hidden" id="target"> -->
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
                //get admin id 
               var adminID = $(this).attr('id');
               //get instructor id
               var instructorID = $("#instructorID").val();
               //for sending request to page 
               var dataString = "admin_id="+adminID+"&ins_id="+instructorID+"&messages=admin";
               $.ajax({
                    url:'chatFiles/load.php',
                    data:dataString,
                    method:"POST",
                    success:function(data){
                        $("#messages").html(data);
                        $("#messageArea").show();
                        $("#senderID").val(instructorID);
                        $("#recieverID").val(adminID);
                       scrollNow();
                    },
               });

        });

            /////////////////////////////////////////////////////////////////////////
//for loading the messages after putting a message to any one 
    //this function will scroll the div so that user can see the latest message
function scrollNow(){

                        // var $container = $('div#messages'),
                        //  $scrollTo = $('#btn');
                        // $container.scrollTop(
                        //     $scrollTo.offset().top - $container.offset().top + $container.scrollTop()
                        // )
                        // // Or you can animate the scrolling:
                        // $container.animate({
                        //     scrollTop: $scrollTo.offset().top - $container.offset().top + $container.scrollTop()
                        // })

                        $("div#messages, div").scrollTop(5000);
    }//end function
           
    }); //end ready function 
</script>
