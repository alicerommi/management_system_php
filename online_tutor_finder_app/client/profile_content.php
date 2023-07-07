<?php
 include("../common/db.php"); 
$profileid=$_GET["profileid"];

#echo $profileid;
#die;
//include("../common_client/db.php");
?>           	
				<?php
				
				$query ="SELECT * FROM `membership` WHERE id='$profileid'";
				$results = mysqli_query($conn,$query);
				while($row=mysqli_fetch_array($results)){
					echo "ID: " .$row['id'] ."<br>";
					echo "Name: " .$row['name'] ."<br>";
					$img = $row["image"];
					if(strlen($row["image"])==null){
						 echo "<img src='http://localhost/dimondcricket/common_client/image/default.png'  height='130' width='130' class=
						'thumb-lg img-circle img-thumbnail' alt ='profile image' >"."<br>";
					}
					
					else if(strstr($img, '/')){
						 echo "<img src='http://localhost/dimondcricket/common_client/image/default.png'  height='130' width='130' class=
						'thumb-lg img-circle img-thumbnail' alt ='profile image' >"."<br>";
					}
					else{
				echo "<img src='http://localhost/dimondcricket/common_client/image/".$row["image"]."  '  height='130' width='130' >"."<br>";
					}
						#echo "Email: " .$row["email"]. "<br>";
                       
					   echo "City: " .$row["city"]. "<br>";
                           # echo "Contact Number: " .$row["contact_number"]. "<br>";
                            echo "Date of Birth: " .$row["date"]. "<br>";
							echo "Playing Role: " .$row["play_role"]."<br>";
							echo "Batting Style: " .$row["bat_style"]."<br>";
							echo "Bowling Style " .$row["bow_style"]."<br>";
					
				}
				?>
				
					
			