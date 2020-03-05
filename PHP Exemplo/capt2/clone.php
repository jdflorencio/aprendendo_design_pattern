<?php

class Cachorro
{
    function __construct($coleira, $nome, $idade, $raca)
    {
        $this->coleira = $coleira;
        $this->nome = $nome;
        $this->idade = $idade;
        $this->raca = $raca;

    }

    function __clone()
    {
        $this->coleira = $this->coleira +1;
        $this->nome .= ' Junior';
        $this->idade = 0; 
    }
}

$toto = new Cachorro(100, 'Totó', 10, 'FOX TERRIER');
$vava = clone $toto;

echo 'Código: ' . $toto->coleira . '<br />';
echo 'Nome: ' . $toto->nome . '<br />';
echo 'Idade: ' . $toto->idade . '<br />';


echo '<hr />';
echo 'Código: ' . $vava->coleira . '<br />';
echo 'Nome: ' . $vava->nome . '<br />';
echo 'Idade: ' . $vava->idade . '<br />';