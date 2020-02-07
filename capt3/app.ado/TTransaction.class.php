<?php

final class TTransaction
{
    private static $conn;
    private static $logger;

    private function __construct() {}

    public static function open($database)
    {
        if ( empty(self::$conn)) {
            self::$conn = TConnection::open($database);
            self::$conn->beginTransaction();

            self::$logger = NULL;
        }
    }

    /**
     * Retornar a conexao ativa da transaction
     *
     * @return void
     */
    public static function get() {
        return self::$conn;
    }


    /**
     * Desfaz todas as operações realizadas da transação.
     *
     * @return void
     */
    public static function rollback()
    {
        if (self::$conn)
        {
            self::$conn->rollback();
            self::$conn = NULL;
            
        }

    }


    public static function close()
    {
        if (self::$conn) {
                self::$conn->commit();
                self::$conn = NULL;

        }
    }

    /**
     * Definie qual a estrategia (algoritmo de log será usado)
     *
     * @param TLooger $logger
     * @return void
     */
    public static function setLogger(TLooger $logger) : void
    {
        self::$logger = $logger;
    }


    /**
     * método log
     * Define qual mensagem no arquivo de LOG
     * baseada na estrategia ($looger) atual
     *
     * @param [type] $message
     * @return void
     */
    public static function log($message) : void
    {
        if (self::$looger) {
            self::$logger->write($message);
        }
    }
}

