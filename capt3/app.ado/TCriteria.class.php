<?php

class TCriteria extends TExpression {
    
    private $expressions;
    private $operators;
    private $properties;

    /**
     * Adiciona uma expressao ao criterio
     *
     * @param TExpression $expressions
     * @param string $operator
     * @return void
     */
    public function add(TExpression $expression, $operator = self::AND_OPERATOR) {
        
        if (empty($this->expressions)) {
            unset($operator);
        }

        $this->expressions[] = $expression;
        $this->operators[] = $operator;
    }

    public function dump() {
        if (is_array($this->expressions)) {

            foreach ($this->expressions as $i => $expression) {
                    $operator = $this->operators[$i];
                    $result .= $operator . $expression->dump() . ' ';
            }
        }

        $result = trim($result);
        return "({$result})";
    }

    /**
     * Defini o valor de uma propriedade
     *
     * @param propriedade $property
     * @param valor $value
     * @return void
     */
    public function setProperty($property, $value) {
        $this->properties[$property] = $value;
    }

    /**
     * Retorna o valor de uma propriedade
     *
     * @param [type] $property
     * @return void
     */
    public function getProperty($property) {
        
        return $this->properties[$property];
    }
}