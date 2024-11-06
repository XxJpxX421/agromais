<?php
require_once '../config/config.php';
require_once '../app/Controllers/FuncionarioController.php';

$controller = new FuncionarioController($pdo);

$controller->exibirListaFuncionarios();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista dos Funcionarios</title>
</head>
<body>
    <a href="cadastro_funcionarios.php">Voltar</a>
</body>
</html>