<?php

include_once 'classes/Pessoa.class.php';
include_once 'classes/Conta.class.php';
include_once 'classes/ContaCorrente.class.php';
include_once 'classes/ContaPoupanca.class.php';


$carlos = new Pessoa(10, "Carlos da Silva", 1.85, 25, "10/04/1976", "Ensino Médio", 650.00);

echo "Manipulando o  objeto {$carlos->Nome}: \n";

$conta[1] = new ContaCorrente(6677, "CC.1234.56", "10/07/02", $carlos, 9876, 500.00, 200.00);
$conta[2] = new ContaPoupanca(6678, "PP.1234,57", "10/07/02", $carlos, 9876, 500.00, "10/07");

foreach ($conta as $key => $conta) {

    echo "Manipulando a conta $key de: {$conta->Titular->Nome}: <br />";
    $conta->Depositar(200);
    echo "O Saldo atual da conta $key é R/$ {$conta->ObterSaldo()} <br />";
    $conta->Retirar(100);
    echo "O Saldo atual da conta $key é R\$ {$conta->ObterSaldo()}";

}


?>