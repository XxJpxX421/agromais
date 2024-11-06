<?php
require_once '../config/config.php';
require_once '../app/Controllers/HorarioController.php';

$controller = new HorarioController($pdo);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['descricao']) && !empty($_POST['hora_inicio']) && !empty($_POST['hora_fim'])) {
        $descricao = $_POST['descricao'];
        $hora_inicio = $_POST['hora_inicio'];
        $hora_fim = $_POST['hora_fim'];
        
        $controller->CriarregistroHorario($descricao, $hora_inicio, $hora_fim);
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
    <title>Cadastro de Horário</title>
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
        input[type="text"], input[type="time"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
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
        /* Estilização para inputs de hora */
        input[type="time"] {
            font-size: 1rem;
            padding: 12px;
            background-color: #f8f9fa;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input[type="time"]:focus {
            outline: none;
            border-color: #28a745;
        }

        /* Estilização do Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.4);
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 300px;
            text-align: center;
        }
        .modal button {
            padding: 10px 20px;
            margin: 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
        }
        .btn-confirm {
            background-color: #28a745;
        }
        .btn-cancel {
            background-color: #dc3545;
        }
    </style>
</head>
<body>

    <h1>Cadastro de Horário</h1>
    
    <form id="horarioForm" method="post">
        <label for="descricao">Descrição</label>
        <input type="text" id="descricao" name="descricao" required>

        <label for="hora_inicio">Hora de Início</label>
        <input type="time" id="hora_inicio" name="hora_inicio" required>

        <label for="hora_fim">Hora de Término</label>
        <input type="time" id="hora_fim" name="hora_fim" required>

        <div class="button-container">
            <button type="button" class="btn-save" id="saveButton">Salvar</button>
            <button type="button" class="btn-back" onclick="window.location.href='funcionarios.php'">Voltar</button>
        </div>
    

    <!-- Modal de confirmação -->
    <div class="modal" id="confirmationModal">
        <div class="modal-content">
            <h2>Tem certeza que deseja salvar?</h2>
            <button type="submit" class="btn-confirm" id="confirmButton" >Confirmar</button>
            <button class="btn-cancel" id="cancelButton">Cancelar</button>
        </div>
    </div>
    </form>
    <script>
        // Obter os elementos do modal e do botão de salvar
        const saveButton = document.getElementById('saveButton');
        const confirmationModal = document.getElementById('confirmationModal');
        const confirmButton = document.getElementById('confirmButton');
        const cancelButton = document.getElementById('cancelButton');
        const form = document.getElementById('horarioForm');

        // Mostrar o modal quando o botão de salvar for clicado
        saveButton.addEventListener('click', () => {
            confirmationModal.style.display = 'flex';
        });

        // Confirmar e enviar o formulário
        confirmButton.addEventListener('click', () => {
            form.submit();  // Envia o formulário
            confirmationModal.style.display = 'none';  // Fecha o modal
        });

        // Cancelar e fechar o modal
        cancelButton.addEventListener('click', () => {
            confirmationModal.style.display = 'none';  // Fecha o modal
        });
    </script>

</body>
</html>
