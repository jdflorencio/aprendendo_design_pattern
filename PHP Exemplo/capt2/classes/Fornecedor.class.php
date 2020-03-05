<?php


class Fornecedor 
{
    var $codigo;
    Var $RazaoSocial;
    var $Endereco;
    var $Cidade;
    var $Contato;

    function __construct() 
    {
        $this->Contato = new Contato;
    }

    function SetContato($Nome, $Telefone, $Email)
    {
        $this->Contato->SetContato($Npme, $Telefone, $Email);
    }

    function GetContato() 
    {
        return $this->Contato->GetContato();
    }
}