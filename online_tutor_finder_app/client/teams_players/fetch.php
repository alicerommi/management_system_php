<?php
//fetch.php
 include("../../common/db.php"); 
//$output = '';
//$teamid = $_GET['team_id'];
//echo $teamid;
//die;
if(isset($_POST["query"]))
{
	//echo $query;
	$intailString = mysqli_real_escape_string($conn,$_POST["query"]);
	//echo $intailString;
	$numbers = preg_replace('/[^0-9]/', '', $intailString);
	
	//echo $numbers;
	
	$search = preg_replace('/[^a-zA-Z]/', '', $intailString);
	
	$search =  str_replace($numbers,'',$intailString);
	
	$search = mysqli_real_escape_string($conn, $search);
	
	//echo $search;
	 /* $query="SELECT * 
									FROM  `membership` 
									WHERE  `id`  
									IN (
									SELECT playerID
									FROM teamplayers
									WHERE teamID = '$numbers' 
									)  AND name LIKE '%".$search."% "; */
									
									
$query =
"SELECT * 
FROM  `membership` 
WHERE name LIKE  '%".$search."%' 
AND  `id`
IN (
SELECT playerID
FROM teamplayers
WHERE teamID =$numbers
)
";

	 $res = mysqli_query($conn,$query);
									 
									 if(mysqli_num_rows($res)>0){
									 while($row = mysqli_fetch_array($res)){
					 ?>
				<div class="col-sm-3">
					<div class="thumbnail with-caption">
                        <?php 
								if(strlen($row["image"])==null){
										
									echo "<img src='http://localhost/abc/c2/common_client/image/default.png'width='100px' height='50px'  >"."<br>"; } 
									
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
