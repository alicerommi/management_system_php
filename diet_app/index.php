<?php
  include 'includes/database_connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Diet Plan</title>
  <!-- Style Css -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/materialize.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
<style type="text/css">


  
    #success{
    padding: 10px 15px;
    background: rgba(76, 209, 55,.7);
    border-radius: 5px;
    color: white;
    font-size: 18px;
    font-weight: 500;
    border: 2px solid #44bd32;
    display: none;
  }

   #error{
    padding: 10px 15px;
    background: rgba(245, 34, 12,.7);
    border-radius: 5px;
    color: white;
    font-size: 18px;
    font-weight: 500;
    border: 2px solid #c0392b;
        display: none;
  }

  .red {
    color: #FC0606 !important;
    font-weight: 600 !important;
    text-transform: uppercase;
    font-size: 13px !important;
    text-shadow: 0 2px 5px rgba(255, 6, 6, 0.4);
    letter-spacing: 1px;
    background-color: transparent !important;
  }
  
  .pricing-detail {
    min-height: 600px; 
  }

  .green {
    color: #3AD600 !important;
    font-weight: 600 !important;
    text-transform: uppercase;
    font-size: 13px !important;
    text-shadow: 0 2px 5px rgba(107, 244, 0, 0.4);
    letter-spacing: 1px;
    background: transparent !important;
  }

  .yellow {
    color: #F79F1F !important;
    font-weight: 600 !important;
    text-transform: uppercase;
    font-size: 13px !important;
    text-shadow: 0 2px 5px rgba(253, 238, 0, 0.4);
    letter-spacing: 1px;
    background: transparent !important;
  }

  .items-img {
    width: 24px;
    height: 22px;
    margin-right: 5px;
    position: relative;
    top: -2px;
  }


</style>

</head>
<body data-spy="scroll" data-target=".navbar" data-offset="100" id="home">
  <nav class="navbar navbar-expand-lg navbar-light fixed-top navigation">
    <div class="container">
      <a class="navbar-brand" href="#">Diet Plan</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="#home">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#pricing">Diet Plan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact">Contact Us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Start: Slider Section -->
  <div class="slider">
   <ul class="slides">
     <li>
       <img src="images/slider/01.jpg"> <!-- random image -->
       <div class="caption center-align">
         <h3>This is our big Tagline!</h3>
         <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
       </div>
     </li>
     <li>
       <img src="images/slider/02.jpg"> <!-- random image -->
       <div class="caption left-align">
         <h3>Left Aligned Caption</h3>
         <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
       </div>
     </li>
     <li>
       <img src="images/slider/03.jpg"> <!-- random image -->
       <div class="caption right-align">
         <h3>Right Aligned Caption</h3>
         <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
       </div>
     </li>
     <li>
       <img src="images/slider/04.jpg"> <!-- random image -->
       <div class="caption center-align">
         <h3>This is our big Tagline!</h3>
         <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
       </div>
     </li>
   </ul>
 </div>
  <!-- End: Slider Section -->

  <!-- Start: About Page Section -->
  <div class="about-us" id="about">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="heading">
            <h2>About <span>Us</span></h2>
          </div>
          <div class="title">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End: About Page Section -->
  <!-- Start: Price Table Section -->
  <div class="pricing-table" id="pricing">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="heading">
            <h2>Choose Your <span>Plan</span></h2>
          </div>
          <p id="error-msg"></p>
          <p id="error-msg2"></p>
          <div class="select-option"  style="    border-bottom: 1px solid #ccc;
    padding-bottom: 40px;     margin-bottom: 20px;">


              <div class="select-post-items">
                    <div class="select-list">
                      <select class="form-control" id="foodItems">
                        <option value="" disabled selected value="">Choose Food Item</option>
                          <?php
                              $query = mysqli_query($conn,"select* from items where item_active=1");
                              if(mysqli_num_rows($query)>0){
                                while($row = mysqli_fetch_array($query)){
                                    $item_id = $row['item_id'];
                                    $item_name = $row['item_name'];
                                    echo '<option value ='.$item_id.' id="item_'.$item_id.'">'.ucwords($item_name).'</option>';
                                }//end while loop here
                              }
                            ?>
                      </select>
                    </div>
                    <div class="button">
                      <button class="btn btn-primary addItemBTN" type="button"  id="AddItem" name="button">Add</button>
                    </div>

                  </div>
                </div>


        </div>
      <!--   <div class="col-md-12"> -->
          
        <div class="pricing-col">
          <!-- <div class="col-md-3">   -->
             <div class="pricing-table-details">
                   <div class="select-list">
                  <select class="form-control selectedPlan" id="dropdownplan1"  >
                     <?php
                        $query = mysqli_query($conn,"SELECT * FROM `dietplan` WHERE `dietplan_active`=1");
                        echo '<option  disabled selected>Select A Plan</option>';
                        while($row = mysqli_fetch_array($query)){
                          $dietplan_id  = $row['dietplan_id'];
                          $dietplan_name  = $row['dietplan_name'];
                          $dietplan_description  = $row['dietplan_description'];
                          echo '<option value="div1" id="div1dietplan'.$dietplan_id.'" data-id='.$dietplan_id .'>'.$dietplan_name.'</option>';
                        }
                     ?> 
                  </select>
                </div>
                  
                <div class="pricing-detail" id="plan1">
                  

                  <div class="pricing-head">
                    <div class="icon">
                      <img src="images/icons/01.png" alt="">
                    </div>
                    <h2 id="plan1PlanName">DietPlan 1</h2>
                    <p id="plan1PlanDescription">Lorem ipsum dolor sit amet</p>
                      
                      <select class="form-control select-details-plan" id="selectDiv1Plans">
                        <!-- <option value="1">dietplan1</option>
                        <option value="2">dietplan2</option> -->
                      </select>


                  </div>
                  <div class="pricing-list">
                    <ul class="food-items" id="planItemsDiv1">
                      <li class="list-items"><p>Lorem Ipsum 01</p> <span class="font-icon"><i class="fa fa-times"></i></span></li>
                      <li class="list-items"><p>Lorem Ipsum 02</p> <span class="font-icon"><i class="fa fa-times"></i></span></li>
                      <li class="list-items"><p>Lorem Ipsum 03</p> <span class="font-icon"><i class="fa fa-times"></i></span></li>
                      <li class="list-items"><p>Lorem Ipsum 04</p> <span class="font-icon"><i class="fa fa-times"></i></span></li>
                      <li class="list-items"><p>Lorem Ipsum 05</p> <span class="font-icon"><i class="fa fa-times"></i></span></li>
                    </ul>
                  </div>
                 
                </div>
              </div>
           <!--  </div>


            <div class="col-md-3">  --> 
             <div class="pricing-table-details">
                 <div class="select-list">
                  <select class="form-control selectedPlan" id="dropdownplan2"  >
                     <?php
                        $query = mysqli_query($conn,"SELECT * FROM `dietplan` WHERE `dietplan_active`=1");
                        echo '<option  disabled selected>Select A Plan</option>';
                        while($row = mysqli_fetch_array($query)){
                          $dietplan_id  = $row['dietplan_id'];
                          $dietplan_name  = $row['dietplan_name'];
                          $dietplan_description  = $row['dietplan_description'];
                          echo '<option  value="div2" data-id='.$dietplan_id .' id="div2dietplan'.$dietplan_id.'" >'.$dietplan_name.'</option>';
                        }
                     ?> 
                  </select>
                </div>
                <div class="pricing-detail" id="plan2">
                  <div class="pricing-head">
                    <div class="icon">
                      <img src="images/icons/01.png" alt="">
                    </div>
                   <h2 id="plan2PlanName">DietPlan 2</h2>
                    <p id="plan2PlanDescription">Lorem ipsum dolor sit amet</p>

                     <select class="form-control select-details-plan" id="selectDiv2Plans">
                        <!-- <option value="1">dietplan1</option>
                        <option value="2">dietplan2</option> -->
                      </select>
                  </div>
                  <div class="pricing-list">
                    <ul class="food-items" id="planItemsDiv2">
                      <li class="list-items"><p>Lorem Ipsum 01</p> <span class="font-icon"><i class="fa fa-times"></i></span></li>
                      <li class="list-items"><p>Lorem Ipsum 02</p> <span class="font-icon"><i class="fa fa-times"></i></span></li>
                      <li class="list-items"><p>Lorem Ipsum 03</p> <span class="font-icon"><i class="fa fa-times"></i></span></li>
                      <li class="list-items"><p>Lorem Ipsum 04</p> <span class="font-icon"><i class="fa fa-times"></i></span></li>
                      <li class="list-items"><p>Lorem Ipsum 05</p> <span class="font-icon"><i class="fa fa-times"></i></span></li>
                    </ul>
                  </div>
                </div>
              </div>
        <!--     </div> -->

            <!-- <div class="col-md-3">  --> 
             <div class="pricing-table-details">
                 <div class="select-list">
                  <select class="form-control selectedPlan" id="dropdownplan3" >
                     <?php

                        $query = mysqli_query($conn,"SELECT * FROM `dietplan` WHERE `dietplan_active`=1");
                      echo '<option  disabled selected>Select A Plan</option>';
                        while($row = mysqli_fetch_array($query)){
                          $dietplan_id  = $row['dietplan_id'];
                          $dietplan_name  = $row['dietplan_name'];
                          $dietplan_description  = $row['dietplan_description'];
                          echo '<option  value="div3" data-id='.$dietplan_id .'  id="div3dietplan'.$dietplan_id.'" >'.$dietplan_name.'</option>';
                        }
                     ?> 
                  </select>
                </div>

                <div class="pricing-detail" id="plan3">
                  <div class="pricing-head">
                    <div class="icon">
                      <img src="images/icons/01.png" alt="">
                    </div>
                      <h2 id="plan3PlanName">DietPlan 3</h2>
                    <p id="plan3PlanDescription">Lorem ipsum dolor sit amet</p>

                     <select class="form-control select-details-plan" id="selectDiv3Plans">
                        <!-- <option value="1">dietplan1</option>
                        <option value="2">dietplan2</option> -->
                      </select>
                  </div>
                  <div class="pricing-list">
                    <ul class="food-items" id="planItemsDiv3">
                      <li class="list-items"><p>Lorem Ipsum 01</p> <span class="font-icon"><i class="fa fa-times"></i></span></li>
                      <li class="list-items"><p>Lorem Ipsum 02</p> <span class="font-icon"><i class="fa fa-times"></i></span></li>
                      <li class="list-items"><p>Lorem Ipsum 03</p> <span class="font-icon"><i class="fa fa-times"></i></span></li>
                      <li class="list-items"><p>Lorem Ipsum 04</p> <span class="font-icon"><i class="fa fa-times"></i></span></li>
                      <li class="list-items"><p>Lorem Ipsum 05</p> <span class="font-icon"><i class="fa fa-times"></i></span></li>
                    </ul>
                  </div>
                 
                </div>
              </div>
           <!--  </div>

            <div class="col-md-3">   -->
             <div class="pricing-table-details">
                <div class="select-list">
                  <select class="form-control selectedPlan" id="dropdownplan4"  >
                     <?php
                        $query = mysqli_query($conn,"SELECT * FROM `dietplan` WHERE `dietplan_active`=1");
                         echo '<option  disabled selected>Select A Plan</option>';
                        while($row = mysqli_fetch_array($query)){
                          $dietplan_id  = $row['dietplan_id'];
                          $dietplan_name  = $row['dietplan_name'];
                          $dietplan_description  = $row['dietplan_description'];
                          echo '<option   value="div4" data-id='.$dietplan_id .'  id="div4dietplan'.$dietplan_id.'" >'.$dietplan_name.'</option>';
                        }
                     ?> 
                  </select>
                </div>
                <div class="pricing-detail" id="plan4">
                  <div class="pricing-head">
                    <div class="icon">
                      <img src="images/icons/01.png" alt="">
                    </div>
                     <h2 id="plan4PlanName">DietPlan 4</h2>
                    <p id="plan4PlanDescription">Lorem ipsum dolor sit amet</p>

                     <select class="form-control select-details-plan" id="selectDiv4Plans">
                        <!-- <option value="1">dietplan1</option>
                        <option value="2">dietplan2</option> -->
                      </select>
                  </div>
                  <div class="pricing-list">
                    <ul class="food-items" id="planItemsDiv4">
                      <li class="list-items"><p>Lorem Ipsum 01</p> <span class="font-icon"><i class="fa fa-times"></i></span></li>
                      <li class="list-items"><p>Lorem Ipsum 02</p> <span class="font-icon"><i class="fa fa-times"></i></span></li>
                      <li class="list-items"><p>Lorem Ipsum 03</p> <span class="font-icon"><i class="fa fa-times"></i></span></li>
                      <li class="list-items"><p>Lorem Ipsum 04</p> <span class="font-icon"><i class="fa fa-times"></i></span></li>
                      <li class="list-items"><p>Lorem Ipsum 05</p> <span class="font-icon"><i class="fa fa-times"></i></span></li>
                    </ul>
                  </div>
                </div>
              </div>






<div class="pricing-table-details">
                <div class="select-list">
                  <select class="form-control selectedPlan" id="dropdownplan5"  >
                     <?php
                        $query = mysqli_query($conn,"SELECT * FROM `dietplan` WHERE `dietplan_active`=1");
                         echo '<option  disabled selected>Select A Plan</option>';
                        while($row = mysqli_fetch_array($query)){
                          $dietplan_id  = $row['dietplan_id'];
                          $dietplan_name  = $row['dietplan_name'];
                          $dietplan_description  = $row['dietplan_description'];
                          echo '<option   value="div5" data-id='.$dietplan_id .' id="div5dietplan'.$dietplan_id.'"  >'.$dietplan_name.'</option>';
                        }
                     ?> 
                  </select>
                </div>
                <div class="pricing-detail" id="plan5">
                  <div class="pricing-head">
                    <div class="icon">
                      <img src="images/icons/01.png" alt="">
                    </div>
                     <h2 id="plan5PlanName">DietPlan 5</h2>
                    <p id="plan5PlanDescription">Lorem ipsum dolor sit amet</p>

                     <select class="form-control select-details-plan" id="selectDiv5Plans">
                        <!-- <option value="1">dietplan1</option>
                        <option value="2">dietplan2</option> -->
                      </select>
                  </div>
                  <div class="pricing-list">
                    <ul class="food-items" id="planItemsDiv5">
                      <li class="list-items"><p>Lorem Ipsum 01</p> <span class="font-icon"><i class="fa fa-times"></i></span></li>
                      <li class="list-items"><p>Lorem Ipsum 02</p> <span class="font-icon"><i class="fa fa-times"></i></span></li>
                      <li class="list-items"><p>Lorem Ipsum 03</p> <span class="font-icon"><i class="fa fa-times"></i></span></li>
                      <li class="list-items"><p>Lorem Ipsum 04</p> <span class="font-icon"><i class="fa fa-times"></i></span></li>
                      <li class="list-items"><p>Lorem Ipsum 05</p> <span class="font-icon"><i class="fa fa-times"></i></span></li>
                    </ul>
                  </div>
                </div>
              </div>




         <!--    </div> -->


          </div>
      <!--   </div> -->
      </div>
    </div>
  </div>
  <!-- End: Price Table Section -->

  <!-- Start: Contact Section -->
 <div class="contact-section" id="contact">
   <div class="container">
     <div class="row">
       <div class="col-md-12 text-center">
         <div class="heading">
           <h2>Contact <span>Us</span></h2>
           <p>We would to help you or question your answers</p>
         </div>
       </div>
       <div class="contact-detail col-md-12">
           <div class="panel-body">
             <div class="col-md-6 contact-info">
               <h2>Information</h2>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
               <ul>
                 <li><img src="images/socials/01.png" alt="">contact@info.com</li>
                 <li><img src="images/socials/02.png" alt="">+92 123 4567890</li>
                 <li><img src="images/socials/03.png" alt="">#209, Al-Ameen Plaza, Saddar Rawalpindi.</li>
               </ul>
             </div>
             <div class="col-md-6">
               <div class="card">
                 <h2>Say Something</h2>

                  <p class="help-block with-errors" id="error" ></p>
                  <p class="help-block with-errors" id="success" ></p>


                 <form method="post" id="MSGform">
                     <div class="form-group">
                       <!-- <label for="form-contact-name">Your Name<em>*</em></label> -->
                       <input type="text" class="form-control" id="form-contact-name" name="form-contact-name" required maxlength="40" placeholder="Enter Your Name">
                     </div>

                     <div class="form-group">
                       <!-- <label for="form-contact-email">Your Email<em>*</em></label> -->
                       <input type="email" class="form-control" id="form-contact-email" name="form-contact-email" required maxlength="50" placeholder="Enter Your Email Address">
                     </div>
                     <div class="form-group" style="padding: 0;">
                       <!-- <label for="form-contact-message">Your Message<em>*</em></label> -->
                       <textarea class="form-control" id="form-contact-message" rows="3" name="form-contact-message" required maxlength="500" placeholder="Enter Your Message" style=" resize: none;"></textarea>
                     </div>
                       <div class="form-group text-right" style="padding: 0;">
                         <button class="btn btn-success" type="submit" name="contactForm"  id="contactForm">Send</button>
                       </div>

                 </form>
               </div>
           </div>
         </div>
        
       </div>
     </div>
   </div>
 </div>
 <!-- End: Contact Section -->
  <!-- Start: Footer Section -->
  <div class="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="about">
            <!-- <h4>About Us</h4> -->
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione accusamus sint, officiis inventore ipsam perferendis labore magni reiciendis ipsa, iure in libero amet nemo aspernatur ut obcaecati neque blanditiis accusantium.</p>
            <ul class="social-list">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-3">
          <div class="links">
            <h4>Recent Links</h4>
            <ul>
              <li><a href="#">Links 1</a></li>
              <li><a href="#">Links 2</a></li>
              <li><a href="#">Links 3</a></li>
              <li><a href="#">Links 4</a></li>
              <li><a href="#">Links 5</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-3">
          <div class="links">
            <h4>Get in Touch</h4>
            <div class="address">
              <h5><i class="fa fa-map-marker"></i> Office Address</h5>
              <p>#209, Al-Ameen Plaza, Saddar Rawalpindi.</p>
            </div>
            <div class="call">
              <h5><i class="fa fa-phone"></i> Call Us 24/7</h5>
              <p>+92 331 440 9752</p>
            </div>
            <div class="call">
              <h5><i class="fa fa-envelope-o"></i> Email Address</h5>
              <p>contact@arksols.com</p>
            </div>
       
          </div>
        </div>
        <div class="col-md-3">
          <div class="links">
            <h4>Usefull Links</h4>
            <ul>
              <li><a href="#">Links 1</a></li>
              <li><a href="#">Links 2</a></li>
              <li><a href="#">Links 3</a></li>
              <li><a href="#">Links 4</a></li>
              <li><a href="#">Links 5</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12 text-center copyright">
      <p>Copyright &copy; 2018. All Right Reserved.</p>
    </div>
  </div>
  <!-- End: Footer Section -->
  <!-- Back to top -->
  <a href="#0" class="cd-top">Top</a>
  <!-- //Back to top -->


  <!-- All Jquery -->
  <script src="js/jquery-3.2.1.min.js"></script>
  <!-- Bootstrap Js -->
  <script src="js/bootstrap.min.js"></script>
  <!-- Main Js -->
  <script src="js/main.js"></script>

  <script src="js/materialize.min.js"></script>


  <script type="text/javascript">
  $(document).ready(function(){
    $('.slider').slider();

    //for inserting the message form

    $(document).on('submit','#MSGform',function(e){
         var dataString=$("form").serialize()+"&contactForm=1";
         $.ajax({
            url:'actions/insert.php',
            data:dataString,
            method:'post',
            success:function(data){
                if(data==1){
                  $("#success").show();
                   $("#error").hide();
                   $("#form-contact-name").val("");
                    $("#form-contact-email").val("");
                    $("#form-contact-message").val("");
                  $("#success").html("Message Has Been Successfully Send");
                }else{
                  $("#success").hide();
                  $("#error").show();
                    $("#form-contact-name").val("");
                    $("#form-contact-email").val("");
                    $("#form-contact-message").val("");
                  $("#error").html("Error in sending Message");
                }
            }
         });  
         e.preventDefault();
    });
  });
  </script>
<script type="text/javascript" src="js/file.js"></script>
</body>
</html>
