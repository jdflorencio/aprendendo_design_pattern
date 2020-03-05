<?php

class XMLBase
{
    function toXML()
    {
        $retorno = '<' . get_class($this) . '>' . '<br />';
        $propriedades = get_object_vars($this);
        foreach ($propriedades as $propriedade => $valor)
        {
            $retorno .= "\t<$propriedade> $valor </$propriedade> \n"; 
        }
        $retorno .= '</' . get_class($this) . '>' . "\n";
        return $retorno;
    }
}