<?php
         //set time zone
       //this file includess all types of customs functions
        require 'date_classes/autoload.php'; #date lib for manipulation
        use Jenssegers\Date\Date;
        use Carbon\Carbon;
        use Carbon\CarbonInterval;
       
        
	   //date_default_timezone_set("Asia/Karachi");

       function addDollar($str){
            return "$".$str;
       }
         function message($msg,$type){
            echo '<div class="alert alert-'.$type.' text-center">'.$msg.'</div>';
       }


   function base64url_encode($data) {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }   

    function base64url_decode($data) {
         return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
    }


	function convert_date($date){
		$str = date('d-m-Y',strtotime($date));
		return $str;
	}
    function current_time(){
        $date = new Date();
        $date->setTimezone($GLOBALS['timezone']);
        return $date->format("h:i:s");
    } 

     function current_time_date(){
        $date = new Date();
        $date->setTimezone($GLOBALS['timezone']);
        return $date;
    } 
    function current_date(){
        //$str = date('d-m-Y',strtotime($date));
        $date = date("Y-m-d");
        return $date;
    } 

	function sql_timeconvert($str){
		$str =  date("H:i", strtotime($str));
		return $str;
	}
	function sql_dateconvert($sql){
		// $date = str_replace("/", "-",$str);
		$date = date("Y-m-d",strtotime($sql));
		return str_replace("/", "-",$date);
	}
	  //it will connvert the database time and date into am and pm human readable format .. 
             function human_timedate($date){
                   $time=substr ($date,11);
                    $time_in_12_hour_format  = date("g:i a", strtotime($time));
                    $dt = trim(substr($date,0,10)); 
                    list($year,$month,$day) = explode("-",$dt);
                    $finalDate = $day."/".$month."/".$year;
                    $time_date = $finalDate." ".$time_in_12_hour_format;
                    return $time_date; 
              } 
             function current_dateTime(){
             	 //return date("Y-m-d h:i:sa");
                 $date = new Date();
                $date->setTimezone($GLOBALS['timezone']);
                 return $date->format("Y-m-d h:i:sa");
             } 	
             
               //used in calculations 
             function perItemPrice($totalAmount,$quantity){ //items, with quantity
             			return round($totalAmount/$quantity,2);
             }

             function checkddate($str){
             		if($str=="0000-00-00"){
             			$str = "";
             		}
             		return $str;
             }

                //this function will generate the unique id throughout the timestamp
                function generate_unique_id(){
                    $now = new DateTime();
                    return $now->getTimestamp(); 
                }
                
                function dateDifference($date1, $date2)
                {
                                    
                                    $date1=strtotime($date1);
                                    $date2=strtotime($date2); 

                                    $diff = abs($date1 - $date2);
                                    $day = $diff/(60*60*24); // in day
                                    $dayFix = floor($day);
                                    $dayPen = $day - $dayFix;
                                    if($dayPen > 0)
                                    {
                                    $hour = $dayPen*(24); // in hour (1 day = 24 hour)
                                    $hourFix = floor($hour);
                                    $hourPen = $hour - $hourFix;
                                    if($hourPen > 0)
                                    {
                                    $min = $hourPen*(60); // in hour (1 hour = 60 min)
                                    $minFix = floor($min);
                                    $minPen = $min - $minFix;
                                    if($minPen > 0)
                                    {
                                    $sec = $minPen*(60); // in sec (1 min = 60 sec)
                                      $secFix = floor($sec);
                                    }
                                    }
                                    }
                                    $str = "";
                                    if($dayFix > 0)
                                    $str.= $dayFix." day ";
                                    if($hourFix > 0)
                                    $str.= $hourFix." hour ";
                                    if($minFix > 0)
                                    $str.= $minFix." min ";
                                    // if($secFix > 0)
                                    // $str.= $secFix." sec ";
                                    return $str;
                                }

function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function get_future_date($month){
                    if ($month==1)
                        $month = "1 month";
                    else
                        $month = $month." months";    
                    return new Date($month);
}

function get_requested_page_uri($str){
        $bb = explode("/",$str);
        $d =  $bb[sizeof($bb)-1];
        $variable = substr($d, 0, strpos($d, "?"));
        return $variable;
}

function get_random_image_name($ext,$img_type){
    return $img_type."_".generateRandomString(rand(5,20))."_".generate_unique_id().".".$ext;
}

function getToken($length){
     $token = "";
     $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
     $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
     $codeAlphabet.= "0123456789";
     $max = strlen($codeAlphabet);

    for ($i=0; $i < $length; $i++) {
        $token .= $codeAlphabet[random_int(0, $max-1)];
    }

    return $token;
}


?>