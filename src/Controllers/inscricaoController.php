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

    public static function presencaController($dados){

        $validacaoPresenca = InscricoesValidator::presencaValidator($dados);

        if(!$validacaoPresenca['sucesso']){
            return ["sucesso" => false, "conteudo" => $validacaoPresenca['erro']];
        }else{
            if($dados['admin'] == 1){
                if($dados['presenca'] == 1){
                    $presenca = Inscricoes::confirmaPresenca($dados['idInscrito']);
        
                    return ["sucesso" => true, "conteudo" => $presenca];
                }else{
                    $ausencia = Inscricoes::confirmaAusencia($dados['idInscrito']);
        
                    return ["sucesso" => true, "conteudo" => $ausencia];
                }
            }else{
                return ["sucesso" => false, "conteudo" => "Usuário não autorizado."];
            }
        }
    }

    public static function avaliacaoEventoController($dados){
        $validacaoAvaliacao = InscricoesValidator::avaliacaoEventoValidator($dados);
    
        if (!$validacaoAvaliacao['sucesso']) {
            return ["sucesso" => false, "conteudo" => $validacaoAvaliacao['erro']];
        }
    
        $dados = $validacaoAvaliacao['data'];
    
        if ($dados['admin'] == 1) {
            $avaliacao = Inscricoes::avaliacaoEvento($dados);
    
            return ["sucesso" => true, "conteudo" => $avaliacao];
        } else {
            return ["sucesso" => false, "conteudo" => "Usuário não autorizado."];
        }
    }
    
}