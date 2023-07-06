<?php include 'includes/header.php';
   include 'includes/site_visitors.php';
 ?>
  <!-- Start: Navbar Section -->
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">
      <img src="asset/images/logo_new01.png" alt="">
    </a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          
          <li class=""><a href="index.php">Proyectos <span class="sr-only">(current)</span></a></li>
          <li><a  class="active" href="properties.php">Propiedades</a></li>
          <li><a  href="about.php">Nuestra compañía</a></li>
          <li><a href="contact.php">Contacto</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
  </nav>
</div>
  <!-- End: Navbar Section -->
  <!-- Start: Banner Section -->
  <div class="banner" id="banner"></div>
  <!-- End: Banner Section -->
  <!-- Contact Detail -->
  <div class="sales-detail" id="sales-properties">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2>Propiedades  <span>en  venta</span></h2>
        </div>
        <!-- Sales Property 1 -->
        <?php
          //show properties which are for sale
        $query = mysqli_query($conn,"SELECT* FROM property WHERE property_type='Venta'");
        if(mysqli_num_rows($query)>0){
          while($row  = mysqli_fetch_array($query)){
            $property_name = $row['property_name'];
          $property_address = $row['property_address'];
          $property_price = $row['property_price'];
          $property_id = $row['property_id'];
          $property_type = $row['property_type']; ///next work is for aizaz
          $property_status= $row['property_status'];
            $queryImages = mysqli_query($conn,"SELECT * FROM `property_image` WHERE property_id =$property_id");
                if(mysqli_num_rows($queryImages)>0){
                  $row2 = mysqli_fetch_array($queryImages);
                   $propertyImage = "admin/uploads/property-images/".$row2['property_image'];
                    }else {
                      $propertyImage  = "admin/uploads/property-images/default1.jpg";
                    }
          if( $property_status=="normal"){
               $badge = "";
           }else{
                $badge="<div class='badge'>
                <h5>$property_status</h5>
              </div>";
           } 
           
           // if(strlen($propertyImage)==0){

           // }

          echo ' <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="sales-property">
            <div class="img_area list_img">

              <a href="property-detail.php?property_id='.$property_id.'" ><img src="'. $propertyImage .'" alt=""></a>
             
             '.$badge.'
              <div class="price">
                <small>'.$property_price.'</small>
              </div>

              <div class="list_type" >
                <div class="property-text">
                  <a href="property-detail.php?property_id='.$property_id.'"><h5 class="property-title">'.$property_name.'</h5></a>
                  <span><i class="fa fa-map-marker" aria-hidden="true"></i>'.$property_address.'</span>
                </div>

                <div class="bed_area">
                
                  <ul>
                  
                    <li><a href="property-detail.php?property_id='.$property_id.'">View Details</a></li>
                  </ul>
                </div>
              </div>
            </div>

          </div>
        </div>';

          }//end while loop /
        }else{ //end num rows conditon 
          echo "<center><h3 style='color:#007bc7'>No hay propiedades en venta en este momento</h3></center>";
          }
        ?>      
      </div>


      <?php
          if(mysqli_num_rows($query)>8){
      //   echo ' <div class="row">
      //   <div class="col-md-12">
      //     <div class="pagination_area">
      //       <nav aria-label="Page navigation">
      //         <ul class="pagination pagination_edit">
      //           <li>
      //             <a href="#" aria-label="Previous">
      //               <span aria-hidden="true">prev</span>
      //             </a>
      //           </li>
      //           <li class="active"><a href="#">1</a></li>
      //           <li><a href="#">2</a></li>
      //           <li><a href="#">3</a></li>
      //           <li><a href="#">4</a></li>
      //           <li><a href="#">5</a></li>
      //           <li>
      //             <a href="#" aria-label="Next">
      //               <span aria-hidden="true">next</span>
      //             </a>
      //           </li>
      //         </ul>
      //       </nav>
      //     </div>
      //   </div>
      // </div>';
          }else{

          }
      ?>
      <!-- Nav Pagination Section -->
     
      <!-- //Nav Pagination Section -->
    </div>
  </div>
  <!-- //Sales Detail -->
  <hr class="container">
  <!-- Rents Detail -->
  <div class="sales-detail" id="rent-properties">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2>Propiedades  <span>en alquiler</span></h2>
        </div>
        
        <?php
         $query2 = mysqli_query($conn,"SELECT* FROM property WHERE property_type='Alquiler'");
        if(mysqli_num_rows($query2)>0){
            while($row2  = mysqli_fetch_array($query2)){
                      $property_name = $row2['property_name'];
          $property_address = $row2['property_address'];
          $property_price = $row2['property_price'];
          $property_id = $row2['property_id'];
          $property_type  = $row2['property_type'];
           $property_status= $row2['property_status'];
           if( $property_status=="normal"){
            $badge = "";
           }else{
                $badge="<div class='badge'>
                <h5>$property_status</h5>
              </div>";
           }
                   $queryImages = mysqli_query($conn,"SELECT * FROM `property_image` WHERE property_id =$property_id");
                if(mysqli_num_rows($queryImages)>0){
                  $row3 = mysqli_fetch_array($queryImages);
                   $propertyImage = "admin/uploads/property-images/".$row3['property_image'];
                  }
                    echo ' <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="sales-property">
            <div class="img_area list_img">
              <a href="property-detail.php?property_id='.$property_id.'" ><img src="'. $propertyImage .'" alt=""></a>
               <div class="price">
                <small>'.$property_price.'</small>
              </div>
              '.$badge.'
              <div class="list_type" >
                <div class="property-text">
                  <a href="property-detail.php?property_id='.$property_id.'"><h5 class="property-title">'.$property_name.'</h5></a>
                  <span><i class="fa fa-map-marker" aria-hidden="true"></i>'.$property_address.'</span>
                </div>
                <div class="bed_area">
                  <ul>
                    
                    <li><a href="property-detail.php?property_id='.$property_id.'">View Details</a></li>
                  </ul>
                </div>
              </div>
            </div>

          </div>
        </div>';
            }
        }else{
          echo "<center><h3 style='color:#007bc7'>No hay propiedades en alquiler en este momento</h3></center>";
        }

        ?>
       
       
        
        

      </div>
      <!-- Nav Pagination Section -->

      <?php
         $query2 = mysqli_query($conn,"SELECT* FROM property WHERE property_type='Rent'");
        if(mysqli_num_rows($query2)>8){
      //    echo '<div class="row">
      //   <div class="col-md-12">
      //     <div class="pagination_area">
      //       <nav aria-label="Page navigation">
      //         <ul class="pagination pagination_edit">
      //           <li>
      //             <a href="#" aria-label="Previous">
      //               <span aria-hidden="true">prev</span>
      //             </a>
      //           </li>
      //           <li class="active"><a href="#">1</a></li>
      //           <li><a href="#">2</a></li>
      //           <li><a href="#">3</a></li>
      //           <li><a href="#">4</a></li>
      //           <li><a href="#">5</a></li>
      //           <li>
      //             <a href="#" aria-label="Next">
      //               <span aria-hidden="true">next</span>
      //             </a>
      //           </li>
      //         </ul>
      //       </nav>
      //     </div>
      //   </div>
      // </div>';
    }
      ?>
    
      <!-- //Nav Pagination Section -->
    </div>
  </div>
  <!-- //Rents Detail -->
  <?php include 'includes/footer.php'; ?>
