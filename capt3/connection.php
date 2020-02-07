<?php

include_once 'app.ado/TExpression.class.php';
include_once 'app.ado/TCriteria.class.php';
include_once 'app.ado/TFilter.class.php';
include_once 'app.ado/TSqlInstruction.class.php';
include_once 'app.ado/TSqlSelect.class.php';
include_once 'app.ado/TConnection.class.php';

$sql = new TSqlSelect;
$sql->setEntity('pessoa');
$sql->addColumn('codigo');
$sql->addColumn('nome');

$criteria = new TCriteria;
$criteria->add(new TFilter('codigo', '=', '1'));
echo $sql->getInstruction();

$sql->setCriteria($criteria);

try {
    $conn = TConnection::open('simpleERP');

    $result = $conn->query($sql->getInstruction());
    if($result) {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        echo $row[codigo] . ' - ' . $row['nome'] . "\n";
    }
    
    $conn = null;

} catch (PDOException $e) {
    print "Erro!: " . $e->getMessage() . "<br />";
    die();
}