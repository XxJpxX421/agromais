<?php
require_once '../config/config.php';
require_once '../app/Controllers/CargoController.php';

$controller = new CargoController($pdo);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['nome']) && !empty($_POST['salario'])) {
        $nome = $_POST['nome'];
        $salario = $_POST['salario'];
        
        $controller->criarCargo($nome, $salario);
    } else {
        echo "Todos os campos obrigatórios devem ser preenchidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cargo</title>
    <style>
        /* Styling similar to the client registration */
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            color: #333;
        }
        input[type="text"], input[type="email"], input[type="tel"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
        }
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            color: #fff;
            font-size: 1rem;
        }
        .btn-save {
            background-color: #28a745;
        }
        .btn-back {
            background-color: #007bff;
        }
        .btn-list {
            background-color: #948459;
        }
        button:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>

    <h1>Cadastro de Cargo</h1>
    
    <form method="post">
        <label for="nome">Nome do Cargo</label>
        <input type="text" id="nome" name="nome" required>

        <label for="salario">Salário</label>
        <input type="text" id="salario" name="salario" required>

        <div class="button-container">
            <button type="submit" class="btn-save">Salvar</button>
            <button type="button" class="btn-list" onclick="window.location.href='lista-cargos.php'">Lista</button>
            <button type="button" class="btn-back" onclick="window.location.href='funcionarios.php'">Voltar</button>
        </div>
    </form>

</body>
</html>
