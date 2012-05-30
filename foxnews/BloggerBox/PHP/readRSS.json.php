<?php
    
    /* PHP RSS Feed Reader
      made by Ishai Shilo */
    
    // Name of entries elements
    $entriesname = "item";
    
    // Get Entries from feed
    $entries = $xmldoc->getElementsByTagName($entriesname);
    
    // If feed is empty return feed-empty-message
    $feedemptymsg = "No data currently available";
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
        $title = trimtext(extractValue($entries->item($i)->getElementsByTagName("title")->item(0)), 500);
        $link = extractValue($entries->item($i)->getElementsByTagName("link")->item(0));
        $description = trimtext(extractValue($entries->item($i)->getElementsByTagName("description")->item(0)), 700);
	$pubdate = extractValue($entries->item($i)->getElementsByTagName("pubDate")->item(0));
        
        outputFeedJSON($title, $link, $description, $pubdate);
       
    }

?>