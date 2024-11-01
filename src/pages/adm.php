<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setor Administrativo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            max-width: 800px;
            text-align: center;
            margin-top: 20px;
        }
        h1 {
            color: #333;
            font-size: 2rem;
            margin-bottom: 20px;
        }
        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .card {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 250px;
            text-align: center;
            transition: transform 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card h2 {
            color: #333;
            font-size: 1.5rem;
            margin-bottom: 10px;
        }
        .card p {
            color: #666;
            font-size: 1rem;
            margin-bottom: 20px;
        }
        .card a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .card a:hover {
            background-color: #0056b3;
        }
        .back-button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #555;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .back-button:hover {
            background-color: #333;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Setor Administrativo</h1>

        <div class="card-container">
            <div class="card">
                <h2>Cadastro de Clientes</h2>
                <p>Inserir, atualizar e buscar informações de clientes.</p>
                <a href="cadastro_clientes.php">Acessar</a>
            </div>

            <div class="card">
                <h2>Cadastro de Fornecedores</h2>
                <p>Gerenciar dados de fornecedores e histórico de pedidos.</p>
                <a href="cadastro_fornecedores.php">Acessar</a>
            </div>

            <div class="card">
                <h2>Gestão de Funcionários</h2>
                <p>Controle de dados dos funcionários, cargos e horários.</p>
                <a href="gestao_funcionarios.php">Acessar</a>
            </div>
        </div>

        <a href="index.php" class="back-button">Voltar para a Página Inicial</a>
    </div>

</body>
</html>
