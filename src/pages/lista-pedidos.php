<?php
require_once '../config/config.php';
require_once '../app/Controllers/PedidoController.php';

$controller = new PedidoController($pdo);

$controller->exibirListaPedidos();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista dos Pedidos</title>
</head>
<body>
    <a href="cadastro_pedidos.php">Voltar</a>
</body>
</html>