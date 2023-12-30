<?php

require '../../../../vendor/autoload.php';
use Source\Controllers\EventosController;


$res = EventosController::getEventoByDateController($_POST);

echo json_encode($res);