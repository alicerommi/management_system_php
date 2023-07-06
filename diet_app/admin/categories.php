  <?php   
  include 'includes/header.php';
  
?>
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Categories</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                 <?php
                        if(isset($_GET['cateAdd'])){
                          if($_GET['cateAdd']==1){
                            echo '<div class="alert alert-success">The Category Has Been Added Successfully</div>';
                          }else if($_GET['cateAdd']==0){
                             echo '<div class="alert alert-warning">Error in Adding Category</div>';
                          }
                        }


                        if(isset($_GET['deleted'])){
                          if($_GET['deleted']==1){
                            echo '<div class="alert alert-danger">The Category Has been deleted Successfully</div>';
                          }else if($_GET['deleted']==0){
                            echo '<div class="alert alert-warning">Error in deleting category</div>';
                          }
                        }

                        if(isset($_GET['updated'])){
                          if($_GET['updated']==1){
                             echo '<div class="alert alert-success">The Category Has been updated Successfully</div>';
                           }else if($_GET['updated']==0)
                           echo '<div class="alert alert-warning">Error in Updating category</div>';
                        }


                      ?>
                <div class="row">

                  <div class="col-md-4">

                    <div class="card">
                     
                      <form  action="actions/insert.php" method="post">
                        <div class="input-group">
                          <label for="">Categories Name:</label>
                          <div class="input-group">
                            <input class="form-control" type="text" name="categoryName" id="categoryName"  required maxlength="40" >
                          </div>
                        </div>
                        <input type="hidden" value="" id="cate_id" name="cate_id">

                        <div class="input-group" id="btns">
                          <button type="submit" class="btn btn-primary btn-add" name="AddCate">Add</button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="card">
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Categories Name</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                          <?php
                            //shwo all the categoriess
                          $query = mysqli_query($conn,"SELECT* FROM category where category_active=1");
                          if(mysqli_num_rows($query)>0){
                              while($row = mysqli_fetch_array($query)){
                                  $category_id = $row['category_id'];
                                  $category_name = $row['category_name'];
                                  $category_recordDate = date("d-m-Y",strtotime($row['category_recordDate']));
                                  $action = '
                                  <a href="actions/delete.php?cate_id='.$category_id.'" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                  <button class="btn btn-info edit" id="'.$category_id.'" ><i class="fa fa-pencil"></i></button>
                                    ';
                                  echo '<tr>
                                <td>'.$category_name.'</td>
                                <td>'.$category_recordDate.'</td>
                                <td>'.$action.'</td>
                               </tr>';
                             }
                          }
                          ?>
                        </tbody>
                  </table>
                  </div>
                  </div>
                  <!-- Start: Datatable Section -->
                  <!-- End: Datatable Section -->
                </div>
            </div>


            <!-- End Container fluid  -->

  <?php include 'includes/footer.php';?>
  <script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
    
    //on clicking the pen button 
    $(document).on('click','.edit',function(){
        var category_id = $(this).attr('id');

        $.ajax({
              url:'actions/fetch.php',
              dataType:'JSON',
              data:{category_id:category_id},
              method:'post',
              success:function(data){
                $('#btns').empty();
                $('#btns').append('<button type="submit" class="btn btn-primary btn-add" name="UpdateCate">Update</button>');
                 $('#cate_id').val(data.category_id);
                 $('#categoryName').val(data.category_name);
                 $("form").attr("action","actions/update.php");
              }
            });
    });



  });
  </script>
