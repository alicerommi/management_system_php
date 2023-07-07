<?php include 'includes/header.php';?>

<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Add Plan</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Diet Plans</a></li>
                        <li class="breadcrumb-item active">Add Plan</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                  <?php
                    if(isset($_GET['imageSupport'])){
                      if($_GET['imageSupport']==0){
                        echo '<div class="alert alert-danger">Image is not supported</div>';
                      }
                    }
                  ?>

                  <div class="col-md-12">
                     <div class="col-md-12 text-right" style="padding: 0px;">
                          <a class="btn btn-warning" href="view-plans.php"><i class="fa fa-eye"></i>&nbsp;View All Plans</a>
                      </div>

                  
                    <div class="card">
                      <form class="" action="actions/insert.php" method="post" enctype="multipart/form-data">
                        <div class="input-group">
                            <label>Upload Image</label>
                            <div class="input-group">
                                <input type="file" name="planImage" id="planImage" required>
                            </div>
                        </div>


                        <div class="input-group">
                          <label for="">Plan Name</label>
                          <div class="input-group">
                            <input class="form-control" type="text" name="planName"  maxlength="40" required placeholder="Write Plan Name">
                          </div>
                        </div>
                       <!--  dietplan_shortdescription -->
                        <div class="input-group">
                          <label for="">Short Description (Max Characters:200)</label>
                            <div class="input-group">
                               <textarea class="form-control" name="planShortDescription" rows="4" cols="40" placeholder="Write Short Description of Diet Plan" required maxlength="200"></textarea>
                            </div>
                        </div>


                        <div class="input-group" style="margin-top: 15px;">
                          <label for="">Full Description (Max Characters:2000)</label>
                          <div class="input-group">
                           <!--  <textarea class="form-control" name="planDescription" rows="8" cols="80" placeholder="Write Plan Description" required></textarea> -->
                           <textarea id="summernote" name="planDescription" maxlength="2000"></textarea>

                          </div>
                        </div>
                        <div class="input-group">
                          <button type="submit" class="btn btn-primary btn-add" name="addPlan">Add Plan</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
            <!-- End Container fluid  -->
  <?php include 'includes/footer.php';?>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
<script type="text/javascript">
  $('#summernote').summernote({
height: 250,
toolbar: [
  // [groupName, [list of button]]
  ['style', ['bold', 'italic', 'underline', 'clear']],
  ['font', ['strikethrough', 'superscript', 'subscript', 'fontname']],
  ['fontsize', ['fontsize']],
  ['color', ['color']],
  ['para', ['style', 'ul', 'ol', 'paragraph']],
  ['height', ['height']],
  ['undo', ['undo']],
  ['redo', ['redo']],
  ['insert', ['link', 'picture', 'video', 'table', 'hr','codeview']]
]
});
</script>