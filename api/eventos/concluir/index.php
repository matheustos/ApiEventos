<?php

require '../../../vendor/autoload.php';

use Source\Controllers\EventosController;

$res = EventosController::concluirEventoController($_POST);

echo json_encode($res);