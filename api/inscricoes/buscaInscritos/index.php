<?php

require '../../../vendor/autoload.php';

use Source\Models\Inscricoes;

$res = Inscricoes::getInscritos();

echo json_encode(["sucesso" => true, "conteudo" => $res]);