<?php
    include 'includes/header.php';
    include 'includes/left_nav.php';
     $query = mysqli_query($conn,"SELECT* FROM admin WHERE admin_email = '$admin_email'");
    $adminRow = mysqli_fetch_array($query);
    $admin_fullName = ucwords($adminRow['admin_name']);
    // $admin_image = $adminRow['admin_picture'];
?>

          
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                             <!--    <h4 class="pull-left page-title">Welcome !</h4> -->
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Camera</a></li>
                                    <li class="active">Add Image Dimension</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                        	<div class="col-md-6">
                        		<?php
                        		//shwo messages here 
                        		if(isset($_GET['exists'])){
                        			if($_GET['exists']==1){
                        				echo '<div class="alert alert-danger">The Dimension Record Is Already Exists</div>';
                        			}
                        		}

                        		if(isset($_GET['added'])){
                        			if($_GET['added']==0){
                        				echo '<div class="alert alert-danger">Error in inserting Dimensions</div>';
                        			} else if($_GET['added']==1){
                        				echo '<div class="alert alert-success">The Dimensions Record Has Been Successfully Submitted</div>';
                        			}
                        		}

                        		if(isset($_GET['updated'])){
                        			if($_GET['updated']==0){
                        				echo '<div class="alert alert-danger">Error in Updating Dimensions</div>';
                        			} else if($_GET['updated']==1){
                        				echo '<div class="alert alert-success">The Dimensions Record Has Been Successfully Updated</div>';
                        			}
                        		}



                        		?>
                        		<div class="panel panel-default">
                        				<h4 class="panel-heading">Add Image Size</h4>
                        				<div class="panel-body">
                        						<form action="actions/insert.php" method="post">
                        									<div class="form-group">
                        										<label>Enter the Width</label>
                        										<input type="text" name="Width" id="Width" required class="form-control">
                        									</div>
                        									<div class="form-group">
                        										<label>Enter the Height</label>
                        										<input type="text" name="Height"   id="Height"  required class="form-control">
                        										<input type="hidden" value="" id="imageID" name="imageID">
                        									</div>
                        									<div class="form-group" id="buttons">
                        										<button type="submit" id="insert" class="btn btn-success" name="imageSizeForm">Save</button>
                        									</div>
                        						</form>

                        				</div>

                        		</div>
                        	</div>
                        	 	<div class="col-md-6">
                        	 			<p id="message"></p>
                        		<div class="panel panel-default">
                        				<h4 class="panel-heading">View Image Sizes</h4>
                        				<div class="panel-body">
                        						<table class="table table-bordered">
                        							<thead>
                        								<th>Image Width</th>
		                        							<th>Image Height</th>
		                        							
		                        							
		                        							<th>Actions</th>
                        							</thead>
                        							<tbody>
                        								<?php 
                        								$query = mysqli_query($conn,"SELECT* FROM image_dimesions WHERE image_id=1");
                        								$res = mysqli_fetch_array($query);
                        								$image_id = $res['image_id'];
														$image_height = $res['image_height'];
														$image_width = $res['image_width'];
                        								?>
	                        								<tr>
	                        									<td><?php echo $image_width;?></td>
	                        									<td><?php echo $image_height;?></td>
	                        									
	                        									<td>
	                        										<button class="btn btn-primary"  name="<?php echo $image_id;?>">
	                        										<i class="fa fa-pencil"></i>
	                        									</button></td>
	                        									
	                        								</tr>	
                        								

                        							</tbody>
                        						</table>

                        				</div>

                        		</div>
                        	</div>

                        </div>
                      

                
                    </div> <!-- container -->
                               
                </div> <!-- content -->
<?php
    include 'includes/footer.html';
?>
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click','.btn-primary',function(){
			var id = $(this).attr('name');
			$.ajax({
				url:'actions/fetch.php',
				method:'post',
				dataType:'JSON',
				data:{img_id:id},
				success:function(data){
					$("#Height").val(data.image_height);
					$("#Width").val(data.image_width);
					$("#imageID").val(data.image_id);	
					$("#buttons").empty();
					$("#buttons").append('<button type="submit" id="update" class="btn btn-success" name="imageSizeFormUpdate">Update</button>');

				}
			});
		});
	});
</script>