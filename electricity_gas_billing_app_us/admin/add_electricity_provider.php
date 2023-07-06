<?php
    include 'includes/header.php';
?>                 
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <div class="row">
                            <?php
                            show_button("all_electricity_providers.php","View All Electricity Suppliers","info","eye");

                                if(isset($_GET['added'])){
                                    if($_GET['added']==1){
                                        messages("Energy Supplier Details has been added","success");
                                    }else if($_GET['added']==0){
                                          messages("Error in adding Energy Supplier Details","danger");
                                    }
                                }

                                if(isset($_GET['supplier_exists'])){
                                    if($_GET['supplier_exists']==1){
                                         messages("Energy Supplier with this name is already exists","warning");
                                    }
                                }

                                if(isset($_GET['invalidImage'])){
                                    if($_GET['invalidImage']==1){
                                         messages("Energy Supplier image format is wrong","warning");
                                    }
                                }

                            ?>

                                
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Add Electricity Supplier Details</h3>
                                        </div>
                                        <div class="panel-body">
                                            <form method="post" action= "actions/insert.php" enctype="multipart/form-data">
                                                <div class="col-md-6">
                                                 <!-- <div class="form-group">
                                                        <label>Upload Icon</label>
                                                        <input type="file" name="energy_provider_img" required class="form-control">
                                                        <span class="help-block"><small>(JPG, PNG, JPEG formats are supported!)</small></span>
                                                    </div> -->

                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <input type="text" name="energy_provider_name" required class="form-control" maxlength="50">
                                                    </div>
                                              
                                                
                                                    <div class="form-group">    
                                                                                <label>Supplier Description</label>
                                                                                <textarea type="text" name="sup_description" maxlength="4000" class="summernote"></textarea>
                                                                            </div>

                                                    <div class="form-group">
                                                        <button class="btn btn-success pull-right" type="submit" name="add_new_electricity_provider">Save</button>
                                                    </div>

                                                  </div>
                                                
                                            </form>  
                                        </div>
                                    </div>  
                                </div>
                    </div> 
                </div> 
            </div>
</div>
<?php
    include 'includes/footer.php';
?>

<script type="text/javascript">
    jQuery(document).ready(function(){
      
    


                $('.summernote').summernote({
                    height: 200,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: true                 // set focus to editable area after initializing summernote
                });
                $(".note-fontname").hide();
                $(".note-fontsize").hide();
                  $('.note-insert').hide();
                $('.note-table').hide();
                $('.note-height').hide();
                $('.note-view').hide();
                $('.note-color').hide();
                $('.note-help').hide();
                $('.note-style').hide();

    });
</script>