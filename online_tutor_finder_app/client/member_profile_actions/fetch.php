<?php
  include("../../common/db.php");
//  $conn = mysqli_connect('localhost','root','','diamond_db');
  if(isset($_POST['request'])){
	$request=$_POST['request'];
	$query="select * from membership where play_role='$request'" ;
	
	$output=mysqli_query($conn,$query);
		if(mysqli_num_rows($output)>0){
					while($r=mysqli_fetch_array($output)){
						echo '<div class="col-md-4">';
											echo '<div class="well well-sm">';
					
					
															echo "<div class='pull-right'>";
													
													echo "Playing Role: "."<p class='text-uppercase text-success text-justify'>".$r['play_role']."</p>";
													echo "Batting Style: "."<p class='text-uppercase text-success text-justify'>".$r['bat_style']."</p>";
													echo "Bowling Style: "."<p class='text-uppercase text-success text-justify'>".$r['bow_style']."</p>";
													echo "City: "."<p class='text-uppercase text-success text-justify'>".$r['city']."</p>";
													//echo "City: ". 
												 echo "</div>";
												 
												 if(strlen($r["image"])==null){
													
												echo "<img src='http://localhost/abc/c2/common_client/image/default.png' style='width:125px;height:100px' class='img-thumbnail img-responsive' >"."<br>"; } 
												
												else{
												echo "<img src='http://localhost/abc/c2/common_client/image/".$r["image"]."  '  style='width:125px;height:100px' class='img-thumbnail img-responsive' >"."<br>";} 
												echo " Player Name:"
												 ."<p class='text-success text-uppercase text-justify' ><strong>" .$r['name']."</strong></p>";
												 echo "Joining Date:"
												 ."<p class='text-success text-uppercase text-justify' ><strong>" .date("d-m-Y",strtotime($r['joining_date']))."</strong></p>";						
												
					echo '</div>';	
					echo '<hr/>';
					echo'
					</div>';	
												
					
		}
		}//if
		else{
					echo'	<div class="col-md-12">
           
            <div class="jumbotron">
              <h2>Query Results:</h2><br/>
              <p class="text-danger text-center">The profile of member with play role of  '.$_POST['request']. ' is not found.</p>
             
            </div>
          </div>';
							
					}
  }
	
//	die;
	

  
	?>
    


