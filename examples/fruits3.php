<?php
namespace EasyXmlPhp;
require "../EasyXml.php";

$xml = new EasyXml();

/**
* Use porcentage to scape %number%. If you dont put this porcentage, 
* the Php will go replace all array with key "Fruit" for last occurrence. 
*/
$fruits =  array (

    'Fruit%1%' => array (
        
        'name' => 'Banana',
        'type' => 'apple',
        'price' => 0.5,
        'country' => 'Brazil'
        
    ),
    'Fruit%2%' => array (
        
        'name' => 'Banana',
        'type' => 'coruda',
        'price' => 0.8,
        'country' => 'Brazil'
        
    ),
    'Fruit%3%' => array (
        
        'name' => 'Apple',
        'price' => 1.5,
        'country' => 'Argentina'
        
    ),
    'Fruit%4%' => array (
        
        'name' => 'Coconut',
        'price' => 1.2,
        'country' => 'Brazil'
    )
);

/* header return <?xml version="1.0" encoding="UTF8" ?>*/
$xml->header("UTF8", "1.0")
    ->name("Carga xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\"")
    ->lot_node_child("Fruits", $fruits);

/* Generate xml and print*/
echo $xml->generate();