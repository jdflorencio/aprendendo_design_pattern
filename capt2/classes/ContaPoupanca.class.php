<?php 

class ContaPoupanca extends Conta
{
  var $Aniversario;

  function __construct($Agencia, $Codigo, $DataDeCricao, $Titular, $Senha, $Saldo, $Aniversario) {
    
    parent::__construct($Agencia, $Codigo, $DataDeCricao, $Titular, $Senha, $Saldo);
  }

  function Retirar($quantia) {
    if ($this->Saldo >= $quantia) {
      parent::Retirar($quantia);
    }
    else
    {
      echo "Retirada não permitida... \n";
      return false;
    }
    return true;
  }
}
?>