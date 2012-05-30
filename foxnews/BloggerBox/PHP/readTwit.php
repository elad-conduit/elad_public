<?php
    /* PHP Twitter Feed Reader
      made by Ishai Shilo */
    // Name of entries elements
    $entriesname = "item";
    
    include 'html.dom.php';
    
    // Get Entries from feed
    $entries = $xmldoc->getElementsByTagName($entriesname);
    
    // If feed is empty return feed-empty-message
    $feedemptymsg = "<div class='title'><a href='" . $url . "#_tab'>" . "This feed currently contains no data" . "</a></div>";
    if ($entries->length == 0)
    {
        echo ($feedemptymsg);
        return;   
    }
    
    
    
    // Iterate through entries and output them
    for ($i=0; $i < $maxfeeds; $i++)
    {
        if ($entries->item($i) == null) // If reached end of feed
        {
            return;
        }
        $pubdate = extractValue($entries->item($i)->getElementsByTagName("pubDate")->item(0));
        $link = extractValue($entries->item($i)->getElementsByTagName("link")->item(0));
        $description = extractValue($entries->item($i)->getElementsByTagName("description")->item(0));
        
        // Clean up publication date
        strtok($pubdate, ' ');
        $pubdate_day = strtok(' ');
        $pubdate_month = strtok(' ');
        $pubdate_year = strtok(' ');
        $newdescription = preg_replace_callback("http:\\S*" , "addHref", $description);
        
        // Put out twits
        //echo ("<br />");
        echo ("<div class='text'>" . $description . "</div><br/><br/>");
        echo ("<div class='date'><a href='" . $link . "#_tab'>" . $pubdate_day . " " . $pubdate_month . " " . $pubdate_year . "</a></div><hr />");   
    }       

?>