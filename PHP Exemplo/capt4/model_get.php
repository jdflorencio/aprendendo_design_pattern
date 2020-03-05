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
    TTransaction::setLogger(new TLoggerTXT('tmp/log2.txt'));

    echo "Obtendo Alunos <br />";
    echo "==================== <br/>";

    $aluno = new AlunoRecord(1);
    echo 'Nome     :' . $aluno->nome . " <br />";
    echo 'Endereço : ' . $aluno->endereco . "<br />";

    $aluno = new AlunoRecord(2);
    echo 'Nome     :' . $aluno->nome . " <br />";
    echo 'Endereço : ' . $aluno->endereco . "<br />";

    // Obtendo cursos

    echo "<br />";

    echo "+++++++++++++++++";

    $curso = new CursoRecord(1);
    echo "Curso : " . $curso->descricao . "<br />";

    $curso = new CursoRecord(2);
    echo "Curso : " . $curso->descricao . "<br />";
    
    TTransaction::close();    

} catch (Exception $e) {
    echo '<b> Erro</b>' . $e->getMessage();
    TTransaction::rollback();

}