<?php

include_once 'classes/Pessoa.class.php';
include_once 'classes/Contas.class.php';

$carlos = new Pessoa(10, "Carlos da silva", 1.85, 25, "10/04/1976", "Ensino Médio", 650.00);

echo "Manipulando o objeto {$carlos->Nome} <br \>";
echo "{$carlos->Nome} é formado em: {$carlos->Escolaridade} \n";


?>