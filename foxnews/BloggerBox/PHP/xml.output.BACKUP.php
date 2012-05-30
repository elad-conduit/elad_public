<?php

 /* Output Feed Content
   made by Ishai Shilo */
 
 function outputFeed($title, $link, $description)
 {
    echo("<a class='feedlink' href='" . $link . "#_tab'>" . $title . "</a>");
    echo("<div class='text'>" . $description . "</div><hr/>");
 }

 function outputFeedJSON($title, $link, $description)
 {
    $responseText = array("link"=>$link, "title"=>$title, "description"=>$description);
    echo(json_encode($responseText));
 }

?>