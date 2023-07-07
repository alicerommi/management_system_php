<?php include 'includes/header.php';?>
<style type="text/css">
     .dlt-img{ position: absolute;
    top: 0;
    right: 16px;
    border-radius: 0px;}
    .res-img{ position: absolute;
    top: 0;
    /*right: 16px;*/
    left: 15px;
    border-radius: 0px;
  }
  .body-image{
        display: flex;
    flex-wrap: wrap;
    width: 100%;
    justify-content: flex-start;
  }
  .slider-imagesDiv{
    margin-bottom: 20px ;
    height: 300px;
    
  }
</style>
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Add Slider Images</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Slider Images</a></li>
                        <li class="breadcrumb-item active">Add Images</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                
                  <div class="col-md-12">
                    <?php if(isset($_GET['imageAdded'])){
                    if(isset($_GET['imageAdded'])==1){
                      echo '<div class="alert alert-success">The Image Has Been Successfully Added</div>';
                    }
                    else if(isset($_GET['imageAdded'])==0){
                            echo '<div class="alert alert-success">Error in Adding Slider Image</div>';
                    }
                  }
                  if(isset($_GET['imageSupport'])){
                    if($_GET['imageSupport']==0){
                      echo '<div class="alert alert-warning">The image file is not supported</div>';
                    }
                  }

                    ?>
                    <!--  <div class="col-md-12 text-right" style="padding: 0px;">
                          <a class="btn btn-warning" href="view-plans.php"><i class="fa fa-eye"></i>&nbsp;View All Plans</a>
                      </div> -->

                  
                    <div class="card">
                      
                      <form class="" action="actions/insert.php" method="post" enctype="multipart/form-data">
                      
                          <div class="input-group">
                              <label>Upload Image</label>
                              <div class="input-group">
                                  <input type="file" name="sliderImage" id="sliderImage" required>
                              </div>
                          </div>
                         
                 
                    
                         <div class="input-group">
                            <label>Image Heading</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="sliderHeading" id="sliderHeading" >
                            </div>
                        </div>

                        <div class="input-group">
                            <label>Image Paragraph</label>
                            <div class="input-group">
                                <textarea class="form-control" type="text" name="sliderParagraph" id="sliderParagraph" ></textarea>
                            </div>
                        </div>
                      
                      
                        <div class="input-group">
                          <button type="submit" class="btn btn-primary btn-add" name="addSliderImage">Add Image</button>
                        </div>
                      </form>
                    </div>


                  </div>
                
                  <div class="row">
                    
                             <?php
                        $query = mysqli_query($conn,"SELECT* FROM slider_images WHERE image_active=1");
                        if(mysqli_num_rows($query)>0){

                      echo'<div class="col-md-12">
                      <div class="card">
                       <div class="panel-body body-image">';
                       $counter=0;
                       while($r  = mysqli_fetch_array($query)){
                        $counter++;
                       // if($counter!=1){
                         $image_id = $r['image_id'];
                         $image_name = $r['image_name'];
                        echo'<div class="col-md-4 slider-imagesDiv" id="div'.$counter.'">
                           <img src="uploads/slider_images/'.$image_name.'" class="img-responsive" alt="" width="200px" height="200px" >
                           <button type="button" class="btn btn-danger dlt-img" id="'.$image_id.'" data-id="div'.$counter.'"><i class="fa fa-times"></i></button>
                         
                         </div>';
                      //  }

                          }//end while looop here

//   <button type="button" class="btn btn-primary res-img" id="'.$image_id.'" data-id="div'.$counter.'"><i class="fa fa-trash"></i></button>
                       echo'</div>
                      </div>
                   </div>';
                 }//end num rows condtion here
                   ?>

                  
                  </div>
                </div>


            </div>
            <!-- End Container fluid  -->
  <?php include 'includes/footer.php';?>
<script type="text/javascript">
  $(document).ready(function(){
    //for deleting an images
      $(document).on('click','.dlt-img',function(){
            var simage_id = $(this).attr('id');
          //  alert(simage_id);
            var div_id = $(this).attr('data-id');
            $.ajax({
                url:'actions/delete.php',
                method:'post',
                data:{simage_id:simage_id,type:1},
                success:function(data){
                  if(data==1){
                     $("#"+div_id).fadeOut();
                  }
                }
            });
      });
  }); 
</script>