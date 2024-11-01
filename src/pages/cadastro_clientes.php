<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Clientes</title>
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

    <h1>Cadastro de Clientes</h1>
    
    <form action="processa_cadastro.php" method="post">
        <label for="nome">Nome Completo</label>
        <input type="text" id="nome" name="nome" required>

        <label for="cpf">CPF</label>
        <input type="text" id="cpf" name="cpf" required pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" title="Formato: XXX.XXX.XXX-XX" placeholder="000.000.000-00" oninput="formatCPF(this)">

        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" required>

        <label for="telefone">Telefone</label>
        <input type="tel" id="telefone" name="telefone" required pattern="\(\d{2}\) \d{5}-\d{4}" title="Formato: (XX) XXXXX-XXXX" placeholder="(00) 00000-0000" oninput="formatPhone(this)">

        <label for="cidade">Cidade</label>
        <input type="text" id="cidade" name="cidade" required>

        <div class="button-container">
            <button type="submit" class="btn-save">Salvar</button>
            <button type="button" class="btn-list" onclick="window.location.href='lista.php'">Lista</button>
            <button type="button" class="btn-back" onclick="window.location.href='adm.php'">Voltar</button>
        </div>
    </form>

    <script>
function formatCPF(input) {
    let cpf = input.value.replace(/\D/g, ''); // Remove qualquer coisa que não seja número
    if (cpf.length > 3 && cpf.length <= 6) {
        cpf = cpf.replace(/(\d{3})(\d+)/, '$1.$2');
    } else if (cpf.length > 6 && cpf.length <= 9) {
        cpf = cpf.replace(/(\d{3})(\d{3})(\d+)/, '$1.$2.$3');
    } else if (cpf.length > 9) {
        cpf = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
    }
    input.value = cpf;
}
</script>
<script>
function formatPhone(input) {
    let phone = input.value.replace(/\D/g, ''); // Remove qualquer coisa que não seja número
    if (phone.length > 2 && phone.length <= 7) {
        phone = phone.replace(/(\d{2})(\d+)/, '($1) $2');
    } else if (phone.length > 7) {
        phone = phone.replace(/(\d{2})(\d{5})(\d+)/, '($1) $2-$3');
    }
    input.value = phone;
}
</script>
</body>
</html>
