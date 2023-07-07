<?php
    include 'includes/header.php';
    include 'includes/left_nav.php';
?>
<style type="text/css">
    #dreamKeyword{
        width: 130.01px;
    }
     #keywordAction{
        width: 122px;
    }
</style>
 <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                              <h4 class="pull-left page-title">View All the Dream Lists</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Dream</a></li>
                                    <li class="active">All Dream Lists</li>
                                </ol>
                            </div>
                        </div>

                        <a class="btn btn-default pull pull-left" href="add-dream.php">
                                    <span class="glyphicon glyphicon-plus-sign"> </span>Add New Dream
               
                         </a>
                                                    <div class="form-group pull pull-right">
                                                           <!--  <label>Select An Alphabet</label> -->
                                                            <select class="form-control" id="alphabet">
                                                                <option selected disabled>Nothing Selected</option>
                                                                <option value="A">A</option>
                                                                <option value="B">B</option>
                                                                <option value="C">C</option>
                                                                <option value="D">D</option>
                                                                <option value="E">E</option>
                                                                <option value="F">F</option>
                                                                <option value="G">G</option>
                                                                <option value="H">H</option>
                                                                <option value="I">I</option>
                                                                <option value="J">J</option>
                                                                <option value="K">K</option>
                                                                <option value="L">L</option>
                                                                <option value="M">M</option>
                                                                <option value="N">N</option>
                                                                <option value="O">O</option>
                                                                <option value="P">P</option>
                                                                <option value="Q">Q</option>
                                                                <option value="R">R</option>
                                                                <option value="S">S</option>
                                                                <option value="T">T</option>
                                                                <option value="U">U</option>
                                                                <option value="V">V</option>
                                                                <option value="W">W</option>                                
                                                                <option value="X">X</option>
                                                                <option value="Y">Y</option>
                                                                <option value="Z">Z</option>
                                                            </select>
                                                      </div>


                                        <div class="row">

                                		   <div class="col-md-12">
                                    	<div class="panel panel-default panel-fill">
                                             <?php
                                                if(isset($_GET['deleteStatus'])){
                                                        if($_GET['deleteStatus']==1){
                                                            echo '<div class="alert alert-success">The Dream Record Has been Successfully Deleted</div>';
                                                        }else if($_GET['deleteStatus']==0){
                                                                  echo '<div class="alert alert-danger">Error in Deletion Record</div>';
                                                        }   
                                                }
                                            ?>
                                            <div class="panel-heading"> 
                                                <h3 class="panel-title">All Dream Lists</h3> 
                                                
                                            </div> 
                                            <div class="panel-body">
                                            		<div id="datatable-responsive_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                                <table id="datatable" class="table table-striped table-bordered">
                                              <thead>
                                                        <tr>
                                                            <th id="dreamKeyword">Dream Keyword</th>
                                                            <th>Dream Description</th>
                                                           <!--  <th>Contact Number</th> -->
                                                            <th id="keywordAction">Actions</th>
                                                           <!--  <th>Address Line2</th>
                                                            <th>Actions</th> -->
                                                            <!-- <th>Actions</th> -->
                                                        </tr>
                                                </thead>
                                            <tbody id="dreamLists">

                                             </tbody>

                                             </table>   
                                         </div>
                                         </div>
                                         </div>
                                         </div>
<?php
        include 'includes/footer.html';
?>
<script type="text/javascript"> 
    $(document).ready(function() {
        $('#datatable').dataTable();
      });
</script>


<script type="text/javascript">
        //on load it will shwo all the dreams lists in the tabel
   // $(document).ready(function(){
       // $(window).load(function(){
         $(document).on('change','#alphabet',function(){
                    var alpha = $(this,'option:seleced').val();
                    var dataString = "alpha="+alpha;
                        $.ajax({
                            method:'post',
                            url:'actions/fetch.php',
                            data:dataString,
                            success:function(data){
                                $("#dreamLists").html(data);
                            }
                });
        }); 
  //  }); 

</script>