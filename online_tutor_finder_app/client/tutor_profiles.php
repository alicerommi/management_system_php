<?php
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
            <li class="active" ><a href="tutor_profiles.php">Tutor Profiles</a></li>
					 <li><a href="about.php">About Us</a></li>
					  <li><a href="contact.php">Contact Us</a></li>
		
        </nav>
      </div>
    </header><!-- Header Close-->
	<body>
	<section class="demo-page padding-bottom-2x">
	<div class="container">
	<h2 class="w3-wide w3-center">Our Tutors</h2>
	<h3 class="block-heading"></h3>

	<div class="row">
	
	<div class="pull pull-right">
			<input type="text" name="tutorAddress" id="tutorAddress" class="form-control" placeholder="Enter The Tutor Address" maxlength="50">
	</div>	

	<div class="col-md-12" id="allTutors">	
		
	<?php	
	$query="SELECT* from teacher where teacher_account_status=1";
	
	$output=mysqli_query($conn,$query);
	
	if(mysqli_num_rows($output)){
		while($row=mysqli_fetch_array($output)){
	


$teacher_id  = $row['teacher_id']; 
$teacher_name  = $row['teacher_name']; 
$teacher_email  = $row['teacher_email']; 
$teacher_password  = $row['teacher_password'];
 $teacher_joining_date  = $row['teacher_joining_date'];
 $teacher_account_status  = $row['teacher_account_status'];
 $teacher_contact  = $row['teacher_contact']; 
 $teacher_address  = $row['teacher_address']; 
 $teacher_city  = $row['teacher_city'];
 $teacher_img  = $row['teacher_img'];
 $teacher_age  = $row['teacher_age'];
 $teacher_about  = $row['teacher_about']; 
 $teacher_recordDate  = $row['teacher_recordDate'];

			echo '<div class="col-md-4">';
								echo '<div class="well well-sm">';
		
		
											if(strlen($teacher_img)==0){
										
									echo "<img src='uploads/default.png' style='width:125px;height:100px' class='img-thumbnail img-responsive' >"."<br>"; } 
									
									else{
									echo "<img src='uploads/".$teacher_img."  '  style='width:125px;height:100px' class='img-thumbnail img-responsive' >"."<br>";} 
										
										echo "Name: "."<p class='text-uppercase text-success text-justify'>".$teacher_name."</p>";
										
										echo "Address: "."<p class='text-uppercase text-success text-justify'>".$teacher_address ."</p>";
										echo "City: "."<p class='text-uppercase text-success text-justify'>".$teacher_city."</p>"; 
									
									 
									 
										echo "<center><a class='btn btn-danger' href='tutor_details.php?tid=".$teacher_id."'>View More Details</a></center>";

																
		echo '</div>';	
		echo '<hr/>';
		echo'
		</div>';
		}

	?>
	</div>


	</div></div>
	
				<?php }
				else{  ?>
						<div class="col-md-12">
           
            <div class="jumbotron">
              
              <p class="text-info">The Tutors Have Not Added By Administrator</p>
              <p class="text-info text-center" ><a class="btn-outlined btn-default" role="button" href="index.php"> <i class="fa fa-arrow-left"></i>Back to Home Page</a></p>
            </div>
          </div>
				<?php }
				?>
	
	</section>

<script>
    $(document).ready(function(){
				        $(document).on('keyup','#tutorAddress',function(){
				            var keyword = $(this).val();
				           // alert(keyword);
				            $.ajax(
				            {
				                url:'actions/fetch.php',
				                type:'POST',
				                data:'keyword='+keyword,
				                // beforeSend:function()
				                // {
				                //     $("#allTutors").html('Searching.........');
				                    
				                // },
				                success:function(data)
				                {	
				                	//$("#allTutors").empty();
				                    $("#allTutors").html(data);
				                },
				            });
				        });
    });
    
</script>	
<?php include("../common_client/footer.php"); ?>
</body>
</html>