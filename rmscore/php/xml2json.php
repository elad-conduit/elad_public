<?php
	
	$xmlUrl = "http://cap1.conduit-apps.com/services/realMadrid/CRFStream.xml";
	$xmlUrl = simplexml_load_file($xmlUrl);	
echo json_encode($xmlUrl);	

	//echo Zend_Json::encode($xmlUrl);

?>


