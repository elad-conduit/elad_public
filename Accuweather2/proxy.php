<?php
	header("Content-Type: text/xml");
        
        define("TIMEOUT",5);
	define("KEY",'e88d6678-a740-102c-bafd-001321203584');
        
     $wloc = $_GET["loc"];
	 $wmetric = $_GET["metric"];

	/*if($_GET['req'] == "search")
	{
		$url = 'http://wxdata.weather.com/wxdata/ta/' . urlencode($_GET['postal']) . '.xml?max=30&key=' . KEY;
		print rpc($url);
	}
	if($_GET['req'] == "location")
	{
		$url = 'http://wxdata.weather.com/wxdata/loc/' . $_GET['postal'] . '.xml?key=' . KEY . '&locale=' . $wloc;
		print rpc($url);
	}
	if($_GET['req'] == "data")
	{*/
		$url = 'http://conduittoolbar.accu-weather.com/widget/conduittoolbar/weather-data.asp?location=' . urlencode($wloc) . '&metric=' . $wmetric; // Old Request
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