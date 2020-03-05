<?php

include_once 'app.ado/TExpression.class.php';
include_once 'app.ado/TCriteria.class.php';
include_once 'app.ado/TFilter.class.php';
include_once 'app.ado/TSqlInstruction.class.php';
include_once 'app.ado/TSqlSelect.class.php';

$criteria = new TCriteria;
$criteria->add(new TFilter('nome', 'like', 'Maria%'));
$criteria->add(new TFilter('cidade', 'like', 'porto%'));

$criteria->setProperty('offset', 0);
$criteria->setProperty('limit', 10);
// Define  ordamento da consulta
$criteria->setProperty('order', 'nome');

$sql = new TSqlSelect;

$sql->setEntity('aluno');
$sql->addColumn('nome');
$sql->addColumn('fone');
$sql->setCriteria($criteria);

echo $sql->getInstruction();
