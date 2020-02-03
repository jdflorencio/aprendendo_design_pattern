<?php 

// feof e fgets

$fd =  fopen("/etc/fstab", "r");
while ( !feof ($fd)) {
  // lẽ um linha do arquivo 
  $buffer = fgets($fd, 4096);
  // imprime a linha 
  echo $buffer;

fclose($fd);

?>