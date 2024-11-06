
<!DOCTYPE html>
<html>
<head>
    <title>Lista de Funcionarios</title>
</head>
<body>
    <fieldset>
        <legend><h1>Lista de Funcionarios</h1></legend>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Data de Admissão</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
            <?php foreach ($funcionarios as $funcionario): ?>
                <tr>
                    <td><?php echo $funcionario['id']; ?></td>
                    <td><?php echo $funcionario['nome']; ?></td>
                    <td><?php echo $funcionario['cpf']; ?></td>
                    <td><?php echo $funcionario['email']; ?></td>
                    <td><?php echo $funcionario['telefone']; ?></td>
                    <td><?php echo $funcionario['data_admissao']; ?></td>
                    <td>
                        <a class="btn-editar" href="atualizarFuncionario.php?id=<?php echo $funcionario['id']; ?>">Atualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </fieldset>
</body>
</html>
