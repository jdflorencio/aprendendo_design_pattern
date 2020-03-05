<?php
 class Cachorro {
     private $Nasicimento;

     function __construct($nome)
     {
         $this->nome = $nome;
     }

    function __tostring()
     {
         return $this->nome;
     }
 }
$toto = new Cachorro('Totó');
$vevo = new Cachorro('Daba');

echo $toto;
echo '<br />';

echo $vevo;
echo '<br />';