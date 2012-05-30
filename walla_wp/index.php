<?php
	
	$txtUrl = "http://storage.conduit.com/90/229/CT2296690/Downloads/setup.txt";
	$txtUrl = file_get_contents($txtUrl);	
	
	$arr1 = explode("_START_PAGE_URL_=", $txtUrl);
	$arr2 = explode("_TOOLBAR_LANGUAGE_=", $arr1[1]);
	
	header("Location: $arr2[0]"); 
	
	//echo $arr2[0];	

	//echo Zend_Json::encode($xmlUrl);

?>


