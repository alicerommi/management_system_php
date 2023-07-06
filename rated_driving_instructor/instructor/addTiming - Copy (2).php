<?php include 'includes/session_check.php'; ?>
<?php include 'includes/database_connection.php'; ?>
<?php
//to get the instructor id 
$queryID  = "SELECT* FROM instructor WHERE email='$ins_email'";
$resultID  = mysqli_query($conn,$queryID);
$rowInstructor  = mysqli_fetch_array($resultID);
$ins_ID = $rowInstructor['id']; 
// $uid= 1;
$datetime_string = date('c',time());    
if(isset($_POST['action']) or isset($_GET['view']))
{
    if(isset($_GET['view']))
    {
        header('Content-Type: application/json');
        $start = mysqli_real_escape_string($conn,$_GET["start"]);
        $end = mysqli_real_escape_string($conn,$_GET["end"]); 
        //for instructor we change the events color schemes  this query will fetch the isstructor schudlue and map a different color on it.. 
        $query = "SELECT `id`, `start` ,`end` ,`title` FROM `schdules` where (date(start) >= '$start' AND date(start) <= '$end') and ins_id=$ins_ID";
        $result = mysqli_query($conn,$query);
        $arr = array(); 
        while($row = mysqli_fetch_array($result))
        {
            $arr['id']  = $row['id'];
            $arr['start'] = $row['start'];
            $arr['end'] = $row['end'];
            $arr['title'] = ucwords($row['title']);
            $arr['color'] = "black";
            $arr['textColor'] = "white";
            $events[] = $arr; 
        }
        //for fetching the events or schdules which has been booked by the user into the calender their color schemes will also different .... ..
        $q = "SELECT `id`, `ins_id`, `user_id`, `start`, `end`, `title`, `approvedStatus`,`recordDate` FROM `schedule_bookings` where (date(start) >= '$start' AND date(start) <= '$end') and ins_id=$ins_ID";
        $result2 = mysqli_query($conn,$q);
       $associativeArray = array();
         while($row2 = mysqli_fetch_assoc($result2))
        {
                    $associativeArray['id'] = $row2['id'];
                    $associativeArray['ins_id'] = $row2['ins_id'];
                    $associativeArray['user_id'] = $row2['user_id'];
                    $associativeArray['start'] = $row2['start'];
                    $associativeArray['end'] = $row2['end'];
                    $associativeArray['requestDate']  = date('d F, Y ',strtotime($row2['recordDate']));
                  //  $associativeArray['title'] = $row2['title'];
                    if($row2['approvedStatus']==0){
                        // for getting the user name and other information so that instructor can view the requestor information before accepting or rejecting his request
                        $userID = $row2['user_id'];
                        $userQuery = "SELECT* FROM `users` WHERE `id`=$userID";
                        $result3 = mysqli_query($conn,$userQuery);
                        $userRecord = mysqli_fetch_array($result3);
                        $userName = ucwords($userRecord['username']);
                        $profileLink = "userInfo.php?userID=".$userID;
                        $associativeArray['username'] = $userName;
                        $associativeArray['profile'] = $profileLink;

                        $associativeArray['title'] = "Pending";
                        $associativeArray['color'] = "yellow";
                         $associativeArray['textColor'] = "black";
                      
                    }else if($row2['approvedStatus']==2){
                         $associativeArray['title'] = "Cancel";
                          $associativeArray['color'] = "red";
                         $associativeArray['textColor'] = "white";
                          //$associativeArray['selectable'] = "false";
                         $associativeArray['durationEditable'] = false;
                    }else
                    {
                        $associativeArray['title'] = ucwords($row2['title']);
                        $associativeArray['approvedStatus'] = $row2['approvedStatus'];
                         $associativeArray['color'] = "green";
                         $associativeArray['textColor'] = "white";
                        $associativeArray['durationEditable'] = false;

                    }
//                    $associativeArray['disableDragging'] =  true;



                $events[] = $associativeArray;
           // print_r($row2);
          //  $events[] = $row2; 
        }
        echo json_encode($events); 
        exit;
    }
    elseif($_POST['action'] == "add")
    {   
      $insert = "INSERT INTO `schdules` (
                    `title` ,
                    `start` ,
                    `end` ,
                    `ins_id` 
                    )
                    VALUES (
                    '".mysqli_real_escape_string($conn,$_POST["title"])."',
                    '".mysqli_real_escape_string($conn,date('Y-m-d H:i:s',strtotime($_POST["start"])))."',
                    '".mysqli_real_escape_string($conn,date('Y-m-d H:i:s',strtotime($_POST["end"])))."',
                      $ins_ID
                    )";

        mysqli_query($conn,$insert);
        header('Content-Type: application/json');
        echo '{"id":"'.mysqli_insert_id($conn).'"}';
        exit;
    }
    elseif($_POST['action'] == "update")
    {
        mysqli_query($conn,"UPDATE `schdules` set 
            `start` = '".mysqli_real_escape_string($conn,date('Y-m-d H:i:s',strtotime($_POST["start"])))."', 
            `end` = '".mysqli_real_escape_string($conn,date('Y-m-d H:i:s',strtotime($_POST["end"])))."' 
            where ins_id = ".mysqli_real_escape_string($conn,$ins_ID)." and id = '".mysqli_real_escape_string($conn,$_POST["id"])."'");
        exit;
    }
    elseif($_POST['action'] == "delete") 
    {
        mysqli_query($conn,"DELETE from `schdules` where `ins_id` = '".mysqli_real_escape_string($conn,$ins_ID)."' and id = '".mysqli_real_escape_string($conn,$_POST["id"])."'");
        if (mysqli_affected_rows($conn) > 0) {
            echo "1";
        }
        exit;
    }elseif ($_POST['action'] == "accept") {
        //event id 
        $id = $_POST['id'];
        $query = "UPDATE `schedule_bookings` SET `approvedStatus`=1 WHERE `id`=$id";
        mysqli_query($conn,$query);
        header('Content-Type: application/json');
        echo '{"id":"'.mysqli_insert_id($conn).'"}';
        exit;
    }elseif($_POST['action'] == "reject"){
        $id = $_POST['id'];
        $query = "UPDATE `schedule_bookings` SET `approvedStatus`=2 WHERE `id`=$id";
        mysqli_query($conn,$query);
        header('Content-Type: application/json');
        echo '{"id":"'.mysqli_insert_id($conn).'"}';
        exit;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
      <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
      <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">  
      <link href="css/animate.css" rel="stylesheet">
      <link href="css/style.min.css" rel="stylesheet">
      <link href="css/colors/megna.css" id="theme" rel="stylesheet">
           <!-- jQuery -->
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
  <!--     <script type="text/javascript" src="script.js"></script> -->
      <link href="css/fullcalendar.css" rel="stylesheet" />
      <link href="css/fullcalendar.print.css" rel="stylesheet" media="print" />
      <script src="js/moment.min.js"></script>
      <script src="js/fullcalendar.js"></script>
</head>
<style type="text/css"> 
.fc th.fc-widget-header {
    background: #2d2a33;
}
.modal-dialog {
  position: absolute;
  top: 200px;
  right: 100px;
  bottom: 0;
  left: 0;
  z-index: 10040;
  overflow: auto;
  overflow-y: auto;
}
</style>
<body>
    <!-- Preloader -->
   <!--  <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div> -->
    <div id="wrapper">
          <?php include 'includes/navigation_header.php'; ?>  
        <!-- Navigation -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Instructor Schedule</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="#">Instructor</a></li>
                            <li class="active">My Calender</li>
                        </ol>
                    </div>
                 
                </div> -->
                <!-- row -->
        <div class="row">
          <div class="col-md-12">
              <div class="white-box">
                  <div id="calendar"></div>


                </div> 
              </div>

              <!-- Modal -->
<div id="createEventModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Schdule</h4>
        </div>
        <div class="modal-body">
              <div class="control-group">
                  <label class="control-label" for="inputPatient">Schdule Title:</label>
                  <div class="field desc">
                      <input class="form-control" id="title" name="title" placeholder="Schdule Title" type="text" value="">
                  </div>
              </div>

              <!--  <div class="control-group">
                  <label class="control-label" for="inputPatient">Schdule Price Per Half Hour(in USD):</label>
                  <div class="field desc">
                      <input class="form-control" id="halfHourRate" name="halfHourRate" placeholder="Enter Rate Here" type="number" min="1" maxlength="10">
                  </div>
              </div> -->




              <input type="hidden" id="startTime"/>
              <input type="hidden" id="endTime"/>

          <div class="control-group">
              <label class="control-label" for="when">When:</label>
              <div class="controls controls-row" id="when" style="margin-top:5px;">
              </div>
          </div>
        </div>
        
        <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
          <button type="submit" class="btn btn-primary" id="submitButton">Save</button>
      </div>
      </div>
    </div>
</div>
<!--for the admin whether h want to delet his schdule -->
<div id="calendarModal" class="modal fade">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">My Schdule Details</h4>
                  </div>
                  <div id="modalBody" class="modal-body">
                  <h4 id="modalTitle" class="modal-title"></h4>
                  <div id="modalWhen" style="margin-top:5px;"></div>
                  </div>
                  <input type="hidden" id="eventID"/>
                  <div class="modal-footer">
                      <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                      <button type="submit" class="btn btn-danger" id="deleteButton">Delete</button>
                  </div>
              </div>
          </div>
</div>
<!-- end admin modal here -->
<!-- for the user if admin want to approve or disapprove the schdule request from user -->
<div id="userModal" class="modal fade">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Schdule Details</h4>
                  </div>
                  <div id="modaluserBody" class="modal-body">
                  <h4 id="modaluserTitle" class="modal-title"></h4>
                  <p id = "link"></p>
                  <p id="requestPlaced"></p>
                  <div id="modaluserWhen" style="margin-top:5px;"></div>

                  </div>
                  <input type="hidden" id="usereventID"/>
                  <input type="hidden" id="userID" />

                  <input type="hidden" id="userstartTime"/>
              <input type="hidden" id="userendTime"/>
                <input type="hidden" id="utitle"/>


                  <div class="modal-footer">
                      <button class="btn" data-dismiss="modal" aria-hidden="true">Hide Modal</button>
                      <button type="submit" class="btn btn-danger" id="rejectButton">Reject </button>
                       <button type="submit" class="btn btn-success" id="acceptButton">Accept </button>
                  </div>
              </div>
          </div>
</div>
<!--end the user modal here -->
<!--Modal-->
          </div>
      </div>
            </div>
            <!-- /.container-fluid -->
             <?php include('includes/footerText.php'); ?>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
   <!--  <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script> -->
    <script src="bootstrap/dist/js/tether.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
<script type="text/javascript">
  
  $(document).ready(function(){
  
        var calendar = $('#calendar').fullCalendar({
            header:{
                left: 'prev,next today',
                center: 'title',
                right: 'agendaWeek,agendaDay'
            },
            //disableDragging : true,
            defaultView: 'agendaWeek',
           //  height: 'parent',
            editable: true,
            selectable: true,
            allDaySlot: false,
            events: "addTiming.php?view=1",
            eventClick:  function(event, jsEvent, view) {
                // alert(event.id);
                endtime = $.fullCalendar.moment(event.end).format('h:mm');
                starttime = $.fullCalendar.moment(event.start).format('dddd, MMMM Do YYYY, h:mm');
                var mywhen = starttime + ' - ' + endtime;


                if(event.user_id>0){ //user modal will appear here
                      
                      if(event.title!="Pending"){
                          alert("You can't Change the Request Status");
                      }else{
                                  $('#modaluserTitle').html(event.title+" Request FROM "+event.username);
                                  $('#link').html("<a href="+event.profile+" class='btn btn-info'>View "+event.username+" Profile</a>");
                                  $('#requestPlaced').html("This Request Placed On "+event.requestDate);
                                  $('#modaluserWhen').text(mywhen);
                                  $('#usereventID').val(event.id);
                                  $('#userstartTime').val(event.start);
                                  $('#userendTime').val(event.end);
                                  $('#utitle').val(event.title);
                                  $('#userModal').modal();
                        }

                }else{ //admin modal will appear here
                        $('#modalTitle').html(event.title);
                        $('#modalWhen').text(mywhen);
                        $('#eventID').val(event.id);
                        $('#calendarModal').modal();
                      }
            },
            //header and other values
            select: function(start, end, jsEvent) {
              //check point for dates
                endtime = $.fullCalendar.moment(end).format('h:mm');
                starttime = $.fullCalendar.moment(start).format('dddd, MMMM Do YYYY, h:mm');
                var mywhen = starttime + ' - ' + endtime;
                start = moment(start).format();
                end = moment(end).format();

                  var ST = moment(start).format("HH:mm:ss"); 
                var clickedDate =   moment(start).format("MMMM Do YYYY");
                var clickendDate = moment(end).format("MMMM Do YYYY");
                //get the now time for setting the checking point
                var clickedTime = new Date();
                clickedTime = moment(clickedTime).format("HH:mm:ss");
                //alert(clickedTime);
                var end_time = moment(end).format("HH:mm:ss");
               // alert(end_time);
               // if(clickedTime<end_time){
               //      alert("OK");
               // }else{
               //      alert("Not OKa");
               // }
                var today = new Date();
                var today = moment(today).format("MMMM Do YYYY");
               //check points according to the time and date
               if(today==clickedDate){
                        if(clickedTime<end_time){
                                  $('#createEventModal #startTime').val(start);
                                    $('#createEventModal #endTime').val(end);
                                    $('#createEventModal #when').text(mywhen);
                                    $('#createEventModal').modal('toggle'); 
                        }else{
                          alert("You can't set a schdule for passed hours");
                        }
                   }else if(today>clickedDate){
                          alert("You cant select the previous days");
                   }else{
                            $('#createEventModal #startTime').val(start);
                            $('#createEventModal #endTime').val(end);
                            $('#createEventModal #when').text(mywhen);
                            $('#createEventModal').modal('toggle');
                   }
                // $('#createEventModal #startTime').val(start);
                // $('#createEventModal #endTime').val(end);
                // $('#createEventModal #when').text(mywhen);
                // $('#createEventModal').modal('toggle');
           },   

           eventDrop: function(event, delta){
                        if(event.user_id>0)
                             {  
                                alert("You can't Drop any Event");
                             
                         }
                            event.preventDefault();
                         // $.ajax({
                         //     url: 'addTiming.php',
                         //     data: 'action=update&title='+event.title+'&start='+moment(event.start).format()+'&end='+moment(event.end).format()+'&id='+event.id ,
                         //     type: "POST",
                         //     success: function(json) {
                         //     //alert(json);
                         //     }
                         // });
             
           },
           eventResize: function(event) {
                      alert("You can't Resize Your Schdule");
                      event.preventDefault();
                         // $.ajax({
                         //     url: 'addTiming.php',
                         //     data: 'action=update&title='+event.title+'&start='+moment(event.start).format()+'&end='+moment(event.end).format()+'&id='+event.id,
                         //     type: "POST",
                         //     success: function(json) {
                         //         //alert(json);
                         //     }
                         // });      
                    
           }
        });

          // for admin he can add a schdule     
       $('#submitButton').on('click', function(e){
           // We don't want this to act as a link so cancel the link action
           e.preventDefault();
           doSubmit();
       });
       //for admin he can delete his schdule 
       $('#deleteButton').on('click', function(e){
           // We don't want this to act as a link so cancel the link action
           e.preventDefault();
           doDelete();
       });

       //now we will few things so that admin can accept or reject the requests  of any user
       $('#acceptButton').on('click',function(e){
            e.preventDefault();
            doAccept();
       });
       //for reject the request of user
       $('#rejectButton').on('click',function(e){
             e.preventDefault();
            doReject();
           
       });
       //accept function 
       function doAccept(){
            $('#userModal').hide();
          // var title = $('#utitle').val();
          //  var startTime = $('#userstartTime').val();
          //  var endTime = $('#userendTime').val();
           var userEventID = $('#usereventID').val();
            $.ajax({
              url : 'addTiming.php',
              data: 'action=accept&id='+userEventID,
              type: 'POST',
              success:function(json){
                  alert("The Request Has Been Accepted Successfully");
                 location.reload();

              }
            });
       }//end accept function 

       //start reject function here 
       function doReject(){
          $('#userModal').hide();
          var userEventID = $('#usereventID').val();
          $.ajax({
              type: "POST",
              url:"addTiming.php",
              data:'action=reject&id='+userEventID,
              success:function(json){
                alert("The Reject has Been Rejected Successfully");
                location.reload();

              }
          });
       }
       //end reject functin 

              //next thing is to complete the accept or reject options 
       
       function doDelete(){
           $("#calendarModal").modal('hide');
           var eventID = $('#eventID').val();
           $.ajax({
               url: 'addTiming.php',
               data: 'action=delete&id='+eventID,
               type: "POST",
               success: function(json) {
                   if(json == 1)
                        $("#calendar").fullCalendar('removeEvents',eventID);
                   else
                        return false;
               }
           });
       }
       function doSubmit(){
           $("#createEventModal").modal('hide');
           var title = $('#title').val();
           var startTime = $('#startTime').val();
           var endTime = $('#endTime').val();
           
           $.ajax({
               url: 'addTiming.php',
               data: 'action=add&title='+title+'&start='+startTime+'&end='+endTime,
               type: "POST",
               success: function(json) {
                   $("#calendar").fullCalendar('renderEvent',
                   {
                       id: json.id,
                       title: title,
                       start: startTime,
                       end: endTime,
                   },
                   true);
               }
           });
           
       }
    });













</script>