<?php
namespace EasyXmlPhp;
require "../EasyXml.php";

$xml = new EasyXml();


$fruits =  array(

    'Banana' => array(
        
        'price' => 0.5,
        'country' => 'Brazil'
        
    ),
    'Apple' => array(
        
        'price' => 1.5,
        'country' => 'Argentina'
    ),
    'Coconut' => array(
        
        'price' => 1.2,
        'country' => 'Brazil'
    )
);

/* header return <?xml version="1.0" encoding="UTF8" ?>*/
$xml->header();

/* Redering all array to xml */
$xml->lot_node_child("Fruits", $fruits);

/* Generate xml and print*/
echo $xml->generate();