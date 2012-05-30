<?php

    $data = $_GET["data"];
    $url = $_GET["url"];
    
    // Load Feed Contents
    $xmldoc = new DOMDocument();
    $xmldoc->load($url);
    
    $firstentrylink = alphanumericAndSpace($xmldoc->getElementsByTagName("item")->item(0) // Goto first item
                    ->getElementsByTagName("link")->item(0)->childNodes->item(0)->nodeValue); // Goto link element
                    
    $entries = $xmldoc->getElementsByTagName("item");                  
    for ($i = 0; $i <= 9; $i++)
    {
        if ($entries->item($i) != NULL){
            if (alphanumericAndSpace($entries->item($i)->getElementsByTagName("link")->item(0)->childNodes->item(0)->nodeValue) == $data)
            {
                echo ("var numnew='" . $i . "';");
                echo ("var latest='" . $firstentrylink . "';");
                return;
            }
        }
        else
        {
            break;
        }
    }
    echo("var numnew='" . $i . "';");
    echo ("var latest='" . $firstentrylink . "';");
    
    
        /**
    * Remove all non alpha numeric characters except a space
    *
    * @param    string    $string The string to cleanse
    *
    * @return    string
    *
    */
    function alphanumericAndSpace( $string )
    {
        return preg_replace('/[^a-zA-Z0-9\s]/', '', $string);
    }


?>