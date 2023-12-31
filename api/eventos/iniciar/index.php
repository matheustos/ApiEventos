<?php
require '../../../vendor/autoload.php';

use Source\Controllers\EventosController;

$res = EventosController::iniciarEventoController($_POST);

echo json_encode($res);