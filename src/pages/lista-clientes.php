<?php
require_once '../config/config.php';
require_once '../app/Controllers/ClienteController.php';

$controller = new ClienteController($pdo);

$controller->exibirListaClientes();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista dos Clientes</title>
</head>
<body>
    <a href="cadastro_clientes.php">Voltar</a>
</body>
</html>