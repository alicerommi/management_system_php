<?php include 'includes/header.php'; ?>


        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                  <h3 class="text-primary">Home Page Paragraph</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Home Page Settings</a></li>
                        <li class="breadcrumb-item active">Home Page paragraph</li>
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
                            if(isset($_GET['updatedPara'])){
                                if($_GET['updatedPara']==1){
                                  echo '<div class="alert alert-success">The Paragraphs are successfully Updated</div>';
                                }else if($_GET['updatedPara']==0){
                                     echo '<div class="alert alert-warning">Error in Updating Paragraphs</div>';
                                }
                            }
                          ?>

                          <div class="panel panel-primary">
                          <div class="panel-heading"><h3 class="panel-title">Add Paragraph 2 for Home Page</h3></div>
                          <div class="panel-body">
                              <div class="form">
                                  <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST"  action="actions/update.php">
                                  <input type="hidden" name="homepage_pid" value="1">
                                  <?php
                                    $query = mysqli_query($conn,"SELECT * FROM `homepage_paragraph` WHERE homepage_pid = 1");
                                    $row = mysqli_fetch_array($query);
                                          $homepage_p1 = $row['homepage_p1'];
                                          $homepage_p2 = $row['homepage_p2'];
                                          $homepage_p2btnText = $row['homepage_p2btnText'];
                                          $homepage_p2btnLink = $row['homepage_p2btnLink'];
                                          $homepage_p2Heading = $row['homepage_p2Heading'];
                                        
                                  ?>
                                    <div class="form-group">
                                          <label for="paragraph" class="control-label col-lg-6" style="padding: 0;">Paragraph 1</label>
                                          <div class="col-lg-12" style="padding: 0;">
                                              <!-- <input type="url" class="form-control" id="facebook" name="facebook" required aria-required="true"> -->
                                              <textarea name="paragraph1" class="form-control" rows="8" cols="80" id="paragraph" required><?php echo $homepage_p1 ; ?></textarea>
                                          </div>
                                      </div>
                                    <div class="form-group">
                                        <label for="heading" class="control-label col-lg-6" style="padding: 0;">Heading for Paragraph2</label>
                                        <div class="col-lg-12" style="padding: 0;">
                                            <textarea name="heading" maxlength="65" class="form-control" rows="3" cols="80" id="heading" required><?php echo $homepage_p2Heading ; ?></textarea>
                                        </div>
                                    </div>
                                      <div class="form-group">
                                          <label for="paragraph2" class="control-label col-lg-6" style="padding: 0;">Paragraph 2</label>
                                          <div class="col-lg-12" style="padding: 0;">
                                              <textarea name="paragraph2" maxlength="95" class="form-control" rows="3" cols="80" id="paragraph2" required><?php echo $homepage_p2; ?></textarea>
                                          </div>
                                      </div>

                                      <div class="add-button">
                                        <div class="form-group">
                                          <label for="">Button Text</label>
                                          <input type="text" class="form-control" name="btnText" value="<?php echo $homepage_p2btnText; ?>" required>
                                        </div>
                                        <div class="form-group">
                                          <label for="">Button Link</label>
                                          <input type="url" class="form-control" name="btnLink" value="<?php echo $homepage_p2btnLink; ?>" required>
                                        </div>
                                      </div>
                                      <div class="form-group text-right">
                                          <div class="col-lg-offset-2 col-lg-12" style="padding: 0;">
                                              <button class="btn btn-primary waves-effect waves-light" type="submit" name = "updateHomepagePara">Update</button>
                                          </div>
                                      </div>
                                  </form>
                              </div> <!-- .form -->
                          </div> <!-- panel-body -->
                      </div> <!-- panel -->
                        </div>



                </div>
            <!-- End Container fluid  -->

    <?php include 'includes/footer.php'; ?>
<script type="text/javascript">
  function yesButton() {
    $('.add-button').show();
  }

  function noButton() {
    $('.add-button').hide();
  }
</script>
