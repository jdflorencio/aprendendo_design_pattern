<?php
class Cachorro
{
    private $Nascimento;

    function __construct($nome)
    {
        $this->nome = $nome;
    }

    function __set($propriedade, $valor)
    {
        if ($propriedade == 'Nascimento')
        {
            if (count(explode('/', $valor)) == 3)
            {
                echo "Dado '$valor', atribuido à '$propriedade' <br /> ";
                $this->$propriedade = $valor;
            } else {
                echo "Dado '$valor', não atribuido à '$propriedade' <br />";
            }
        } else {
            $this->$propriedade =  $valor;
        }
    }
}