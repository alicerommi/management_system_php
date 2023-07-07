<?php
//fetch.php
 include("../../common/db.php"); 
//$output = '';
if(isset($_POST["query"]))
{
	//echo $_POST['id'];
	$intailString = mysqli_real_escape_string($conn,$_POST["query"]);
$numbers = preg_replace('/[^0-9]/', '', $intailString);
//echo $numbers;
	$search = preg_replace('/[^a-zA-Z]/', '', $intailString);
	$search =  str_replace($numbers,'',$intailString);
 $search = mysqli_real_escape_string($conn, $search);
 //echo $search;
 $query = "
SELECT * 
FROM teams
WHERE teamName LIKE  '%".$search."%'
;
 
 ";
 // OR Address LIKE '%".$search."%' 
 // OR City LIKE '%".$search."%' 
  //OR PostalCode LIKE '%".$search."%' 
  //OR Country LIKE '%".$search."%'
  

}
else
{
 $query = "
  SELECT * FROM teams 
 ";

}
$i=0;
$info="";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_array($result)){
		
		$i =$i+1;
		$id = $row['teamID'];
			  $count_members = "SELECT* FROM teamplayers WHERE teamID=$id";
			  $res = mysqli_query($conn,$count_members);
			  $counter  = mysqli_num_rows($res);
			  
			   $originalDate = $row['date'];
			$newDate = date("d-m-Y", strtotime($originalDate));
			if(strlen($row['about'])==null){
					$info = "No Information about Team";
					}else{
						$info =  $row['about'];
						
					}
					if($counter==11){
echo '
  <div class="col-sm-4">
	<div class="panel panel-color panel-success">
		<div class="panel-heading">
		<h3 class="panel-title">'."Team No ".$i.' 
		 </h3></div>
		<div class = "panel-body">
           <div class="caption">
			<h4> <p class="h4"><strong>'.$row["teamName"].'</strong></p></h4>
			<span class="text-muted"> 
			Number of Players: '.$counter.'<br/> 
			</span>
			<span class="text-muted">
			TEAM Created Date: '.$newDate.'<br/>
			</span>
			<p class="text-justify">
			<strong><p class="h4">About Team</strong><br/><br/>'
			.$info.
			'
			</p>
			</p>
			<center>
			<a href = "view_teams_members.php?team_id='.$row['teamID'].'" class="btn btn-primary">View Team Members</a>
			
			</center>
			 </div>
			</div>
			</div>
			</div>
			';
					}
}
}



?>