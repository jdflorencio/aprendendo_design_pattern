<?php 
/*
* CLASS ABSSTRATA PARA GERENCIAR EXPRESSÕES
*/
abstract class TExpression
{
    const AND_OPERATOR = 'AND ';
    const OR_OPERATOR = 'OR ';
    
    //marca o método dump como obrigatório7
    abstract public function dump();
}