<?php

include_once 'app.ado/TExpression.class.php';
include_once 'app.ado/TCriteria.class.php';
include_once 'app.ado/TFilter.class.php';
include_once 'app.ado/TSqlInstruction.class.php';
include_once 'app.ado/TSqlInsert.class.php';

$sql = new TSqlInsert;
$sql->setEntity('aluno');
$sql->setRowData('nome', 'Pedro Cardoso');
$sql->setRowData('telefone', '(88) 4444-7777');
$sql->setRowData('nascimento', '1985-04-12');
$sql->setRowData('sexo', 'M');
$sql->setRowData('serie', '4');
$sql->setRowData('mensalidade', 280.40);

echo $sql->getInstruction();
echo "<br /> \n";

