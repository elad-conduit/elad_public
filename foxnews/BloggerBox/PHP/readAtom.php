<?php

    /* PHP Atom Feed Reader
      made by Ishai Shilo */
        // Name of entries elements
    $entriesname = "entry";
    
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
        $title = trimtext(extractValue($entries->item($i)->getElementsByTagName("title")->item(0)), 500);
        $links = $entries->item($i)->getElementsByTagName("link");
        $linkscount = $links->length;
        $link = $links->item($linkscount - 1)->getAttribute('href');
        $description = trimtext(extractValue($entries->item($i)->getElementsByTagName("content")->item(0)), 700);
        
        outputFeed($title, $link, $description);
       
    }

?>