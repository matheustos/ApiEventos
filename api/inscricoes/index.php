<?php

require '../../vendor/autoload.php';

use Source\Controllers\InscricaoController;

$res = InscricaoController::realizarInscricaoController($_POST);

echo json_encode($res);