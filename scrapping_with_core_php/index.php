<?php
/*
according ot the requirements of client
UCC File Date, Secured Party Name, Secured Party Address, Debtor Name1, Debtor Address1, Debtor Name2, Debtor Address2, Debtor Name3, Debtor Address3
*///Maked by Abdul Rehman
// error_reporting(0);
error_reporting(E_ALL ^ E_NOTICE);
include 'includes/simple_html_dom.php';
include 'includes/GapiC.php';
include 'includes/dom.php';
//for covering the third pasrt i am making a text file
$date = date("d-m-Y");
$time = date("h-i");
// $txt_file = 'programTextFiles/ptextfile'.$date."_".$time.".txt";
// $handle = fopen($txt_file, 'w') or die('Cannot open file:  '.$txt_file); //open file for writing ('w','r','a').
ini_set('max_execution_time', 100000); 
//making a csv file
//"smaple".date("y-m-d");
$fileW = fopen("CSVFiles/data".$date."_".$time.".csv ","w");
//making headers for csv file
$dataWW = array(
							array(
							"Record Number",
							"UCC File Date",	

							"Secured Party Name",
							"Secured Party Address",
		
							"Debtor Name1",
							"Debtor Address1",

							"Debtor Name2",
							"Debtor Address2",

							"Debtor Name3",
							"Debtor Address3",

							"Phone Number",
							"Industry",

							"YellowPage URL",

							"Title1",
							"FirstName1",	
							"LastName1",
							"Address1",

							"Title2",
							"FirstName2",	
							"LastName2",
							"Address2",

							"Title3",
							"FirstName3",	
							"LastName3",
							"Address3",
							"pdf File Path",
							
							"Debator Name And Address",
							"phoneNumber",
							"Day1",
							"Day2",
							"Day3",
							"Day4",
							"Day5",
							"Day6",
							"Day7",
							"webite",

							),
							
					);

						foreach ($dataWW as $row)
						{
						    fputcsv($fileW, $row);
						}
	
//for reading
$file = new SplFileObject("sample100Recordsfirst.txt");
$i =0 ;
while (!$file->eof()) {


			$phoneNumber = "";
			$industry = "";		
			$debNameAndaddress = array();
  		 	$myvalue = $file->fgets();
  		 	$myvalue = trim($myvalue);
			$url = "https://www.floridaucc.com/uccweb/SearchResultsDetail.aspx?sst=&sov=6&sot=Document%20Number&st=$myvalue&fn=$myvalue&rn=1&ii=Y&ft=1";//201608493642
			$data = file_get_html($url);
			//find table 
			$table = $data->find("table#SearchResultDetailMainTable",0);
			//check point 
			$RecordNumber = $table->find("tr#DetailRecord",0)->children(0)->plaintext;
			$RecordNumber = str_replace("Detail Record For: ", "", $RecordNumber); //it contains record number
			// echo $RecordNumber."<br/>";
			//for getting the Sec name and address
			$SecNameAndAddress = $table->find("td#SecPartyInfo",0);
			//couting the number of lines for the name and Address
			$SecLine = explode("<br/>",$SecNameAndAddress);	 
			$SecName =  strip_tags(@$SecLine[0]);
			$SecAddress = strip_tags(@$SecLine[1]);
			
			//for getting the DebPartyInfo
			 $DebPartyInfo = $table->find("td#DebPartyInfo",0);
				
			$children = count($DebPartyInfo->children());
			
			// for countng the elements
				$html = file_get_contents($url);
		 		$doc = new DOMDocument();
				libxml_use_internal_errors(TRUE);
				$doc->loadHTML($html);
			    $xpath = new DOMXPath($doc);
			    

		
			for($k=1;$k<=$children;$k++){
				
				$path = '//*[@id="DebPartyInfo"]/text()['.$k.']';
				$row = $xpath->query($path);

					//echo $stock_prices_row->item(0)->textContent;
				array_push($debNameAndaddress,$row->item(0)->textContent);
			}
			
				//it will read the number of lines whivh have been extracted before saving into the excel sheet
				
			// $testHTML = file_get_contents($DebPartyInfo);
			// echo $testHTML;

			//for getting the filled date
			$tableFirst = $data->find("table#StatusGridView",0)->children(1);

			$filledDate = $tableFirst->children(1)->plaintext;

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//getting data from yp.com using the debtor address 


					
$str = $debNameAndaddress[1];
//it will separte the debators address in form of code and remove the starting address

$piecesYP = explode(" ",$str);
$numberOfSubStrings = sizeof($piecesYP);
$location = $piecesYP[$numberOfSubStrings-1];
//echo $location;
$wholeBusinessName = "";

for($o=1;$o<$numberOfSubStrings-1;$o++){
			
			if($o!=1){
				$wholeBusinessName = $wholeBusinessName."+".$piecesYP[$o];
			}else{
				$wholeBusinessName = $piecesYP[$o];
			}
	
}

				$wholeBusinessName=str_replace('#', '', $wholeBusinessName);
				$wholeBusinessName=str_replace('BOX ', '', $wholeBusinessName);
				

				$urlYP = "https://www.yellowpages.com/search?search_terms=$wholeBusinessName&geo_location_terms=$location";

			$dataYP = file_get_html($urlYP);
			 if($dataYP==null){ //main check point 
			// echo "null";
			 			 }else{    
			 			 //	echo "ss";
			 			 	// echo $urlYP;
			 			 	// die;

			 			 	//*[@id="no-results-main"]

			 			 	 $html = file_get_contents($urlYP); //get the html returned from the following url

                                    $pokemon_doc = new DOMDocument();

                                    libxml_use_internal_errors(TRUE); //disable libxml errors

                                    // if(!empty($html)){ //if any html is actually returned

                                    $pokemon_doc->loadHTML($html);
                                    libxml_clear_errors(); //remove errors for yucky html
                                ////*[@id="no-results-main"]/h4
                                $pokemon_xpath = new DOMXPath($pokemon_doc);
                                $queryDATA = $pokemon_xpath->query('//*[@id="no-results-main"]');

                                $check3 = $pokemon_xpath->query('//*[@id="no-results-main"]/h4');
                                //print_r($check3);
                                $flagCheck3 = "";
                                $flag3 = true;
                                if($check3->length>0){
                                			 $flagCheck3 = $check3[0]->nodeValue;
                                			 if($flag3[0]=="N"){
                                			 	$flag3=false;
                                			 }
                            		}

                                // echo $urlYP;
                                // die;

            if($queryDATA->length>0 && $flag3){                  
			$checkMan = $dataYP->find("div#content-container",0)->find("div#content",0);
			
			$ch = count($checkMan->children());
			if($ch==1){
				$phoneNumber ="";
					$industry  ="";
			}else 
			{

							$checkPoint = $dataYP->find("div.scrollable-pane",0)->find("div.pagination",0);
							$chunks =  explode("results",$checkPoint->plaintext);
							$TotalNumberOfResults = filter_var($chunks[0], FILTER_SANITIZE_NUMBER_INT);
							if($TotalNumberOfResults>0){
							 	$tableYP = $dataYP->find("div.scrollable-pane",0)->find("div.organic",0);
												
								$rowYP =  $tableYP->children(1)->children(0)->children(1)->find("div.info-primary",0);
												
								$row2YP = $tableYP->children(1)->children(0)->children(1)->find("div.categories",0);
								$phoneNumber= strip_tags($rowYP->children(1)->plaintext);
								$phoneNumber = str_replace("&nbsp;", "",$phoneNumber);
								$industry =  str_replace("&amp;","",$row2YP->plaintext);
								}		 
		}//end else

		}//queryDATA->length
		else{
			   $phoneNumber ="";
					$industry  ="";
				}


	}//main check whether data or rows are exists in yp according to passing url
	



			//echo $TotalNumberOfResults;

//third task 
		$FN0  = "";
$FN1  = "";
$FN2  = "";
$lastName0  = "";
$lastName1  = "";
$lastName2  = "";
$title0  = "";
$title1  = "";
$title2  = "";
$address0  = "";
$address1  = "";
$address2  = "";
$pdfLink  = "";



			$debatorNameIndexAt2 = "";
			$debatorNameIndexAt3 = "";
			$debatorNameIndexAt4 = "";
			$debatorNameIndexAt5 = "";
			// 	//for getting the FEI number mailing address and pdflink (third task)
			// $FEInumber1="";
			// $mailingAddress1="";

			$link1="";
			$link2 ="";
			$link3  = "";

			$link1 = getDataThird($debNameAndaddress[0]);
			if($link1!=""){
				$scrape1 = new dom($link1);
				   $FN0=$scrape1->FN0;
				     $FN1=$scrape1->FN1;
				       $FN2=$scrape1->FN2;
				         $lastName0=$scrape1->lastName0;
				           $lastName1=$scrape1->lastName1;
				            $lastName2= $scrape1->lastName2;
				              $title0= $scrape1->title0;
				               $title1=$scrape1->title1;
				               $title2=$scrape1->title2;

				               $address0=$scrape1->address0;
				               $address1=$scrape1->address1;
				               $address2=$scrape1->address2;
				               $pdfLink=$scrape1->pdfLink;

			}

			if(isset($debNameAndaddress[2])) {
   					 $debatorNameIndexAt2 = $debNameAndaddress[2];
   					
   					$link2 = getDataThird($debNameAndaddress[2]);
   					if($link2!=""){
   						$scrape1 = new dom($link2);
				  		 $FN0=$scrape1->FN0;
				     $FN1=$scrape1->FN1;
				       $FN2=$scrape1->FN2;
				         $lastName0=$scrape1->lastName0;
				           $lastName1=$scrape1->lastName1;
				            $lastName2= $scrape1->lastName2;
				              $title0= $scrape1->title0;
				               $title1=$scrape1->title1;
				               $title2=$scrape1->title2;

				               $address0=$scrape1->address0;
				               $address1=$scrape1->address1;
				               $address2=$scrape1->address2;
				               $pdfLink=$scrape1->pdfLink;
   					}

   					
			}
			if(isset($debNameAndaddress[3])) {
   					 $debatorNameIndexAt3 = $debNameAndaddress[3];

			}
			if(isset($debNameAndaddress[4])) {

   					 $debatorNameIndexAt4 = $debNameAndaddress[4];
   					 $link3 = getDataThird($debNameAndaddress[2]);
   					 if($link3!=""){
   					 	$scrape1 = new dom($link3);
				   $FN0=$scrape1->FN0;
				     $FN1=$scrape1->FN1;
				       $FN2=$scrape1->FN2;
				         $lastName0=$scrape1->lastName0;
				           $lastName1=$scrape1->lastName1;
				            $lastName2= $scrape1->lastName2;
				              $title0= $scrape1->title0;
				               $title1=$scrape1->title1;
				               $title2=$scrape1->title2;

				               $address0=$scrape1->address0;
				               $address1=$scrape1->address1;
				               $address2=$scrape1->address2;
				               $pdfLink=$scrape1->pdfLink;
   					 }
			}

			if(isset($debNameAndaddress[5])) {
   					 $debatorNameIndexAt5 = $debNameAndaddress[5];
			}
		////////////////////////////////////////////////////////////////////////
			//write into the text file
			//if($link1=="" && $link2=="" && $link3==""){ 
			// 			$text = "recordNumber=".$myvalue."deb=".$link1."deb=".$link2."deb=".$link3;
					/////////////here i am gonna to join with the old program.
			// //}
			// 			fwrite($handle, $text."\n");
			//writing into csv file 
			//using the google api ..  
									$nameWIthAdd = "";
									$phoneNumber = "";
									$day1 = "";
									$day2 = "";
									$day3 = "";
									$day4 = "";
									$day5 = "";
									$day6 = "";
									$day7 = "";
									$website = "";
									
			$paramter = $debNameAndaddress[0]." ".$debNameAndaddress[1];
			$GoogleApi = new GoogleMapAPI($paramter);
									$nameWIthAdd = $GoogleApi->nameWIthAdd;
									$phoneNumber = $GoogleApi->phoneNumber;
									$day1 = $GoogleApi->day1;
									$day2 = $GoogleApi->day2;
									$day3 = $GoogleApi->day3;
									$day4 = $GoogleApi->day4;
									$day5 = $GoogleApi->day5;
									$day6 = $GoogleApi->day6;
									$day7 = $GoogleApi->day7;
									$website = $GoogleApi->website;
			/////////////////////////////////////////////////////
			$dataW = array(
							array(
							
							$myvalue,
							
							$filledDate,

							$SecName,

							$SecAddress,

							$debNameAndaddress[0],

							$debNameAndaddress[1],

							$debatorNameIndexAt2,
							
							$debatorNameIndexAt3,

							$debatorNameIndexAt4,

							$debatorNameIndexAt5,
							//$debatorNameIndexAt6,
							$phoneNumber,
							$industry,
							//$debNameAndaddress[6],
							$urlYP,

							$title0,
							$FN0,
							$lastName0,
							$address0,

							$title1,
							$FN1,
							$lastName1,
							$address1,

							$title2,
							$FN2,
							$lastName2,
							$address2,
							$pdfLink,
							
							$nameWIthAdd,
							$phoneNumber,
							$day1,
							$day2,
							$day3,
							$day4,
							$day5,
							$day6,
							$day7,
							$website,
							),
						);

						foreach ($dataW as $row)
						{
						    fputcsv($fileW, $row);
						}
						
						$i++;
						if($i%10==0){

							echo $i." Has Been Wriiten in csv file"."<hr/>";
						}									
}//end while loop here
// Close the file

function getDataThird($Dname){
				$Dname = str_replace(" ","",$Dname);	


				// IANNUZZELLIBENNYN
			//	$urlF = "http://search.sunbiz.org/Inquiry/CorporationSearch/SearchResults?inquiryType=EntityName&searchNameOrder=IANNUZZELLIBENNYN&searchTerm=IANNUZZELLIBENNYN";


				$urlF = "http://search.sunbiz.org/Inquiry/CorporationSearch/SearchResults?inquiryType=EntityName&searchNameOrder=$Dname&searchTerm=$Dname";

				//  echo $urlF;
				// die;

				//echo "k is: ".$k." URL is: ".$url."<br/>";
				$doc = file_get_html($urlF);
				$table = $doc->find("table",0);
				// echo $table;
				// die;
				$status =  $table->children(1)->children(0)->children(2)->plaintext;
				
				$pageLink = "";
				if($status=="Active"){
						//echo $url;
						//die;
						$path = $table->children(1)->children(0)->children(0)->plaintext;
						
						$link = $table->children(1)->children(0)->find('a',0);
						
						$pageLink   = "http://search.sunbiz.org".$link->href;
						//echo $pageLink."<br/>";
					}else{
						$pageLink="";
					}

					return $pageLink;
}
//close the csv file which is to be written
fclose($fileW);
//close the text file.. 
// fclose($handle);
?>