<?php

 /* Output Feed Content
   made by Ishai Shilo */
 
 function outputFeedJSON($title, $link, $description)
 {
    $responseText = array("link"=>$link, "title"=>$title, "description"=>$description);
    echo(json_encode($responseText));
 }

?>