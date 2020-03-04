<?php

final class TConnection
{
    private function __construct() {}

    public static function open($name) {


      
        if (file_exists("../capt3/app.config/{$name}.ini")) {
            $db = parse_ini_file("../capt3/app.config/{$name}.ini");

        } else {
            throw new Exception("Arquivo {$name} não encontrado: {$db} ");
        }

        $user = $db['user'];
        $pass = $db['pass'];
        $dbname = $db['dbname'];
        $host = $db['host'];
        $type = $db['type'];
        $port = $db['port'];

        switch($type) {
            case 'pgsql':
                $conn = new PDO("pgsql:dbname={$dbname};user={$user}; password={$pass}; host=$host");
                break;
            case 'mysql':
                $conn = new PDO("mysql:host={$host};port={$port};dbname={$dbname}", $user, $pass);
                break;
        }
        
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
}
