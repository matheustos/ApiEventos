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
}
