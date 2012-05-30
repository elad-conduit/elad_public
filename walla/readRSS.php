<?php

// Get RSS URL
$url = $_GET["url"];
$maxFeeds = 5;

// Load RSS Contents
$xmlDoc = new DOMDocument();
$xmlDoc->load($url);

// Get Entries from Channel
$channel = $xmlDoc->getElementsByTagName("channel")->item(0);

// Output <item>s
$entries = $xmlDoc->getElementsByTagName("item");
for ($i=0; $i<$maxFeeds; $i++)
{
    $title = $entries->item($i)->getElementsByTagName("title")->item(0)->childNodes->item(0)->nodeValue;
    $link = $entries->item($i)->getElementsByTagName("link")->item(0)->childNodes->item(0)->nodeValue;
    $description = $entries->item($i)->getElementsByTagName("description")->item(0)->childNodes->item(0)->nodeValue;
    $description = neat_trim($description,250,'...');    
    echo ("<a href='" . $link . "#_tab'>" . $title . "</a>");
    //echo ("<br />");
    echo ("<div class='text'>" . $description . "</div><hr />");
}

 function neat_trim($str, $n, $delim='...') { 
 $len = strlen($str); 
   if ($len > $n) { 
       preg_match('/(.{' . $n . '}.*?)\b/', $str, $matches); 
       return rtrim($matches[1]) . $delim; 
   } 
   else { 
       return $str; 
   } 
}

?>