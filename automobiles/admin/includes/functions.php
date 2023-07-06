<?php
function get_requested_page_uri($str){
	        $bb = explode("/",$str);
	        $d =  $bb[sizeof($bb)-1];
	        #$variable = substr($d, 0, strpos($d, "?"));
	        if(strpos($str , '?' ) !== false)
      				return substr($d, 0, strpos($d, "?"));
	        else 
	        	return $d;
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function human_timedate($date){
    if ($date!=null)
      return date("d-m-Y h:i:sa",strtotime($date));
    else
      return "N/A";
} 

function getName($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $randomString = ''; 
  
    for ($i = 0; $i < $n; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 
  
    return $randomString; 
} 


#echo get_requested_page_uri("http://localhost/binary6/fiverr/save_energy/admin/add_energy_providers.php");
?>