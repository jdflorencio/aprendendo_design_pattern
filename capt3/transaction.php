<?php

include_once 'app.ado/TExpression.class.php';
include_once 'app.ado/TCriteria.class.php';
include_once 'app.ado/TFilter.class.php';
include_once 'app.ado/TSqlInstruction.class.php';
include_once 'app.ado/TSqlInsert.class.php';
include_once 'app.ado/TSqlUpdate.class.php';
include_once 'app.ado/TTransaction.class.php';
include_once 'app.ado/TConnection.class.php';


try {
    TTransaction::open('simpleERP');

    //cria um insert 
    $sql = new TSqlInsert;
    $sql->setEntity('telefone');
    $sql->setRowData('pessoaID', 27);
    $sql->setRowData('telefone', '(73)3921-1112');

    //conexao ativa

    $conn = TTransaction::get();
    $result = $conn->Query($sql->getInstruction());
    $sql = new TSqlUpdate;
    $sql->setEntity('telefone');
    $sql->setRowData('telefone', '123456789');

    $criteria = new TCriteria;
    $criteria->add(new TFilter('pessoaId_', '=', 27));
    $sql->setCriteria($criteria);

    $conn = TTransaction::get();
    $result = $conn->Query($sql->getInstruction());

    TTransaction::close();


} catch (Exception $e) {
    echo $e->getMessage();
    TTransaction::rollback();

}