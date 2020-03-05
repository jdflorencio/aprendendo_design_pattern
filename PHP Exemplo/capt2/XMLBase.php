<?php
include_once 'classes/XMLBase.class.php';
class Cachorro extends XMLBase
{
    function __construct($nome, $idade, $raca)
    {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->raca = $raca;
    }
}

$toto = new Cachorro('Totó', 10, 'FOX Terrier');
$vava = new Cachorro('Daba', 8, 'Dálmata');

echo $toto->toXML();
echo $vava->toXML();