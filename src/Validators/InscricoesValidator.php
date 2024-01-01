<?php

namespace Source\Validators;
use Source\Models\eventos;

class InscricoesValidator{
    public static function inscricaoValidator($dados){
        $erros = [];
    
        if(!isset($dados['nome']) || empty($dados['nome'])){
            array_push($erros, "Nome não informado.");
        }

        if(!isset($dados['email']) || empty($dados['email'])){
            array_push($erros, "Email não informado.");
        }

        if(!isset($dados['evento']) || empty($dados['evento'])){
            array_push($erros, "Evento não informado.");
        }

        $id = Eventos::getEventoByNome($dados['evento']);
        if($id){
            if($id['vagas'] > 0){
                $status = Eventos::getStatus($id);

                if($status == "Em andamento"){
                    array_push($erros, "Não é possível se inscrever em um evento que já foi iniciado.");
                }

                if($status == "Cancelado"){
                    array_push($erros, "Não é possível se inscrever em um evento que foi cancelado.");
                }

                if($status == "Concluido"){
                    array_push($erros, "Não é possível se inscrever em um evento que já foi concluido.");
                }
            }else{
                array_push($erros, "Não há vagas para esse evento.");
            }
        }else{
            array_push($erros, "Evento não encontrado.");
        }
    
        if(count($erros) > 0){
            return ["sucesso" => false, "erro" => $erros];
        }else{
            return ["sucesso" => true];
        }
    }

    public static function presencaValidator($dados){
        $erros =[];

        if(!isset($dados['id']) || empty($dados['id'])){
            array_push($erros, "Id não informado.");
        }

        if(!isset($dados['idInscrito']) || empty($dados['idInscrito'])){
            array_push($erros, "Id do inscrito não informado.");
        }

        if(!isset($dados['admin']) || empty($dados['admin'])){
            array_push($erros, "Id do admin não informado.");
        }

        if(!isset($dados['presenca']) || empty($dados['presenca'])){
            array_push($erros, "Presenca não informada.");
        }

        $status = Eventos::getStatus($dados);

        if($status == "Aberto para inscrições"){
            array_push($erros, "Não é possível confirmar presença ou ausência em um evento que não foi iniciado.");
        }

        if($status == "Cancelado"){
            array_push($erros, "Não é possível confirmar presença ou ausência em um evento cancelado.");
        }

        if($status == "Concluido"){
            array_push($erros, "Não é possível confirmar presença ou ausência em um evento concluido.");
        }

        if(count($erros) > 0){
            return ["sucesso" => false, "erro" => $erros];
        }else{
            return ["sucesso" => true];
        }
    }
}
