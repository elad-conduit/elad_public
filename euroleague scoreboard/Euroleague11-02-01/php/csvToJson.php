<?php

if (($handle = fopen("path.csv", "r")) !== FALSE) 
{
	$jsonResult = '{';
	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		
	$jsonResult.= '"'.$data[0].'":"'.$data[1].'",';
	}
	fclose($handle);
}
$outgoing = substr_replace($jsonResult,"",-1); 
$outgoing.= '}';

echo $outgoing;


?>