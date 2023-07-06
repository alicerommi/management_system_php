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
                                    				$check_business_bar = mysqli_query($conn,"SELECT * FROM `admin_added_business` where business_id= $business_id  and business_type=7"); # for concert
                                                    
                                                    if(mysqli_num_rows($check_business_bar)>0 ) {
                                                        $row = mysqli_fetch_array($check_business_bar);
                                                         info_message('You Are Currently Adding Drinks For '.$row['business_name'].".");
                                                         $business_name = $row['business_name'];
                                                    }
                                    				 #Restaurants
                                    				?>	 
                                                    <div class="col-md-6">
                                                        <?php
                                                              if(isset($_GET['added_drink'])){
                                                                    if($_GET['added_drink']==1)
                                                                         messages("The Drink Details Has Been Saved","success");
                                                                    else if($_GET['added_drink']==0)
                                                                        messages("Error in Saving Drink Details","danger");
                                                                 }

                                                                if(isset($_GET['already_drink_exist'])){
                                                                    if($_GET['already_drink_exist']==1)
                                                                           messages("The Drink is already exist","warning");

                                                                }
                                                                
                                                                if(isset($_GET['image_not_uplodaed_to_dir'])){
                                                                    if($_GET['image_not_uplodaed_to_dir']==1)
                                                                           messages("Error! Drink image has not uploaded to Directory","warning");

                                                                }


                                                                if(isset($_GET['drink_deleted'])){
                                                                    if($_GET['drink_deleted']==1){
                                                                             messages("Error! Drink has been removed successfully","danger");
                                                                    }
                                                                }
                                                        ?>
                                                        <div class="panel panel-default">
							                                    <div class="panel-heading">
							                                        <h3 class="panel-title">Add Drinks For <?php echo $business_name; ?></h3>
							                                    </div>
							                                    <div class="panel-body">
							                                    	
							                                    		<form action="actions/insert.php" method="post" enctype="multipart/form-data">
                                                                                <input type="hidden" name="business_id" value="<?php echo $business_id;?>">
                                                                           
                                                                                <div class="form-group">
                                                                                    <input type="file" name="drink_image"  class="form-control">
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <input type="text" name="drink_name" required class="form-control" placeholder="Drink Name">
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <input type="number" name="drink_bottle_price" required class="form-control" placeholder="Drink Bottle Price" min="1">
                                                                                </div>


                                                                            
                                                                        
                                                                                <div class="form-group">    
                                                                               <!--      <label>drink Details</label> -->
                                                                                    <textarea type="text" name="drink_description" required class="summernote" placeholder="Details"></textarea>
                                                                                </div>

                                                                                <div class="form-group">

                                                                                    <button type="submit" name="save_business_drinks" class="btn btn-success">Save Drink</button>
                                                                                </div>

							                                    			
							                                    		</form>
							                                    	</div>
							                                    </div>


							                     </div>
                                                  <div class="col-md-6">
                                                         <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                    <h3 class="panel-title">Added Drinks</h3>
                                                                </div>
                                                                <div class="panel-body">
                                                                        <table id="datatable" class="table table-striped table-bordered">
                                                                            <thead>
                                                                               <tr>
                                                                                    <th class="lower_width_th">#</th>
                                                                                    <th>drink Name</th>                                                    
                                                                                    <th>Price</th>
                                                                                    <th>Actions</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                    <?php
                                                                                        $all_drinks = mysqli_query($conn,"select* from business_bar_drinks where admin_business_id= $business_id");
                                                                                        while($roww = mysqli_fetch_array($all_drinks)){
                                                                                            $drink_name = $roww['business_bar_drink_name'];
                                                                                            $business_bar_drink_id= $roww['business_bar_drink_id'];
                                                                                            $drink_price = $roww['business_bar_drink_price'];
                                                                                            #$drink_image = $roww['drink_image'];
                                                                                            $actions ='<a href="update_concert_drinks.php?business_id='.$business_id.'&drink_id='.$business_bar_drink_id.'" class="btn btn-purple btn-sm" title="Update Drink Details"><i class="fa fa-pencil"></i></a> <a href="actions/delete.php?delete_drink=1&drink_id='.$business_bar_drink_id.'&business_id='.$business_id.'" title="Delete This Drink" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                                                                                            echo '<tr>
                                                                                            <td>'.$business_bar_drink_id.'</td>
                                                                                            <td>'.$drink_name.'</td>
                                                                                            <td>'.$drink_price.'</td>
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
