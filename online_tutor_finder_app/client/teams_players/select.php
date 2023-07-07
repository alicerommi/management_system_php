 <?php  
  //include("../../common_client/master.php");
include("../../common/db.php");

 if(isset($_POST["match_id"]))  
 {  
 		$id = $_POST["match_id"];
      	$output = '';  
      //	$conn = mysqli_connect("localhost", "root", "", "diamond_db");  
      	 $query="SELECT * 
									FROM  `membership` 
									WHERE  `id` ='$id' ";
									
									 $res = mysqli_query($conn,$query);
									 
      	$output .= '  
      	
      <div class="table-responsive">  
           <table class="table table-hover" >';   

     if(mysqli_num_rows($res)>0){
			while($row = mysqli_fetch_array($res)){ 
         
                $output .='
                						<tr >
																	<td width="40%">Player Name</td>
																	<td width="60%">
																	'.$row["name"].'	
																	</td>
																</tr>
																
																<tr >
																	<td width="40%">Playing Role</td>
																	<td width="60%">
																	'.$row["play_role"].'	
																	</td>
																</tr>
																
																<tr >
																	<td width="40%">Bowling Style</td>
																	<td width="60%">'.$row["bow_style"].'</td>	
																</tr>
																<tr >
																	<td width="40%">Batting Style</td>
																	 <td width="60%">'.$row["bat_style"].'</td> 
																</tr>
																<tr>
																	<td width="40%">City</td>
																	<td width="60%">'.$row['city'].'</td>
																</tr>
																<tr >
																	<td width="40%">Date Of Birth</td>
																	<td width="60%">'.date("d-m-Y", strtotime($row['date'])).'</td>
																</tr>
																<tr >
																	<td width="40%">Date of Joining</td>
																	<td width="60%">'.date("d-m-Y", strtotime($row['joining_date']))	.'</td>
																</tr>';
			/*									
				$output .= '
                <tr>  
                     <td width="30%"><label>Team1 Name</label></td>  
                     <td width="70%">'.$name1.'</td>  
                </tr>';
						
				$output.='
                <tr>  
                     <td width="30%"><label>Team2 Name</label></td>  
                     <td width="70%">'.$name2.'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Match Overs</label></td>  
                     <td width="70%">'.$row["match_overs"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Ground Name</label></td>  
                     <td width="70%">'.$row["ground_name"].'</td>  
                </tr> 
                 <tr>  
                     <td width="30%"><label>Match Time</label></td>  
                     <td width="70%">'.$row["time"].'</td>  
                </tr>  
                 <tr>  
                     <td width="30%"><label>Match Date</label></td>  
                     <td width="70%">'.$row["date"].'</td>  
                </tr>   
           ';
           */
	
      }  }
      $output .= '  
           </table>  
      </div>  

      '; 
      echo $output;  
 }  
 ?>
 

