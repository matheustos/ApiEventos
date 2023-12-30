<?php

require '../../../vendor/autoload.php';

use Source\Controllers\EventosController;

$res = EventosController::cancelarEventoController($_POST);

echo json_encode($res);