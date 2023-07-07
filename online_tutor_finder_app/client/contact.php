<?php
include '../includes/database_connection.php';
include("../common_client/master.php");
?>

 <!-- Page specific CSS -->
   
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
            <li ><a href="index.php">Home</a></li>
           <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Services<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
          <li><a href="tutor-registeration.php">Tutor Registeration Form</a></li>
                  <li class="divider"></li>
                <li><a href="student-registeration.php">Student Registeration Form</a></li>
              </ul>
            </li>

            <li ><a href="tutor_profiles.php">Tutor Profiles</a></li>

             <li><a href="about.php">About Us</a></li>
            <li  class="active"><a href="contact.php">Contact Us</a></li>

    
          
        </nav>
      </div>
    </header><!-- Header Close-->

	 <!-- Page Header with Breadcrumbs -->
		
	
      
	
	
   <section class="container padding-bottom-2x">
    
	<div class="page-header">
        <div class="page-header td">
          <h2>Contacts <small>Get in touch with us</small></h2>
        </div>
      
      </div> 
 <h2 class="block-heading">CONTACTS <br/><small>Get in touch with us</small></h2>
 <hr/>
<div class="google-map space-top" data-zoom="12">


<div class="mapouter"><div class="gmap_canvas"><iframe width="1080" height="423" id="gmap_canvas" src="https://maps.google.com/maps?q=dera gahzi khan&t=k&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div><a href="https://www.pureblack.de/webdesign-regensburg/"></a><style>.mapouter{overflow:hidden;height:350px;width:1080px;}.gmap_canvas {background:none!important;height:423px;width:1080px;}</style></div>
	</div>	

 <div class="row space-top">
        
        <!-- Contact Info -->
        <div class="col-sm-6 space-bottom-2x">
          <h3>Contact Info</h3>
          <ul class="list-group space-top">
            <li class="list-group-item" href="#"><i class="fa fa-home fa-fw"></i>&nbsp;Pakistani Chowk<br>
                                            Block G ,D.G.Khan</li>
            <li class="list-group-item" href="#"><i class="fa fa-phone fa-fw"></i>&nbsp;  0321 5249553</li>
            <li class="list-group-item" href="#"><i class="fa fa-envelope fa-fw"></i>&nbsp; <a href="mailto:info@yourdomain.com">Aattiqshaikh40@gmail.com</a></li>
            <li class="list-group-item" href="#"><i class="fa fa-clock-o fa-fw"></i>&nbsp; Monday - Saturday  6 AM - 6 PM</li>
          </ul>
        </div><!--Contact Info End-->

      
 <div class="col-sm-6">

  <?php
  if(isset($_GET['status'])){
    if($_GET['status']==1){
      echo '<div class="alert alert-success"> The Comment Has Been Added Successfully</div>';
    }else{
        echo '<div class="alert alert-danger"> Error In Adding Comment</div>';
    }
  }

  ?>
          <h3>Drop us a line</h3>
<form class="form"  method="POST" role="form" id="example-form1" class="space-top" action="actions/insert.php">
    <div class="form-group required">
      
        <input id="name" type="text" class="form-control" value="" name="name" placeholder="Enter Your Name" required />
    </div>
    <div class="form-group required">
        <input id="email" class="form-control glyphicons glyphicons-message-flag" type="email" value="" name="email" placeholder="Enter Your Email" required />
	</div>
	
      

    <div class="form-group required">
    
        <textarea class="form-control" id="text" name="message"  style="
    resize: none;
"    placeholder="Type Your Message or Feedback" rows="5" maxlength="500"></textarea>
        <h6 class="pull-right" id="count_message"></h6>
	</div>
           <input type="submit" name="submit-btn" class="btn btn-default" value="Send" ></input>
        

</form>    
</div >
</section>
 <script type="text/javascript">
    /* <![CDATA[ */
    var google_conversion_id = 966923546;
    var google_custom_params = window.google_tag_params;
    var google_remarketing_only = true;
    /* ]]> */
    </script>
<script>

var text_max = 500;
$('#count_message').html(text_max + ' remaining');

$('#text').keyup(function() {
  var text_length = $('#text').val().length;
  var text_remaining = text_max - text_length;
  
  $('#count_message').html(text_remaining + ' remaining');
});
</script>

<?php 
  include("../common_client/footer.php");
  ?>
</body>
</html>