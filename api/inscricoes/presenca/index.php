<?php

require '../../../vendor/autoload.php';

use Source\Controllers\InscricaoController;

$res = InscricaoController::presencaController($_POST);

echo json_encode($res);