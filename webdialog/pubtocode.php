<?php

    $salt = "web dialog galore";

    $pepper = $_GET["pub"];
    
    $encrypted = base64_encode(crypt($pepper, $salt));
    
    echo($encrypted);

?>