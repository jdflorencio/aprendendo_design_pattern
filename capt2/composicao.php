<?php

include_once 'classes/Fornecedor.class.php';
include_once 'classes/Contato.class.php';

$fornecedor = new Fornecedor;
$fornecedor->RazaoSocial = 'Produtos Bom Gosto S.A';

$fornecedor->SetContato('Mauro', '51 1234-5678', 'mauro@bomgosto.com.br');

echo $fornecedor->RazaoSocial . "<br />";
echo "Informação de Contato <br />";
echo $fornecedor->GetContato();