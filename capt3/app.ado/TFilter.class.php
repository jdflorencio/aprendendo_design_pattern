<?php

/*
*  ESTA CLASSE PROVÊ UM INERFACE PARA DEFINIÇÃO DE FILTROS DE SELEÇÃO
*/

class TFilter extends TExpression
{
    private $variable;
    private $operetor;
    private $value;
    
    /*
    * @param $variable = variavel
    * @param $operator = operedor (>,<)
    * @param $value = valor a ser comparado
    */
    public function __construct($variable, $operator, $value)
    {
        $this->variable = $variable;
        $this->operator = $operator;
        $this->value = $this->transform($value);
    }

    /**
     * Recebe um valor e faz as modificações necessarias para 
     * ele ser interpretado pelo banco de dados
     * podendo ser um diversos tipos de valores
     *
     * @param [integer, string, boolean, array] $value
     * @return void
     */
    private function transform($value)
    {
        if (is_array($value)){
            foreach($value as $x) {
                if (is_integer($x)) {
                    $foo[] = $x;

                } else if (is_string($x)) {
                    $foo[] = "'$x'";
                    

                }
            }
    
            $result = '(' . implode(',', $foo) .')';

        } else if (is_string($value)) {
            $result = "'$value'";

        } else if(is_null($value)) {
            $result = 'NULL';

        } else if (is_bool($value)) {
            $result = $value ? 'TRUE' : 'FALSE';
        } else {
            $result = $value;
        }
        return $result;
    }
    
    /**
     * Retorna o filtro em forma de expressao
     *
     * @return string
     */
    public function dump()
    {
        return "{$this->variable} {$this->operator} {$this->value}";
    }    
}