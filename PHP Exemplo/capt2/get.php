<?php

include_once 'classes/Produto_2.class.php';

$produto = new Produto(1, 'Pendrive 512 Mb', 1, 345.67);

echo $produto->Codigo;