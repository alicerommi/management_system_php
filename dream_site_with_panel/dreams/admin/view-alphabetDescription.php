<?php
    include 'includes/header.php';
    include 'includes/left_nav.php';
    // $query = mysqli_query($conn,"SELECT* FROM admin WHERE admin_email = '$admin_email'");
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
                                <h4 class="pull-left page-title">View All Alphabets Descriptions</h4>
                                 <ol class="breadcrumb pull-right">
                                    <li><a href="#">Dream</a></li>
                                    <li><a href="#">Alphabets Description</a></li>
                                    <li class="active"> View Alphabets Description</li>
                                    <!-- <li class="active"></li> -->
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                      
   <a class="btn btn-default pull pull-left" href="add-alphabetDescription.php" style="margin-bottom: 20px;">
                                    <span class="glyphicon glyphicon-plus-sign"> </span>Add Alphabet Description
               
                         </a>
                    
                      <div class="row">
                                            <?php
                                                //shwo the feed back notification in case of deletion
                                                if(isset($_GET['deleteAlphaDesStatus'])){
                                                    if($_GET['deleteAlphaDesStatus']==1){
                                                        echo '<div class="alert alert-danger text-center"> The Alphabet Description Has Been Successfully Deleted</div>';
                                                    }else if($_GET['deleteAlphaDesStatus']==0){
                                                        echo '<div class="alert alert-warning text-center"> Error in Deletion</div>';
                                                    }
                                                }
                                            ?>
                                           <div class="col-md-12">
                                        <div class="panel panel-default panel-fill">
                                            <div class="panel-heading"> 
                                                <h3 class="panel-title"> View Alphabets Description</h3> 
                                            </div> 
                                            <div class="panel-body">
                                                    <div id="datatable-responsive_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                                <table id="datatable" class="table table-striped table-bordered">
                                              <thead>
                                                        <tr>
                                                            <th id="">Alphabet</th>
                                                            <th>Description</th>
                                                            <th id="keywordAction">Actions</th>
                                                           
                                                        </tr>
                                                </thead>
                                            <tbody>
                                                <?php
                                                    $query ="SELECT alpha.*, alpha_des.* FROM alphabets_description alpha_des, alphabets_table alpha  where alpha.alphabet_id = alpha_des.alphabet_id";
                                                    $result = mysqli_query($conn,$query);
                                                    if(mysqli_num_rows($result)>0){
                                                        while($row= mysqli_fetch_array($result)){
                                                                $alphabet_des_id = $row['alphabet_des_id'];
                                                                $alphabet_description = substr($row['alphabet_description'],0,50);
                                                                $alphabet= $row['alphabet'];

                                                        echo'<tr>
                                                                    <td>'.$alphabet.'</td>
                                                                    <td>'.$alphabet_description.'</td>
                                                                   
                         <td>
                         <a  class="btn btn-default" href="edit-alphabetDescription.php?alphabetDesID='.$alphabet_des_id.'"><i class="fa fa-edit"></i></a>
                        
                        <a  class="btn btn-danger" href="actions/delete.php?alphabetDesID='.$alphabet_des_id.'"><i class="fa fa-trash"></i>

                        </a>
                                
                        <a  class="btn btn-info" href="view-Description.php?alphabetDesID='.$alphabet_des_id.'"><i class="fa fa-eye"></i>

                            </td>
                                                                    
                                                                </tr>';

                                                            }// end while loop here 
                                                        }   //end num rows conidtion


                                                ?>

                                               
                                             </tbody>

                                             </table>   
                                         </div>
                                         </div>
                                         </div>
                                         </div>
                     
                      </div>

                
                    </div> <!-- container -->
                               
                </div> <!-- content -->
<?php
    include 'includes/footer.html';
?>
<script type="text/javascript"> 
    $(document).ready(function() {
        $('#datatable').dataTable();
      });
</script>
