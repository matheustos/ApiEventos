<?php

namespace Source\Validators;
use Source\Models\Eventos;

class EventosValidator{

    public static function validaDados($dados){
        $erros = [];

        if(!isset($dados['nome']) || empty($dados['nome'])){
            array_push($erros, "Nome do evento não informado.");
        }

        if(!isset($dados['dataInicio']) || empty($dados['dataInicio'])){
            array_push($erros, "Data de inicio é obrigatória.");
        }else{
            $dataAtual = date('Y-m-d');
            if($dataAtual >= $dados['dataInicio']){
                array_push($erros, "A data do evento deve ser superior à data de hoje");
            }
        }

        if(!isset($dados['dataTermino']) || empty($dados['dataTermino'])){
            array_push($erros, "Data de inicio é obrigatória..");
        }else{
            if($dados['dataTermino'] != $dados['dataInicio']){
                array_push($erros, "Todos os eventos devem começar e terminar no mesmo dia");
            }
        }

        if(!isset($dados['horaInicio']) || empty($dados['horaInicio'])){
            array_push($erros, "Hora de inicio é obrigatória.");
        }

        if(!isset($dados['horaTermino']) || empty($dados['horaTermino'])){
            array_push($erros, "Hora de término é obrigatória..");
        }

        if(!isset($dados['descricao']) || empty($dados['descricao'])){
            array_push($erros, "Descrição do evento não informada");
        }

        if(!isset($dados['vagas']) || empty($dados['vagas'])){
            array_push($erros, "Quantidade de vagas não informada.");
        }

        if(!isset($dados['categoria']) || empty($dados['categoria'])){
            array_push($erros, "Categoria do evento não informada.");
        }

        if(!isset($dados['admin']) || empty($dados['admin'])){
            array_push($erros, "Por favor informe o id de usuário.");
        }

        if(count($erros) > 0){
            return ["sucesso" => false, "erro" => $erros];
        }else{
            return ["sucesso" => true];
        }
    }

    public static function getEventoByDateValidator($data){
        $erros = [];

        if(!isset($data['dataInicio']) || empty($data['dataInicio'])){
            array_push($erros, "A data deve ser informada.");
        }

        if(count($erros) > 0){
            return ["sucesso" => false, "erro" => $erros];
        }else{
            return ["sucesso" => true];
        }
    }

    public static function getEventoByCatValidator($categoria){
        $erros = [];

        if(!isset($categoria['categoria']) || empty($categoria['categoria'])){
            array_push($erros, "A categoria deve ser informada.");
        }

        if(count($erros) > 0){
            return ["sucesso" => false, "erro" => $erros];
        }else{
            return ["sucesso" => true];
        }
    }

    public static function cancelarEventoValidator($id){
        $erros = [];

        if(!isset($id['admin']) || empty($id['admin'])){
            array_push($erros, "O id de administrador deve ser informado.");
        }  

        if(!isset($id['id']) || empty($id['id'])){
            array_push($erros, "O id deve ser informado.");
        }else{
            $data = Eventos::getDate($id);
            if($data){
                $dataAtual = date('Y-m-d');
                if($data == $dataAtual){
                    array_push($erros, "Não é possivel cancelar o evento na data de inicio.");
                }
            }else{
                array_push($erros, "Evento não encontrado.");
            }

            $status = Eventos::getStatus($id);
            if($status == "Cancelado"){
                array_push($erros, "O evento já consta como cancelado.");
            }
        }

        if(count($erros) > 0){
            return ["sucesso" => false, "erro" => $erros];
        }else{
            return ["sucesso" => true];
        }
    }

    public static function concluirEventoValidator($id){
        $erros = [];

        if(!isset($id['admin']) || empty($id['admin'])){
            array_push($erros, "O id de administrador deve ser informado.");
        }else{
            if(!isset($id['id']) || empty($id['id'])){
                array_push($erros, "O id deve ser informado.");
            }elseif($id['admin'] != 1){
                array_push($erros,"Usuário não autorizado");
            }else{
                $status = Eventos::getStatus($id);
                if($status == "Aberto para inscrições"){
                    array_push($erros, "Só é possível concluir um evento após ter sido iniciado.");
                }elseif($status == "Concluido"){
                    array_push($erros, "O evento já consta como concluido.");
                }elseif($status == "Cancelado"){
                    array_push($erros, "Não é possível concluir um evento que já está cancelado.");
                }
            }
        } 

        if(count($erros) > 0){
            return ["sucesso" => false, "erro" => $erros];
        }else{
            return ["sucesso" => true];
        }
    }
}