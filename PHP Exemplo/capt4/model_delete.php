<?php

function __autoload($classe) 
{
    if (file_exists("app.ado/{$classe}.class.php")) {
        
        include_once "app.ado/{$classe}.class.php";
        echo $classe;
    }

    if (file_exists("../capt3/app.ado/{$classe}.class.php"))  {

        include_once "../capt3/app.ado/{$classe}.class.php";
    }
}


class AlunoRecord extends TRecord { }
class CursoRecord extends TRecord { }

try {

    TTransaction::open('simpleERP');
    TTransaction::setLogger(new TLoggerTXT('tmp/log5.txt'));
    TTransaction::log(" ** Apagando da primeira forma ");
    $aluno = new AlunoRecord(1);
 
    $aluno->delete();

    TTransaction::log("** Apagando da segunda forma ");
    $modelo = new AlunoRecord;
    $modelo->delete(2);

    TTransaction::close();

    echo "Exclusão Realizada com sucesso <br> \n";

} catch(Exception $e) {

    echo '<b>ERRO<b/>' . $e->getMessage();
    TTransaction::rollback();

}