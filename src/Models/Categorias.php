<?php


namespace Source\Models;

use Source\Models\DBConnection;

class Categorias{

    public static function getCategorias(){
        $sql = "SELECT * FROM categorias";
        $conn = DBConnection::getConn();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $categorias = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $categorias;
    }
    
}