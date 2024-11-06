<?php
include_once '../../config/config.php';

// Verifica se o ID do fornecedor foi passado na URL
if (!isset($_GET['id'])) {
    header('Location: lista-fornecedores.php'); // Redireciona se não houver ID
    exit;
}

$id = $_GET['id'];

// Prepara e executa a instrução de exclusão
$stmt = $pdo->prepare('DELETE FROM fornecedores WHERE id = ?');
$stmt->execute([$id]);

// Redireciona para a lista de fornecedores após a exclusão
header('Location: ../../pages/lista-fornecedores.php');
exit;
?>
