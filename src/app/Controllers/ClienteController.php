<?php
require_once 'C:\xampp\htdocs\agromais\src\app\Models\ClienteModel.php';

class ClienteController {
    private $ClienteModel;

    public function __construct($pdo) {
        $this->ClienteModel = new ClienteModel($pdo);
    }

    // Método para criar um novo registro de cliente
    public function criarRegistroCliente($nome, $cpf, $email, $telefone, $cidade) {
        $resultado = $this->ClienteModel->criarRegistroCliente($nome, $cpf, $email, $telefone, $cidade);
    }

    // Método para listar todos os clientes
    public function listarClientes() {
        return $this->ClienteModel->listarClientes();
    }

    // Método para exibir a lista de clientes
    public function exibirListaClientes() {
        $clientes = $this->listarClientes();
        include 'C:\xampp\htdocs\agromais\src\app\Views\clientes\lista.php'; // Caminho para a sua view de lista
    }

    // Método para buscar cliente por CPF
    public function buscarClientePorCPF($cpf) {
        return $this->ClienteModel->buscarClientePorCPF($cpf);
    }
}
?>
