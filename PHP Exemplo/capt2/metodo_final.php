<?php 

include_once 'classes/Conta.class';
include_once 'classes/ContaCorrente.class.php';

class ContaCorrenteEspecial extends ContaCorrente 
{
    function Depositar($Valor) {
        echo 'Sobrescrevendo método Depositar .\n';
        parent::Depositar($Valor);
    }

    function Transferir($Conta, $Valor) {
        echo 'Sobrescrevendo método Transferir .\n';
        parent::Transferir($Conta, $Valor);
    }
}