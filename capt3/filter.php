<?php
include_once 'app.ado/TExpression.class.php';
include_once 'app.ado/TFilter.class.php';

//STRING
$filter1 = new TFilter('data', '=', '2007-06-02');
echo $filter1->dump();
echo "<br /> \n";

//INTEGER
$filter2 = new TFilter('salario', '>', 3000);
echo $filter2->dump();
echo "<br /> \n";

//ARRAY
$filter3 = new TFilter('sexo', 'IN', array('M', 'F'));
echo $filter3->dump();
echo "<br /> \n";

//NULL
$filter4 = new TFilter('contrato', 'IS NOT', NULL);
echo $filter4->dump();
echo "<br /> \n";

//BOOLEAN
$filter5 = new TFilter('ativo', '=', TRUE);
echo $filter5->dump();
echo "<br /> \n";