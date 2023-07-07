<?php
    include 'includes/header.php';
    include 'includes/left_nav.php'
?>
<style type="text/css">
	@media screen and (max-width: 1200px) {
		#showContent {
			width: 100% !important;
			margin: 0 40px;
		}
	}
</style>
<div class="content-page">
        <!-- Start content -->
        <div class="content">
			<div class="container">
			<div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Users Comments and Reviews</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Dreams</a></li>
                                    <li class="#">User Comments</li>
                                    <li class="active">View All Comments</li>
                                </ol>
                            </div>
				</div>
				</div>
				
				<div class="container">
			<div class="row">
				
			      <div class="col-md-12">
                                        <div class="panel panel-default panel-fill">
                                            <div class="panel-heading"> 
                                                <h3 class="panel-title">All Users Commments</h3> 
                                            </div> 
                                            <div class="panel-body">
                                                    <div id="datatable-responsive_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                                <table id="datatable" class="table table-striped table-bordered">
                                              <thead>
                                                        <tr>
                                                            <th id="">User Name</th>
                                                            <th>Email</th>
                                                            <th>Message</th>
                                                            <th id="keywordAction">View Message</th>
                                                           
                                                        </tr>
                                                </thead>
                                            <tbody>
                                                <?php
                                                //SELECT ques.*, ques_cat.* FROM dream_questions ques, questions_category ques_cat WHERE ques.question_cate_id = ques_cat.ques_cate_id
                                                    $query ="SELECT * FROM `user_comments`";
                                                    $result = mysqli_query($conn,$query);
                                                    if(mysqli_num_rows($result)>0){
                                                        while($row= mysqli_fetch_array($result)){
                                                                $comment_id = $row['comment_id'];
																$comment_uname = $row['comment_uname'];
																$comment_uemail = $row['comment_uemail'];
																//$comment_msg = $row['comment_msg'];
																 $comment_msg =substr($row['comment_msg'],0,50);
																$comment_recordDate = $row['comment_recordDate'];
                                                              
                                                        echo'<tr>
                                                                    <td>'.$comment_uname.'</td>
                                                                    <td>'.$comment_uemail.'</td>
                                                                    <td>'.$comment_msg.'</td>
											                         <td>
											                            <button  class="btn btn-info view" name='.$comment_id.'><i class="fa fa-eye"></i></button>
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

                                                   	<!-- Modal -->
 
                                         </div>				
		
			</div>
			<div class="row">
					<div class="col-md-6">
							 <div class="modal fade" id="myModal" role="dialog">
							    	<div class="modal-content" id="showContent" style="
    margin: 0 auto;width:45%; top: 30%">
									</div>
  							</div>

					</div>

			</div>


				</div>						

</div>
</div>
 </body>
       
       <?php
	   include("includes/footer.html");
	   ?>
<script type="text/javascript"> 
    $(document).ready(function() {
        $('#datatable').dataTable();
      });

    $(document).ready(function(){
    	$(document).on('click','.view',function(){
    		var id = $(this).attr('name');
    		$.ajax({
    				url:'actions/fetch.php',
    				method:'post',
    			
    				data:{comment_id:id},
    				success:function(data){
    					$('#showContent').html(data);
    					$('#myModal').modal('show');
    				}
    		});
    	});
    });
</script>