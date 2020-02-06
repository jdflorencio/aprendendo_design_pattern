<?php

include_once 'app.ado/TExpression.class.php';
include_once 'app.ado/TCriteria.class.php';
include_once 'app.ado/TFilter.class.php';


//EXEMPLO DE OPERADOR OR

$criteria = new TCriteria;
$criteria->add(new TFilter('idade', '<', 16), TExpression::OR_OPERATOR);
$criteria->add(new TFilter('idade', '>', 60), TExpression::OR_OPERATOR);
echo $criteria->dump();
echo "<br /> \n";

//EXEMPLO USANDO O OPERADOR LOGICO AND JUNTAMENTE COM O COJUNTO IN(DENTRO DO COJUNTO ) E FORA O NOT IN
$criteria = new TCriteria;
$criteria->add(new TFilter('idade', 'IN', array(24,25,26) ));
$criteria->add(new TFilter('idade', 'NOT IN', array(10)));
echo $criteria->dump();
echo " <br />\n";

// EXEMPLO USANDO O LIKE
$criteria = new TCriteria;
$criteria->add(new TFilter('nome', 'like', 'pedro%'));
$criteria->add(new TFilter('nome', 'like', 'maria%'));
echo $criteria->dump();
echo " <br />\n";

//usando operadores '=' e IS NOT | TELFONE: NÃO PODE SER NULO | O SEXO DEVE SER FEMININO
$criteria = new TCriteria;
$criteria->add(new TFilter('telefone', 'IS NO', 'NULL'));
$criteria->add(new TFilter('sexo', '=', 'F'));
echo $criteria->dump();
echo " <br />\n";

//OPERADORES DE COMPARAÇÃO IN e NOT IN | CONJUNTO DE STRINGS >>(RS, SC,PR)
$criteria = new TCriteria;
$criteria->add(new TFilter('UF', 'IN', array('RS','SC','PR')));
$criteria->add(new TFilter('UF', 'NOT IN', array('AC', 'PI')));
echo $criteria->dump();
echo " <br />\n";

/* NESTE CASO TEMOS O USO DE UM CRITERIO COMPOSTO 
* O Primeiro criterio aponta para sexo = 'F'
*(sexo feminino) e idade > 18 (maior de idade)
*/
$criteria = new TCriteria;
$criteria->add(new TFilter('sexo', '=', 'M'));
$criteria->add(new TFilter('idade', '<', '16'));
echo $criteria->dump();
echo " <br />\n";




