<?php

    require_once("xml2json.php");
    
    function get_url_contents($url){
        $crl = curl_init();
        $timeout = 5;
        curl_setopt ($crl, CURLOPT_URL,$url);
        curl_setopt ($crl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($crl, CURLOPT_CONNECTTIMEOUT, $timeout);
        $ret = curl_exec($crl);
        curl_close($crl);
        return $ret;
    }    

    $url = $_GET["url"]; // URL of XML to convert to JSON
    
    $jsonized = xml2json::transformXmlStringToJson(get_url_contents($url));
    
    echo($jsonized);

?>