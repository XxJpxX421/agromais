<?php
include_once '../config/config.php';

// Verifica se o ID do fornecedor foi passado na URL
if (!isset($_GET['id'])) {
    header('Location: lista-fornecedores.php'); // Redireciona se não houver ID
    exit;
}

$id = $_GET['id'];

// Busca os dados do fornecedor
$stmt = $pdo->prepare('SELECT * FROM fornecedores WHERE id = ?');
$stmt->execute([$id]);
$fornecedor = $stmt->fetch(PDO::FETCH_ASSOC);

// Se o fornecedor não for encontrado, redireciona para a lista
if (!$fornecedor) {
    header('Location: lista-fornecedores.php');
    exit;
}

// Dados do fornecedor
$nome = $fornecedor['nome'];
$cnpj = $fornecedor['cnpj'];
$email = $fornecedor['email'];
$telefone = $fornecedor['telefone'];
$endereco = $fornecedor['endereco'];

// Processa o formulário de atualização
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $cnpj = $_POST['cnpj'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];

    // Validação dos dados do formulário aqui
    $stmt = $pdo->prepare('UPDATE fornecedores SET nome = ?, cnpj = ?, email = ?, telefone = ?, endereco = ? WHERE id = ?');
    $stmt->execute([$nome, $cnpj, $email, $telefone, $endereco, $id]);
    
    // Redireciona para a lista de fornecedores após a atualização
    header('Location: lista-fornecedores.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Fornecedor</title>
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
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            color: #fff;
            background-color: #28a745; /* Cor verde para o botão */
        }
        button:hover {
            opacity: 0.9;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            color: black;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 300px;
            text-align: center;
            border-radius: 10px;
        }
        .modal-header {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .modal-footer {
            display: flex;
            justify-content: space-between;
        }
        .modal-footer button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-cancel {
            background-color: #ccc;
        }
        .btn-cancel:hover{
            background-color: #ccb;
        }
        .btn-confirm {
            background-color: #f44336;
            color: white;
        }
        .btn-confirm:hover {
            background-color: red;
            color: white;
        }
        .enviar {
            display: flex;
            justify-content: center;
        }
        body {
            overflow-y: hidden;
        }
        .btn-back {
            background-color: #007bff;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
        }
    </style>
    <script type="text/javascript">
        function confirmDelete(event, id) {
            event.preventDefault();
            var modal = document.getElementById('confirmModal');
            var confirmBtn = document.getElementById('confirmBtn');
            confirmBtn.setAttribute('data-id', id);
            modal.style.display = 'block';
            confirmBtn.onclick = function() {
                window.location.href = '../app/Controllers/deletarfornecedor.php?id=' + id;
            }
        }

        function closeModal() {
            var modal = document.getElementById('confirmModal');
            modal.style.display = 'none';
        }

        window.onclick = function(event) {
            var modal = document.getElementById('confirmModal');
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }
    </script>
</head>
<body>

    <h1>Atualizar Fornecedor</h1>
    
    <form method="post">
        <label for="nome">Nome Completo</label>
        <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($nome); ?>" required>

        <label for="cnpj">CNPJ</label>
        <input type="text" id="cnpj" name="cnpj" value="<?php echo htmlspecialchars($cnpj); ?>" required pattern="\d{2}\.\d{3}\.\d{3}/\d{4}-\d{2}" title="Formato: XX.XXX.XXX/XXXX-XX" placeholder="00.000.000/0000-00" oninput="formatCNPJ(this)">

        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>

        <label for="telefone">Telefone</label>
        <input type="tel" id="telefone" name="telefone" value="<?php echo htmlspecialchars($telefone); ?>" required pattern="\(\d{2}\) \d{5}-\d{4}" title="Formato: (XX) XXXXX-XXXX" placeholder="(00) 00000-0000" oninput="formatPhone(this)">

        <label for="endereco">Endereço</label>
        <input type="text" id="endereco" name="endereco" value="<?php echo htmlspecialchars($endereco); ?>" required>

        <div class="button-container">
            <button type="submit">Atualizar</button>
            <a class="lixo" id="delete" href="#" onclick="confirmDelete(event, '<?php echo htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8'); ?>')">
                <img src="<?php echo '../public/assets/img/lixeira.png' ?>" width="30px" height="30px">
            </a>
            <button type="button" class="btn-back" onclick="window.location.href='lista-fornecedores.php'">Voltar</button>
        </div>
    </form>

    <div id="confirmModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">AgroMais</div>
            <p>Você tem certeza que deseja deletar o registro deste fornecedor?</p>
            <div class="modal-footer">
                <button class="btn-cancel" onclick="closeModal()">Cancelar</button>
                <button class="btn-confirm" id="confirmBtn">Confirmar</button>
            </div>
        </div>
    </div>

    <script>
        function formatCNPJ(input) {
            let cnpj = input.value.replace(/\D/g, '');
            if (cnpj.length > 2 && cnpj.length <= 5) {
                cnpj = cnpj.replace(/(\d{2})(\d+)/, '$1.$2');
            } else if (cnpj.length > 5 && cnpj.length <= 8) {
                cnpj = cnpj.replace(/(\d{2})(\d{3})(\d+)/, '$1.$2.$3');
            } else if (cnpj.length > 8 && cnpj.length <= 12) {
                cnpj = cnpj.replace(/(\d{2})(\d{3})(\d{3})(\d+)/, '$1.$2.$3/$4');
            } else if (cnpj.length > 12) {
                cnpj = cnpj.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, '$1.$2.$3/$4-$5');
            }
            input.value = cnpj;
        }

        function formatPhone(input) {
            let phone = input.value.replace(/\D/g, '');
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
