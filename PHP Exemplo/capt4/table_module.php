<?php

final class Produto
{
    static $recordset = array();

    public function adicionar($id, $descricao, $estoque, $preco_custo)
    {
        self::$recordset[$id]['descricao'] = $descricao;
        self::$recordset[$id]['estoque'] = $estoque;
        self::$recordset[$id]['preco_custo'] = $preco_custo;
    }

    public function registraCompra($id, $unidade, $preco_custo)
    {
        self::$recordset[$id]['preco_custo'] = $preco_custo;
        self::$recordset[$id]['estoque'] += $unidades;
    }

    public function registraVenda($id, $unidade)
    {
        self::$recordset[$id]['estoque'] -= $unidades;
    }

    public function getEstoque($id)
    {
        return self::$recordset[$id]['estoque'];
    }

    public function calculaPrecoVenda($id)
    {
        return self::$recordset[$id]['preco_custo'] * 1.3;
    }    
}


$produto = new Produto;

//ADICIONAR ALGUNS PRODUTOS

$produto->adicionar(1, 'Vinho', 10, 15);
$produto->adicionar(2, 'Salame', 20, 20);

// EXIBI ESTOQUE ATUAIS

echo "estoques: <br> \n";
echo $produto->getEstoque(1) . "<br> \n";
echo $produto->getEstoque(2) . "<br> \n";

// EXIBI PRECO DE VENDA

echo "preços de venda : <br> \n";
echo $produto->calculaPrecoVenda(1) . "<br > \n";
echo $produto->calculaPrecoVenda(2) . "<br > \n";

// vende alguma unidades

$produto->registraVenda(1,5);
$produto->registraVenda(2,10);

// REPOE O ESTOQUE

$produto->registraCompra(1, 5, 16);
$produto->registraCompra(2, 10, 22);

// EXIBE OS PREÇOS DE VENDA ATUAIS

echo "preços venda : <br> \n";
echo  $produto->calculaPrecoVenda(1) . "<br> \n";
echo  $produto->calculaPrecoVenda(2) . "<br> \n";


