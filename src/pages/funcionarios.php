<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Gestão de Funcionários</title>
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
        <h1>Cadastro de Gestão de Funcionários</h1>

        <div class="card-container">
            <!-- Card para cadastro de Funcionário -->
            <div class="card">
                <h2>Novo Funcionário</h2>
                <p>Cadastrar um novo funcionário na empresa.</p>
                <a href="cadastro_funcionarios.php">Cadastrar</a>
            </div>

            <!-- Card para cadastro de Cargo -->
            <div class="card">
                <h2>Novo Cargo</h2>
                <p>Cadastrar um novo cargo com suas responsabilidades e salário.</p>
                <a href="cadastro_cargos.php">Cadastrar</a>
            </div>

            <!-- Card para cadastro de Horário -->
            <div class="card">
                <h2>Novo Horário</h2>
                <p>Registrar o horário de trabalho dos funcionários.</p>
                <a href="cadastro_horarios.php">Cadastrar</a>
            </div>
        </div>

        <a href="adm.php" class="back-button">Voltar para Setor Administrativo</a>
    </div>

</body>
</html>
