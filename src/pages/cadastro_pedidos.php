<?php
require_once '../config/config.php';
require_once '../app/Controllers/PedidoController.php';

$controller = new PedidoController($pdo);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fornecedor_id = $_POST['fornecedor_id'];
    $quantidade = $_POST['quantidade'];
    $produto = $_POST['produto'];
    $valor = $_POST['valor'];

    $controller->criarPedido($fornecedor_id, $quantidade, $produto, $valor);
}

// Carregar fornecedores para o select
$fornecedores = $controller->listarFornecedores();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pedido</title>
    <style>
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
        input[type="text"], input[type="number"], input[type="decimal"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        select {
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

    <h1>Cadastro de Pedido</h1>
    
    <form method="post">
        <label for="fornecedor_id">Fornecedor</label>
        <select name="fornecedor_id" required>
            <option value="">Selecione o fornecedor</option>
            <?php foreach ($fornecedores as $fornecedor): ?>
                <option value="<?= $fornecedor['id'] ?>"><?= $fornecedor['nome'] ?></option>
            <?php endforeach; ?>
        </select>

        <label for="quantidade">Quantidade</label>
        <input type="number" name="quantidade" required>

        <label for="produto">Produto</label>
        <input type="text" name="produto" required>

        <label for="valor">Valor</label>
        <input type="number" name="valor" step="0.01" required>

        <div class="button-container">
            <button type="submit" class="btn-save">Salvar</button>
            <button type="button" class="btn-list" onclick="window.location.href='lista-pedidos.php'">Histórico</button>
            <button type="button" class="btn-back" onclick="window.location.href='fornecedores.php'">Voltar</button>
        </div>
    </form>

</body>
</html>
