<?php

namespace Source\Controllers;
use Source\Models\eventos;
use Source\Validators\InscricoesValidator;
use Source\Models\Inscricoes;

class InscricaoController{

    public static function realizarInscricaoController($dados){

        $validacaoInscricao = InscricoesValidator::inscricaoValidator($dados);
        if(!$validacaoInscricao['sucesso']){
            return ["sucesso" => false, "conteudo" => $validacaoInscricao['erro']];
        }else{
            $evento = Eventos::getEventoByNome($dados['evento']);

            if($evento){
                $inscricao = Inscricoes::realizarInscricao($dados);
                if($inscricao){
                    Eventos::reduzVagas($dados['evento']);
                }
            
                return $inscricao;
            }else{
                return ["sucesso" => false, "conteudo" => "Evento não encontrado."];
            }
        }
    }
}