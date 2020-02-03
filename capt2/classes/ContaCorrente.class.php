<?php 

class ContaCorrente extends Conta
{
  var $Limite;

  function __construct($Agencia, $Codigo, $DataDeCricao, $Titular, $Senha, $Saldo, $Limite) {
    parent::__construct($Agencia, $Codigo, $DataDeCricao, $Titular, $Senha, $Saldo);
    $this->Limite = $Limite;
  }

  function Retirar($quantia) {
    $cpmf = 0.05;

    if ( ($this->Saldo + $this->Limite) >= $quantia )
    {
      parent::Retirar($quantia);

      parent::Retirar($quantia * $cpmf);
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
