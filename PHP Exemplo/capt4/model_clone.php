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

$fabio = new AlunoRecord;
$fabio->nome = "Fábio Locatelli";
$fabio->endereco = "Rua Merlin";
$fabio->telefone = '(51) 2222 - 1111';
$fabio->cidade  = 'Lajeado';

$julia = clone $fabio;
 $julia->nome = 'Júlia Haubert';
 $julia->telefone =  '(51) 2222-2222';

 try {
     
    TTransaction::open('simpleERP');

    TTransaction::setLogger(new TLoggerTXT('tmp/log4.txt'));

    TTransaction::log("** persistindo o curso   \$fabio ");
    
    $fabio->store();

    TTransaction::log("** persistindo o curso  \$julia");

    $julia->store();

    TTransaction::close();

    echo "clonagem realizada com sucesso <br />";

 } catch ( Exception $e) {
     echo '<b>ERRO<b/>' . $e->getMessage();
     TTransaction::rollback();
 }
