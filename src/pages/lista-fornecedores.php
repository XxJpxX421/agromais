<?php
require_once '../config/config.php';
require_once '../app/Controllers/FornecedorController.php';

$controller = new FornecedorController($pdo);

$controller->exibirListaFornecedores();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista dos Fornecedores</title>
</head>
<body>
    <a href="cadastro_fornecedor.php">Voltar</a>
</body>
</html>