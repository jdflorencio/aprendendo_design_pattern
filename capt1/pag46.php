<?php

/*
* Usando o by references fazendo que as mudança da funçãosejam feitas no contexto da função.
*
*/

function increments( $variavel, $valor) {
  $variavel += $valor; 
}

$a = 10;
increments($a, 20);
 echo $a."\n";


function incrementa( &$variavel, $valor ) {
  $variavel += $valor;
}

$x = 10;
incrementa($x, 20);
echo $x;
 
 ?>