<?php

namespace Source\Models;

class DBConnection
{
    private static $instance;

    public static function getConn()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "sistemaeventos";

        if (!isset(self::$instance)) {
            try {
                self::$instance = new \PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            } catch (\PDOException $e) {
                die('Erro na conexão: ' . $e->getMessage());
            }
        }

        return self::$instance;
    }
}

?>
