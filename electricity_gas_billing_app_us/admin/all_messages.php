<?php
		include 'includes/header.php';
?>
	<div class="content-page">
                <div class="content">
                    <div class="container">
                   <!--    <div class="row">
                            <div class="col-sm-12">
                                   <h4 class="pull-left page-title">Support</h4>
                                <ol class="breadcrumb pull-right">
                                  <li class="active">View All Messages</li>
                                </ol>
                            </div>
                        </div> -->
                         <div class="row">
                            <div class="col-md-12">
                                <div id="err_msg">
                                      
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">View Contact Us Messages</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">

                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="supportmsgs" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                           <!--  <th>ID</th> -->
                                                            <th>Msg ID</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Contact Number</th>
															<th>Date</th>    
                                                            <th>Status</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            <?php 
                                                                $query = mysqli_query($conn,"SELECT * FROM `user_messages` ");
                                                                // $i=0;
                                                                while($row= mysqli_fetch_array($query)){
                                                                    //    $i++;
                                                                        $msg_id = $row['msg_id'];
                                                                        $msg_fullname = $row['msg_fullname'];
                                                                     //   $msg_companyname = $row['msg_companyname'];
                                                                        $msg_email = $row['msg_email'];
                                                                        $msg_contactnumber = $row['msg_contactnumber'];
                                                                        $msg_text = $row['msg_text'];
                                                                        $msg_reply = $row['msg_reply'];
                                                                       // $msg_address = $row['msg_address'];
                                                                        $msg_recordflag = $row['msg_recordflag'];
                                                                        if($msg_recordflag==1){
                                                                            $msg_recordflag="Replied";
                                                                        }else{
                                                                            $msg_recordflag="Not Replied";
                                                                        }
                                                                        $msg_recorddate = human_timedate($row['msg_recorddate']);

                                                                        $actions = ' <a class="btn btn-inverse"   title="Read Message & Reply To This Message" href="send_reply.php?message_id='.$msg_id.'"><i class="fa fa-eye"></i></a> <button class="btn btn-danger delete" id="'.$msg_id.'" title="Delete This Message"><i class="fa fa-times"></i></button>';

                                                                          echo '<tr id="rowMSG'.$msg_id.'">
                                                                            <td>'.$msg_id.'</td>
                                                                            <td>'.$msg_fullname.'</td>
                                                                            <td>'.$msg_email.'</td>
                                                                            <td>'.$msg_contactnumber.'</td>
                                                                              <td>'.$msg_recorddate.'</td>
                                                                               <td>'.$msg_recordflag.'</td>
                                                                            <td>'.$actions.'</td>
                                                                        </tr>';
                                                                }
                                                                   
                                                            ?>
                                                      
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End Row -->


                   

<?php
		include 'includes/footer.php';
?>
<script type="text/javascript">
			$(document).ready(function(){
				$("#supportmsgs").dataTable();
                    $(document).on('click','.delete',function(){
                     var id = $(this).attr('id');
                        var t_id = "msg_id="+$(this).attr('id')+"&deleteMSGRow=1";
                        $.ajax({
                                url:"actions/delete.php",
                                method:'post',
                                data:t_id,
                                success:function(a){
                                    if(a==1){
                                            $("#rowMSG"+id).remove();
                                    }
                                }
                        });

                });
			});
</script>