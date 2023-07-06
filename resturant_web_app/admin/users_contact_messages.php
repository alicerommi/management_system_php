<?php
  include 'includes/header.php';
?>
                    
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                      
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">User Quries</h3>
                                    </div>
                                    <div class="panel-body">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Email</th>
                                                    <th>Date & Time</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php
                                                    $query = mysqli_query($conn,"select* from user_messages");
                                                    while($row = mysqli_fetch_array($query)){
                                                            $msg_id = $row['msg_id'];
                                                            $msg_user_first_name = $row['msg_user_first_name'];
                                                            $msg_user_last_name = $row['msg_user_last_name'];
                                                            $msg_user_phone_number = $row['msg_user_phone_number'];
                                                            $msg_user_home_phone_number = $row['msg_user_home_phone_number'];
                                                            $msg_user_ofc_number = $row['msg_user_ofc_number'];
                                                            $msg_user_email = $row['msg_user_email'];
                                                            $msg_datetime = human_timedate($row['msg_datetime']);
                                                            $msg_reply_sent = $row['msg_reply_sent'];
                                                            $actions='<button class="btn btn-primary see_msg" id="'.$msg_id.'" title="Read User Message"><i class="fa fa-eye"></i></button> <a href="reply_to_user.php?msg_id='.$msg_id.'" title="Send Reply" class="btn btn-purple"><i class="fa fa-bookmark"></i></a>';
                                                            if($msg_reply_sent==1)
                                                            {

                                                                    $msg_reply_sent_class = "success";
                                                                    echo '<tr class="'.$msg_reply_sent_class.'">
                                                                      <td>'.$msg_id.'</td>
                                                                    <td>'.$msg_user_first_name.'</td>
                                                                    <td>'.$msg_user_last_name.'</td>
                                                                    <td>'.$msg_user_email.'</td>
                                                                    <td>'.$msg_datetime.'</td>
                                                                    <td>'.$actions.'</td>
                                                                    </tr>';
                                                            }else{
                                                                    $msg_reply_not_sent_class = "danger";
                                                                    echo '<tr class="'.$msg_reply_not_sent_class.'">
                                                                     <td>'.$msg_id.'</td>
                                                                    <td>'.$msg_user_first_name.'</td>
                                                                    <td>'.$msg_user_last_name.'</td>
                                                                    <td>'.$msg_user_email.'</td>
                                                                    <td>'.$msg_datetime.'</td>
                                                                    <td>'.$actions.'</td>
                                                                    </tr>';
                                                            }


                                                    }
                                                    
                                                ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div> <!-- End Row -->
                    </div> <!-- container -->
                               
                </div> <!-- content -->
<?php
        include 'includes/footer.php';
?>
<script src="assets/pages/datatables.init.js"></script>
 <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
                 $(document).on('click','.see_msg',function(){
                let msg_id = $(this).attr('id');
                $.ajax({
                    url:'actions/fetch.php',
                    method:'post',
                    dataType:'json',
                    data:{
                        fetch_user_msg_details:1,
                        msg_id:msg_id,
                    },
                    success:function(data){
                        let msg_user_phone_number = data.msg_user_phone_number;
                        let msg_user_home_phone_number = data.msg_user_home_phone_number;
                        let msg_user_ofc_number = data.msg_user_ofc_number;
                        $("#modal_heading").empty().html(data.msg_user_first_name+" "+data.msg_user_last_name+" Message");
                        let table = "<table class='table'><thead><th>User Phone Number</th><th>User Home Phone Number</th><th>Office Number</th></thead><tbody><td>"+msg_user_phone_number+"</td><td>"+msg_user_home_phone_number+"</td><td>"+msg_user_ofc_number+"</td></tbody></table>";
                        $("#modal_data").empty().append("<p class='user_message_paragraph'>"+data.msg_user_query+"</p>").append(table);
                        $("#custom_modal").modal('show');
                    }   

                });
            });    
 } );
 </script>
