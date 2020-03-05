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

class AlunoRecord extends TRecord {}

class CursoRecord extends TRecord {}

try {
    
    TTransaction::open('simpleERP');

    TTransaction::setLogger(new TLoggerTXT('tmp/log3.txt'));

    TTransaction::log("** obtendo o aluno 1");

    $record = new AlunoRecord;
    
    $aluno = $record->load(1);

    if($aluno) {

        $aluno->telefone = "(51) 1111 - 3333";
        TTransaction::log("** persistindo o aluno 1");
        $aluno->store();
    }

    TTransaction::log("** obtendo o curso 1");
    $record = new CursoRecord;
    $curso = $record->load(1);

    if ($curso) {

        $curso->duracao = 28;
        TTransaction::log("** persistindo o curso 1");
        $curso->store();
    }

    TTransaction::close();
    echo "Registros alterados com sucesso <br/>";

} catch ( Exception $e) {
    echo '<b>ERRO</b>' . $e->getMessage();
    TTransaction::rollback();
}
