<?php
include("../../common/db.php");
 session_start();
//echo $_SESSION['teamid'];
if(isset($_SESSION['teamid'])){ 
 
	$id  = $_SESSION["teamid"];
	//echo $id;
	
													
$query ="
SELECT * 
FROM  `membership` 
WHERE  `id` 
IN (
SELECT playerID
FROM teamplayers
WHERE teamID =$id
)";
									$res = mysqli_query($conn,$query);
									 if(mysqli_num_rows($res)>0){
									 while($row = mysqli_fetch_array($res)){
					 ?>
				<div class="col-sm-3">
					<div class="thumbnail with-caption">
                        <?php 
								if(strlen($row["image"])==null){
										
									echo "<img src='http://localhost/abc/c2/common_client/image/default.png' width='100px' height='50px'  >"."<br>"; } 
									
									else{
									echo "<img src='http://localhost/abc/c2/common_client/image/".$row["image"]."  ' width='100px' height='50px'  >"."<br>";} 
						?> 
                        
						<div class="caption">
							<h4 class="text-uppercase text-center">
								<?php echo $row["name"]; ?>
							</h4>
							<strong class="text-info ">
								<p class="text-center">
								<?php 
									echo $row["play_role"]; 	
								?>
								</p>
							</strong>
						
						<center>
						<?php echo' <input type="button" name="view" value="view" id='.$row['id'].' class="btn btn-info btn-xs view_data" /> '
						?>
						</center>
						</div>
					
					</div>
				</div>
				
				
					<?php
									  }
									
									}                     	
						?>		
								
								
								</div>
								</div>
			<!--for view-->
		<div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Player Details</h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
               
				</div>  
                <div class="modal-footer">  
					<div class="pull-right">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
					 </div>
                </div>  
           </div>  
      </div>  
 </div>   <!--view modal end-->					
<?php 

}
		?>							
