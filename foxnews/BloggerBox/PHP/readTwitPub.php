<?php
    
    /* PHP Twitter Publisher Reader
      made by Ishai Shilo */
    
    $entriesname = "user";
    
    // Get Entries from feed
    $entries = $xmldoc->getElementsByTagName($entriesname);
    
    // If feed is empty return feed-empty-message
    $feedemptymsg = "<div class='title'><a href='" . $url . "#_tab'>" . "This feed currently contains no data" . "</a></div>";
    if ($entries->length == 0)
    {
        //echo ($feedemptymsg);
        return;   
    }
    
    
    // Get Publisher Details
    if ($entries->item(0) == null)
    {
        return;
    }
    
    $name = extractValue($entries->item(0)->getElementsByTagName("name")->item(0));
    $screen_name = extractValue($entries->item(0)->getElementsByTagName("screen_name")->item(0));
    $profile_image_url = extractValue($entries->item(0)->getElementsByTagName("profile_image_url")->item(0));
    
    // Output in javascript form, then EVAL!
    echo("var tpubname='" . $name . "';");
    echo("var tpubscreen='" . $screen_name . "';");
    echo("var tpubprofileimg='" . $profile_image_url . "';");
?>