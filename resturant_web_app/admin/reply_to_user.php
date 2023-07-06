<?php
        include 'includes/header.php';
?>
<div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row pull-right ">
                            <div class="col-sm-12 pull-right" id="back_btn">
                               <a href="users_contact_messages.php" class=" btn btn-purple"><i class="ion-ios7-arrow-back"></i> Back</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                            <?php  
                                if(isset($_GET['updated'])){
                                        if($_GET['updated']==1){
                                            messages("The messages has been sent to user","success");
                                        }else if($_GET['updated']==0){
                                              messages("Error in sending your message","warning");
                                        }
                                }

                                if(isset($_GET['msg_id'])){
                                    $msg_id = intval($_GET['msg_id']);
                                     $query = mysqli_query($conn,"select* from user_messages where msg_id=$msg_id");
                                     $row = mysqli_fetch_array($query);
                                     $msg_user_query = $row['msg_user_query'];

                                }
                            ?>
                                <div class="panel panel-color panel-success">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">Write Reply To User</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                        <form method="post"  action="actions/update.php">
                                            <div class="form-group">
                                                <label>User Message/Query:</label>
                                                <textarea class="form-control" disabled><?=$msg_user_query; ?></textarea>
                                            </div>
                                               
                                           <input type="hidden" name="msg_id" value="<?=$msg_id?>">
                                            <div class="form-group">
                                                <label>Answer Of Query:</label>
                                                <textarea class="form-control" rows="6" required name="admin_ans"></textarea>
                                            </div>
                                           <!--  <div class="form-group">
                                                <label>Location</label>
                                                <input type="text" name="location" class="form-control" required>
                                            </div> -->
                                            <div class="form-group pull-right">
                                                <button type="submit" class="btn btn-primary" name="send_user_reply">Send Reply</button>
                                            </div>
                                        </form>
                                    </div> 
                                </div>
                            </div>
                        </div>
</div>
<?php
        include 'includes/footer.php';
?>