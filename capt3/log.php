<?php

include_once 'app.ado/TConnection.class.php';
include_once 'app.ado/TExpression.class.php';
include_once 'app.ado/TCriteria.class.php';
include_once 'app.ado/TFilter.class.php';
include_once 'app.ado/TSqlInstruction.class.php';
include_once 'app.ado/TSqlSelect.class.php';
include_once 'app.ado/TSqlInsert.class.php';
include_once 'app.ado/TTransaction.class.php';
include_once 'app.ado/TLogger.class.php';
include_once 'app.ado/TLoggerHTML.class.php';
include_once 'app.ado/TLoggerXML.class.php';

try {

    TTransaction::open('simpleERP');
    TTransaction::setLogger(new TLoggerHTML('/tmp/arquivo.html'));
    TTransaction::log('Inserindo registro Willian Wallacce');

    $sql = new TSqlInsert;
    $sql->setEntity('telefone');
    $sql->setRowData('pessoaId', 27);
    $sql->setRowData('telefone', '(73)3291-1112');

    $conn = TTransaction::get();
    $result = $conn->Query($sql->getInstruction());
    
    //ESCREVE A MENSAGEM DE LOG
    TTransaction::log($sql->getInstruction());
    TTransaction::setLogger(new TLoggerXML('/tmp/arquivo.xml'));

    $sql = new TSqlInsert;

    $sql->setEntity('telefone');

    $sql->setRowData('PessoaId', '27');
    $sql->setRowData('telefone', '(73)3281-1112');

    $conn = TTransaction::get();

    $result = $conn->Query($sql->getInstruction());

    TTransaction::log($sql->getInstruction());
    TTransaction::close();

} catch (Exception $e) {

    echo $e->getMessage();
    TTransaction::rollback();
}