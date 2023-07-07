<?php
// include 'includes/simple_html_dom.php';
// $url = "http://search.sunbiz.org/Inquiry/CorporationSearch/SearchResultDetail?inquirytype=EntityName&amp;directionType=Initial&amp;searchNameOrder=IANNUZZICONSTRUCTION%20P050000963520&amp;aggregateId=domp-p05000096352-b042be24-344e-4c07-b4b2-7cb71b960ab8&amp;searchTerm=IANNUZZELLIBENNYN&amp;listNameOrder=IANNUZZICONSTRUCTION%20P050000963520";
// $url = "http://search.sunbiz.org/Inquiry/CorporationSearch/SearchResultDetail?inquirytype=EntityName&amp;directionType=Initial&amp;searchNameOrder=SOLESLAY%20L170001091980&amp;aggregateId=flal-l17000109198-f51ce429-dd93-481c-b11e-833098a5ac98&amp;searchTerm=SOLESJASONCLINSTON&amp;listNameOrder=SOLESLAY%20L170001091980";
class dom{
      public $FN0;
      public $FN1; 
      public $FN2;
      public $lastName0;
      public $lastName1;
      public $lastName2;
      public $title0;
      public $title1;
      public $title2;
      public $address0;
      public $address1;
      public $address2;
      public $pdfLink;
      function __construct($link){
              //$tickn = strtolower($tick);
              $allvalues = $this->opinion($link);
              $this->pdfLink = $allvalues["pdfLink"];
              $this->FN0 = $allvalues["FN0"];
              $this->FN1 = $allvalues["FN1"];
              $this->FN2 = $allvalues["FN2"];
              $this->lastName0 = $allvalues["lastName0"];
              $this->lastName1 = $allvalues["lastName1"];
              $this->lastName2 = $allvalues["lastName2"];
              $this->title0 = $allvalues["title0"];
              $this->title1 = $allvalues["title1"];
              $this->title2 = $allvalues["title2"];
              $this->address0 = $allvalues["address0"];
              $this->address1 = $allvalues["address1"];
              $this->address2 = $allvalues["address2"];
              $this->pdfLink = $allvalues["pdfLink"];
              // $this->mailingAddress = $allvalues['mailingAddress'];
              // $this->FEInumber= $allvalues['FEInumber'];
                  }


          function opinion($url){


                            $url = str_replace("amp;","", $url);
                            // echo $url;
                            // die;
                             $html = file_get_contents($url); //get the html returned from the following url

                                    $pokemon_doc = new DOMDocument();

                                    libxml_use_internal_errors(TRUE); //disable libxml errors

                                    // if(!empty($html)){ //if any html is actually returned

                                    $pokemon_doc->loadHTML($html);
                                    libxml_clear_errors(); //remove errors for yucky html
                                
                                $pokemon_xpath = new DOMXPath($pokemon_doc);

                                //get all the h2's with an id
                                $main = $pokemon_xpath->query('//*[@id="maincontent"]/div[2]/div[6]/');
                                $titleQuery0 = $pokemon_xpath->query('//*[@id="maincontent"]/div[2]/div[6]/span[3]');
                                $fullNameQuery0 = $pokemon_xpath->query('//*[@id="maincontent"]/div[2]/div[6]/text()');
                                $fullAddressQuery0 = $pokemon_xpath->query('//*[@id="maincontent"]/div[2]/div[6]/span[4]/div');
                                
                                $FN0 = "";
                                $FN2 = "";
                                $FN1 = "";
                               	$title0  = "";
                               	$fullName0 = "";
                               	$address0 = "";
                                $lastName2= "";
                                $lastName1="";
                                $lastName0="";   
                                /////////////////////////////////////////////////////////////////// for first
                                if($titleQuery0->length>0)
                              	{  
                              		$title0 =   str_replace("Title", "",$titleQuery0[0]->nodeValue);
                              	}
                              	
                              	if($fullNameQuery0->length>0)
                              	{
                              			
                              	  		$fullName0 =  $fullNameQuery0[4]->nodeValue;
                                      $namePieces0 = explode(",", $fullName0);
                                      $FN0 = $namePieces0[0];
                                      $lastName0 = $namePieces0[1];
                              		
                              	 }
                            	if($fullAddressQuery0->length>0){	  	
                              		 $address0 = $fullAddressQuery0[0]->nodeValue;

                              	}

                              
                              	// echo $title0;
                              	// echo "<br/>";
                              	// echo $fullName0;
                              	// echo "<br/>";
                              	// echo $fullAddress0;
                              	// echo "<hr/>";

                              	////////////////////////////////////////////////////////////////////////
                              	//for second 
                              	$title1  = "";
                               	$fullName1 = "";
                               	$address1 = "";


                               	$titleQuery1  = $pokemon_xpath->query('//*[@id="maincontent"]/div[2]/div[6]/span[5]');
                               	if($titleQuery1->length>0){
                               		$title1 = str_replace("Title", "", $titleQuery1[0]->nodeValue);
                               	}

                            	if($fullNameQuery0->length>6)
                            	{
                              	  	$fullName1 = $fullNameQuery0[7]->nodeValue;
                                     $namePieces1 = explode(",", $fullName1);
                                      $FN1 = $namePieces1[0];
                                      $lastName1 = $namePieces1[1];
                            	}


                            	$fullAddressQuery1 = $pokemon_xpath->query('//*[@id="maincontent"]/div[2]/div[6]/span[6]/div');
                            		if($fullAddressQuery1->length>0)
                            			{$address1 = $fullAddressQuery1[0]->nodeValue;}
                            	
                            	// echo $title1."<br/>";

                            	// echo $fullName1."<br/>";

                            	// echo $fullAddress1."<hr/>";


                            //////////////////////////////////////////////////////////for third

                            	$title2  = "";
                               	$fullName2 = "";
                               	$address2 = "";

                               	$titleQuery2 = $pokemon_xpath->query('//*[@id="maincontent"]/div[2]/div[6]/span[7]');
                               	if($titleQuery2->length>0){
                               			$title2 = str_replace("Title","", $titleQuery2[0]->nodeValue);
                               	}

                               	if($fullNameQuery0->length>9)
                            	{
                              	  	$fullName2 = $fullNameQuery0[10]->nodeValue;
                                     $namePieces2 = explode(",", $fullName2);
                                      $FN2 = $namePieces2[0];
                                      $lastName2 = $namePieces2[1];
                            	}

                            	$fullAddressQuery2 = $pokemon_xpath->query('//*[@id="maincontent"]/div[2]/div[6]/span[8]/div/text()');
                            	if($fullAddressQuery2->length>0){

                            			$address2 = $fullAddressQuery2[0]->nodeValue."".$fullAddressQuery2[1]->nodeValue;
                            		
                            	}
                            
                                        $data = file_get_html($url);

                                        $table = $data->find("div.searchResultDetail",0);
                              
                              $size =  count($table->children(9)->children(1)->children());
                                  
                            foreach($table->children(9)->children(1)->children($size-1)->find('a') as $element) 
                                            {     
                                                  $pdfLink =  $element->href;
                                            }
                                                   $pdfLink = "http://search.sunbiz.org".$pdfLink;

        $FN0 = preg_replace('/\s+/', ' ', $FN0);
        $FN1 = preg_replace('/\s+/', ' ',$FN1);
        $FN2 = preg_replace('/\s+/', ' ',$FN2);


        $address0 = preg_replace('/\s+/', ' ', $address0);
        $address1 = preg_replace('/\s+/', ' ',$address1);
        $address2 = preg_replace('/\s+/', ' ',$address2);

        $title0 = preg_replace("/[^a-zA-Z]/", "", $title0);
        $title1 = preg_replace("/[^a-zA-Z]/", "", $title1);
        $title2 = preg_replace("/[^a-zA-Z]/", "", $title2);

                                                    return 
                                                          array(
                                                            //"FEInumber"=>$FEInumber, 
                                                        "title0"=>$title0,
                                                        // $firstName[0],
                                                        "FN0"=>$FN0,
                                                        "lastName0"=>$lastName0,
                                                        "address0"=>$address0,

                                                        "title1"=>$title1,
                                                        "FN1"=>$FN1,
                                                        "lastName1"=>$lastName1,
                                                        "address1"=>$address1,

                                                        "title2"=>$title2,
                                                        "FN2"=>$FN2,
                                                        "lastName2"=>$lastName2,
                                                        "address2"=>$address2,
                                                        "pdfLink"=>$pdfLink,
                                                      );
                                }//end functin here
}



    ?>

    <?php

// $url = "http://search.sunbiz.org/Inquiry/CorporationSearch/SearchResultDetail?inquirytype=EntityName&amp;directionType=Initial&amp;searchNameOrder=SOLESLAY%20L170001091980&amp;aggregateId=flal-l17000109198-f51ce429-dd93-481c-b11e-833098a5ac98&amp;searchTerm=SOLESJASONCLINSTON&amp;listNameOrder=SOLESLAY%20L170001091980";
//    $av = new dom($url);
//    //$a =    preg_replace('/\s+/', ' ',$av->title0);
//    $a = preg_replace("/[^a-zA-Z]/", "", $av->title0);
//    echo $a;
