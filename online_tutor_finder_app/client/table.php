<?php
include("../common/db.php");

									 $query="SELECT * 
									FROM  `membership` 
									WHERE  `id` 
									IN (
									SELECT playerID
									FROM teamplayers
									WHERE teamID =30
									) ";
									 $res = mysqli_query($conn,$query);
									 if(mysqli_num_rows($res)>0){
									 while($row = mysqli_fetch_array($res)){
?>													

													<table class="table table-hover" >
															<tbody>
																<tr class="active">
																	<td width="40%">Player Name</td>
																	<td width="60%"><?php echo $row['name']; ?></td>
																</tr>
																<tr class="danger">
																	<td width="40%">Playing Role</td>
																	<td width="60%"><?php echo $row['play_role']; ?></td>
																</tr>
																
																<tr class="info">
																	<td width="40%">Bowling Style</td>
																	<td width="60%"><?php echo  $row['bow_style']; ?></td>	
																</tr>
																<tr class="active">
																	<td width="40%">Batting Style</td>
																	<td width="60%"><?php echo $row['bat_style']; ?></td>	
																</tr>
																<tr class="danger">
																	<td width="40%">City</td>
																	<td width="60%"><?php echo $row['city']; ?></td>
																</tr>
																<tr class="info">
																	<td width="40%">Date Of Birth</td>
																	
																	<td width="60%"><?php 
																	
																	
																	echo date("d-m-Y",strtotime($row['date']));
																	
																	
																	?></td>
																</tr>
																<tr >
																	<td width="40%">Date of Joining</td>
																	<td width="60%"><?php echo date("d-m-Y",strtotime($row['joining_date']));
																	  ?></td>
																</tr>
															
															</tbody>
														  </table>	
														  
									 <?php }
									 
									 
									 } ?>