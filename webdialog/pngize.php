<?php

    /* CookieMonster Service
      This PHP File receives text as parameter and encompasses it as PNG
    */
    
    header('Content-Type: image/png');
    header("Cache-Control: no-cache, must-revalidate");
    //header('Content-Disposition:attachment; filename="pngize.png"');
    
    echo(time());
    echo("\r\n");
    echo($_GET['param']);

?>