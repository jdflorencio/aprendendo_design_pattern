<?php

class Produto
{
    var $Codigo;
    var $Despedida;
    var $Preco;
    var $Quantidade;
    

    function ImprimeEtiqueta()
    {
        print 'Código:     '. $this->Codigo . "<br />";
        print 'Descrição:     '. $this->Descricao . "<br />";
        echo '---------------------------------------- <br />';
    }
}