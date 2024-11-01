
<!DOCTYPE html>
<html>
<head>
    <title>Lista de Clientes</title>
</head>
<body>
    <fieldset>
        <legend><h1>Lista de Clientes</h1></legend>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome Completo</th>
                        <th>CPF</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Cidade</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($clientes as $cliente): ?>
                    <tr class="sessao">
                        <td><?php echo $cliente['id']; ?></td>
                        <td><?php echo $cliente['nome']; ?></td>
                        <td><?php echo $cliente['cpf']; ?></td>
                        <td><?php echo $cliente['email']; ?></td>
                        <td><?php echo $cliente['telefone']; ?></td>
                        <td><?php echo $cliente['cidade']; ?></td>
                        <td>
                            <a class="btn-editar" style="color:blue;" href="atualizarCliente.php?id=<?php echo $cliente['id']; ?>">Atualizar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
    </fieldset>
</body>
</html>
