<?php 
    include 'includes/header.php';
    #$img_dir = "";
    $img_dir = "../uploads/business_images/";
?>
     <div class="content-page">
                <div class="content">
                    <div class="container">

                        <div class="row">
                            <?php
                                    show_back_button("all_businesses.php","Back To Business List");
                                     
                                    

                            ?>
                            <div class="col-md-12">
                                <?php
                                                    $business_id = $_GET['business_id'];
                                                    $check_business_resturant = mysqli_query($conn,"SELECT * FROM `admin_added_business` where business_id= $business_id  and business_type=11"); # for club
                                                    
                                                    if(mysqli_num_rows($check_business_resturant)>0 ) {
                                                        $row = mysqli_fetch_array($check_business_resturant);
                                                         info_message('You Are Currently Adding Menus For '.$row['business_name'].".");
                                                         $business_name=$row['business_name'];
                                                         $business_type = $row['business_type'];
                                                    }
                                                     #Restaurants
                                                    ?>   
                                                    <div class="col-md-6">
                                                        <?php
                                                              if(isset($_GET['added_menu'])){
                                                                    if($_GET['added_menu']==1)
                                                                         messages("The Menu Details Has Been Saved","success");
                                                                    else if($_GET['added_menu']==0)
                                                                        messages("Error in Saving Menu Details","danger");
                                                                 }

                                                                if(isset($_GET['already_menu_exist'])){
                                                                    if($_GET['already_menu_exist']==1)
                                                                           messages("The Menu is already exist","warning");

                                                                }
                                                                
                                                                if(isset($_GET['image_not_uplodaed_to_dir'])){
                                                                    if($_GET['image_not_uplodaed_to_dir']==1)
                                                                           messages("Error! Menu image has not uploaded to Directory","warning");

                                                                }

                                                                if(isset($_GET['menu_deleted'])){
                                                                    if($_GET['menu_deleted']==1){
                                                                             messages("Success! Menu has been removed successfully","danger");
                                                                    }
                                                                }
                                                        ?>
                                                        <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                    <h3 class="panel-title">Add Menus For <?php echo $business_name;?></h3>
                                                                </div>
                                                                <div class="panel-body">
                                                                    
                                                                        <form action="actions/insert.php" method="post" enctype="multipart/form-data">
                                                                                <input type="hidden" name="business_id" value="<?php echo $business_id;?>">
                                                                           
                                                                                <div class="form-group">
                                                                                    <!-- <label>Menu Image</label> -->
                                                                                    <input type="file" name="menu_image"  class="form-control">
                                                                                </div>

                                                                                <div class="form-group">
                                                                                   <!--  <label>Menu Name</label> -->
                                                                                    <input type="text" name="menu_name" required class="form-control" placeholder="Menu Name">
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <!-- <label>Menu Price</label> -->
                                                                                    <input type="number" name="menu_price" required class="form-control" placeholder="Menu Price" min="1">
                                                                                </div>
                                                                            
                                                                        
                                                                                <div class="form-group">    
                                                                               <!--      <label>Menu Details</label> -->
                                                                                    <textarea type="text" name="menu_description" required class="summernote" placeholder="Menu Details"></textarea>
                                                                                </div>

                                                                                <div class="form-group">

                                                                                    <button type="submit" name="save_food_menus" class="btn btn-success">Save Menu</button>
                                                                                </div>

                                                                            
                                                                        </form>
                                                                    </div>
                                                                </div>


                                                 </div>
                                                  <div class="col-md-6">
                                                         <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                    <h3 class="panel-title">Added Menus</h3>
                                                                </div>
                                                                <div class="panel-body">
                                                                        <table id="datatable" class="table table-striped table-bordered">
                                                                            <thead>
                                                                               <tr>
                                                                                    <th class="lower_width_th">#</th>
                                                                                    <th>Menu Name</th>                                                    
                                                                                    <th>Price</th>
                                                                                    <th>Actions</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                    <?php
                                                                                    #$get_current_page_url = urlencode( get_current_page_url());
                                                                                    
                                                                                        $all_menus = mysqli_query($conn,"select* from business_menus where admin_business_id= $business_id");
                                                                                        while($roww = mysqli_fetch_array($all_menus)){
                                                                                            $menu_name = $roww['menu_name'];
                                                                                            $menu_id= $roww['menu_id'];
                                                                                            $menu_price = $roww['menu_price'];
                                                                                            $menu_image = $roww['menu_image'];
                                                                                            $actions ='<a href="update_menu_details.php?business_id='.$business_id.'&menu_id='.$menu_id.'&business_type='.$business_type.'" class="btn btn-purple btn-sm" title="Update Menu Details"><i class="fa fa-pencil"></i></a> <a href="actions/delete.php?delete_menu=1&menu_id='.$menu_id.'&business_id='.$business_id.'" title="Delete This Menu" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                                                                                            echo '<tr>
                                                                                            <td>'.$menu_id.'</td>
                                                                                            <td>'.$menu_name.'</td>
                                                                                            <td>'.$menu_price.'</td>
                                                                                            <td>'.$actions.'</td>
                                                                                            </tr>';

                                                                                        }
                                                                                    ?>
                                                                            </tbody>
                                                                        </table>
                                                                </div>
                                                </div>
                            </div>
                        </div> <!-- End Row -->
                    </div>
                 </div>
<?php 
    include 'includes/footer.php';
?>
<!-- <script src="assets/pages/datatables.init.js"></script> -->
<script type="text/javascript">
      jQuery(document).ready(function(){
                $('#datatable').dataTable();
                $('.summernote').summernote({
                    height: 100,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: false                 // set focus to editable area after initializing summernote
                });

                 $('.note-insert').hide();
                $('.note-table').hide();
                $('.note-height').hide();
                $('.note-view').hide();
                $('.note-color').hide();
                $('.note-help').hide();
                $('.note-style').hide();
                $(".note-fontsize").hide();
                $(".note-fontname").hide();
            });
</script>
