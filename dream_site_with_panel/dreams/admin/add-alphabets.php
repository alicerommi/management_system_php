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
                                <h4 class="pull-left page-title">Add, View & Delete Alphabets</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Dream</a></li>
                                    <li><a href="#">Alphabets Description</a></li>
                                    <li class="active">Add & View Alphabets</li>
                                    <!-- <li class="active"></li> -->
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                      
                        <div class="row">
                                <?php
                                    //show the php feedback messages 
                                    if(isset($_GET['addAlphabetStatus'])){
                                        if($_GET['addAlphabetStatus']==1){
                                            echo '<div class="alert alert-success">Alphabet Has Been Added Successfully</div>';
                                        }else if($_GET['addAlphabetStatus']==0){
                                             echo '<div class="alert alert-warning">Error in Adding An Alphabet</div>';
                                        }
                                    }
                                    //AlphabetExists

                                     if(isset($_GET['AlphabetExists'])){
                                        if($_GET['AlphabetExists']==1)
                                              echo '<div class="alert alert-danger">The Alphabet is Already Exists</div>';
                                    }

                                    if(isset($_GET['deleteAlphaStatus'])){
                                        if($_GET['deleteAlphaStatus']==1){
                                              echo '<div class="alert alert-danger">Alphabet Has Been Deleted</div>';
                                        }else if($_GET['deleteAlphaStatus']==0){
                                              echo '<div class="alert alert-warning">Error in Deletion of Alphabet</div>';
                                        }
                                    }
                                    

                                    //  if(isset($_GET['cateStatusUpdate'])){
                                    //     if($_GET['cateStatusUpdate']==1){
                                    //           echo '<div class="alert alert-success">Question Category Details Are Updated</div>';
                                    //     }else if($_GET['cateStatusUpdate']==0){
                                    //           echo '<div class="alert alert-warning">Error in Updating Question Category Details</div>';
                                    //     }
                                    // }

                                ?>
                                <div class="col-sm-6">
                                    <a class="btn btn-default pull pull-right" href="add-alphabetDescription.php" style="margin-bottom: 23px;">
                                             <i class="md md-keyboard-arrow-left"> </i>Back to Add Alphabet Description
                                     </a>
                                
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Add An Alphabet</h3></div>
                                    <div class="panel-body">
                                        <div class="form">
                                            <form class="cmxform form-horizontal tasi-form" method="post" action="actions/insert.php" >
                                                <div class="form-group">
                                                    <label for="cname" >Enter An Alphabet</label>
                                                      
                                                        <input class="form-control"  name="alphabet"
                                                         id="alphabet"  type="text" required maxlength="1">
                                                           <p class="error"></p>
                                                    
                                                </div>

                                                <input type="hidden" name="alphabetID" id="alphabetID" value="0">
                                                <div class="form-group">
                                                    
                                                        <button class="btn btn-success waves-effect waves-light" type="submit" name="addAlphabet">Save</button>
                                                       <!--  <button class="btn btn-default waves-effect" type="button">Cancel</button> -->
                                                   
                                                </div>
                                            </form>

                                                    
                                            
                                        </div> <!-- .form -->
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->



                            </div>

                                 <div class="col-sm-6">

                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">View All Added Alphabets</h3></div>
                                    <div class="panel-body">
                                        <div id="datatable-responsive_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                                <table id="datatable" class="table table-striped table-bordered">
                                              <thead>
                                                        <tr>
                                                            <th id="dreamKeyword">Alphabet Name</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                </thead>
                                            <tbody>
                                                <?php
                                                        //get all the question categories from db
                                                        $query = mysqli_query($conn,"SELECT* FROM alphabets_table");
                                                        if(mysqli_num_rows($query)>0){
                                                            while($row = mysqli_fetch_array($query)){
                                                                $alphabet = $row['alphabet'];
                                                                $alphabet_id = $row['alphabet_id'];
                                                                echo '<tr>  
                                                                    <td>'.$alphabet.'</td>
                                                                    <td>
                                                                            <a  class="btn btn-danger" href="actions/delete.php?alphabetID='.$alphabet_id.'"><i class="fa fa-trash"></i></a>
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
                                    $("#alphabet").val(data.ques_category_name);
                                    $("#alphabetID").val(data.ques_cate_id);
                                }
                        });
                });
        });

</script>
 <script>
            $( document ).ready(function() {
                $("#alphabet").keypress(function(e) {
                             var regex = new RegExp("^[a-zA-Z]+$");
                            var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                            if (regex.test(str)) {
                                 return true;
                            }
                            else
                            {
                                    e.preventDefault();
                                    $('.error').show();
                                    $('.error').text('Please Enter Alphabet');
                                    return false;
                            }
                });
            });
        </script>