<?php

$file = $_GET["url"];

function contents($parser, $data){ 
    echo $data; 
} 

function startTag($parser, $data){ 
    echo "<span class='" . $data . "'>"; 
} 

function endTag($parser, $data){ 
    echo "</span>"; 
} 

$xml_parser = xml_parser_create(); 

xml_set_element_handler($xml_parser, "startTag", "endTag"); 

xml_set_character_data_handler($xml_parser, "contents"); 

$fp = fopen($file, "r"); 

$data = fread($fp, 80000); 

if(!(xml_parse($xml_parser, $data, feof($fp)))){ 
    die("Error on line " . xml_get_current_line_number($xml_parser)); 
} 

xml_parser_free($xml_parser); 

fclose($fp); 

?>