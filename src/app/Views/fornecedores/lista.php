
<!DOCTYPE html>
<html>
<head>
    <title>Lista de Fornecedores</title>
</head>
<body>
    <fieldset>
        <legend><h1>Lista de Fornecedores</h1></legend>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome Completo</th>
                        <th>CNPJ</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Endereço</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($fornecedores as $fornecedor): ?>
                    <tr class="sessao">
                        <td><?php echo $fornecedor['id']; ?></td>
                        <td><?php echo $fornecedor['nome']; ?></td>
                        <td><?php echo $fornecedor['cnpj']; ?></td>
                        <td><?php echo $fornecedor['email']; ?></td>
                        <td><?php echo $fornecedor['telefone']; ?></td>
                        <td><?php echo $fornecedor['endereco']; ?></td>
                        <td>
                            <a class="btn-editar" style="color:blue;" href="atualizarFornecedor.php?id=<?php echo $fornecedor['id']; ?>">Atualizar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
    </fieldset>
</body>
</html>
