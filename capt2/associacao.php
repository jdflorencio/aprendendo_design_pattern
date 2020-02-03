<?php
include_once 'classes/Fornecedor.class.php';
include_once 'classes/Produto.class.php';

$fornecedor = new Fornecedor;

$fornecedor->Codigo = 848;
$fornecedor->RazaoSocial = 'Bom Gosto Alimentos SA';
$fornecedor->Endereco = 'Rua Ipiranga';
$fornecedor->Cidade = 'poços de caldas';

$produto = new Produto;
$produto->Codigo = 462;
$produto->Descricao = "Doce de Pêssego";
$Produto->Preco = 1.24;
$produto->Fornecedor = $fornecedor;


echo 'Código     :' . $produto->Codigo . '<br />';
echo 'Descricao  :' . $produto->Descricao . '<br />';
echo 'Código     :' . $produto->Fornecedor->RazaoSocial . '<br />';
echo 'Razão Social :' . $produto->Fornecedor->RazaoSocial . '<br />';