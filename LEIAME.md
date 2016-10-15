# easy-xml-php
Gera xml de forma simples. usando array.

##Instalação


```<?php
require "easy-xml-php";
$xml = new easy_xml();
```

##Métodos
###header
* `header($charset, $version)`
* @param string $charset default:UTF8
* @param string $version default:1.0
* Uso : `$xml->header();`
* saída : `<?xml version="1.0" encoding="UTF8" ?>`

###name
* `name($key)`
* @param string $key Nome do xml
* Uso : `$xml->name("Imagens");`
* saída : `<Imagens>...Corpo do xml...</Imagens>`

###node
* `node($key, $content)`
* @param string $key Nome do nó
* @param string $content conteúdo do nó
* Uso : `$xml->node("Nome", "foto1.jpg");`
* saída : `<Nome>foto1.jpg</Nome>`

###lot_node_child
* `lot_node_child($key, $content)`
* @param string $key Nome do nó
* @param array $content array com conteúdo
* Uso : `$xml->lot_node_child("Nome", array("Nome" => "foto1.jpg", "Largura" => "100px", "Altura" => "150px"));`
* saída : `<Nome>foto1.jpg</Nome>`
* `<Largura>100px</Largura>`
* `<Altura>150px</Altura>`

Obs.:
Existe uma dificuldade em colocar nós com o mesmo nome, quando se usa esse método, porque o a chave do array não pode ser duplicada. se você atribuir o mesmo nome ao array o php substituirá pelo último array. por isso foi criado um recurso para burlar esse problema. Basta colocar dentro da chave do array um valor unico entre porcentage %valor%. 

Ex: `$array["foto%1%"] = "foto1.jpg";  $array["foto%2%"] = "foto2.jpg";` 

retorno:

```<foto>foto1.jpg</foto>
<foto>foto2.jpg</foto> ```

Note que o valor entre %% é escapado. Isso resolve o problema





