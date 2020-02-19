<?php 

final class Produto
{
    private $descricao;
    private $estoque;
    private $preco_custo;

    public function __construct($descricao, $estoque, $preco_custo)
    {
        $this->descricao = $descricao;
        $this->estoque = $estoque;
        $this->preco_custo = $preco_custo;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }
}

final class Venda
{
    private $id;
    private $itens;

    function __construct($id)
    {
        $this->id = $id;
    }

    function getID()
    {
        return $this->id;
    }

    /**
     * Adiciona um item na cesta
     *
     * @param [type] $quantidade
     * @param Produto $produto
     * @return void
     */
    public function addItem($quantidade, Produto $produto)
    {
        $this->itens[] = array($quantidade, $produto);
    }

    /**
     * RETORNA O ARRAY DE ITENS DA CESTA
     *
     * @return void
     */
    public function getItens()
    {
        return $this->itens;
    }
}


/**
 * Implementa Data Mapper para  a classe Venda
 */
class VendaMapper
{
    function insert(Venda $venda)
    {
        $id =  $venda->getID();
        $date = date("Y-m-d");
        $sql = "INSERT INTO venda (id, data) values ('$id', '$date')";

        echo $sql . "<br > \n";

        foreach($venda->getItens() as $item){
            $quantidade =  $item[0];
            $produto = $item[1];
            $descricao = $produto->getDescricao();

            $sql = "INSERT INTO venda_items (ref_venda, produto, quantidade)".
                "values ('$id', '$descricao', '$quantidade')";
            echo $sql . "<br> \n";
        }
    }
}

$venda = new Venda(1000);

$venda->addItem(3, new Produto('Vinho', 10, 15));
$venda->addItem(2, new Produto('Salame', 20, 20));
$venda->addItem(1, new Produto('Queijo', 30, 10));

// Data Mapper persiste a venda

VendaMapper::insert($venda);