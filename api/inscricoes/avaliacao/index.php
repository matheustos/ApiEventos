<?php

require '../../../vendor/autoload.php';

use Source\Controllers\InscricaoController;

$res = InscricaoController::avaliacaoEventoController($_POST);

echo json_encode($res);