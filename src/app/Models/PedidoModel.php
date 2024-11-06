<?php
require_once '../config/config.php';

class PedidoModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Método para criar um pedido
    public function criarPedido($fornecedor_id, $quantidade, $produto, $valor) {
        $sql = "INSERT INTO pedidos (fornecedor_id, quantidade, produto, valor) VALUES (:fornecedor_id, :quantidade, :produto, :valor)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':fornecedor_id', $fornecedor_id);
        $stmt->bindParam(':quantidade', $quantidade);
        $stmt->bindParam(':produto', $produto);
        $stmt->bindParam(':valor', $valor);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Método para pegar todos os pedidos (com nome do fornecedor)
    public function getPedidos() {
        $sql = "SELECT p.id, p.data_pedido, p.quantidade, p.produto, p.valor, f.nome AS fornecedor
                FROM pedidos p
                JOIN fornecedores f ON p.fornecedor_id = f.id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // Método para pegar todos os fornecedores (para o select)
    public function getFornecedores() {
        $sql = "SELECT id, nome FROM fornecedores";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
