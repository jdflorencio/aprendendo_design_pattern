<?php


final class TSqlInsert extends TSqlInstruction
{
    /**
     * Atribui valores à determinadas colunas no banco de dados que serão inseridas
     *
     * @param  $column = coluna da table
     * @param $value = valores a ser armazenado
     * @return void
     */
    public function setRowData($column, $value)
    {
        if (is_string($value))
        {
            // ADICIONA \ EM ASPAS
            $value = addslashes($value);
            $this->columnValues[$column] = "'$value'";
        
        } else if (is_bool($value)) {
            // caso seja um boolean
            $this->columnValues[$column] = $value ? 'TRUE' : 'FALSE';

        } else if (isset($value)) {
            $this->columnValues[$column] = $value;

        } else {
            $this->columnValues[$column] = "NULL";
        }
    }

    /**
     * Não exite no contexto dessa classe, logo dará um erro se for iniciado
     *
     * @param [type] $criteria
     * @return void
     */
    public function setCriteria($criteria)
    {
        throw new Exception("Cannot call setCriteria from " . __CLASS__);
    }

    /**
     *retorna a instrução de INSERT em forma de string.
    */
    public function getInstruction() 
    {
        $this->sql = "INSERT INTO {$this->entity} (";
        $columns = implode(',', array_keys($this->columnValues));
        $values = implode(',', array_values($this->columnValues));
        $this->sql .= $columns . ')';
        $this->sql .= " values ({$values})";

        return $this->sql;
    }
}