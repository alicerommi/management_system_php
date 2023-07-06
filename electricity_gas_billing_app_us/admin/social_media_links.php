<?php 
            include 'includes/header.php';
?>        
            <div class="content-page">
                <div class="content">
                    <div class="container">
                         <div class="row">
                            <div class="col-md-12">
                                <div id="err_msg">
                                    <?php
                                            if(isset($_GET['added'])){
                                                if($_GET['added']==1){
                                                    messages("Social Links are successfully added","success");
                                                }else if($_GET['added']==0){
                                                    messages("Error in Saving Social Media Links","warning");
                                                }
                                            }

                                            if(isset($_GET['updated'])){
                                                if($_GET['updated']==1){
                                                    messages("Social Links are successfully updated","success");
                                                }else if($_GET['updated']==0){
                                                    messages("Error in Saving Social Media Links","warning");
                                                }
                                            }
                                    ?>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Social Media Links</h3>
                                    </div>
                                    <div class="panel-body">
                                            <p style="color:red; font-weight: 600;">Note: Dont include https:// or http:// with social media links</p>
                                            <?php
                                                $check = mysqli_query($conn,"select* from footersocial_medialinks where sm_linkid = 1");
                                                if(mysqli_num_rows($check)==0){
                                            ?>
                                                <form method="post"  action = "actions/insert.php">
                                                            <div class="form-group">
                                                                    <label>Facebook Link</label>
                                                                    <input type="text" name="fb_link" class="form-control" required>
                                                            </div>
                                                              <div class="form-group">
                                                                    <label>Twitter Link</label>
                                                                    <input type="text" name="tw_link" class="form-control" required>
                                                            </div>

                                                              <div class="form-group">
                                                                    <label>Instagram Link</label>
                                                                    <input type="text" name="insta_link" class="form-control" required>
                                                            </div>

                                                              <div class="form-group">
                                                                    <label>LinkedIn Link</label>
                                                                    <input type="text" name="linkedin_link" class="form-control" required>
                                                            </div>

                                                              <div class="form-group">
                                                                    <label>Google Plus Link</label>
                                                                    <input type="text" name="googleplus_link" class="form-control" required>
                                                            </div>
                                                                <div class="form-group text-right">
                                                                        <button class="btn btn-success" name="addLinks" type="submit">Save</button>
                                                                </div>
                                                </form>
                                            <?php }else{ 
                                                    $row = mysqli_fetch_array($check);
                                                        $sm_linkid = $row['sm_linkid'];
                                                        $fb_link = $row['fb_link'];
                                                        $twitter_link = $row['twitter_link'];
                                                        $gplus_link = $row['gplus_link'];
                                                        $linkedIn_link = $row['linkedIn_link'];
                                                        $instagram_link = $row['instagram_link'];
                                                ?>
                                                          <form method="post" action = "actions/update.php">
                                                            <input type="hidden" value="<?php echo $sm_linkid;  ?>" name="sm_linkid">
                                                            <div class="form-group">
                                                                    <label>Facebook Link</label>
                                                                    <input type="text" name="fb_link" class="form-control" required value="<?php echo $fb_link; ?>">
                                                            </div>
                                                              <div class="form-group">
                                                                    <label>Twitter Link</label>
                                                                    <input type="text" name="tw_link" class="form-control" required value="<?php echo $twitter_link; ?>">
                                                            </div>

                                                              <div class="form-group">
                                                                    <label>Instagram Link</label>
                                                                    <input type="text" name="insta_link" class="form-control" required value="<?php echo $instagram_link; ?>">
                                                            </div>

                                                              <div class="form-group">
                                                                    <label>LinkedIn Link</label>
                                                                    <input type="text" name="linkedin_link" class="form-control" required value="<?php echo $linkedIn_link; ?>">
                                                            </div>

                                                              <div class="form-group">
                                                                    <label>Google Plus Link</label>
                                                                    <input type="text" name="googleplus_link" class="form-control" required value="<?php echo $gplus_link; ?>">
                                                            </div>
                                                                <div class="form-group text-right">
                                                                        <button class="btn btn-success" name="updateLinks" type="submit">Update</button>
                                                                </div>
                                                          </form>
                                            <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End Row -->

<?php 
                    include  'includes/footer.php';
?>