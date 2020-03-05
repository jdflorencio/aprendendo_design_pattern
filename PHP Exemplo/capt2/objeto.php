<?php

include_once 'classes/objeto.class.php';

// criar um objeto
$produto = new Produto;

//Atribuir valores
$produto->Codigo = 4001;

$produto->Descricao = 'cd - The Best of Eric Clapton';
print_r($produto);
?>