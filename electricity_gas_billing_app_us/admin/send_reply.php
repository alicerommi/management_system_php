<?php
		include 'includes/header.php';
?>
	<div class="content-page">
                <div class="content">
                    <div class="container">
                         <div class="row">
                            <div class="col-md-12">
                                <?php
                                if(isset($_GET['replySent'])){
                                        if($_GET['replySent']==1){
                                                      messages("Reply has been sent to user successfully","success");
                                        }else if($_GET['replySent']){
                                                      messages("Error in sending reply","warning");
                                        }
                                }

                                    if(isset($_GET['message_id'])){
                                              $message_id  = $_GET['message_id'];
                                              $query = mysqli_query($conn,"select* from user_messages where msg_id=$message_id");
                                        if(mysqli_num_rows($query)==0){
                                            messages("There is no message for this message ID.","danger");
                                            die;
                                        }else{
                                                                   $row = mysqli_fetch_array($query);
                                                                         $msg_text = $row['msg_text'];
                                                                        $msg_reply = $row['msg_reply'];
                                        }

                                    }else{
                                           messages("Error in sending reply","warning");
                                           die;
                                    }
                                ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                            <h5 class="penel-title">Send Reply To User</h5>
                                    </div>
                                    <div class="panel-body">
                                    <form method="post" action="actions/update.php">
                                                <div class="form-group">
                                                    <label>User Message</label>
                                                    <textarea readonly class="form-control"><?php echo $msg_text; ?></textarea>
                                                </div>
                                                <input type="hidden" name="msg_id" value="<?php echo $message_id; ?>">
                                                <?php 
                                                    if($msg_reply==""){
                                                            echo '  <div class="form-group">
                                                        <label>Write Reply to User</label>
                                                        <textarea name="msg_reply" class="form-control" maxlength="500" rows="5" cols="5" required></textarea>
                                                </div>  <div class="form-group text-right">
                                                        <button class="btn btn-success" type="submit" name="sendReplyFORM">Send Reply</button>
                                                        </div>';
                                                    }else{
                                                        echo   '<div class="form-group">
                                                                   <label>Reply To User</label>
                                                                          <textarea name="msg_reply" class="form-control" readonly>'.$msg_reply.'</textarea>
                                                               </div>';
                                                    }
                                                ?>
                                              
                                              
                                </form>
                            </div>
                            </div>
                            </div>
                        </div> <!-- End Row -->
<?php
		include 'includes/footer.php';
?>
