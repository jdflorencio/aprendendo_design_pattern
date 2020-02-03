<?php

class Pessoa
{
	function __construct($Codigo, $Nome, $Altura, $Idade, $Nascimento, $Escolaridade, $Salario) {

		$this->Codigo = $Codigo;
		$this->Nome = $Nome;
		$this->Altura = $Idade;
		$this->Nascimento = $Nascimento;
		$this->Escolaridade = $Escolaridade;
		$this->Salario = $Salario;
	}

	function __destruct() {
		echo "Objeto {$this->Nome} finalizado... \n";
	}
}

?>