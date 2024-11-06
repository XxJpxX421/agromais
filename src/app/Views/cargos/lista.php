
<!DOCTYPE html>
<html>
<head>
    <title>Lista de Cargos</title>
</head>
<body>
    <fieldset>
        <legend><h1>Lista de Cargos</h1></legend>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Salário</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($cargos as $cargo): ?>
                    <tr class="sessao">
                        <td><?php echo $cargo['id']; ?></td>
                        <td><?php echo $cargo['nome']; ?></td>
                        <td>R$ <?= number_format($cargo['salario'], 2, ',', '.') ?></td>
                        <td>
                            <a class="btn-editar" style="color:blue;" href="atualizarCargo.php?id=<?php echo $cargo['id']; ?>">Atualizar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
    </fieldset>
</body>
</html>
