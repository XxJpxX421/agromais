<?php
include_once '../../config/config.php';

// Verifica se o ID do cliente foi passado na URL
if (!isset($_GET['id'])) {
    header('Location: lista-clientes.php'); // Redireciona se não houver ID
    exit;
}

$id = $_GET['id'];

// Prepara e executa a instrução de exclusão
$stmt = $pdo->prepare('DELETE FROM clientes WHERE id = ?');
$stmt->execute([$id]);

// Redireciona para a lista de clientes após a exclusão
header('Location: ../../pages/lista-clientes.php');
exit;
?>
