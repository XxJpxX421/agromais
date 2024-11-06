<?php
require_once '../config/config.php';
require_once 'C:\xampp\htdocs\agromais\src\app\Controllers\FuncionarioController.php';

$controller = new FuncionarioController($pdo);

$cargos = $controller->listarCargos();
$horarios = $controller->listarHorarios();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['nome']) && !empty($_POST['cpf']) && !empty($_POST['email']) && !empty($_POST['telefone']) && !empty($_POST['cargo_id']) && !empty($_POST['horario_id']) && !empty($_POST['data_admissao'])) {
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $cargo_id = $_POST['cargo_id'];
        $horario_id = $_POST['horario_id'];
        $data_admissao = $_POST['data_admissao'];

        $controller->criarRegistroFuncionario($nome, $cpf, $email, $telefone, $cargo_id, $horario_id, $data_admissao);
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
    <title>Cadastro de Funcionários</title>
    <style>
        /* Estilo geral */
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
        input[type="text"], input[type="email"], input[type="tel"], input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
        }
        input[type="text"]:focus, input[type="email"]:focus, input[type="tel"]:focus,
        input[type="date"]:focus, select:focus {
            border-color: #007bff;
            outline: none;
        }
        /* Estilo para os campos select */
        select {
            background-color: #fff;
            color: #333;
            -webkit-appearance: none; /* Remove a seta padrão no Safari e Chrome */
            -moz-appearance: none; /* Remove a seta padrão no Firefox */
            appearance: none;
            padding-right: 20px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='10' viewBox='0 0 10 10'%3E%3Cpath fill='%23007bff' d='M0 0h10L5 5z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 10px top 50%;
            background-size: 10px;
        }
        /* Estilo para o campo de data */
        input[type="date"] {
            color: #333;
            font-size: 1rem;
        }
        /* Estilo para os botões */
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

<h1>Cadastro de Funcionários</h1>

<form method="post">
    <label for="nome">Nome Completo</label>
    <input type="text" id="nome" name="nome" required>

    <label for="cpf">CPF</label>
    <input type="text" id="cpf" name="cpf" required pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" title="Formato: XXX.XXX.XXX-XX" placeholder="000.000.000-00" oninput="formatCPF(this)">

    <label for="email">E-mail</label>
    <input type="email" id="email" name="email" required>

    <label for="telefone">Telefone</label>
    <input type="tel" id="telefone" name="telefone" required pattern="\(\d{2}\) \d{5}-\d{4}" title="Formato: (XX) XXXXX-XXXX" placeholder="(00) 00000-0000" oninput="formatPhone(this)">

    <label for="cargo_id">Cargo</label>
    <select id="cargo_id" name="cargo_id" required>
        <option value="">Selecione um cargo</option>
        <?php foreach ($cargos as $cargo): ?>
            <option value="<?= $cargo['id'] ?>"><?= $cargo['nome'] ?></option>
        <?php endforeach; ?>
    </select>

    <label for="horario_id">Horário</label>
    <select id="horario_id" name="horario_id" required>
        <option value="">Selecione um horário</option>
        <?php foreach ($horarios as $horario): ?>
            <option value="<?= $horario['id'] ?>"><?= $horario['descricao'] ?></option>
        <?php endforeach; ?>
    </select>

    <label for="data_admissao">Data de Admissão</label>
    <input type="date" id="data_admissao" name="data_admissao" required>

    <div class="button-container">
        <button type="submit" class="btn-save">Salvar</button>
        <button type="button" class="btn-list" onclick="window.location.href='lista-funcionarios.php'">Lista</button>
        <button type="button" class="btn-back" onclick="window.location.href='funcionarios.php'">Voltar</button>
    </div>
</form>

<script>
function formatCPF(input) {
    let cpf = input.value.replace(/\D/g, '');
    if (cpf.length <= 11) {
        cpf = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
    }
    input.value = cpf;
}

function formatPhone(input) {
    let phone = input.value.replace(/\D/g, '');
    phone = phone.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
    input.value = phone;
}
</script>

</body>
</html>
