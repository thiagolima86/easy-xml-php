<?php

class Easy_xml{
	
	public $charset;
	public $header;
	public $open_name;
	public $close_name;
	public $node;

	/** 
	* Configura o cabeçalho do xml
	* @param string $charset Define a codificação do xml
	* @param string $version Define a versão do xml
	* @return void Grava o valor na variavel global header
	*/

	public function header($charset="UTF-8", $version="1.0"){
		$this->charset = $charset;
		$this->header = "<?xml version=\"{$version}\" encoding=\"{$charset}\"?>";
		return $this;
	}

	/** 
	* Configura o nome do documento xml <Nomes> ...{corpo xml} ... </Nomes>
	* @param string $key Define o nome do documento
	* @param array $attr Define os atributos do nó
	* @return void
	*/
	public function name($key){
		$pos = strpos($key, " ");
		if($pos!=""){
			$name = substr($key, 0, $pos);
		}else{
			$name=$key;
		}
		$this->open_name = "<{$key}". @$attr_string. ">";
		$this->close_name = "</{$name}>";
		return $this;
	}

	/** 
	* Configurar os nós
	* @param string $key Define o nome do nó
	* @param array $attr Define os atributos do nó
	* @return void
	*/
	public function node($key, $content=""){
	
		$this->node .= $this->get_node($key, $content);
		return $this;
	}

	/** 
	* Configurar os nós em lote
	* @param string $key Define o nome do nó
	* @param array $attr Define os atributos do nó
	* @return void
	*/
	public function lot_node_child($key, $content=array()){

		$this->node .= $this->get_lot_node_child($key, $content);
		return $this;		
	}

	public function get_lot_node_child($key, $content=array(), $indice=1){

		/** Remove valores entre %% exemplo <Foto%2%> vai ficar <foto>
		Isso resolve problema com arrays com mesmo nome;
		*/
		$key = preg_replace("(\%[[:alnum:]]+\%)",'', $key);


		$pos = strpos($key, " ");
		if($pos!=""){
			$name = substr($key, 0, $pos);
		}else{
			$name=$key;
		}

		$tab = "";
		for($i=0; $i<=$indice; $i++){
			$tab .= "";
		}

		$node = $tab."<{$key}". @$attr_string. ">";
		foreach ($content as $key2 => $value) {
			if(is_array($value)){
				$node .= $tab.$this->get_lot_node_child($key2, $value, $indice++);
			}else{
				$node .= $tab.$this->get_node($key2, $value, $indice++);
			}

		}
		$node .= $tab."</{$name}>";
		return $node;
				
	}




	/** 
	* Configurar os nós
	* @param string $key Define o nome do nó
	* @param array $attr Define os atributos do nó
	* @return string
	*/
	private function get_node($key, $content=""){

		/** Remove valores entre %% exemplo <Foto%2%> vai ficar <foto>
		Isso resolve problema com arrays com mesmo nome;
		*/
		$key = preg_replace("(\%[[:alnum:]]+\%)",'', $key);

		$pos = strpos($key, " ");
		if($pos!=""){
			$name = substr($key, 0, $pos);
		}else{
			$name=$key;
		}
		
		$node = "";
		if($content == ""){
			$node .= "<{$name} />";
		}else{
			$node .= "<{$key}". @$attr_string. ">{$content}</{$name}>";
		}
		return $node;		
	}


/** 
	* Faz a identação do xml
	* @param string $xml
	* @return string
	*/
private function formatXmlString($xml) {

  // add marker linefeeds to aid the pretty-tokeniser (adds a linefeed between all tag-end boundaries)
  $xml = preg_replace('/(>)(<)(\/*)/', "$1\n$2$3", $xml);

  // now indent the tags
  $token      = strtok($xml, "\n");
  $result     = ''; // holds formatted version as it is built
  $pad        = 0; // initial indent
  $matches    = array(); // returns from preg_matches()

  // scan each line and adjust indent based on opening/closing tags
  while ($token !== false) :

    // test for the various tag states

    // 1. open and closing tags on same line - no change
    if (preg_match('/.+<\/\w[^>]*>$/', $token, $matches)) :
      $indent=0;
    // 2. closing tag - outdent now
    elseif (preg_match('/^<\/\w/', $token, $matches)) :
      $pad--;
    // 3. opening tag - don't pad this one, only subsequent tags
    elseif (preg_match('/^<\w[^>]*[^\/]>.*$/', $token, $matches)) :
      $indent=1;
    // 4. no indentation needed
    else :
      $indent = 0;
    endif;

    // pad the line with the required number of leading spaces
    $line    = str_pad($token, strlen($token)+$pad, "\t", STR_PAD_LEFT);
    $result .= $line . "\n"; // add to the cumulative result, with linefeed
    $token   = strtok("\n"); // get the next token
    $pad    += $indent; // update the pad size for subsequent lines
  endwhile;

  return $result;
}


	/** 
	* Gera o xml
	* @return String
	*/
	public function generate(){
		header("Content-Type: text/xml; charset={$this->charset}",true);
		$xml = $this->header;
		$xml .= $this->open_name;
		$xml .= $this->node;
		$xml .= $this->close_name;


		unset($this->header);
		unset($this->open_name);
		unset($this->node);
		unset($this->close_name);
		unset($this->charset);
		return $this->formatXmlString($xml);
	}



}
