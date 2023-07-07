<?php
class GoogleMapAPI{
		
		public $nameWIthAdd;
		public $phoneNumber;
		public $day1= "";
		public $day2= "";
		public $day3= "";
		public $day4= "";
		public $day5= "";
		public $day6= "";
		public $day7= "";
		public $website;
		
		function __construct($address){
			
              //$tickn = strtolower($tick);
            $allvalues = $this->opinion($address);
			$this->nameWIthAdd = $allvalues["nameWIthAdd"];
            $this->phoneNumber = $allvalues["phoneNumber"];
            $this->day1 = $allvalues["day1"];
            $this->day2 = $allvalues["day2"];
            $this->day3 = $allvalues["day3"];
            $this->day4 = $allvalues["day4"];
            $this->day5 = $allvalues["day5"];
            $this->day6 = $allvalues["day6"];
            $this->day7 = $allvalues["day7"]; 
            $this->website = $allvalues["website"];		  
		}
		//START THE FUNCTION 
			 function opinion($address){
				$nameWIthAdd = $address;	
				$address = str_replace("-","",$address);
				$address = str_replace(".","",$address);
				$address = str_replace(",","",$address);
				
				$address = urlencode($address);
				 $arrContextOptions=array(
					"ssl"=>array(
			        "verify_peer"=>false,
			        "verify_peer_name"=>false,
							),
						);  
					$url1 = "https://maps.googleapis.com/maps/api/geocode/json?address=$address&key=AIzaSyBRkdcfuduhpP_lGJ1MDxTxm14-SKiAcnc";
					
					$response = file_get_contents($url1, false, stream_context_create($arrContextOptions));

						$placeID = "";
						$apidata = json_decode($response);
						$d = get_object_vars($apidata);
						if(isset($d['results'][0])){
							$placeID = $d['results'][0]->place_id;	
						}
						
						$phoneNumber = "";
						$url="";
						$website="";
			
					if($placeID!=""){
								$url2 = "https://maps.googleapis.com/maps/api/place/details/json?placeid=$placeID&key=AIzaSyBRkdcfuduhpP_lGJ1MDxTxm14-SKiAcnc";
								$response2 = file_get_contents($url2,false,stream_context_create($arrContextOptions));
								$apidata2 = json_decode($response2);

								$data2 = get_object_vars($apidata2);
									
										if($data2['result']->international_phone_number!=null)
										{
												$phoneNumber = $data2['result']->international_phone_number;
														//echo $phoneNumber."<br/>";
										}	
								// $day1="";
								// $day2="";
								// $day3="";
								// $day4="";
								// $day5="";
								// $day6="";
								// $day7="";
								if(isset($data2['result'])){
									
									
									 if(array_key_exists('opening_hours',$data2['result'])){
												$numberOfDays = count($data2['result']->opening_hours->weekday_text);
												$day1 = $data2['result']->opening_hours->weekday_text[0];
												$day2 = $data2['result']->opening_hours->weekday_text[1];
												$day3 = $data2['result']->opening_hours->weekday_text[2];
												$day4 = $data2['result']->opening_hours->weekday_text[3];
												$day5 = $data2['result']->opening_hours->weekday_text[4];	
												$day6 = $data2['result']->opening_hours->weekday_text[5];
												$day7 = $data2['result']->opening_hours->weekday_text[6];
												$day1 =  preg_replace("/[^a-z A-Z0-9:]/", "", $day1);
												$day2 =  preg_replace("/[^a-z A-Z0-9:]/", "", $day2);
												$day3 =  preg_replace("/[^a-z A-Z0-9:]/", "", $day3);
												$day4 =  preg_replace("/[^a-z A-Z0-9:]/", "", $day4);
												$day5 =  preg_replace("/[^a-z A-Z0-9:]/", "", $day5);
												$day6 =  preg_replace("/[^a-z A-Z0-9:]/", "", $day6);
												$day7 =  preg_replace("/[^a-z A-Z0-9:]/", "", $day7);	
										 }//END IF CONDITION
												$url = $data2['result']->url;
										if(array_key_exists('website',$data2['result'])){
											 		$website = $data2['result']->website;
										}//END IF CONDITION		
								}//END IF CONDITION HERE
								
						}//EDN PLACE id CHECK POINT
								

							return 
								array(
									"nameWIthAdd"=>$nameWIthAdd,
									 "phoneNumber"=>$phoneNumber,
									 "day1"=>$day1,
									 "day2"=>$day2,
									 "day3"=>$day3,
									 "day4"=>$day4,
									 "day5"=>$day5,
									 "day6"=>$day6,
									 "day7"=>$day7,
									 "website"=>$website,
								);	
			 }//end function 
}//end class  

// $api = new GoogleMapAPI("DK ASSOCIATION, LLC D/B/A GREAT PLAY DORAL	3470 NW 82 AVENUE, SUITE 101-A DORAL FL 33122");
// echo "<pre>";
// print_r($api);
// echo "</pre>";
