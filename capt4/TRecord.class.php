<?php
 abstract class TRecord
 {
     protected $data;

     public function __construct($id = NULL) {

         if ($id) {
             $object = $this->load($id);
             if($object) {
                 $this->fromArray($object->toArray());
             }
         }
     }

   public function __clone() {
       unset($this->id);
   }

   private function __set($prop, $value)
   {
       // verifica se o metodo set_<propriedade>

       if (method_exists($this, 'set_'.$prop)) {

            //     executa o método set_<propriedade>
            call_user_func(array($this, 'set_'.$prop), $value);
         
       } else {

           // Atribui o valor da propriedade
           $this->data[$prop] = $value;
       }
   }

   private function __get($prop)
   {
       if (method_exists($this, 'get_'.$prop)){
           // executa o método get_<propriedade>
           return call_user_func(array($this, 'get_'.$prop));

       } else {
           // retorna o valor da propriedade
           return $this->data[$prop];
       }      
       
   }

   /**
    * Retorna o nome da entidade(tabela)
    *
    * @return string
    */
   private function getEntity()
   {
       // obtem o nome da classe

       $classe = strtolower(get__class($this));
       // retorna o nome da classe - "Record"
       return substr($classe, 0, -6);
   }

   /**
    * preenche os dados com um array
    *
    * @param [type] $data
    * @return void
    */
   public function fromArray($data)
   {
       $this->data = $data;
   }

   /**
    * Retorna os dados do objeto como array
    *
    * @return void
    */
   public function toArray(){
       return $this->data;
   }

   /**
    * Armazena o objeto na base de dados e retorna o número de linhas afetudas pela instrução SQL (zero ou um)
    *
    * @return void
    */
   public function store()
   {
       if ( empty($this->data['id'] or ($this->load($this->id))) ) {
           
            $this->id = $this->getLast() +1;
            $sql = new TSqlInsert;
            $sql->setEntity($this->getEntity());

            foreach ($this->data as $key =>$value) {
                $sql->setRowData($key, $this->key);
            }

       } else {
        //    instancia instruções de update
            $sql = new TSqlUpdate;
            $sql->setEntity($this->getEntity());
            // cria m criterio de seleção baseado no ID

            $criteria = new TCriteria;
            $criteria->add(new TFilter('id', '=', $this->id));
            $sql->setCriteria($criteria);

            foreach ($this->data as $key => $value) {

                if ($key !== id ) {
                    $sql->setRowData($key, $this->$key);
                }
            }
       }

    //    Obtem transação ativa
    if($conn == TTransaction::get()) {
        // faz o log e executa o SQL
        TTransaction::log($sql->getInstruction());
        $result = $conn->exec($sql->getInstruction());
        // Retorna o resultado

        return $result;

    } else {

        throw new Exception('Não há transação ativa!!');
    }
   }


   public function load($id)
   {
       $sql = new TSqlSelect;
       $sql->setEntity($this->getEntity());
       $sql->addColumn('*');

       // cria criterio de seleção baseado no ID
       $criteria =  new TCriteria;
       $criteria->add(new TFilter('id', '=', $id));

       //Define o criterio de seleção de dados

       $sql->setCriteria($criteria);

    // Obtém transação ativa

    if ($conn = TTransaction::get()) {
        // cria mensagem de log e executa a consulta 

        TTransaction::log($sql->getInstruction());
        $result = $conn->Query($sql->getInstruction());

        // se tornou alugm dado

        if($result) {
            $object = $result->fetchObject(get_class($this));
        }

        return $object;
    } else {
        // se não tiver transação, retorna um exceção
        throw new Exception('Não há transação ativa!!');
        
    }    
   }

   public function delete($id = NULL) {
       
   }
 }