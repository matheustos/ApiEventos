<?php
require '../../vendor/autoload.php';

use Source\Controllers\EventosController;

$res = EventosController::cadastrarEvento($_POST);

echo json_encode($res);

