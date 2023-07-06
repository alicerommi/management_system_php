<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>

</title>

     <!-- Meta -->
    <meta charset="utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge" /><meta name="viewport" content="width=device-width, initial-scale=1.0" /><meta name="description" /><meta name="author" /><link rel="shortcut icon" href="favicon.ico" /><link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css" /><link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" /><link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" /><link href="assets/plugins/flexslider/flexslider.css" rel="stylesheet" /><link href="assets/plugins/pretty-photo/css/prettyPhoto.css" rel="stylesheet" /><link href="assets/css/styles.css" rel="stylesheet" /><link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" /><link rel="icon" href="images/favicon.ico" type="image/ico" />
    <style>
        h2 {
            text-align: center;
        }

        table caption {
            padding: .5em 0;
        }

        .header_td{
            font-weight: 600;
            width: 200px;
        }
        @media screen and (max-width: 767px) {
            table caption {
                border-bottom: 1px solid #ddd;
            }
        }

        .p {
            text-align: center;
            padding-top: 140px;
            font-size: 14px;
        }
    </style>

   

</head>
<body>
  
    <div class="wrapper">
                <!-- ******HEADER****** --> 
        <header class="header">  
            <div class="top-bar">
                <div class="container">              
                    <ul class="social-icons col-md-6 col-sm-6 col-xs-12 hidden-xs">
                        <li><a href="#" ><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" ><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" ><i class="fa fa-youtube"></i></a></li>
                        <li><a href="#" ><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#" ><i class="fa fa-google-plus"></i></a></li>         
                        <li class="row-end"><a href="#" ><i class="fa fa-rss"></i></a></li>             
                    </ul><!--//social-icons-->
                       <div class="pull-right search-form" role="search">
                        <div class="form-group">
                            
                            <input name="track_number" type="text" id="txtsearch" class="form-control" placeholder="Enter Tracking Number"/>
                        </div>
                        <button id="aSearch" class="btn btn-theme">Track</button>
                        
                        
                    </div>      
                </div>      
            </div><!--//to-bar-->
            <div class="header-main container">
                <h1 class="logo col-md-4 col-sm-4">
                   <a href="Home.php"><img id="logo" src="images/2logo.png" alt="Logo"></a>
                </h1><!--//logo-->           
                <div class="info col-md-8 col-sm-8">
                    <ul class="menu-top navbar-right hidden-xs">
                        <li class="divider"><a href="Home.php">Home</a></li>
                        <li><a href="Contactus.php">Contact</a></li>
                    </ul><!--//menu-top-->
                    <br />
                     <div id="divSiteInfo" class="contact pull-right"><p class='phone'><i class='fa fa-phone'></i>+14044588874</p> <p class='email'><i class='fa fa-envelope'></i>Contact@neweracourierexpress.com
</ p > </div><!--//contact-->
                </div><!--//info-->
            </div><!--//header-main-->
        </header><!--//header-->

      

        <!-- ******CONTENT****** --> 
        <div class="content container">
    <div class="container">
        <div class="row" style="margin-bottom: 10px;">
             <?php
                            include 'admin/admin_classes/config.php';

                        if(isset($_GET['track_id'])){
                        $track_id = $_GET['track_id'];
                        $query = mysqli_query($db,"select* from courier where `tracking_id`='$track_id'");
                            if(mysqli_num_rows($query)>0){      
                            $row =  mysqli_fetch_array($query);
                              
                                    // $catalogue = $row['catalogue'];
                                    // $consignor = $row['consignor'];
                                    // $consignee = $row['consignee'];
                                
                                    $shipper_name = $row['shipper_name'];
                                    $shipper_phone = $row['shipper_phone'];
                                    $shipper_address = $row['shipper_address'];
                                          $reciver_name = $row['reciver_name'];
                                        $reciver_address = $row['reciver_address'];
                                        $reciver_phone = $row['reciver_phone'];
                                    $consignment_number = $row['consignment_number'];
                                    $item_name = $row['item_name'];
                                    $weight = $row['weight'];
                                    $invoice_number = $row['invoice_number'];
                                    $booking_mode = $row['booking_mode'];
                                    $mode = $row['mode'];

                                    $shippment_type = $row['shippment_type'];

                        ?>

                                <div class="panel panel-success">
                        
                <div class="panel-heading">
                    <div class="container container-panel">
                      
                    
                        
                            
                            <div class="panel-body" >
                                 <div id="ContentPlaceHolder1_divTrackInfo" class="col-xs-12" style="padding:10px"><h4 class='panel-title abc ' runat='server' id='tracking_no' style='font-weight:bold'> TRACKING NO: 
                           <span class='text-danger'><?=$track_id;?></span></h4></div>

                        <div id="ContentPlaceHolder1_divCurrentStatus" class="col-xs-12" style="padding:10px">
                            
                        </div>
                        
                            <div id="ContentPlaceHolder1_divBookingMode" class="col-xs-12" style="padding:10px">
                            </div>
                            
                                </div>
                    
                        
                     
                        
                    </div>
                </div>

                    
                
                <div class="panel-body">

                    <h4 class="text-uppercase" style="font-weight: bold">Tracking Information</h4>
                    <div class="col-md-6">
                        <div class="panel panel-theme">
                            <div class="panel-heading">
                                <h5 class="text-center text-uppercase">Shipper Information </h5>
                            </div>
                            <div id="ContentPlaceHolder1_divCatalogue" class="panel-body">
                                <table class="table table-bordered">
                                            <tr>
                                                <td class="header_td">Shipper Name</td>
                                                 <td><?= $shipper_name;?></td>    
                                            </tr>

                                            <tr>
                                                  <td class="header_td">Shipper Phone</td>
                                                   <td><?= $shipper_phone;?></td>  
                                            </tr>

                                            <tr>
                                              <td class="header_td">Shipper Address</td>
                                                 <td><?= $shipper_address;?></td> 
                                            </tr>
                                </table>
                            </div>


                        </div>
                    </div>
                 
                 
                     <div class="col-md-6">
                        <div class="panel panel-theme">
                            <div class="panel-heading">
                                <h5 class="text-center text-uppercase">Reciever Information </h5>
                            </div>
                            <div id="ContentPlaceHolder1_divCatalogue" class="panel-body">
                                <table class="table table-bordered">
                                            <tr>
                                                <td class="header_td">Reciever Name</td>
                                                 <td><?= $reciver_name;?></td>    
                                            </tr>

                                            <tr>
                                                  <td class="header_td">Reciever Phone</td>
                                                   <td><?= $reciver_phone;?></td>  
                                            </tr>

                                            <tr>
                                              <td class="header_td">Reciever Address</td>
                                                 <td><?= $reciver_address;?></td> 
                                            </tr>
                                </table>
                            </div>

                            
                        </div>
                    </div>
                  
                    <div class="col-md-12">
                        <table class="table table-bordered">

                             <tr>
                                        <td class="header_td">Shippment Type</td>
                                        <td><?php echo $shippment_type;?></td>
                                </tr>
                                <tr>
                                        <td class="header_td">Consignment Number</td>
                                        <td><?php echo $consignment_number;?></td>
                                </tr>

                                     <tr>
                                        <td class="header_td">Item Name</td>
                                    <td><?php echo $item_name;?></td>
                                </tr>


                                     <tr>
                                        <td class="header_td">Weight</td>
                                       <td><?php echo $weight;?></td>
                                </tr>

                                     <tr>
                                        <td class="header_td">Invoice Number</td>
                                       <td><?php echo $invoice_number;?></td>
                                </tr>

                                     <tr>
                                        <td class="header_td">Booking Mode</td>
                                        <td><?= $booking_mode;?></td>
                                </tr>

                                     <tr>
                                        <td class="header_td">Mode</td>
                                        <td><?= $mode;?></td>
                                </tr>
                        </table>
                    </div>


                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div>
                                    <table class="table table-bordered table-hover">
                                        <caption class="text-capitalize" style="font-size:1.5em" >Shippment Progress History </caption>
                                        <thead>
                                            <tr>
                                                <th>CURRENT LOCATION</th>
                                                <th>DATE @ TIME</th>
                                                
                                                <th>STATUS</th>
                                            </tr>
                                        </thead>
                                        <tbody id="ContentPlaceHolder1_tbhistory">
                                            <?php
                                                $query2 = mysqli_query($db,"SELECT * FROM `time_status` where tracking_id = '$track_id'");
                                                while($row2 =mysqli_fetch_array($query2)){
                                                    $status_time  = $row2['status_time'];
                                                    $status_date  = $row2['status_date']." ".$status_time;
                                                    $shipment_status  = $row2['shipment_status'];
                                                    $status_cur_location  = $row2['status_cur_location'];
                                                 echo '<tr>
                                                        <td>'.$status_cur_location.'</td>
                                                         <td>'.$status_date.'</td>
                                                          <td>'.$shipment_status.'</td>
                                                    </tr>';
                                                } 
                                            ?>
                                          
                                        </tbody>
                                        
                                       
                                    </table>
                                </div>
                                <!--end of .table-responsive-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>



                            <?php
                        }else{
                            ?>
                                         <div class="panel panel-success">
                        
                <div class="panel-heading">
                    <div class="container container-panel">
                      
                    
                        
                            
                            <div class="panel-body" >
                                 <div id="ContentPlaceHolder1_divTrackInfo" class="col-xs-12" style="padding:10px"><h4 class='panel-title abc ' runat='server' id='tracking_no' style='font-weight:bold'> TRACKING NO: 
                           <span class='text-danger'><?=$track_id;?></span></h4></div>

                        <div id="ContentPlaceHolder1_divCurrentStatus" class="col-xs-12" style="padding:10px">
                            
                        </div>
                        
                            <div id="ContentPlaceHolder1_divBookingMode" class="col-xs-12" style="padding:10px">
                            </div>
                            
                                </div>
                    
                        
                     
                        
                    </div>
                </div>

                    
                
                <div class="panel-body">

                    <h4 class="text-uppercase" style="font-weight: bold">Tracking Information</h4>
                    <div class="col-md-6">
                        <div class="panel panel-theme">
                            <div class="panel-heading">
                                <h5 class="text-center text-uppercase">Shipper Information </h5>
                            </div>
                            <div id="ContentPlaceHolder1_divCatalogue" class="panel-body">
                                <table class="table table-bordered">
                                            <tr>
                                                <td class="header_td">Shipper Name</td>
                                                    <td></td>  
                                            </tr>

                                            <tr>
                                                  <td class="header_td">Shipper Phone</td>
                                                      <td></td>
                                            </tr>

                                            <tr>
                                              <td class="header_td">Shipper Address</td>
                                                     <td></td>
                                            </tr>
                                </table>
                            </div>


                        </div>
                    </div>
                 
                 
                     <div class="col-md-6">
                        <div class="panel panel-theme">
                            <div class="panel-heading">
                                <h5 class="text-center text-uppercase">Reciever Information </h5>
                            </div>
                            <div id="ContentPlaceHolder1_divCatalogue" class="panel-body">
                                <table class="table table-bordered">
                                            <tr>
                                                <td class="header_td">Reciever Name</td>
                                                     <td></td> 
                                            </tr>

                                            <tr>
                                                  <td class="header_td">Reciever Phone</td>
                                                        <td></td>
                                            </tr>

                                            <tr>
                                              <td class="header_td">Reciever Address</td>
                                                        <td></td>
                                            </tr>
                                </table>
                            </div>

                            
                        </div>
                    </div>
                  
                    <div class="col-md-12">
                        <table class="table table-bordered">

                             <tr>
                                        <td class="header_td">Shippment Type</td>
                                          <td></td>
                                </tr>
                                <tr>
                                        <td class="header_td">Consignment Number</td>
                                            <td></td>
                                </tr>

                                     <tr>
                                        <td class="header_td">Item Name</td>
                                        <td></td>
                                </tr>


                                     <tr>
                                        <td class="header_td">Weight</td>
                                             <td></td>
                                </tr>

                                     <tr>
                                        <td class="header_td">Invoice Number</td>
                                      
                                       <td></td>
                                </tr>

                                     <tr>
                                        <td class="header_td">Booking Mode</td>
                                        <td></td>
                                </tr>

                                     <tr>
                                        <td class="header_td">Mode</td>
                                        <td></td>
                                </tr>
                        </table>
                    </div>


                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div>
                                    <table class="table table-bordered table-hover">
                                        <caption class="text-capitalize" style="font-size:1.5em" >Shippment Progress History </caption>
                                        <thead>
                                            <tr>
                                                <th>CURRENT LOCATION</th>
                                                <th>DATE @ TIME</th>
                                                
                                                <th>STATUS</th>
                                            </tr>
                                        </thead>
                                        <tbody id="ContentPlaceHolder1_tbhistory">
                                           
                                        </tbody>
                                        
                                       
                                    </table>
                                </div>
                                <!--end of .table-responsive-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>




                            <?php
                        }
                    }
                        else{
                                echo '<div class="alert alert-danger text-center" style="font-weight:600; color:black; margin-top:40px;">Invalid Parameters.</div>'; 
                        }
                       ?>


        
        </div>
    </div>

        </div></div>

         <!-- ******FOOTER****** --> 
    <footer class="footer">
        <div class="footer-content">
            <div class="container">
                <div class="row">
                <div class="footer-col col-md-3 col-sm-4 about">
                    <div class="footer-col-inner">
                        <h3>About</h3>
                        <ul id="ulSiteInfo">
                            <li><a href="Home.php"><i class="fa fa-caret-right"></i>Home</a></li>
                            <li><a href="Aboutus.php"><i class="fa fa-caret-right"></i>Aboutus</a></li>
                            <li><a href="Contactus.php"><i class="fa fa-caret-right"></i>Contact Us</a></li>
                            <li><a href="Enquiry.php"><i class="fa fa-caret-right"></i>Enquiry</a></li>
                        </ul>
                    </div><!--//footer-col-inner-->
                </div><!--//foooter-col-->
                <div class="footer-col col-md-6 col-sm-8 newsletter">
                    <div class="footer-col-inner">
                        <h3>Join our mailing list</h3>
                        <p>Subscribe to get our weekly newsletter delivered directly to your inbox</p>
                        <div class="subscribe-form">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Enter your email" />
                            </div>
                            <input class="btn btn-theme btn-subscribe" type="submit" value="Subscribe">
                        </div>
                        
                    </div><!--//footer-col-inner-->
                </div><!--//foooter-col--> 
                <div class="footer-col col-md-3 col-sm-12 contact">
                    <div class="footer-col-inner">
                        <h3>Contact us</h3>
                        <div id="footerInfo" class="row"><p class='adr clearfix col - md - 12 col - sm - 4'>   <i class='fa fa-map-marker pull-left'></i> <span class='adr-group pull-left'><span class='street-address'></span><br><span class='region'>89 joseph Grishashvili street, kutaisi 4600, Georgia.</span><br></span></p><p class='tel col-md-12 col-sm-4'><i class='fa fa-phone'></i>+14044588874</p><p class='email col-md-12 col-sm-4'><i class='fa fa-envelope'></i>Contact@neweracourierexpress.com</p>  </div> 
                    </div><!--//footer-col-inner-->            
                </div><!--//foooter-col-->   
                </div>   
            </div>        
        </div><!--//footer-content-->
        <div class="bottom-bar">
            <div class="container">
                <div class="row">
                      <small class="copyright col-md-6 col-sm-12 col-xs-12">Copyright @ 2019  Newera Express</small>
                    <ul class="social pull-right col-md-6 col-sm-12 col-xs-12">
                        <li><a href="#" ><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" ><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" ><i class="fa fa-youtube"></i></a></li>
                        <li><a href="#" ><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#" ><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#" ><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#" ><i class="fa fa-skype"></i></a></li> 
                        <li class="row-end"><a href="#" ><i class="fa fa-rss"></i></a></li>
                    </ul><!--//social-->
                </div><!--//row-->
            </div><!--//container-->
        </div><!--//bottom-bar-->
    </footer><!--//footer-->

   
        <script src="assets/plugins/jquery-1.11.2.min.js"></script>
        <script src="assets/plugins/jquery-migrate-1.2.1.min.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/plugins/bootstrap-hover-dropdown.min.js"></script>
        <script src="assets/plugins/back-to-top.js"></script>
        <script src="assets/plugins/jquery-placeholder/jquery.placeholder.js"></script>
        <script src="assets/plugins/pretty-photo/js/jquery.prettyPhoto.js"></script>
        <script src="assets/plugins/flexslider/jquery.flexslider-min.js"></script>
        <script src="assets/plugins/jflickrfeed/jflickrfeed.min.js"></script>
        <script src="assets/js/main.js"></script>
         <script type="text/javascript" src="assets/js/search_track.js"></script>
</body>
</html>
