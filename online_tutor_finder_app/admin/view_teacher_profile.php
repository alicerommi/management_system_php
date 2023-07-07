<?php
if(isset($_GET['TID'])){
	$TID  = $_GET['TID'];

}else{
	echo "Invalid Paramters";
	die;
}
    include 'includes/header.php';
    include 'includes/left_nav.php';
    
    // $admin_image = $adminRow['admin_picture'];
?>

			<!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== --> 
 <div class="content-page">
        <!-- Start content -->
        
		
		<div class="content">
          <div class="container">
         <div class="wraper container-fluid">
		 	 
				
				  <div class="row">
                        <div class="col-sm-12">
                            <div class="bg-picture text-center" style="background-image:url('profile/bg.jpg')">
                                
								<div class="bg-picture-overlay"></div>
                                <div class="profile-info-name">
									<?php
				 $query = mysqli_query($conn,"SELECT * FROM `teacher` where teacher_id=$TID");
                                                
                                                  $row=mysqli_fetch_array($query);
                                                    //SELECT `teacher_id`, `teacher_name`, `teacher_email`, `teacher_password`, `teacher_joining_date`, `teacher_account_status`, `teacher_contact`, `teacher_address`, `teacher_city`, `teacher_recordDate` FROM `teacher` WHERE 1
                                                   // $teacher_id= $row['teacher_id'];
                                                    $teacher_name = $row['teacher_name'];
                                                    $teacher_email = $row['teacher_email'];
                                                    $teacher_joining_date = date("d-m-Y",strtotime($row['teacher_joining_date']));
                                                    $teacher_account_status = $row['teacher_account_status'];
                                                    $teacher_contact = $row['teacher_contact'];
                                                    $teacher_image = $row['teacher_img'];
                                                    $teacher_address = $row['teacher_address'];
                                                    $teacher_city = $row['teacher_city'];
                                                    $teacher_age = $row['teacher_age'];
													$teacher_about = $row['teacher_about'];

					// $rows = mysqli_fetch_array($res) 
				 ?>											
                                 
				 <?php 
				 		///$teacher_image = "";
						if(strlen($teacher_image)==0){
					echo "<img src='../client/uploads/default.png'  class='thumb-lg img-circle img-thumbnail' alt='profile-image' >";
						}else{
							
						echo "<img src='../client/uploads/".$teacher_image."'  class='thumb-lg img-circle img-thumbnail' alt='profile-image' >";	
						}		
							?>
							
													
                            
                                    <h3 class="text-white">
				 <?php
				 				echo ucwords($teacher_name);

				 ?></h3>
                             	</div>
                           </div>
                            <!--/ meta -->
                        </div>
                    </div>
					 
            
			<div class ="row">
				<div class="col-lg-12">
					<div class="tab-content profile-tab-content"> 
                            <div class="tab-pane active" id="home-2"> 
                                <div class="row">
                                    <div class="col-md-4">
									
									  <!-- Personal-Information -->
                                        <div class="panel panel-default panel-fill">
                                            <div class="panel-heading"> 
                                                <h3 class="panel-title">Personal Information</h3> 
                                            </div> 
											<div class="panel-body">
												
												<div class="about-info-p">
                                                    <strong>Teacher ID</strong>
                                                    <br/>
                                                    <p class="text-muted"><?php  echo $TID;
													?>
													<?php //echo $final_imageName;?>
													</p>
                                                </div>
												<div class="about-info-p">
                                                    <strong>Teacher Full Name</strong>
                                                    <br/>
                                                    <p class="text-muted"><?php  echo $teacher_name; ?></p>
                                                </div>
                                             
                                                <div class="about-info-p">
                                                    <strong>Teacher Email</strong>
                                                    <br/>
                                                    <p class="text-muted"><?php  
														echo $teacher_email;
													?></p>
                                                </div>

												   <div class="about-info-p">
                                                    <strong>Mobile Number</strong>
                                                    <br/>
                                                    <p class="text-muted"><?php
														 echo   $teacher_contact;
													?></p>
													</div>

													<div class="about-info-p">
                                                    <strong>Teacher Address</strong>
                                                    <br/>
                                                    <p class="text-muted"><?php
														 echo   $teacher_address;
													?></p>
													</div>

													<div class="about-info-p">
                                                    <strong>Teacher City</strong>
                                                    <br/>
                                                    <p class="text-muted"><?php
														 echo   $teacher_city;
													?></p>
													</div>


													<div class="about-info-p">
                                                    <strong>Teacher Joining Date</strong>
                                                    <br/>
                                                    <p class="text-muted"><?php
														 echo   $teacher_joining_date;
													?></p>
													</div>

													<div class="about-info-p">
                                                    <strong>Teacher Age </strong>
                                                    <br/>
                                                    <p class="text-muted"><?php
													echo $teacher_age; ?>
													</p>
													</div>
												
                                               
												
                                            </div> 
                                        </div>

										 <!-- Personal-Information -->
					</div> 
			
								<div class="col-md-8">
                                        <!-- Personal-Information -->
                                        <div class="panel panel-default panel-fill">
                                            <div class="panel-heading"> 
                                                <h3 class="panel-title">BIOGRAPHY</h3> 
                                            </div> 
                                            <div class="panel-body"> 
												<p class="text-justify"> <?php 
												if(strlen($teacher_about)!=0)
													echo  $teacher_about; else 
												echo "Description Of Teacher Has Not Added Yet";
													 ?> </p>

										</div> 
                                        </div>


                                        <div class="col-md-6" style="padding: 0px">
			                            
			                                        <div class="panel panel-default panel-fill">
			                                            <div class="panel-heading"> 
			                                                <h3 class="panel-title">Teacher Subjects </h3> 
			                                            </div> 
			                                            <div class="panel-body"> 
			                                            	<?php
			                                            	$query = mysqli_query($conn,"SELECT * FROM `subjects` WHERE teacher_id=$TID");
			                                            	if(mysqli_num_rows($query)>0){
			                                            		echo '<ul>';
			                                            		while($row = mysqli_fetch_array($query)){
			                                            			$subject_name = $row['subject_name'];
			                                            			$subject_class = $row['subject_class'];
			                                            			echo '<li>'.ucwords($subject_name)." (".$subject_class." Class)"."</li>";
			                                            		}
			                                            		echo '</ul>';
			                                            	}
			                                            	?>
			                                            </div>

			                                        </div>
                                    	</div>


			                            
                                    	   <div class="col-md-6" >
			                                        <div class="panel panel-default panel-fill">
			                                            <div class="panel-heading"> 
			                                                <h3 class="panel-title">Teacher Qualifications </h3> 
			                                            </div> 
			                                            <div class="panel-body"> 
			                                            	<?php
			                                            	$query = mysqli_query($conn,"SELECT * FROM `qualifications` WHERE teacher_id=$TID");
			                                            	if(mysqli_num_rows($query)>0){
			                                            		echo '<ul>';
			                                            		while($row = mysqli_fetch_array($query)){
			                                            			$qual_name = $row['qual_name'];
			                                            			//$subject_class = $row['subject_class'];
			                                            			echo '<li>'.ucwords($qual_name)."</li>";
			                                            		}
			                                            		echo '</ul>';
			                                            	}
			                                            	?>
			                                            </div>

			                                        </div>
                                    	</div>	
									</div>
               
			   
			     </div>
                </div>
                    </div>
                        </div>
				
<?php
    include 'includes/footer.html';
?>