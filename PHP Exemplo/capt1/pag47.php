<?php

function ola() {
  $argumento = func_get_args();
  

  $quantidade = func_num_args();

  for($n=0; $n < $quantidade; $n++) {
    echo 'Olá ' . $argumento[$n] . "\n";
  }
}

ola('João', 'Maria', 'José', 'Pedro');

?>