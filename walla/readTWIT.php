<?php

// Get RSS URL
$url = $_GET["url"];
$maxFeeds = 15;

// Load RSS Contents
$xmlDoc = new DOMDocument();
$xmlDoc->load($url);

// Get Entries from Channel
$channel = $xmlDoc->getElementsByTagName("channel")->item(0);

// Output <item>s
$entries = $xmlDoc->getElementsByTagName("item");
for ($i=0; $i<$maxFeeds; $i++)
{
    $pubdate = $entries->item($i)->getElementsByTagName("pubDate")->item(0)->childNodes->item(0)->nodeValue;
    $link = $entries->item($i)->getElementsByTagName("link")->item(0)->childNodes->item(0)->nodeValue;
    $description = $entries->item($i)->getElementsByTagName("description")->item(0)->childNodes->item(0)->nodeValue;
    
    // Clean up publication date
    strtok($pubdate, ' ');
    $pubdate_day = strtok(' ');
    $pubdate_month = strtok(' ');
    $pubdate_year = strtok(' ');
    //$newdescription = preg_replace_callback("http:\\S*" , "addHref", $description);
    
    //echo ("<br />");
    echo ("<div class='text'>" . $description . "</div>");
    echo ("<div class='date'><a href='" . $link . "#_tab'>" . $pubdate_day . " " . $pubdate_month . " " . $pubdate_year . "</a></div><hr />");
}

/*function addHref($matches)
{
    return "<a href='" . $matches[0] . "'>" . $matches[0] . "</a>";
}*/

?>