<?php
require '../../vendor/autoload.php';

use Source\Models\Categorias;

$res = Categorias::getCategorias();

echo json_encode($res);