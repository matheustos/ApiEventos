<?php

namespace Source\Controllers;

use Source\Models\eventos;
use Source\Validators\EventosValidator;

class EventosController{

    public static function cadastrarEvento($dados){

        $validacao = EventosValidator::validaDados($dados);

        if (!$validacao['sucesso']){
            return ["sucesso"=> false, "conteúdo" => $validacao['erro']];
        }else{
            if($dados['admin'] != 1){
                return ["sucesso"=> false, "conteudo"=> "Usuário não autorizado"];
            }
            $status = "Aberto para inscrições";
            $cadastrar = Eventos::cadastrar($dados, $status);

            return ["sucesso"=> true, "conteúdo" => $cadastrar['data']];
        }
    }

    public static function getEventoByDateController($data){

        $validacaoData = EventosValidator::getEventoByDateValidator($data);

        if (!$validacaoData['sucesso']){
            return ["sucesso"=> false, "conteúdo" => $validacaoData['erro']];
        }else{
            $eventos = Eventos::getEventoByDate($data);
            return ["sucesso" => true, "conteudo" => $eventos];
        }
    }

    public static function getEventoByCatController($categoria){

        $validacaoCategoria = EventosValidator::getEventoByCatValidator($categoria);

        if (!$validacaoCategoria['sucesso']){
            return ["sucesso"=> false, "conteúdo" => $validacaoCategoria['erro']];
        }else{
            $eventos = Eventos::getEventoByCategoria($categoria);
            return ["sucesso" => true, "conteudo" => $eventos];
        }
    }

    public static function cancelarEventoController($id){

        $validacaoEvento = EventosValidator::cancelarEventoValidator($id);

        if (!$validacaoEvento['sucesso']){
            return ["sucesso"=> false, "conteúdo" => $validacaoEvento['erro']];
        }else{
            if($id['admin'] != 1){
                return ["sucesso"=> false, "conteudo"=> "Usuário não autorizado"];
            }
            $eventos = Eventos::cancelarEvento($id);
            return $eventos;
        }
    }

    public static function concluirEventoController($id){

        $validacaoEvento = EventosValidator::concluirEventoValidator($id);

        if (!$validacaoEvento['sucesso']){
            return ["sucesso"=> false, "conteúdo" => $validacaoEvento['erro']];
        }else{
            $eventos = Eventos::concluirEvento($id);
            return $eventos;
        }
    }

    public static function iniciarEventoController($id){

        $validacaoEvento = EventosValidator::iniciarEventoValidator($id);

        if (!$validacaoEvento['sucesso']){
            return ["sucesso"=> false, "conteúdo" => $validacaoEvento['erro']];
        }else{
            $eventos = Eventos::iniciarEvento($id);
            return $eventos;
        }
    }

}