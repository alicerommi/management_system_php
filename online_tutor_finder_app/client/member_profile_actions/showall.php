,<?php
  include("../../common/db.php");
 
	$query="select * from membership where status='active' ORDER By name";
	
	$output=mysqli_query($conn,$query);
		while($r=mysqli_fetch_array($output)){
			echo '<div class="col-md-4">';
								echo '<div class="well well-sm">';
		
		
												echo "<div class='pull-right'>";
										
										echo "Playing Role: "."<p class='text-uppercase text-success text-justify'>".$r['play_role']."</p>";
										echo "Batting Style: "."<p class='text-uppercase text-success text-justify'>".$r['bat_style']."</p>";
										echo "Bowling Style: "."<p class='text-uppercase text-success text-justify'>".$r['bow_style']."</p>";
										echo "City: "."<p class='text-uppercase text-success text-justify'>".$r['city']."</p>"; 
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


	?>
    


