<?php
require_once 'C:\xampp\htdocs\agromais\src\app\Models\FornecedorModel.php';

class FornecedorController {
    private $FornecedorModel;

    public function __construct($pdo) {
        $this->FornecedorModel = new FornecedorModel($pdo);
    }

    // Método para criar um novo registro de fornecedor
    public function criarRegistroFornecedor($nome, $cnpj, $email, $telefone, $endereco) {
        $resultado = $this->FornecedorModel->criarRegistroFornecedor($nome, $cnpj, $email, $telefone, $endereco);
    }

    // Método para listar todos os fornecedores
    public function listarFornecedores() {
        return $this->FornecedorModel->listarFornecedores();
    }

    // Método para exibir a lista de fornecedores
    public function exibirListaFornecedores() {
        $fornecedores = $this->listarFornecedores();
        include 'C:\xampp\htdocs\agromais\src\app\Views\fornecedores\lista.php'; // Caminho para a sua view de lista
    }

    // Método para buscar fornecedor por CNPJ
    public function buscarFornecedorPorCNPJ($cnpj) {
        return $this->FornecedorModel->buscarFornecedorPorCNPJ($cnpj);
    }
}
?>
