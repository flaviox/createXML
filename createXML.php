<?php

class createXML 
{ 
    private $root; 
    private $node; 
    private $subnode; 
    private $xml;

    public function __construct($nameNodeRoot)
    {
        $this->xml  = new DOMDocument("1.0", "UTF-8");
        $this->root = $this->xml->createElement($nameNodeRoot);
    }

    public function addNode($name, $value, $cdata = false)
    {
        if ($cdata == false)
        {
            $nodeElement = $this->root->ownerDocumenter->createElement($name, $value);
            $this->node->appendChild($nodeElement);
        }
        else
        {
            $nodeElement = $this->root->ownerDocumenter->createElement($name, $value);
            $valueElement = $this->root->ownerDocument->createCDATASection($value);
            $this->node->appendChild($nodeElement);
            $nodeElement->appendChild($valueElement);
        }
    }

    public function printXML()
    {
        $this->xml->appendChild($this->root);
        $this->xml->formatOutput = true;
        $this->xml->preserveWhiteSpace = false;
        $this->xml->saveXML();
//        header("Content-Type: text/xml");
        print_r($this->xml->saveXML());
    }
} 
?>