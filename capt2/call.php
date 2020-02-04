<?php

include_once 'classes/Produto_2.class.php';

$produto = new Produto(1, 'PenDriver 512Mb', 1, 345.67);

echo $produto->Vender(10);

?>