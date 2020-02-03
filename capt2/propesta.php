<?php

class Aplicacao 
{
    static $Quantidade;

    function __construct($Nome) {
        self::$Quantidade ++;
        $i = self::$Quantidade;
        echo "Nova aplicação nr. $i: $Nome <br />";
    }
}

new Aplicacao('Dia');
new Aplicacao('GIMP');
new Aplicacao('Gnumeric');