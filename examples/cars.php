<?php
namespace EasyXmlPhp;
require "../EasyXml.php";

$xml = new EasyXml();

/**
* You can to transform a json string in xml
*/
$cars =  '{
	"Focus": {
		"manufacture": "Ford",
		"year": "2011"
	},
	"Fiesta": {
		"manufacture": "Ford",
		"year": "2010"
	},
	"Civic": {
		"manufacture": "Honda",
		"year": "2008"
	},
	"Tucson": {
		"manufacture": "Hyundai",
		"year": "2016"
	}
}';

/* header return <?xml version="1.0" encoding="UTF8" ?>*/
$xml->header("UTF8", "1.0")
    ->lot_node_child("Cars destination='sales'", json_decode($cars, true));

/* Generate xml and print*/
echo $xml->generate();