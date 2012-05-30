<?php
	header("Content-Type: text/xml");
        
        define("TIMEOUT",5);
		$wloc = $_GET["loc"];
		$url = 'http://conduittoolbar.accu-weather.com/widget/conduittoolbar/city-find.asp?location=' . urlencode($wloc);
		// Old Request
		//$url = http://wxdata.weather.com/wxdata/df/94130.xml?day=0,1&key=e88d6678-a740-102c-bafd-001321203584&locale=en_US'; // New Request
		print rpc($url);
	//}
	function rpc($url)
	{
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,TIMEOUT);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}
	?>