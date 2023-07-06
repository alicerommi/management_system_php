<?php include 'includes/header.php'; ?>


        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Add Slider Images</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                       <li class="breadcrumb-item"><a href="">Home Page Settings</a></li>
                        <li class="breadcrumb-item active">Add Images For Slider</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                        <div class="col-md-12 text-left">
                            <h3></h3>
                        </div>
                      <div class="col-md-6">
                            <?php
                                if(isset($_GET['sliderImageAdded'])){
                                    if($_GET['sliderImageAdded']==1){
                                        echo '<div class="alert alert-success">The Slider Image & Description Has Been Added To Slider</div>';
                                    }else if($_GET['sliderImageAdded']==0){
                                       echo '<div class="alert alert-warning">Error in Adding Slider Image & Description</div>';
                                    }
                                }
                                if(isset($_GET['imageFormat'])){
                                     if($_GET['imageFormat']==0){
                                         echo '<div class="alert alert-warning">Uploaded Image Format Is Not Supported</div>';
                                     }  
                                }
                            ?>
                        <div class="panel panel-primary">
                           <div class="panel-heading"><h4>Add Images For Home Page Slider</h4></div>
                            <div class="panel-body">
                            <form action="actions/insert.php" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                <input type="file" name="file" required class="form-control">
                              </div>
                          <div class="form-group">
                              <label>Add Image Description</label>
                              <textarea type="text" name="imageDescription" id="imageDescription" class="form-control" maxlength="400"></textarea>
                          </div>
                          <button type="submit" name="upload-images" class="btn btn-primary">Upload</button>
                        </form>

                      </div>





                      </div>


                </div>

                  <div class="col-md-6">
                    <?php
                      if(isset($_GET['deleted'])){
                        if($_GET['deleted']==1){
                          echo '<div class="alert alert-danger">Slider Image Has Been Deleted Successfully</div>';
                        }else if($_GET['deleted']==0){
                           echo '<div class="alert alert-warning">Error in Deleting Image</div>';
                        }
                      }
                    ?>

                        <div class="alert alert-success" id="message"> Image Has Been Deleted Successfully</div>
                     
                            <div class="panel panel-primary">

                                   <div class="panel-heading"><h4>View Slider Images</h4></div>
                                    <div class="panel-body">


                                        <table class="table table-stripped">
                                                <th>Added Date</th>
                                                <th>Actions</th>

                                                <!-- <th>Added Date</th> -->
                                                    <?php
                                                        $query = mysqli_query($conn,"select* from slider_images");
                                                        if(mysqli_num_rows($query)>0){
                                                            while($row = mysqli_fetch_array($query)){
                                                                $simage_id = $row['simage_id'];
                                                                $simage_name = $row['simage_name'];
                                                                $s_image_recordDate = $row['s_image_recordDate'];
                                                                echo '<tr>';
                                                                echo '<td>'.date("d-m-Y",strtotime($s_image_recordDate)).'</td>';
                                                                echo '<td>
                                                                <button class="btn btn-info view" name="viewImage" data-toggle="modal" data-target="#myModal" id="'.$simage_id.'" ><i class="fa fa-eye"></i></button>
                                                                <a class="btn btn-danger delete" href=actions/delete.php?simage_id='.$simage_id.'><i class="fa fa-trash"></i></a>
                                                                </td></tr>';
                                                            }
                                                        }//end num rows condition
                                                    ?>
                                               <!--  <tr>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
 -->
                                        </table>



                                    </div>
                             </div>

                    </div>
                      </div>
                        </div>
                        <!-- The Modal -->
                                        <div class="modal" id="myModal">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <!-- Modal Header -->
                                              <div class="modal-header">
                                                <h4 class="modal-title">Slider Image & Description</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              </div>

                                              <!-- Modal body -->
                                              <div class="modal-body" id="modal-Body">

                                              </div>

                                              <!-- Modal footer -->
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                              </div>

                                            </div>
                                          </div>
                                        </div>

            <!-- End Container fluid  -->

    <?php include 'includes/footer.php'; ?>
    <script>
    $(document).ready(function(){
        $('.view').click(function() {
              var image_id = $(this).attr('id');
              $.ajax({
                url:'actions/fetch.php',
                method:'post',
                dataType:'json',
                data:{image_id:image_id},
                success:function(data){
                  $("#modal-Body").empty();
                    $("#modal-Body").append("<img src=uploads/slider-images/"+data[0]+" height='100%' width='100%' class='img-responsive'></img>"+"<h3>Image Description</h3><p>"+data[1]+"</p>");
                }
              });
        });
      
    });
    </script>
<script type="text/javascript">
  //for deleting the image
  $(document).ready(function(){
    $("#message").hide();
    if(localStorage.getItem("deleteImage")!==null){
      $("#message").show();
      localStorage.removeItem("deleteImage")
    }

  });
</script>