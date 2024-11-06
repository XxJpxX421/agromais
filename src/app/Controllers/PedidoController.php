<?php
require_once 'C:\xampp\htdocs\agromais\src\app\Models\PedidoModel.php';

class PedidoController {
    private $pedidoModel;

    public function __construct($pdo) {
        $this->pedidoModel = new PedidoModel($pdo);
    }

    // Função para criar um pedido
    public function criarPedido($fornecedor_id, $quantidade, $produto, $valor) {
        if ($this->pedidoModel->criarPedido($fornecedor_id, $quantidade, $produto, $valor)) {
            header('Location: lista-pedidos.php'); // Redireciona após o cadastro
        } else {
            echo "Erro ao cadastrar o pedido.";
        }
    }

    // Função para listar pedidos
    public function listarPedidos() {
        return $this->pedidoModel->getPedidos();
    }

    public function exibirListaPedidos() {
        $pedidos = $this->listarPedidos();
        include 'C:\xampp\htdocs\agromais\src\app\Views\pedidos\lista.php'; // Caminho para a sua view de lista
    }
    // Função para pegar os fornecedores para o select
    public function listarFornecedores() {
        return $this->pedidoModel->getFornecedores();
    }
}
?>
