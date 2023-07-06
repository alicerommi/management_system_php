<?php
		include 'includes/header.php';
?>
	<div class="content-page">
                <div class="content">
                    <div class="container">
                         <div class="row">
                            <div class="col-md-12">
                                <?php 
                               
                                if(isset($_GET['delete'])){
                                    if($_GET['delete']==1){
                                        messages("Deleted Successfully","danger");
                                    }else{
                                        messages("Error in Deleting Details","warning");
                                    }
                                }
                                ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">View All User Messages</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">

                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="supportmsgs" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                           <!--  <th>#</th> -->
                                                            <th>Name</th>
                                                               <th>Email</th>
                                                                  <th>Phone</th>
                                                            <th>Date & Time</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            <?php 
                                                                $query = mysqli_query($conn,"SELECT * FROM `users_msgs` ");
                                                                while($row= mysqli_fetch_array($query)){
                                                                    $msg_id = $row['msg_id'];
                                                                    $msg_name = $row['msg_name'];
                                                                    $msg_email = $row['msg_email'];
                                                                    $msg_phone = $row['msg_phone'];
                                                                    $msg_content = $row['msg_content'];
                                                                    $msg_datetime = $row['msg_datetime'];
                                                                    $msg_datetime = human_timedate($msg_datetime);

                                                                        $actions = '<a class="btn btn-danger" id="'.$msg_id.'" title="Delete This Entry" href="actions/delete.php?delete_msg=1&msg_id='.$msg_id.'"><i class="fa fa-times"></i></a> <button class="btn btn-info readmsg" id="'.$msg_id.'"><i class="fa fa-eye"></i></button>';

                                                                          echo '<tr>
                                                                            <td>'.$msg_name.'</td>
                                                                            <td>'.$msg_email.'</td>
                                                                            <td>'.$msg_phone.'</td>
                                                                            <td>'.$msg_datetime.'</td>
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
        $(document).on('click','.readmsg',function(){
            let msg_id = $(this).attr('id');
            $.ajax({
                url:'actions/fetch.php',
                data:{
                    msg_id:msg_id,
                    fetch_msg:1,
                },
                dataType:'json',
                method:'post',
                success:function(d){
                    $("#myLargeModalLabel").empty().append(d.msg_name+" Message");
                    $("#modalData").empty().append('<p style="text-align:justify">'+d.msg_content+"</p>");
                    $("#customMODAL").modal('show');
                }
            });
        });
    });
</script>