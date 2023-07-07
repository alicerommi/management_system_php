 <?php
    include 'includes/header.php';
    include 'includes/left_nav.php';
    //  $query = mysqli_query($conn,"SELECT* FROM admin WHERE admin_email = '$admin_email'");
    // $adminRow = mysqli_fetch_array($query);
    // $admin_fullName = ucwords($adminRow['admin_name']);
    // $admin_image = $adminRow['admin_picture'];
?>

          
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Add, View & Delete Question Category</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Dream</a></li>
                                    <li><a href="#">Questions</a></li>
                                    <li class="active">Question Category</li>
                                    <!-- <li class="active"></li> -->
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                      
                        <div class="row">
                                <?php
                                    //show the php feedback messages 
                                    if(isset($_GET['cateStatus'])){
                                        if($_GET['cateStatus']==1){
                                            echo '<div class="alert alert-success">Question Category Has Been Added</div>';
                                        }else if($_GET['cateStatus']==0){
                                             echo '<div class="alert alert-warning">Error in Adding Question Category</div>';
                                        }
                                    }

                                    if(isset($_GET['CatedeleteStatus'])){
                                        if($_GET['CatedeleteStatus']==1){
                                              echo '<div class="alert alert-danger">Question Category Has Been Deleted</div>';
                                        }else if($_GET['CatedeleteStatus']==0){
                                              echo '<div class="alert alert-warning">Error in Deletion of Question Deletion</div>';
                                        }
                                    }
                                    

                                     if(isset($_GET['cateStatusUpdate'])){
                                        if($_GET['cateStatusUpdate']==1){
                                            echo '<div class="alert alert-success">Question Category Details Are Updated</div>';
                                        }else if($_GET['cateStatusUpdate']==0){
                                            echo '<div class="alert alert-warning">Error in Updating Question Category Details</div>';
                                        }
                                    }

                                    if(isset($_GET['alreadyExist'])){
                                        if($_GET['alreadyExist']==1){
                                             echo '<div class="alert alert-danger">This Category is Already Set Choose Different Priroity Number</div>';
                                        }
                                    }

                                ?>
                                <div class="col-sm-6">
                                    <a class="btn btn-default pull pull-right" href="add-question.php" style="margin-bottom: 23px;">
                                        <i class="md md-keyboard-arrow-left"> </i>Back to Add Question Page
                                    </a>
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Add Question Category</h3></div>
                                    <div class="panel-body">
                                        <div class="form">
                                            <form class="cmxform form-horizontal tasi-form" method="post" action="actions/insert.php" >
                                                <div class="form-group">
                                                    <label for="cname" >Enter the Question Category</label>
                                                        <input class="form-control"  name="questionCategory"
                                                         id="questionCategory"  type="text" required maxlength="30">
                                                    <span class="help-text">You can only set the priority from 1 to 5.</span>
                                                </div>

                                                <div class="form-group">
                                                        <label>Set Category Priority</label>
                                                        <input class="form-control" name="categoryPriority" id="categoryPriority" required type="number" min="1" max="5"  maxlength="1">

                                                </div>
                                                <input type="hidden" name="cateID" id="cateID" value="0">
                                                
                                                <div class="form-group">
                                                    
                                                        <button class="btn btn-success waves-effect waves-light" type="submit" name="addQuesCategory">Save</button>
                                                       <!--  <button class="btn btn-default waves-effect" type="button">Cancel</button> -->
                                                   
                                                </div>
                                            </form>

                                                    
                                            
                                        </div> <!-- .form -->
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->



                            </div>

                                 <div class="col-sm-6">

                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">View All Question Categories</h3></div>
                                    <div class="panel-body">
                                        <div id="datatable-responsive_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                                <table id="datatable" class="table table-striped table-bordered">
                                              <thead>
                                                        <tr>
                                                            <th id="dreamKeyword">Category Name</th>
                                                            <th>Priority</th>
                                                            <th>Actions</th>

                                                        </tr>
                                                </thead>
                                            <tbody>
                                                <?php
                                                        //get all the question categories from db
                                                        $query = mysqli_query($conn,"SELECT* FROM questions_category");
                                                        if(mysqli_num_rows($query)>0){
                                                            while($row = mysqli_fetch_array($query)){
                                                                $ques_category_name = $row['ques_category_name'];
                                                                $ques_cate_id = $row['ques_cate_id'];
                                                                $ques_cate_priority = $row['ques_cate_priority'];
                                                                echo '<tr>  
                                                                    <td>'.$ques_category_name.'</td>
                                                                     <td>'.$ques_cate_priority.'</td>
                                                                    <td>
                                                                            <button  class="btn btn-defaul edit" name="'.$ques_cate_id.'" ><i class="fa fa-edit"></i></button>
                                                                            <a  class="btn btn-danger" href="actions/delete.php?categoryID='.$ques_cate_id.'"><i class="fa fa-trash"></i></a>
                                                                            </td>
                                                                    <tr>';
                                                            }//end while loop here   
                                                        } //end num rows condition here
                                                ?>
                                             </tbody>

                                             </table>   
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->



                        </div>



                        </div>
                
                    </div> <!-- container -->
                               
                </div> <!-- content -->
<?php
    include 'includes/footer.html';
?>
<!-- <script type="text/javascript"> 
    $(document).ready(function() {
        $('#datatable').dataTable();
      });
</script> -->
<script type="text/javascript">
        $(document).ready(function(){
                $(document).on('click','.edit',function(){
                        var id = $(this).attr('name');
                        var dataString = "ques_cate_id="+id;
                        $.ajax({
                                method:'post',
                                url:'actions/fetch.php',
                                data:dataString,
                                dataType:'json',
                                success:function(data){
                                    $("#questionCategory").val(data.ques_category_name);
                                    $("#cateID").val(data.ques_cate_id);
                                    $("#categoryPriority").val(data.ques_cate_priority);
                                }
                        });
                });
        });

</script>
