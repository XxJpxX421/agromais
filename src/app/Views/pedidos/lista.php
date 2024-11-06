
<!DOCTYPE html>
<html>
<head>
    <title>Lista de Pedidos</title>
</head>
<body>
    <fieldset>
        <legend><h1>Lista de Pedidos</h1></legend>
            <table border="1">
                <thead>
                    <tr>
                    <th>ID</th>
            <th>Data</th>
            <th>Fornecedor</th>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($pedidos as $pedido): ?>
            <tr>
                <td><?= $pedido['id'] ?></td>
                <td><?= date('d/m/Y H:i:s', strtotime($pedido['data_pedido'])) ?></td>
                <td><?= $pedido['fornecedor'] ?></td>
                <td><?= $pedido['produto'] ?></td>
                <td><?= $pedido['quantidade'] ?></td>
                <td>R$ <?= number_format($pedido['valor'], 2, ',', '.') ?></td>
            </tr>
        <?php endforeach; ?>
                </tbody>
            </table>
    </fieldset>
</body>
</html>
