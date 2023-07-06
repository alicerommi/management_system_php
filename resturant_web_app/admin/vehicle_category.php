<?php
  include 'includes/header.php';
?>
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                    if(isset($_GET['added'])){
                                        if($_GET['added']==1){
                                            messages("Vehicle Category Has Been Added Successfully","success");
                                        }else if($_GET['added']==0){
                                              messages("Error in Adding Vehicle Category","warning");
                                        }
                                    }
                                    if(isset($_GET['alreadyExists'])){
                                            if($_GET['alreadyExists']==1){
                                                     messages("This Vehicle Category is Already Exists","danger");
                                            }
                                    }
                                ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Add Vehicle Category</h3>
                                    </div>
                                    <div class="panel-body">
                                        <form method="post" id="add_category" action="actions/insert.php">
                                            <div class="form-group">
                                                    <label>Vehicle Category Name</label>
                                                    <input type="text" name="cate_name" class="form-control" required> 
                                            </div>
                                              <div class="form-group">
                                                        <label>Vehicle Category Details</label>
                                                          <textarea class="summernote" name="category_details"></textarea>
                                                </div>

                                            <div class="form-group pull-right">
                                                <button class="btn btn-primary" type="submit" name="add_category">Save</button>
                                            </div>
                                            
                                        </form>
                                      

                                    </div>
                                </div>
                            </div>
                        </div> <!-- End Row -->

                    </div> <!-- container -->
                               
                </div> <!-- content -->
      
<?php
        include 'includes/footer.php';
?>
 <script>

            jQuery(document).ready(function(){
//                $('.wysihtml5').wysihtml5();
               
                $('.summernote').summernote({
                    height: 200,                 // set editor height

                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor

                    focus: true                 // set focus to editable area after initializing summernote
                });
                 $(".note-insert").remove();
                 $(".note-table").remove();
                 $(".note-height").remove();
                  $(".note-view").remove();
                  $(".note-help").remove();

            });
        </script>