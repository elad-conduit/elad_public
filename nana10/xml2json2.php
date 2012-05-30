<?php
	header('Content-Type: text/json; charset=UTF-8');
	$xmlUrl = "http://ws.nana10.co.il/IPhone/Category.asmx/GetMain?instanceID=300803&serviceID=120";
	$xmlUrl = simplexml_load_file($xmlUrl);	
	echo urldecode(json_encode($xmlUrl));	

	//echo Zend_Json::encode($xmlUrl);

?>


