<?php

include_once 'app.ado/TExpression.class.php';
include_once 'app.ado/TCriteria.class.php';
include_once 'app.ado/TFilter.class.php';
include_once 'app.ado/TSqlInstruction.class.php';
include_once 'app.ado/TSqlUpdate.class.php';

$criteria = new TCriteria;
$criteria->add(new TFilter('id', '=', '3'));

$sql = new TSqlUpdate;
$sql->setEntity('aluno');

$sql->setRowData('nome', 'Pedro Cardoso da Silva');
$sql->setRowData('rua', 'Marchado de Assis');
$sql->setRowData('fone', '(88) 55555');
$sql->setCriteria($criteria);

echo $sql->getInstruction();
echo "<br > \n";
