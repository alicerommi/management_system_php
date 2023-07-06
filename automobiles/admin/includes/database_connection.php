<?php
				///////////////for localhost
				// $conn = mysqli_connect("localhost","root","","automobiles_db");
				// if(!$conn){
				// 	echo "Database is not connected..";
				// 	die;
				// }

				// for server
				
				$conn = mysqli_connect("srv38","zamarket_automobiles_user","U-+X9o+Z?cVF","zamarket_automobiles");
				if(!$conn){
					echo "Database is not connected..";
					die;
				}
$company_name = "GBH2";
?>