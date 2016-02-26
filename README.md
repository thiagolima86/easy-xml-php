# easy-xml-php
Gera xml de forma simples. usando array.

###Instalação

><code><?php</code>

><code>require "easy-xml-php";</code>

><code>$xml = new easy_xml();</code>

###Métodos
####header
* `header($charset, $version)`
* @param string $charset default:UTF8
* @param string $version default:1.0
* Uso : `$xml->header();`
* saída : `<?xml version="1.0" encoding="UTF8" ?>`

####name
* `name($key)`
* @param string $key Nome do xml
* Uso : `$xml->name("Imagens");`
* saída : `<Imagens>...Corpo do xml...</Imagens>`

####node
* `node($key, $content)`
* @param string $key Nome do nó
* @param string $content conteúdo do nó
* Uso : `$xml->node("Nome", "foto1.jpg");`
* saída : `<Nome>foto1.jpg</Nome>`

####lot_node_child
* `lot_node_child($key, $content)`
* @param string $key Nome do nó
* @param array $content array com conteúdo
* Uso : `$xml->lot_node_child("Nome", array("Nome" => "foto1.jpg", "Largura" => "100px", "Altura" => "150px"));`
* saída : `<Nome>foto1.jpg</Nome>`
* `<Largura>100px</Largura>`
* `<Altura>150px</Altura>`


