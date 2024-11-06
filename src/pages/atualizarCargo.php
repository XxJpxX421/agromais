<?php
include_once '../config/config.php';

// Verifica se o ID do cargo foi passado na URL
if (!isset($_GET['id'])) {
    header('Location: lista-cargos.php'); // Redireciona se não houver ID
    exit;
}

$id = $_GET['id'];

// Busca os dados do cargo
$stmt = $pdo->prepare('SELECT * FROM cargos WHERE id = ?');
$stmt->execute([$id]);
$cargo = $stmt->fetch(PDO::FETCH_ASSOC);

// Se o cargo não for encontrado, redireciona para a lista
if (!$cargo) {
    header('Location: lista-cargos.php');
    exit;
}

// Dados do cargo
$nome = $cargo['nome'];
$salario = $cargo['salario'];

// Processa o formulário de atualização
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $salario = $_POST['salario'];

    // Validação dos dados do formulário aqui
    $stmt = $pdo->prepare('UPDATE cargos SET nome = ?, salario = ? WHERE id = ?');
    $stmt->execute([$nome, $salario, $id]);
    
    // Redireciona para a lista de cargos após a atualização
    header('Location: lista-cargos.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Cargo</title>
    <style>
        /* Estilos semelhantes ao formulário de cliente */
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
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            color: #fff;
            background-color: #28a745;
        }
        button:hover {
            opacity: 0.9;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>

    <h1>Atualizar Cargo</h1>
    
    <form method="post">
        <label for="nome">Nome do Cargo</label>
        <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($nome); ?>" required>

        <label for="salario">Salário</label>
        <input type="number" id="salario" name="salario" value="<?php echo htmlspecialchars($salario); ?>" required>

        <div class="button-container">
            <button type="submit">Atualizar</button>
            <a href="lista-cargos.php">
                <button type="button" class="btn-back">Voltar</button>
            </a>
        </div>
    </form>

</body>
</html>
