<?php

 /* Output Feed Content
   made by Ishai Shilo */
 
 function outputFeedJSON($title, $link, $description, $pubdate)
 {
    $responseText = array("link"=>$link, "title"=>$title, "description"=>$description, "pubdate"=>$pubdate);
    echo(json_encode($responseText));
 }

?>