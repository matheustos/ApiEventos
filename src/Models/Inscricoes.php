<?php

namespace Source\Models;

class Inscricoes{

    public static function realizarInscricao($dados){
        $sql = "INSERT INTO `inscricoes` (`evento`, `nome`, `email`)
        VALUES (:evento, :nome, :email)";


        $conn = DBConnection::getConn();
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":evento", $dados['evento']);
        $stmt->bindValue(":nome", $dados['nome']);
        $stmt->bindValue(":email", $dados['email']);
        
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $res = ['sucesso' => true, 'data' => Inscricoes::getInscritoById($conn->lastInsertId())];
        }else{
            $res = ['sucesso' => false, 'erros' => $stmt->errorInfo()];
        }

        return $res;
    }

    public static function getInscritoById($id){
        $sql = "SELECT * FROM inscricoes WHERE id = :id";
        $conn = DBConnection::getConn();
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $inscrito = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $inscrito;
    }

    public static function getInscritos(){
        $sql = "SELECT * FROM inscricoes";
        $conn = DBConnection::getConn();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $inscritos = $stmt->fetchALL(\PDO::FETCH_ASSOC);

        return $inscritos;
    }

    public static function confirmaPresenca($dados){
        $presenca = "Presente";
        $sql = "UPDATE inscricoes SET presenca = :presenca WHERE id = :id";
        $conn = DBConnection::getConn();
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':presenca', $presenca);
        $stmt->bindValue(':id', $dados);
        $stmt->execute();

        return Inscricoes::getInscritoById($dados);
    }

    public static function confirmaAusencia($dados){
        $presenca = "Ausente";
        $sql = "UPDATE inscricoes SET presenca = :presenca WHERE id = :id";
        $conn = DBConnection::getConn();
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':presenca', $presenca);
        $stmt->bindValue(':id', $dados);
        $stmt->execute();

        return Inscricoes::getInscritoById($dados);
    }
}