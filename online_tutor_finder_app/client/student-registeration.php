<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
	<!--for date picking-->
   
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="../assets_client/assets/uploadImage/js/script.js"></script>
	<link rel="stylesheet" href="../assets_client/assets/uploadImage/css/style.css" >
	
	<!--
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	-->
	<script>

$(document).ready(function() {
        $("#exampleInputFile").on('change', function() {
          //Get count of selected files
          var countFiles = $(this)[0].files.length;
          var imgPath = $(this)[0].value;
          var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
          var image_holder = $("#image-holder");
          image_holder.empty();
          if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (typeof(FileReader) != "undefined") {
              //loop for each file selected for uploaded.
              for (var i = 0; i < countFiles; i++) 
              {
                var reader = new FileReader();
                reader.onload = function(e) {
                  $("<img />", {
                    "src": e.target.result,
                    "class": "thumb-image"
                  }).appendTo(image_holder);
                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[i]);
              }
            } else {
              alert("This browser does not support FileReader.");
            }
          } else {
            alert("Please select only images");
          }
        });
      });
	
	</script>
	</head>
	
	
<?php
include("../common_client/master.php");
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
		  <!--
          <a href="index.html" class="navbar-logo">
            <img src="assets/logo/try4.png" alt="Diamond Cricket Club">
          </a>
		  -->
		 <!--   <div class="navbar-left ">
            <a href="index.php" class="navbar-logo">
            <img src="assets/logo/try4.png" alt="Diamond Cricket Club">
          </a>
          </div> -->
        </div>
        <nav class="collapse navbar-collapse tron-navbar-collapse" role="navigation">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Services<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
							<li><a href="tutor-registeration.php">Tutor Registeration Form</a></li>
              <li class="divider"></li>
            <li  class="active"><a href="student-registeration.php">Student Registeration Form</a></li>
			
              </ul>
            </li>
            <li ><a href="tutor_profiles.php">Tutor Profiles</a></li>
					 <li><a href="about.php">About Us</a></li>
				<li><a href="contact.php">Contact Us</a></li>
        </nav>
      </div>
    </header><!-- Header Close-->
		 <section class="demo-page padding-bottom-2x">
		<div class="container">
		
		<h2 class="w3-wide w3-center">Fill The Student Registeration Form</h2>
	<h3 class="block-heading"></h3>
	
    <div class="row">
		
    	<?php
    		if(isset($_GET['status'])){
    			if($_GET['status']==1){
    				echo '<div class="alert alert-success">The Student Registeration Form has been Submitted We will Inform You Your Request Status Through The Entered Email</div>';
    			}
    			else if($_GET['status']==0){
						echo '<div class="alert alert-warning">Error in Submitting Form</div>';
    			}

    		}

    		if(isset($_GET['emailExists'])){
    			if($_GET['emailExists']==1)
    			echo '<div class="alert alert-warning">Tutor With This Email is already Exists</div>';
    		}


    		if(isset($_GET['imageType'])){
    				if($_GET['imageType']==1)
    			echo '<div class="alert alert-warning">The Uploaded Image Type Is Not Supported</div>';
    		}


    	?>

        <form role="form" action="actions/insert.php" method="POST" enctype="multipart/form-data">
            <div class="col-lg-6">
			<!--for upload an image of member-->
			<div id="wrapper" >
			<div id="image-holder"></div>
			<label for="pic">Choose Image</label>
			
			<input id="exampleInputFile" name="image" type="file"/> 
			
			</div>
			<!--End image upload code-->
			
				<div class="form-group">
                    <label for="InputName">Enter Full Name</label>
                    
                        <input type="text" class="form-control" name="InputName" id="InputName" placeholder="Enter Your Full Name" required>
					
                    
                </div>
				
                <div class="form-group">
                    <label for="InputEmail">Enter Email</label>
                    
                        <input type="email" class="form-control" id="InputEmailFirst" name="InputEmail" placeholder="Enter Email" maxlength="35" required>
                     
                </div>
			  
              

			   <div class="form-group">
			    	<label for="password">Choose Password</label>
			   		<input name="password" required type="password" placeholder="Enter Your Password" class="form-control">
			   </div>
			 


			</div>

	<div class="col-lg-6">
	    	    	<div class="form-group">
    	    		<label for="address">Enter Address</label>
					   <input type="text" class="form-control bfh-phone"  maxlength="100" name="addreess"
					   placeholder="Enter Address" required>
					   </input>
					</div>

					  

    	    	<div class="form-group">
    	    			<label>Enter Contact Number</label>
    	    			<input type="text" name="contact" maxlength="12" class="form-control" placeholder="Enter Your Contact Number" required>
    	    	</div>

    	    	<!-- <div class="form-group">
    	    		<label>Tell Us About You</label>
    	    		<textarea type="text" name="about" max="500" rows="5" required class="form-control" placeholder="Please Specify The Reason Why You're Taking Registeration"></textarea>
    	    	</div>

	 -->
				<input type="submit" name="submitStudentForm" id="submit" value="Submit" class="btn btn-primary pull-right"> &nbsp &nbsp </input>


					  <a class="btn btn-info pull-right"  data-toggle="modal" data-target="#basicModal">Help</a>
					  
					 <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
																<div class="modal-dialog">
																	<div class="modal-content">
																			<div class="modal-header">
																			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
																			<h4 class="modal-title" id="myModalLabel"><span class="myhead">Student Membership Form</span></h4>
																			</div>
																				<div class="modal-body">
																				
																					<table class='help' cellpadding=16 width=100%>
																						  <tr>
																							<td>
																							
																								To fill the Student Registeration form follow these steps:<br /><br />
																								1. Fill the Student form correctly.<br /><br />
																								2. Enter your work email because we will notify you through this email.<br /><br />
																								3. After filling the all input fields click on submit button, the membership request will successfully send. <br /><br />
																								4. If the administrator accept or reject your request then a notification will recieved to you on entered email address.<br /><br />
																								5. If your request is accept then your account details will included with notification. <br/><br/>
																								<b>NOTE:</b> Enter your details correctly.<br />
																							
																							
																							</td>
																						  </tr>
																					</table>
																				</div>
																		<div class="modal-footer">
																			<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>  
																	</div>
																</div>
															  </div>
					 
				 
            
        </form>
            
        </div>
    </div>
</div>
</section>

<?php include("../common_client/footer.php"); ?>

</body>
</html>