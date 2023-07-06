<?php include 'includes/session_check.php'; ?>
<?php include 'includes/database_connection.php'; ?>
<?php 
$query = mysqli_query($conn,"SELECT* FROM `instructor` WHERE email='$ins_email'");
$row = mysqli_fetch_array($query);
$instructorName = $row['name'];
$senderID= $row['id']; //which is the insteructor id 
?>
<?php
if(isset($_GET['userID'])){
    $userid = $_GET['userID'];
    $recieverID = $userid;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'includes/header_links.php';?>
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
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
         user_comm:comment,
         senderID:senderID,
         recieverID:recieverID,

      },
      success: function (response) 
      {
        document.getElementById("comment").value="";
      }
    });
  }
  
  return false;
}
</script>
<script>
 function autoRefresh_div()
 {
      $("#result").load("chatFiles/load.php?<?php echo "ins_id=".$senderID."&user_id=".$recieverID; ?>").show();// a function which will load data from other file after x seconds
  }
  setInterval('autoRefresh_div()', 2000);
</script>
</head>

</head>
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
                            <li class="active">Chat Now</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <style>
*{margin:0px; padding:0px;font-family: Helvetica, Arial, sans-serif;}
#logout{width:60px; height:20px; position:absolute; top:6px; right:20px; margin-bottom:40px; text-align:center; color:#fff}
#container{width:75%; height:auto; position:relative; top:8px; margin:auto;}

#session-name{width:100%; height:36px; margin-bottom:30px; font-size:20px}
.session-text{width:300px; height:30px;padding:6px 10px;margin: 8px 0;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box; font-size:24px}

#result-wrapper{width:100%; margin:auto; height:450px;}
#result{height:450px; overflow:scroll;overflow-x: hidden;}

#form-container{width:100%; margin:auto; height:80px;}
.form-text{float:left; width:85%; height:80px;}
#comment{width:100%; height:79px; resize:none;}
.form-btn{float:left; width:15%; height:80px;}
#btn{border:none; height:80px; width:100%; background:tomato; color:#fff; font-size:22px}

.chats{width:100%; margin-bottom:6px;}
.chats strong{color:#6d84b4}
.chats p{ font-size:14px; color:#aaa; margin-right:10px}
</style>
                <!--row -->
                <div class="row">
                    <div class="col-lg-12">
                            <div class="white-box">
                                            
                                        <div id="container">
                                            

                                            <div id="result-wrapper">
                                                <div id="result">
                                                  
                                                </div>          
                                            </div>

                                            <form method='post' action="#" onsubmit="return post();" id="my_form" name="my_form">
                                            <div id="form-container">

                                                 <div class="form-text">
                                                <input type="text" style="display:none" id="senderID" value="<?= $senderID ?>">
                                              <input type="text" style="display:none" id="recieverID" value="<?= $recieverID ?>">

                                                    <textarea id="comment"></textarea>
                                                </div>

                                                
                                                <div class="form-btn">
                                                    <input type="submit" value="Send" id="btn" name="btn"/>
                                                </div>

                                            </div>
                                            </form>
                            </div>
                    </div> 
                </div>
                <!-- /.right-sidebar -->
            </div>
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