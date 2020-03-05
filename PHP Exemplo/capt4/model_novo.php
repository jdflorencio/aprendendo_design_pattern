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

class AlunoRecord extends TRecord{}

class CursoRecord extends TRecord{ }

// insere novos dados objetos  no banco de dados

try {

    TTransaction::open('simpleERP');

    // define o arquivo para o logs
    TTransaction::setLogger(new TLoggerTXT('/tmp/log1.txt'));

    // armazena esta frase no arquivo de log
    TTransaction::log("** inserido alunos");

    // instancia um novo objeto Aluno
    $daline = new AlunoRecord;
    $daline->nome = "Daline da conceição";
    $daline->endereco = "rua da conceicao";
    $daline->telefone = "(51) 1111-2222";
    $daline->cidade =  'cruzeiro do sul';
    $daline->store(); 

    $willian = new AlunoRecord;
    $willian->nome = 'Willian Scatolla';
    $willian->endereco = 'Rua de fatima';
    $willian->telefone = '(51)1111-4444';
    $willian->cidade =  'encatando';
    $willian->store();

    //Armazena esta frase no arquivo de log 

    TTransaction::log("** inserindo cursos");
    $curso = new CursoRecord;
    $curso->descricao =  'Orientação a objetos com PHP';
    $curso->duracao = 24;
    $curso->store();

    $curso = new CursoRecord;
    $curso->descricao = 'Desenvolvendo com PHP-GTK';
    $curso->duracao = 32;
    $curso->store();

    //finaliza a transação
    TTransaction::close();

    echo 'Registro inseridos com Sucesso <br> \n';

} catch (Exception $e){
    echo '<b>Erro</b>' . $e->getMessage();
    // desfaz todas as alterações no banco de dados
    TTransaction::rollback();
}