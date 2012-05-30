<?php

// Get RSS URL
$url = $_GET["url"];
$maxFeeds = 30;

// Load RSS Contents
$xmlDoc = new DOMDocument();
$xmlDoc->load($url);

// Get Entries from USER
$user = $xmlDoc->getElementsByTagName("user")->item(0);

// Output user details
$name = $user->getElementsByTagName("name")->item(0)->childNodes->item(0)->nodeValue;
$screen_name = $user->getElementsByTagName("screen_name")->item(0)->childNodes->item(0)->nodeValue;
$profile_image_url = $user->getElementsByTagName("profile_image_url")->item(0)->childNodes->item(0)->nodeValue;
    
    echo("var tpubname='" . $name . "';");
    echo("var tpubscreen='" . $screen_name . "';");
    echo("var tpubprofileimg='" . $profile_image_url . "';");

?>