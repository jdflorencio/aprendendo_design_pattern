<?php

class Cachorro 
{
    function __cons truct($nome, $idade, $raca)
    {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->raca = $raca;
    }

    function toXML()
    {
        return
<<<XML
    <cachorro>
        <nome>{$this->nome}</nome>
        <idade>{$this->idade}</idade>
        <raca> {$this->raca} </raca>
    </cachorro>
XML;
    }
}

$toto = new Cachorro('Totó', 10, 'FOX Terrier');
$vava = new Cachorro('Daba', 8, 'Dálmata');
echo $toto->toXml();
echo $vava->toXml();
