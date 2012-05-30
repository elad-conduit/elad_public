<?php

 /* Feed Reader Initializer
   made by Ishai Shilo */
 
 // String trim module - Function trimtext(string)
    include 'string.trim.php';
    
    // Include Data Extraction - Function extractValue(node)
    include 'xml.node.extract.php';
    
    // Include Data Output - Function outputFeed(title, link, description)
    include 'xml.output.php';

    // Get URL to read feed from user
    $url = $_GET["url"];
    $maxfeeds = 10; //$_GET["maxfeeds"]; // Hard-set to 10, for now.
    $type = $_GET["type"];
    
    
    // Load Feed Contents
    $xmldoc = new DOMDocument();
    
    $feedemptymsg = "<div class='title'><a href='" . $url . "#_tab'>" . "This feed currently contains no data" . "</a></div>";
echo $xmldoc->load($url);
    
    // Length of title and description content
    $titlelength = 500;
    $descriptionlength = 700;
    
    /* Check feed type, and act accordingly!
      Currently Supports:
        -Twitter
        -RSS
        -Atom
        -FeedBurner
    */
    
    switch($type)
    {
     case 'twitter' :
      {
       include 'readTwit.php';
       break;
      }
      case 'twitpublisher' :
       {
        include 'readTwitPub.php';
        break;
       }
      case 'rss' :
       {
        include 'readRSS.php';
        break;
       }
      case 'atom' :
        {
         include 'readAtom.php';
         break;
        }
       case 'burner' :
        {
         include 'readBurner.php';
         break;
        }
       case 'rss.json' :
       {
        include 'readRSS.json.php';
        break;
       }
        default :
        {
         echo("No Appropriate Feed Type Found!!!");
        }
    }
    
    // Initialized - Now get your data!
    /* $entries - contains the entries in the feed */
?>
