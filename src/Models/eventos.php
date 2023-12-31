<?php

namespace Source\Models;
use Source\Models\DBConnection;

class Eventos{
    public static function cadastrar($dados, $status){

        $sql = "INSERT INTO `eventos` (`nome`, `dataInicio`, `dataTermino`, `horaInicio`, `horaTermino`, `descricao`, `vagas`, `categoria`, `status`)
        VALUES (:nome, :dataInicio, :dataTermino, :horaInicio, :horaTermino, :descricao, :vagas, :categoria, :status)";


        $conn = DBConnection::getConn();
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":nome", $dados['nome']);
        $stmt->bindValue(":dataInicio", $dados['dataInicio']);
        $stmt->bindValue(":dataTermino", $dados['dataTermino']);
        $stmt->bindValue(":horaInicio", $dados['horaInicio']);
        $stmt->bindValue(":horaTermino", $dados['horaTermino']);
        $stmt->bindValue(":descricao", $dados['descricao']);
        $stmt->bindValue(":vagas", $dados['vagas']);
        $stmt->bindValue(":categoria", $dados['categoria']);
        $stmt->bindValue(":status", $status);
        
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $res = ['sucesso' => true, 'data' => Eventos::getEvento($conn->lastInsertId())];
        }else{
            $res = ['sucesso' => false, 'erros' => $stmt->errorInfo()];
        }

        return $res;
    }

    public static function getEvento($id){
        $sql = "SELECT * FROM eventos WHERE id = :id";
        $conn = DBConnection::getConn();
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $evento = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $evento;
    }

    public static function getEventos(){
        $sql = "SELECT * FROM eventos";
        $conn = DBConnection::getConn();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $evento = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return ["sucesso" => true, "conteudo" => $evento];
    }

    public static function getEventoByDate($data){
        $sql = "SELECT * FROM eventos WHERE dataInicio = :dataInicio";
        $conn = DBConnection::getConn();
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":dataInicio", $data['dataInicio']);
        $stmt->execute();
        $evento = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return ["sucesso" => true, "conteudo" => $evento];
    }

    public static function getEventoByCategoria($categoria){
        $sql = "SELECT * FROM eventos WHERE categoria = :categoria";
        $conn = DBConnection::getConn();
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":categoria", $categoria['categoria']);
        $stmt->execute();
        $evento = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return ["sucesso" => true, "conteudo" => $evento];
    }

    public static function getEventoById($id){
        $sql = "SELECT * FROM eventos WHERE id = :id";
        $conn = DBConnection::getConn();
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":id", $id['id']);
        $stmt->execute();
        $evento = $stmt->fetch(\PDO::FETCH_ASSOC);

        return ["sucesso" => true, "conteudo" => $evento];
    }

    public static function getDate($id){
        $sql = "SELECT dataInicio FROM eventos WHERE id = :id";
        $conn = DBConnection::getConn();
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id['id']);
        $stmt->execute();
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        $dataDoEvento = substr($data['dataInicio'], 0, 10);
        return $dataDoEvento;
    }

    public static function getStatus($id){
        $sql = "SELECT status FROM eventos WHERE id = :id";
        $conn = DBConnection::getConn();
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id['id']);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        $status = substr($result['status'], 0, 50);
        return $status;
    }

    public static function cancelarEvento($id){
        $status = "Cancelado";
        $sql = "UPDATE eventos SET status = :status WHERE id = :id";
        $conn = DBConnection::getConn();
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id['id']);
        $stmt->execute();

        return Eventos::getEventoById($id);
    }

    public static function concluirEvento($id){
        $status = "Concluido";
        $sql = "UPDATE eventos SET status = :status WHERE id = :id";
        $conn = DBConnection::getConn();
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id['id']);
        $stmt->execute();

        return Eventos::getEventoById($id);
    }

    public static function iniciarEvento($id){
        $status = "Em andamento";
        $sql = "UPDATE eventos SET status = :status WHERE id = :id";
        $conn = DBConnection::getConn();
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id['id']);
        $stmt->execute();
        return Eventos::getEventoById($id);
    }

}