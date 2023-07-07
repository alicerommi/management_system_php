<?php
if(isset($_GET['tid'])){
	$tid = $_GET['tid'];
}else{
	echo "Invalid Paramters";
	die;
}
include("../common_client/master.php");
include '../includes/database_connection.php';
?>
  <header class="navbar navbar-fixed-top navbar-centered-nav tron-nav-demo-page">
      <div class="container">
        <div class="navbar-header">
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".tron-navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="arrow"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		
        </div>
        <nav class="collapse navbar-collapse tron-navbar-collapse" role="navigation">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Services<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
            
							<li><a href="tutor-registeration.php">Tutor Registeration Form</a></li>
              <li class="divider"></li>
            <li  ><a href="student-registeration.php">Student Registeration Form</a></li>
              </ul>
            </li>
            <li><a href="tutor_profiles.php">Tutor Profiles</a></li>
					 <li><a href="about.php">About Us</a></li>
					  <li><a href="contact.php">Contact Us</a></li>
		
        </nav>
      </div>
    </header><!-- Header Close-->
		 <body>


		 <section class="demo-page padding-bottom-2x">
  <!-- menubar area end -->
         <div class="container">
		 

		 <div class="demo-page alert-demo">
    		<?php
    		$tQuery = mysqli_query($conn,"SELECT* FROM teacher WHERE teacher_id=$tid");
    		$rowT = mysqli_fetch_array($tQuery);
    		$teacher_name  = $rowT['teacher_name'];
    		echo "<div class='alert alert-success' style='background-color:#170c0c;     font-size: 19px;'>You Are Currently Viewing the Profile of ".ucwords($teacher_name)."</div>";
    		?>
     
	  </div>


	 	
      <div class="row">
			<div class="col-sm-3">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">
							Tutor Qualification
						</h3>
					</div>
					<div class="panel-body">
							<div class="row">
									<?php
									$query = "SELECT *FROM qualifications WHERE teacher_id=$tid";
									$result = mysqli_query($conn,$query);
										if(mysqli_num_rows($result)>0){	
									?> 
									
										  <table class="table table-user-information">
												<tbody>
													<?php while($row  = mysqli_fetch_array($result)){
														echo '<tr>';
															echo '<td><center>'.ucwords($row['qual_name']).'</center></td>';
														echo '</tr>';
													}?>
												</tbody>
											 </table>




								<?php //end num rows condition  
								}else{
									echo '<span>The Courses Are Not Added By Tutor Yet!</span>';
								}

								
								?>
									
							</div>
					</div>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">
						 Tutor Courses & Classes
						</h3>
					</div>
					<div class="panel-body">
							<div class="row">
									<?php
									$query2 = "SELECT * FROM subjects WHERE teacher_id=$tid";
									$result2 = mysqli_query($conn,$query2);
									if(mysqli_num_rows($result2)>0){

										?>
										<table class="table table-user-information">
												<tbody>
													<?php while($row2  = mysqli_fetch_array($result2)){
														echo '<tr>';
															echo '<td><center>'.ucwords($row2['subject_name'])." (".$row2['subject_class'].")".'</center></td>';
														echo '</tr>';
													}?>
												</tbody>
											 </table>
											 <?php
									}else{
											echo '<span>The Qualification Are Not Added By Tutor Yet!</span>';
									}
								
								?>
									
							</div>
					</div>
				</div>
			</div>
		
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6  toppad">
  
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Tutor Information</h3>
            </div>
            <div class="panel-body">
              <div class="row">
							<?php
							//SELECT `teacher_id`, `teacher_name`, `teacher_email`, `teacher_password`, `teacher_joining_date`, `teacher_account_status`, `teacher_contact`, `teacher_address`, `teacher_city`, `teacher_img`, `teacher_age`, `teacher_about`, `teacher_recordDate` FROM `teacher` WHERE 1
								$query = "SELECT * FROM teacher WHERE  teacher_id=$tid";
								//echo $query;
								$result = mysqli_query($conn,$query);
								if(mysqli_num_rows($result)>0){
									$rows = mysqli_fetch_array($result);
										$teacher_name = $rows['teacher_name'];
										$teacher_email = $rows['teacher_email'];
										$teacher_joining_date = $rows['teacher_joining_date'];
										$teacher_account_status = $rows['teacher_account_status'];
										$teacher_contact = $rows['teacher_contact'];
										$teacher_address = $rows['teacher_address'];
										$teacher_city = $rows['teacher_city'];
										$teacher_age = $rows['teacher_age'];
										$teacher_about = $rows['teacher_about'];
							?> 				
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Full Name</td>
                        <td><strong><?php echo $teacher_name; ?> </strong></td>
                      </tr>
                      <tr>
                        <td>Address </td>
                        <td><strong><?php echo $teacher_address;  ?></strong></td>
                      </tr>
                      <tr>
                        <td>City</td>
                        <td><a><?php echo $teacher_city ;  ?></a></td>
                      </tr>
                      <tr>
                        <td>Joining Date</td>
                        <td><strong>
                        	<?php
							$originalDate = $teacher_joining_date;
							$newDate = date("d-m-Y", strtotime($originalDate));
						echo $newDate;  ?></strong></td>
                      </tr>
					 	

					  	 <tr>
                        <td>Account Status</td>
                        <td><strong>
                        	<?php
									if($teacher_account_status==1){
										echo "<span>Active</span>";
									}
                        	?>
							</strong></td>
                      </tr>

                       <tr>
                        <td>Send Request </td>
                        <td><strong>
                        	<?php
									echo "<button class='btn btn-warning inputReqest' data-toggle='modal' data-target='#myModal'>Send Request</button>";
                        	?>
							</strong></td>
                      </tr>


                     <?php  } ?>
                    </tbody>
                  </table>
                 
                </div>
              </div>
            </div>
               
            
          </div>
        </div>
      </div>
    </div>









</section>
</body>
<!-- Modal -->
	 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">send Request To Tutor</h4>
          
        </div>
        <div class="modal-body">
          	<!-- 	<form> -->
          				<p class="error-message" style="color:red;"></p>
          				<div class="form-group">
          					<label>Enter Your Email</label>
          					<input type="text" name="stdEmail" id="stdEmail"  maxlength="40" required class="form-control">
          				</div>
          				<div class="form-group">
          					<label>Enter Your Password</label>
          					<input type="password" name="password"  id="password"  maxlength="40" required class="form-control">
          				</div>
          				<input type="hidden" name="" id="tid" value=<?php echo $tid; ?>>
          				<!-- <div class="form-group">
          				<button class="btn btn-default" name="save">Save</button>
          				</div> -->


          	<!-- 	</form> -->
        </div>
        <div class="modal-footer">
        	 <button type="button" class="btn btn-default" id="save">Save</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
<?php include("../common_client/footer.php");?>
</body>
</html>

<script type="text/javascript">
	
	$(document).ready(function(){


			$(document).on('click','#save',function(){
					var password = $('#password').val();
						var stdEmail = $('#stdEmail').val();
						var tid = $('#tid').val();
						if(password.length>0 && stdEmail.length>0){
							var dataString = "password="+password+"&stdEmail="+stdEmail+"&tid="+tid;

								$.ajax({
										url:'actions/authentication.php',
										method:'post',
										data:dataString,
										success:function(data){
											if(data==1){
												//	alert("Successfully Request Has Been Send Submitted");
													$('.error-message').html("Successfully Request Has Been Send Submitted");	
												}else if(data==0){
												//	alert("Error In submitting");
													$('.error-message').html("Wrong Authentication Details");	
												}else if(data=="rejected"){
													$('.error-message').html("Your Studend Account Request is Reject By Admin");
													//alert("Your Studend Account Request is Reject By Admin");
												}else if(data=="pending"){
													//alert("Your Studend Account Request is still pending");
													$('.error-message').html("Your Studend Account Request is still pending");
												}else{
												//	alert("Your Student Account Is Blocked By Admin");
														$('.error-message').html("Your Student Account Is Blocked By Admin");
												}
												//$("#myModal").modal('hide');
												setTimeout(function(){
												  $('#myModal').modal('hide')
												}, 1000);

										}
								});
						}else{
							alert("Enter The Form Fields");
						}
			});
	});
</script>
