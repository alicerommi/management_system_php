<?php include 'includes/header.php'; ?>


        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                  <h3 class="text-primary">Add Social Links & Footer Text</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Ajustes De Pagina</a></li>
                        <li class="breadcrumb-item active">Add Social Media Links</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                        <div class="col-md-6">
                          <?php
                           

                            if(isset($_GET['updated'])){
                              if($_GET['updated']==1){
                                     echo '<div class="alert alert-success">The Social Media Links Has Been Updated Successfully</div>';
                              }else if($_GET['updated']==0){
                                    echo '<div class="alert alert-warning">Error in Updating Social Media Links</div>';
                              }
                            }
            
                          ?>

                          <?php  if(isset($_GET['uploadFooterLogo'])){
                              if($_GET['uploadFooterLogo']==1){
                                     echo '<div class="alert alert-success">The Footer Logo Has Been Updated</div>';
                              }else if($_GET['uploadFooterLogo']==0){
                                    echo '<div class="alert alert-warning">Error in Updating Footer Logo</div>';
                              }
                            }

                            if(isset($_GET['logoMisMatchFormat'])){
                                if($_GET['logoMisMatchFormat']==1){
                                 echo '<div class="alert alert-warning">File Format is not Supported</div>';
                                }
                            }
                            ?>
                          <div class="panel panel-primary">
                          <div class="panel-heading"><h3 class="panel-title">Add Socials Links</h3></div>
                          <div class="panel-body">
                              <div class="form">


                                <?php
                                 $sm_linkid = 1; 
                                $query = mysqli_query($conn,"SELECT * FROM `footersocial_medialinks` WHERE sm_linkid=1");
                                $row  = mysqli_fetch_array($query);

                                $fb_link  = $row['fb_link'];
                                $twitter_link  = $row['twitter_link'];
                                $gplus_link  = $row['gplus_link'];
                                $linkedIn_link  = $row['linkedIn_link'];
                                $vimeo_link  = $row['vimeo_link'];
                                $instagram_link = $row['instagram_link'];
                                ?>
                                  <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" action="actions/update.php">
                                      <input type="hidden" name="sm_linkid" value="<?php echo $sm_linkid;?>">
                                      <div class="form-group">
                                          <label for="facebook" class="control-label col-lg-6">Facebook</label>
                                          <div class="col-lg-12">
                                              <input type="url" class="form-control" id="facebook" name="facebook" required aria-required="true"  value="<?php echo $fb_link;  ?>">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="twitter" class="control-label col-lg-6">Twitter</label>
                                          <div class="col-lg-12">
                                              <input type="url" class="form-control" id="twitter" name="twitter" required aria-required="true" value="<?php echo $twitter_link;  ?>">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="googleplus" class="control-label col-lg-6">Google Plus</label>
                                          <div class="col-lg-12">
                                              <input type="url" class="form-control" id="googleplus" name="googleplus" required aria-required="true" value="<?php echo   $gplus_link ;  ?>">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="linkedin" class="control-label col-lg-6">Linkedin</label>
                                          <div class="col-lg-12">
                                              <input type="url" class="form-control" id="linkedin" name="linkedin" required aria-required="true" value="<?php echo $linkedIn_link;  ?>">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="vimeo" class="control-label col-lg-6">Vimeo</label>
                                          <div class="col-lg-12">
                                              <input type="url" class="form-control" id="vimeo" name="vimeo" required aria-required="true" value="<?php echo $vimeo_link;  ?>">
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label for="vimeo" class="control-label col-lg-6">Instagram</label>
                                          <div class="col-lg-12">
                                              <input type="url" class="form-control" id="insta" name="insta" required aria-required="true" value="<?php echo $instagram_link;  ?>">
                                          </div>
                                      </div>

                                      
                                      <?php
                                        if($sm_linkid>0){
                                          echo ' <div class="form-group text-right">
                                          <div class="col-lg-offset-2 col-lg-12">
                                              <button class="btn btn-primary waves-effect waves-light" type="submit" name="updateSocialLinks">Update</button>
                                          </div>
                                      </div>';
                                        } else{
                                      
                                      echo '<div class="form-group text-right">
                                          <div class="col-lg-offset-2 col-lg-12">
                                              <button class="btn btn-primary waves-effect waves-light" type="submit" name="addSocialLinks">Save</button>
                                          </div>
                                      </div>';
                                        }?>

                                  </form>
                              </div> <!-- .form -->
                          </div> <!-- panel-body -->
                      </div> <!-- panel -->
                        </div>


                      <div class="col-md-6">
                          <?php
                            if(isset($_GET['addedAboutText'])){
                              if($_GET['addedAboutText']==1){
                                echo '<div class="alert alert-success">The Footer Text Has Been Added Successfully</div>';
                              }else if($_GET['addedAboutText']==0){
                                 echo '<div class="alert alert-warning">Error in Adding Footer Text</div>';
                              }
                            }

                             if(isset($_GET['updatedAboutText'])){
                              if($_GET['updatedAboutText']==1){
                                echo '<div class="alert alert-success">The Footer Text Has Been Updated Successfully</div>';
                              }else if($_GET['updatedAboutText']==0){
                                 echo '<div class="alert alert-warning">Error in Updating Footer Text</div>';
                              }
                            }

                            //addedcopyright

                            if(isset($_GET['updatedcopyright'])){
                              if($_GET['updatedcopyright']==1){
                                echo '<div class="alert alert-success">The Footer Copyright Text Has Been Updated Successfully</div>';
                              }else if($_GET['updatedcopyright']==0){
                                 echo '<div class="alert alert-warning">Error in Updating Footer Copyright TExt </div>';
                              }
                            }


                          ?>
                        <div class="panel panel-primary">
                        <div class="panel-heading"><h3 class="panel-title">Add Footer Text</h3></div>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" action="actions/update.php"> 
                                  
                                  <?php
                                  $footer_text_id=1;
                                  $query = mysqli_query($conn,"select* from footer_text where footer_text_id=$footer_text_id");
                                  $row = mysqli_fetch_array($query);
                                  $footer_text = $row['footer_text'];
                                  ?>
                                  <input type="hidden" name="footer_text_id" value="<?php echo $footer_text_id; ?>">
                                  <div class="form-group">

                                      <label for="footerabout" class="control-label col-lg-6">Footer About</label>
                                      <div class="col-lg-12">
                                          <textarea class="form-control" maxlength="250" name="about" rows="8" cols="65" id="footerabout" required><?php echo  $footer_text ; ?></textarea>
                                      </div>
                                  </div>
                                
                                <div class="col-md-12">
                                  <div class="form-group text-right">
                                    <div class="col-lg-offset-2 col-lg-12" style="padding: 0">
                                      <button class="btn btn-primary waves-effect waves-light" type="submit" name="updateFooterText">Update</button>
                                    </div>
                                  </div>
                                </div>

                                </form>
                            </div> <!-- .form -->
                        </div> <!-- panel-body -->
                        </div> <!-- panel -->
                      </div>

                      <div class="col-md-6">


                        <div class="panel panel-primary">
                        <div class="panel-heading"><h3 class="panel-title">Upload Footer Logo</h3></div>
                        <div class="panel-body">
                            <form class="form"  enctype="multipart/form-data" action= "actions/update.php" method="POST">
                             

                                <div class="col-md-12">
                                  <form method="POST">
                                    <input type="hidden" name="footer_logo_id" value="1">
                                    <input class="form-control" type="file" name="fileupload" required>
                                    <label for="fileupload"> Select a file to upload</label>
                                    
                                    <div class="col-md-12">
                                      <div class="form-group text-right">
                                        <div class="col-lg-offset-2 col-lg-12" style="padding: 0">
                                          <button class="btn btn-primary waves-effect waves-light" type="submit" name="uploadFooterLogo">Update</button>
                                        </div>
                                      </div>
                                    </div>
                                  </form>

                                </div>
                            </div> 
                        </div>
                        </div>
                    

                      <div class="col-md-6">
                        <div class="panel panel-primary">
                        <div class="panel-heading"><h3 class="panel-title">Update Copyright</h3></div>
                        <div class="panel-body">
                            <div class="form">

                                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST"  action="actions/update.php">
                                
                                    <?php 

                                    $query = mysqli_query($conn,"SELECT * FROM `footer_copyrighttext` WHERE footer_copyrightId=1");
                                    $row = mysqli_fetch_array($query);
                                    $footer_copyrightId = $row['footer_copyrightId'];
                                    $footer_copyrightText =$row['footer_copyrightText'];
                                    ?>

                                    <input type="hidden" name="copyrightID" value="<?php echo $footer_copyrightId;?>">
                                    <div class="form-group">
                                      <label for="copyright" class="control-label col-lg-6">Copyright</label>
                                      <div class="col-lg-12">
                                          <input type="text" maxlength="40" class="form-control" id="copyright" name="copyright" required value="<?php echo $footer_copyrightText;?>" >
                                      </div>
                                  </div>

                                  <input type="hidden" name="footer_copyrightId" value="1">
                                  <div class="col-md-12">
                                    <div class="form-group text-right">
                                      <div class="col-lg-offset-2 col-lg-12" style="padding: 0">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit" name="UpdateCopyrightText">Update</button>
                                      </div>
                                    </div>
                                  </div>
                                </form>
                            </div>
                        </div> <!-- panel-body -->
                        </div> <!-- panel -->
                      </div>

                </div>
            <!-- End Container fluid  -->

    <?php include 'includes/footer.php'; ?>
