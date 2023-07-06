<?php include 'includes/header.php'; ?>
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Add a  Proyectos</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Our Proyectos</a></li>
                        <li class="breadcrumb-item active">Add A Proyecto</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-md-12 text-right" >
                          <a class="btn btn-primary" href="view-projects.php"><i class="fa fa-eye"></i>&nbsp;View  Proyectos Lists </a>
                      </div>
                      <?php
                      if(isset($_GET['added'])){
                        if($_GET['added']==1){
                          echo '<div class="alert alert-success"> The Project Details Has Been Added Successfully</div>';
                        }else if($_GET['added']==0){
                          echo '<div class="alert alert-danger"> Error in Adding Project Details</div>';
                        } 
                      }
                      ?>
                        <div class="panel panel-primary">
                            <div class="panel-heading"><h3 class="panel-title">Add Proyecto Detail</h3></div>
                            <div class="panel-body">
                                <div class="form">
                                  <div class="col-md-12">
                                    <div class="m-b-30">
                                       <form action="actions/upload-projectimages.php" class="dropzone" id="dropzone">
                                       <div class="dz-default dz-message text-center"><span>Drop files here to upload</span></div></form>
                                   </div>
                                  </div>
                                    <form class="cmxform form-horizontal tasi-form project-form" id="commentForm" method="POST" action="actions/insert.php">
                                        <div class="col-md-6" style="padding: 0">
                                          <div class="form-group">
                                            <label for="pname" class="control-label col-lg-8">Project Name</label>
                                            <div class="col-lg-12">
                                              <input class="form-control" id="pname" name="pname"  type="text">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                              <label for="description" class="control-label col-lg-2">Description</label>
                                              <div class="col-lg-12">
                                                  <textarea class="form-control" id="description" name="description" ></textarea>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="amenties" class="control-label col-lg-2">Amenties</label>
                                            <div class="col-lg-12">
                                              <textarea class="form-control" id="amenties" name="amenties" ></textarea>
                                            </div>
                                          </div>

                                        </div>
                                        <div class="col-md-6" style="padding: 0;">
                                          <div class="form-group">
                                            <label for="location" class="control-label col-lg-2">Location</label>
                                            <div class="col-lg-12">
                                              <input class="form-control" id="location" name="location"  type="text">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                              <label for="services" class="control-label col-lg-8">Services</label>
                                              <div class="col-lg-12">
                                                  <textarea class="form-control" id="services" name="services" ></textarea>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <label for="info" class="control-label col-lg-8">Project Info</label>
                                              <div class="col-lg-12">
                                                  <textarea class="form-control" id="info" name="info" ></textarea>
                                              </div>
                                          </div>
                                          <div class="form-group text-right">
                                              <div class="col-lg-offset-2 col-lg-12">
                                                  <button class="btn btn-primary waves-effect waves-light" type="submit" name="addProject">Save</button>
                                               
                                              </div>
                                          </div>
                                        </div>
                                    </form>
                                </div> <!-- .form -->
                            </div> <!-- panel-body -->
                        </div> <!-- panel -->
                    </div>
                </div>
<?php include 'includes/footer.php'; ?>
