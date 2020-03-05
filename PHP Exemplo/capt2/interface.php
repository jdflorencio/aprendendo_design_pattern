<?php

interface IAluno{

    function getNome();
    function setNome($nome);
    function setResponsavel(Pessoa $pessoa);
}

class Aluno implements IAluno
{
    function setNome($nome)
    {
        $this->nome = $nome;
    }

    function getNome()
    {
        return $this->nome;
    }
}

$joaninha = new Aluno;

$joaninha->setNome('Joana Maranhao');
echo $joaninha->getNome();