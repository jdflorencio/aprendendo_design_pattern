<?php
include_once 'app.ado/TExpression.class.php';
include_once 'app.ado/TCriteria.class.php';
include_once 'app.ado/TFilter.class.php';
include_once 'app.ado/TSqlInstruction.class.php';
include_once 'app.ado/TSqlDelete.class.php';

$criteria = new TCriteria;
$criteria->add(new TFilter('id', '=', '3'));

$sql = new TSqlDelete;

$sql->setEntity('aluno');
$sql->setCriteria($criteria);
echo $sql->getInstruction();
echo "<br />";
