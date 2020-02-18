<?php

final class Produto
{
    private $descricao;
    private $estoque;
    private $preco_custo;

    /**
     * Define alguns valores iniciais
     *
     * @param [string] $descricao
     * @param [float] $estoque
     * @param [float] $preco_custo
     */
    public function __construct($descricao, $estoque, $preco_custo)
    {
        $this->descricao = $descricao;
        $this->estoque = $estoque;
        $this->preco_custo = $preco_custo;
    }

    /**
     * regitra uma compra, aatualiza e incrementa o estoque atual
     *
     * @param [type] $unidade
     * @param [type] $preco_custo
     * @return void
     */
    public function registraCompra($unidade, $preco_custo)
    {
        $this->preco_custo = $preco_custo;
        $this->estoque += $unidade;
    }

    /**
     * decrementa o estoque e regitar uma vendas
     *
     * @param [type] $unidade
     * @return void
     */
    public function registraVenda($unidade)
    {
        $this->estoque -= $unidades;
    }

    public function getEstoque()
    {
        return $this->estoque;
    }

    /**
     * Retorna o preçode venda, baseado em uma margem de 30% sobre o custo
     *
     * @return void
     */
    public function calculaPrecoVenda()
    {
        return $this->preco_custo * 1.3;
    }
}

final class Venda
{
    private $itens;

    public function addItem($quantidade, Produto $produto)
    {
        $this->itens[] = array($quantidade, $produto);
    }

    public function getItens()
    {
        return $this->itens;
    }
}

// instacia objeto Venda
$venda = new Venda;
$venda->addItem(3, new Produto('Vinho', 10, 15));
$venda->addItem(2, new Produto('Salame', 20, 20));
$venda->addItem(1, new Produto('Queijo', 30, 10));

$total = 0;
foreach($venda->getItens() as $item) {
    $quantidade = $item[0];
    $produto = $item[1];

    //SOMA TOTAL
    $total += $produto->calculaPrecoVenda() * $quantidade;
    $produto->registraVenda($quantidade);
}

echo $total; 