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
 class TurmaRecord extends TRecord {}
 class InscricaoRecord extends TRecord {}

 try {

    TTransaction::open('simpleERP');
    TTransaction::setLogger(new TLoggerTXT('tmp/log6.txt'));

    $criteria = new TCriteria;

    $criteria->add(new TFilter('turno', '=', T));
    $criteria->add(new TFilter('encerrada', '=', FALSE));

    $repository = new TRepository('Turma');
    $turmas =  $repository->load($criteria);

    if($turmas) {
        echo "Turmas retornadas <br />";
        echo "====================<br />";

        foreach($turmas as $turma ) {
            
            echo 'ID  :  ' . $turma->id;
            echo 'Dia  :  ' . $turma->dia_semana;
            echo 'Sala  ' . $turma->sala;
            echo 'Turno : ' . $turma->turno;
            echo 'Professor: ' . $turma->professor;
            echo "<br />";

        }
    }

    $criteria = new TCriteria;

    $criteria->add(new TFilter('nota', '>= ', 7));

 } catch (Exception $e) {
     echo '<b> ERRO: </b> ' . $e->getMessage();
      TTransaction::rollback();
 }