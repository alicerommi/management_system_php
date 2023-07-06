<?php
	//error_reporting(0);
	//error_reporting(E_ALL);
  //ini_set('display_errors', TRUE);
  //ini_set('display_startup_errors', TRUE);

	include_once("config.php");

	define("DB_NAME",$dbname);
	define("DB_HOST",$dbhost);
	define("DB_USER",$dbuser);
	define("DB_PASS",$dbpasswd);
	//include_once("util.php");

	$db = new Database();

	//$administrators = $dbObject->executeScalar("Select email from admin_emails where type=2");


	class Database{

		var $rs=0;

		var $dbh;
    	var $database_name;
    	var $database_host;
    	var $database_user;
    	var $database_pass;

		//Create Class Object
		function Database(){ //constructor
			$database_name = DB_NAME;
        	$database_host = DB_HOST;
        	$database_user = DB_USER;
        	$database_pass = DB_PASS;

        	$this->database_name = $database_name; //Use $this to refer to the current object with-in the class to access data members and member functions.
        	$this->database_host = $database_host;
        	$this->database_user = $database_user;
        	$this->database_pass = $database_pass;
        	return 1;
		}

		function parseToXML($htmlStr){
			$Str=str_replace('<','&lt;',$htmlStr);
			$Str=str_replace('>','&gt;',$Str);
			$Str=str_replace('"','&quot;',$Str);
			$Str=str_replace("'",'&#39;',$Str);
			$Str=str_replace("&",'&amp;',$Str);
			return $Str;
		}

		function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}

		//Connect to Database
		function connect () {
				 $host     = $this->database_host;
				 $username = $this->database_user;
				 $password = $this->database_pass;
				 $dbname   = $this->database_name;

				 $this->dbh = new mysqli($host, $username, $password , $dbname);
				 if ($this->dbh->connect_error) {
						die("Connection failed: " . $conn->connect_error);
				 }
				 return $this->dbh;
		}

		function Login($conn, $user ,$pass){
			$sql="SELECT * FROM users where Password='$pass' AND Username='$user'";
			$result = mysqli_query($conn, $sql);
			$row=mysqli_fetch_assoc($result);
			//echo var_dump($row);
		 if($row){
					session_start();
					$_SESSION['name']=$row['Username'];
					$_SESSION['user_id']=$row['id'];
					echo "true";
					//header('location: ../../index.php');
				}
			else{
					echo "false";
			}
		}

		function Login_Validation(){
			session_start();
			if($_SESSION['name']!='' || $_SESSION['user_id']!=''){
				echo true;
			}else{
				echo false;
			}
		}

		function Validate_Email($conn, $email){
			$sql="SELECT * FROM users where email='$email'";
			$result = mysqli_query($conn, $sql);
			$row=mysqli_fetch_assoc($result);
			if ($row) {
					return FALSE;
			}else{
					return TRUE;
			}
		}

		function Validate_Username($conn, $username){
			$sql="SELECT * FROM users where username='$username'";
			$result = mysqli_query($conn, $sql);
			$row=mysqli_fetch_assoc($result);
			if ($row) {
					return FALSE;
			}else{
					return TRUE;
			}
		}

		function Register_Me($conn, $first, $last, $email, $company, $username, $pass){
			$is_valid_email=$this->Validate_Email($conn, $email);
			$is_valid_user =$this->Validate_Username($conn, $username);
			if($is_valid_email){
				if($is_valid_user){
					$sql = "INSERT INTO users (First, Last, Email, Company, Username, Password)
										VALUES ('$first', '$last','$email', '$company', '$username', '$pass')";
						if (mysqli_query($conn,$sql) === TRUE) {
								echo "true";
						}else{
								echo "false";
						}
				}else{
					echo "username";
				}
			}else{
				echo "email";
			}

		}

		function Tag_Name_Duration_Validation($conn, $N , $T, $V, $U){
			$result = mysqli_query($conn, "SELECT * FROM tags WHERE name='$N' AND video_id='$V' AND user_id='$U' order by id desc" );
			$row=mysqli_fetch_assoc( $result );
	    if($row){
					$init_point = str_replace(':', '', $row['duration']);  // duration of last saved point with same name
					$last_point = str_replace(':', '', $T);	// duration of point to be saved with same name

					$point_type = $row['point_type'];

					if($point_type=="IN"){
						if($last_point > $init_point){
							return "OUT_TRUE";
						}
						else if($last_point < $init_point){
							return "OUT_FALSE";
						}else{
							return "OUT_FALSE";
						}
					}
					else{
						return "IN_TRUE";
					}
	      }
	    else{
	        return "IN_TRUE";
	    }
		}

		function Post_Work($conn, $X, $Y, $T, $N, $point_type, $V, $U){

			$sql = "INSERT INTO tags (user_id, video_id, x_axis, y_axis, duration, name, point_type)
							VALUES ('$U', '$V','$X', '$Y', '$T', '$N', '$point_type')";
			if (mysqli_query($conn,$sql) === TRUE) {
					echo "true";
			}else{
					echo "false";
			}
		}

		function show_tags($conn, $video_id, $user_id){
			$sql = "SELECT * FROM tags where video_id='$video_id' AND user_id='$user_id'";
			$result = mysqli_query($conn,$sql);

		//	echo '<table id="testTable" style="width:100%;opacity:1">';
		//	echo 	'<tr style="decoration:none"><th>Name</th><th>Duration</th><th>Point Type</th></tr>';

			while($row = mysqli_fetch_assoc($result)) {
				//$rows[]= $row;
				//echo $row['id'];
			//	echo 	'<tr><td>'.$row["name"].'</td><td>'.$row["duration"].'</td><td>'.$row["point_type"].'</td></tr>';
			//	echo '</table>';
				echo '<li style="color:black;background-color:white">';
							echo "<span style='font-size:21px;font-weight:bold'>".$row["name"]."</span >";
							echo "<span style='margin-right:20px;float:right'>";
							echo $row["duration"];
							echo "</span>";
							echo "<span >";
							echo "<div class='dropdown' style='float:left;'>";
							echo   "<img id='show_option' src='icon/more.png' class='dropbtn' />";
							echo   "<div class='dropdown-content'>";
							echo     "<a id='edit' href='#'>Edit</a>";
							echo     "<a href='#'>Delete</a>";
							echo   "</div>";
							echo "</div>";
							//echo "<img src='icon/more.png' style='margin-right:20px;float:right; margin-top:12px;'>";
							echo "</span>";
							echo "<span id='badge' style='margin:0px 10px;padding:0px 0px;'>";
							echo $row["point_type"]."-Point";
							echo "</span>";
							echo "<hr style='width:350px;margin-top:5px'>";
				echo '</li>';
				echo "<br>";
				echo "<br>";
				echo "<br>";
			}
			//echo json_encode($rows);
		}


		function show_excel_table($conn, $video_id, $user_id){
			$sql = "SELECT * FROM tags where video_id='$video_id' AND user_id='$user_id'";
			$result = mysqli_query($conn,$sql);

			//echo '<table id="testTable" style="width:100%;display:none">';
			//echo 	'<tr style="display:none"><th>Name</th><th>Duration</th><th>Point Type</th></tr>';

			while($row = mysqli_fetch_assoc($result)) {
				$rows[]= $row;
				//echo $row['id'];
				//echo 	'<tr style="display:none;opacity:0.5"><td>'.$row["name"].'</td><td>'.$row["duration"].'</td><td>'.$row["point_type"].'</td></tr>';
				//echo '</table>';
			}
			echo json_encode($rows);
		}

		function show_videos($conn,$user_id){
			$sql = "SELECT * FROM video WHERE user_id='$user_id'";
		  $result = mysqli_query($conn,$sql);
		  $rowcount=mysqli_num_rows($result);

			echo '<br><br>';
					echo '<span style="font-size:34px;font-weight:bold">My Videos</span>';
					echo '<span class="badge badge-primary" style="font-size:14px;margin-left:10px;">'.$rowcount.' Videos</span>';
			echo '<br><br>';
			echo '<div class="row">';

	    while($row = mysqli_fetch_assoc($result)) {
			    echo '<div class="col-md-4">';
				    echo  '<video controls="controls" style="width:80%">';
				    	echo  '<source src="upload/'.$row["video_name"].'" type="video/mp4" />';
							echo  '<source src="upload/'.$row["video_name"].'" type="video/x-flv" />';
							echo  '<source src="upload/'.$row["video_name"].'" type="video/mkv" />';
							echo  '<source src="upload/'.$row["video_name"].'" type="video/3gp" />';
							echo  '<source src="upload/'.$row["video_name"].'" type="video/ogg" />';
							echo  '<source src="upload/'.$row["video_name"].'" type="video/webm" />';
				    echo  '</video>';
				    echo  '<br>';
				    echo  '<a href="index_new.php?id='.$row["v_id"].'" class="btn btn-outline-primary" data-toggle="tooltip" title="Meta-tag">';
				    	echo  '<i class="fa fa-pencil-square-o" aria-hidden="true"><span style="font-size:20px;"> Meta-tag</span></i>';
				    echo  '</a>';
			      echo '<a style="margin-left:5px;"  onclick="Delete_Video('.$row['v_id'].')" class="btn btn-outline-danger" data-toggle="tooltip" title="Delete Video">';
			      	echo '<i class="fa fa-trash" aria-hidden="true"></i>';
			      echo '</a>';
			      echo '<br><br>';
			    echo '</div>';

	    }
			echo '</div>';
		}




















		function get_user_name($id){
			$sql="SELECT * FROM register WHERE id=$id";
			$this->rs=mysql_query($sql);
			var_dump($this->rs);
			$row=$this->fetch_one_assoc();
			//$row=mysqli_fetch_assoc(mysql_query($sql));
			echo $row['username'];
		}

		//Fetch single record as an Associative Array
		function fetch_one_assoc(){
			$ret= array();
			$ret = mysql_fetch_assoc($this->rs);
			return $ret;
		}

		function get_client_ip() {
		    $ipaddress = '';
		    if (isset($_SERVER['HTTP_CLIENT_IP']))
		        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
		    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
		        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		    else if(isset($_SERVER['HTTP_X_FORWARDED']))
		        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
		    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
		        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
		    else if(isset($_SERVER['HTTP_FORWARDED']))
		        $ipaddress = $_SERVER['HTTP_FORWARDED'];
		    else if(isset($_SERVER['REMOTE_ADDR']))
		        $ipaddress = $_SERVER['REMOTE_ADDR'];
		    else
		        $ipaddress = 'UNKNOWN';
		    return $ipaddress;
		}
		//Query Database and Return Resource (For Selection Purpose)
		function query($sql){
			//print "<br> Temporary Shown: Be Patiences ... " . $sql;

			$this->rs=mysql_query($sql,$this->dbh);
			if($this->rs){
				return true;
			}
			else {
				echo "<BR>" . mysql_error() . "-->  $sql<BR>";
				$_ip__ = $_SERVER['REMOTE_ADDR'];
				$HOST = $_SERVER['HTTP_HOST'];
				$URI = $_SERVER['REQUEST_URI'];

				$emsgyz = mysql_error() . " FOR " . $sql . "/r/n/r/n AT $HOST$URI BY $_ip__";


				return false;
			}
		}

		//Query Database and Return True/False (For Insert/Update/Delete)
		function execute($sql){
			//print "<br> Temporary Shown: Be Patiences ... " . $sql;

			if(mysql_query($sql,$this->dbh)){
				return true;
			}
			else {
				echo "<BR>" . mysql_error() . "-->$sql<BR>";
				$_ip__ = $_SERVER['REMOTE_ADDR'];
				$HOST = $_SERVER['HTTP_HOST'];
				$URI = $_SERVER['REQUEST_URI'];

				$emsgyz = mysql_error() . " FOR " . $sql . "/r/n/r/n AT $HOST$URI BY $_ip__";


				return false;
			}
			return false;
		}

		//Fetch Single Record
		function fetch_row(){
			return mysql_fetch_row($this->rs);
		}
		function fetch_row_assoc(){
		return mysql_fetch_assoc($this->rs); //Returns an associative array that corresponds to the fetched row and moves the internal data pointer ahead.
	}

		//Fetch All Records
		function fetch_all(){
			$ret= array();
			$num = $this->get_num_rows();

			for($i=0;$i<$num;$i++){
				array_push($ret,$this->fetch_row());
			}
			return $ret;
		}

		//Fetch Number of Rows Returned
		function get_num_rows(){
			if($this->rs)
				return mysql_num_rows($this->rs);
			else
				return 0;
		}

		//Move in Rows One by One
		function move_to_row($num){
			if($num>=0 && $this->rs){
				return mysql_data_seek($this->rs,$num);
			}
			return 1;
		}

		//Fetch Number of Columns.
		function get_num_columns(){
			return mysql_num_fields($this->rs);
		}


		//Fetch Column Names
		function get_column_names(){
			$nofields= mysql_num_fields($this->rs);
			$fieldnames=array();
			for($k=0;$k<$nofields;$k++)
			{
				array_push($fieldnames,mysql_field_name($this->rs,$k));
			}
			return $fieldnames;
		}

		//Fetch Last Error Produced by MySql (Use for debuging purpose)
		 function debug () {
     	   echo mysql_errno().": ". mysql_error ()."";
   		 }


		//Fetch List of All Db Tables
    	function list_tables () {
     	   $database_name = $this->database_name;
        	return mysql_list_tables($database_name);
    	}

    	 //Fetch MySql Recent Inserted Id
   		 function insert_id () {
     	   return mysql_insert_id ();
    	}

    	//Fetch Records as an Array
    	function fetch_array ($res) {
          return mysql_fetch_array ($res);
    	}

    	//Fetch all record as an Associative Array
    	function fetch_all_assoc(){
			$ret= array();
			while ($row = mysql_fetch_assoc($this->rs)) {
				array_push($ret,$row);
			}
			return $ret;
		}



		function  chkTitle($tbl,$col,$val){
			$qry = "select 1 from ".$tbl." where ".$col." = '".$val."'";
			$result = $this->executeScalar($qry);
			return $result;
		}

		function  selectAll($tbl,$col,$whr,$val){
			$qry = "select ". $col ." as fieldName from ".$tbl." where ".$whr." = '".$val."'";
			$result = $this->executeScalar($qry);
			return $result;
		}

		//Fetch one cell from given query
		function  executeScalar($sql){
			$this->query($sql);
			$row = $this->fetch_row();
			return $row[0];
		}

		//Fetch 2 cell from given query
		function  executeTwise($sql){
			$this->query($sql);
			$row = $this->fetch_row();
			$temp = array();
			$temp[0] =  $row[0];
			$temp[1] =  $row[1];
			return $temp;
		}


		//Close Database Connection
    	function close(){
			mysqli_close($this->dbh);
		}

	}// End of class


	// Utility Functions
	function sql_replace($str){
		$str2 = stripslashes($str);
		//return mysql_real_escape_string($str2);
		return mysql_escape_string($str2);
	}

?>
