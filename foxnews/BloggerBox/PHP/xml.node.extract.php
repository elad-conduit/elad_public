<?php

/* Extract nodeValue from XML
  made by Ishai Shilo */

function extractValue($element)
{
    if ($element != null)
       return $element->childNodes->item(0)->nodeValue;
    else
       return "";
}

?>