<?php

/* Trim an input string to a desired length, stopping at the appropriate space character
  made by Ishai Shilo */

function trimtext($str, $n, $delim='...')
{ 
    $len = strlen($str); 
    if ($len > $n)
    { 
        preg_match('/(.{' . $n . '}.*?)\b/', $str, $matches); 
        return rtrim($matches[1]) . $delim; 
    } 
    else
    { 
        return $str; 
    } 
} 

?>