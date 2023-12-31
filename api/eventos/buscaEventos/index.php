<?php

require '../../../vendor/autoload.php';

use Source\Models\Eventos;

$res = Eventos::getEventos();

echo json_encode(["sucesso" => true, "conteudo" => $res]);