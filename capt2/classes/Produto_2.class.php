<?php


class Produto
{
    var $Codigo;
    var $Descricao;
    var $Quantidade;
    private $Preco;
    
    const MARGEM = 10;
    function __construct($Codigo, $Descricao, $Quantidade, $Preco)
    {
        $this->Codigo = $Codigo;
        $this->Descricao = $Descricao;
        $this->Quantidade = $Quantidade;
        $this->Preco =  $Preco;
    }
    
    function __get($propriedade)
    {
        echo "Obtendo o valor de '$propriedade' :<br />";
        if ($propriedade == "Preco") {
            return $this->$propriedade * (1 + (self::MARGEM / 100));
        }
    }

    function __call($metodo, $parametros) {

        echo "Você executou o método: {$metodo}";
        foreach($parametros as $key => $parametro) {
            echo "\tParâmetro $key: $parametro <br />";
        }
    }
}