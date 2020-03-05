<?php

final class TRepository 
{
    private $class;

    
    function __construct($class) {
        $this->class = $class;
    }

    function load(Tcriteria $criteria)
    {
        $sql = new TSqlSelect;
        $sql->addColumn('*');
        $sql->setEntity($this->class);
        $sql->setCriteria($criteria);

        if($conn = TTransaction::get())
        {
            TTransaction::log($sql->getInstruction());

            if($result)  {
                while ($row = $result->fetchObject($this->class . 'Record')) {
                    $results[] = $row;
                }
                return $results;
            } else {

                throw new Exception('Não há transação ativa!!');
            }
        }
    }

    function delete(TCriteria $criteria)
    {
        $sql = new TSqlDelete;
        $sql->setEntity($this->class);
        $sql->setCriteria($criteria);

        if ($conn = TTransaction::get()) {
            TTransaction::log($sql->getInstruction());

            $result = $conn->exec($sql->getInstruction());
            return $result;
        } else { 
            throw new Exception('Não há transação ativa!!');
        }
    }

    function count(TCriteria $criteria) 
    {
        $sql = new TSqlSelect;
        $sql->addColumn('count(*)');

        $sql->setEntity($this->class);
        $sql->setCriteria($criteria);

        if($conn = TTransaction::get()) {
            TTransaction::log($sql->getInstruction());
            $result = $conn->Query($sql->getInstruction());

            if ($result) {
                $row = $result->fetch();
            }
            return $row[0];

        } else {
            throw new Exception('Não há transação ativa!!');

        }
    }
}
