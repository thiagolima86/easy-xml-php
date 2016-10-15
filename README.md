# easy-xml-php
XML Generate easily using array.

##How Install

```<?php
require "easy-xml-php";
$xml = new EasyXml();
```

##Methods
###header
* `header($charset, $version)`
* @param string $charset default:UTF8
* @param string $version default:1.0
* Use : `$xml->header();`
* Return : `<?xml version="1.0" encoding="UTF8" ?>`

###name
* `name($key)`
* @param string $key xml name
* Use : `$xml->name("Images");`
* Return : `<Images>...body...</Images>`

###node
* `node($key, $content)`
* @param string $key Node name
* @param string $content Node content
* Use : `$xml->node("Name", "pictures1.jpg");`
* Return : `<Name>foto1.jpg</Name>`

###lot_node_child
* `lot_node_child($key, $content)`
* @param string $key Node name
* @param array $content Content array with all nodes
* Use : `$xml->lot_node_child("Name", array("Name" => "picture1.jpg", "Width" => "100px", "Height" => "150px"));`
* Return : ```<Name>picture1.jpg</Name>
* <Width>100px</Width>
* <Height>150px</Height>```
>
>Note.:
There is a difficulty in putting us with the same name, when using this method because the matrix keys can not be duplicated. if you assign the same name to php array replace the last matrix. so it created a feature to work around this problem. Just put in the key array of a single value between percentage %value%.
>Ex: 
> ```$array["picture%1%"] = "picture1.jpg";
> $array["picture%2%"] = "picture2.jpg";
> $array["picture%3%"] = "picture3.jpg";``` 
>return:
> ```<picture>foto1.jpg</picture>
> <picture>foto2.jpg</picture>
> <picture>foto3.jpg</picture>```
>
> See that has a numeric value between %% percentage, that scape. This solve the problema. 





