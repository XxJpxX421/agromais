<?php
require_once '../config/config.php';
require_once '../app/Controllers/CargoController.php';

$controller = new CargoController($pdo);

$controller->exibirListaCargos();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista dos Cargos</title>
</head>
<body>
    <a href="cadastro_cargos.php">Voltar</a>
</body>
</html>