<?php

require '../../../../vendor/autoload.php';

use Source\Controllers\EventosController;

$res = EventosController::getEventoByCatController($_POST);

echo json_encode($res);