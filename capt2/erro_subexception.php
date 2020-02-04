<?php

function Abrir($file = null)
{
    if (!$file)
    {
        throw new  ParameterException('Falta o Parâmetro com o nome do arquivo');
    }

    if (!file_exists($file))
    {
        throw new FileNotFoundException('Arquivo Não existe');
    }

    if (!$retorno = @file_get_contents($file)) {
        throw new FilePermissionException('Impossivel ler o arquivo');
    }

    return $retono;
}

class ParameterException extends Exception{}
class FileNotFoundException extends Exception{}
class FilePermissionException extends Exception{}

try
{
    $arquivo = Abrir('/tmp/arquivo.dat');
} catch(ParameterException $exececao) {

} catch (FileNotFoundException $exececao) {
    var_dump($exececao->getTrace());
    echo "finalizando aplicação";
    die;
} catch (FilePermissionException $exececao) {
    echo $exececao->getFile() . ' : ' . $exececao->getLine() . ' # ' . $exececao->getMessage();
}