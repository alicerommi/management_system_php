<?php
include 'includes/simple_html_dom.php';
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ERROR | E_PARSE);
$file = new SplFileObject("textFiles/debatorNames.txt");
$date = date("d-m-Y");
$time = date("h-i");
$fileW = fopen("output2/data".$date."_".$time.".csv ","w");
//making headers for csv file
while (!$file->eof()){
			$myvalue = $file->fgets();
			$myvalue = str_replace(",", "",$myvalue);
			$myvalue = str_replace(".", "",$myvalue);
			$myvalue = str_replace(" ","+",$myvalue);
			$url = preg_replace('/\s+/','',"https://411.info/search/?q=$myvalue&l=Florida");
			$data = file_get_html($url);
				if($data!=""){
						$listing = $data->find('div.listings',0);
						$size = count($listing->children());
						//echo $size;
						$name = "";	
						$phoneNumber = "";
						$location  = "";
						for($i=1;$i<$size-1;$i++){
							$name =  $listing->children($i)->children(0)->children(0)->children(0)->children(1)->plaintext;
							$name = $name."\n";
							echo $name."<br/>";
							$phoneNumber = $listing->children($i)->children(0)->children(0)->children(0)->children(2)->plaintext;
							echo $phoneNumber."<br/>";
							$phoneNumber  = $phoneNumber."\n";
							$location = $listing->children($i)->children(0)->children(0)->children(0)->children(3)->plaintext;
							echo $location."<br/>";
							$location = $location."\n";

							// $dataWW = array(
							// 	array(
							// 		$myvalue,
							// 		$name,
							// 		$phoneNumber,
							// 		$location
							// 	)
							// );

						}
						echo "<hr/>";
			}//end if condition
			else{
				echo "NO DATA"."<hr/>";
				$str = "No Data";
				$dataWW = array(
								array(
									$myvalue,
									$str
									)
							);
			}

				foreach ($dataWW as $row)
						{
						    fputcsv($fileW, $row);
						}
}//end while loop here
