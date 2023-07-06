<?php include 'includes/header.php'; ?>


        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Add Footer Text & Links</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Ajustes De Pagina</a></li>
                        <li class="breadcrumb-item active">Add Footer Text</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                      <div class="col-md-12">  
                        <?php
                            if(isset($_GET['AddressUpdated'])){
                              if($_GET['AddressUpdated']==1){
                                     echo '<div class="alert alert-success">The Company Infomation in Footer Has Been Updated</div>';
                              }else if($_GET['AddressUpdated']==0){
                                    echo '<div class="alert alert-warning">Error in Updating COmpany Infomation</div>';
                              }
                            } 
                            ?></div>
                        <div class="col-md-6">

                           <?php
                            if(isset($_GET['updatedlinkFooter1'])){
                              if($_GET['updatedlinkFooter1']==1){
                                     echo '<div class="alert alert-success">The Footer Text & Links Has Been Updated Successfully</div>';
                              }else if($_GET['updatedlinkFooter1']==0){
                                    echo '<div class="alert alert-warning">Error in Updating Footer Text & Links Links</div>';
                              }
                            }




                        
                          ?>
                          <div class="panel panel-primary">
                          <div class="panel-heading"><h3 class="panel-title">Add Footer Links 1</h3></div>
                          <div class="panel-body">
                              <div class="form">
                                  <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST"  action="actions/update.php">
                                    <?php
                                    $query = mysqli_query($conn,"SELECT* FROM footer_links where footer_link_id =1 and footer_links_type=1");
                                    $row = mysqli_fetch_array($query);
                                    $footer_headingtext = $row['footer_headingtext'];
                                    $footer_link1 = $row['footer_link1'];
                                    $footer_link2 = $row['footer_link2'];
                                    $footer_link3 = $row['footer_link3'];
                                    $footer_link4 = $row['footer_link4'];
                                    $footer_link5 = $row['footer_link5'];
                                    
                                    ?>

                                    <input type="hidden" name="footer_link_id" value="1">
                                      <div class="form-group">
                                          <label for="heading" class="control-label col-lg-6">Header & Title</label>
                                          <div class="col-lg-12">
                                              <input type="text" class="form-control" id="heading" name="heading" required aria-required="true" value="<?php echo $footer_headingtext; ?>">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="link1" class="control-label col-lg-6">Link 1</label>
                                          <div class="col-lg-12">
                                              <input type="text" class="form-control" id="link1" name="link1" required aria-required="true" value="<?php echo $footer_link1; ?>">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                        <label for="link2" class="control-label col-lg-6">Link 2</label>
                                        <div class="col-lg-12">
                                            <input type="text" class="form-control" id="link2" name="link2" required aria-required="true" value="<?php echo $footer_link2 ;?>">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label for="link3" class="control-label col-lg-6">Link 3</label>
                                        <div class="col-lg-12">
                                            <input type="text" class="form-control" id="link1" name="link3" required aria-required="true" value="<?php echo $footer_link3 ;?>">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label for="link4" class="control-label col-lg-6">Link 4</label>
                                        <div class="col-lg-12">
                                            <input type="text" class="form-control" id="link4" name="link4" required aria-required="true" value="<?php echo $footer_link4 ; ?>">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label for="link5" class="control-label col-lg-6">Link 5</label>
                                        <div class="col-lg-12">
                                            <input type="text" class="form-control" id="link5" name="link5" required aria-required="true" value="<?php echo  $footer_link5;  ?>">
                                        </div>
                                      </div>
                                      <div class="form-group text-right">
                                          <div class="col-lg-offset-2 col-lg-12">
                                              <button class="btn btn-primary waves-effect waves-light" type="submit" name="footer1textLinks">Update</button>
                                          </div>
                                      </div>
                                  </form>
                              </div> <!-- .form -->
                          </div> <!-- panel-body -->
                      </div> <!-- panel -->
                        </div>


                      <div class="col-md-6">
                          <?php
                            if(isset($_GET['updatedlinkFooter2'])){
                              if($_GET['updatedlinkFooter2']==1){
                                     echo '<div class="alert alert-success">The Footer Text & Links Has Been Updated Successfully</div>';
                              }else if($_GET['updatedlinkFooter2']==0){
                                    echo '<div class="alert alert-warning">Error in Updating Footer Text & Links Links</div>';
                              }
                            }

                          ?>
                        <div class="panel panel-primary">
                        <div class="panel-heading"><h3 class="panel-title">Add Footer Links 2</h3></div>
                        <div class="panel-body">
                            <div class="form">
                              <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" action="actions/update.php">
                                  <?php
                                    $query = mysqli_query($conn,"SELECT* FROM footer_links where footer_link_id =2 and footer_links_type=2");
                                    $row = mysqli_fetch_array($query);
                                    $footer_headingtext = $row['footer_headingtext'];
                                    $footer_link1 = $row['footer_link1'];
                                    $footer_link2 = $row['footer_link2'];
                                    $footer_link3 = $row['footer_link3'];
                                    $footer_link4 = $row['footer_link4'];
                                    $footer_link5 = $row['footer_link5'];
                                    ?>

                                    <input type="hidden" name="footer_link_id" value="2">
                                <div class="form-group">
                                    <label for="heading2" class="control-label col-lg-6">Header & Title</label>
                                    <div class="col-lg-12">
                                        <input type="text" class="form-control" id="heading2" name="heading2" required aria-required="true" value="<?php echo  $footer_headingtext;?>">
                                    </div>
                                </div>
                                  <div class="form-group">
                                      <label for="link6" class="control-label col-lg-6">Link 1</label>
                                      <div class="col-lg-12">
                                          <input type="text" class="form-control" id="link6" name="link6" required aria-required="true" value="<?php echo $footer_link1;?>">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="link7" class="control-label col-lg-6">Link 2</label>
                                    <div class="col-lg-12">
                                        <input type="text" class="form-control" id="link7" name="link7" required aria-required="true" value="<?php echo $footer_link2;?>">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="link8" class="control-label col-lg-6">Link 3</label>
                                    <div class="col-lg-12">
                                        <input type="text" class="form-control" id="link8" name="link8" required aria-required="true" value="<?php echo$footer_link3 ;?>">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="link9" class="control-label col-lg-6">Link 4</label>
                                    <div class="col-lg-12">
                                        <input type="text" class="form-control" id="link9" name="link9" required aria-required="true" value="<?php echo$footer_link4 ;?>">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="link10" class="control-label col-lg-6">Link 5</label>
                                    <div class="col-lg-12">
                                        <input type="text" class="form-control" id="link10" name="link10" required aria-required="true" value="<?php echo $footer_link5;?>">
                                    </div>
                                  </div>
                                  <div class="form-group text-right">
                                      <div class="col-lg-offset-2 col-lg-12">
                                          <button class="btn btn-primary waves-effect waves-light" type="submit" name="footer2textLinks">Update</button>
                                      </div>
                                  </div>
                              </form>
                            </div> <!-- .form -->
                        </div> <!-- panel-body -->
                        </div> <!-- panel -->
                      </div>

                      <div class="col-md-12">
                        
                        <div class="panel panel-primary">
                        <div class="panel-heading"><h3 class="panel-title">Get in Touch</h3></div>
                        <div class="panel-body">
                            <form class="cmxform form-horizontal tasi-form" method="post" action="actions/update.php">
                              <div class="form">
                                <?php
                                  $query = mysqli_query($conn,"SELECT * FROM `com_detail` WHERE `com_detail_id`=1");
                                  $row = mysqli_fetch_array($query);
                                //  SELECT `com_detail_id`, `com_address`, `com_contact`, `com_email`, `com_recordDate` FROM `com_detail` WHERE 1

                                  $com_address = $row['com_address'];
                                    $com_contact = $row['com_contact'];
                                    $com_email = $row['com_email'];
                                ?>

                                <input type="hidden" name="com_detail_id" value="1">
                                  <div class="col-md-12" style="padding: 0">
                                    <div class="form-group">
                                      <label for="office" class="control-label col-lg-6">Office Address</label>
                                      <div class="col-lg-12">
                                          <input type="text" class="form-control" maxlength="50" id="office" name="officeaddress" required aria-required="true" value="<?php echo $com_address;?>">
                                      </div>
                                  </div>
                              </div> <!-- .form -->
                                  <div class="col-md-12" style="padding: 0">
                                    <div class="form-group">
                                      <label for="call" class="control-label col-lg-6">Call Us</label>
                                      <div class="col-lg-12">
                                          <input type="tel" class="form-control" maxlength="50" id="call" name="call" required aria-required="true" value="<?php echo $com_contact;?>">
                                      </div>
                                  </div>
                              </div> <!-- .form -->
                                  <div class="col-md-12" style="padding: 0">
                                    <div class="form-group">
                                      <label for="email" class="control-label col-lg-6">Email Address</label>
                                      <div class="col-lg-12">
                                          <input type="email" class="form-control" maxlength="50" id="email" name="email" required aria-required="true" value="<?php echo $com_email;?>">
                                      </div>
                                  </div>
                              </div> <!-- .form -->
                          </div> <!-- panel-body -->
                          <div class="form-group text-right">
                              <div class="col-lg-offset-2 col-lg-12">
                                  <button class="btn btn-primary waves-effect waves-light" type="submit" name="addComInfo">Update</button>
                              </div>
                          </div>
                            </form>
                        </div> <!-- panel -->
                      </div>


                </div>
              </div>
            <!-- End Container fluid  -->

    <?php include 'includes/footer.php'; ?>
