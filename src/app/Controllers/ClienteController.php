<?php
require_once 'C:\xampp\htdocs\sistema-empresa\app\model\ClienteModel.php';

class ClienteController {
    private $ClienteModel;

    public function __construct($pdo) {
        $this->ClienteModel = new ClienteModel($pdo);
    }

    // Método para criar um novo registro de cliente
    public function criarRegistroCliente($nome, $cpf, $email, $telefone, $cidade) {
        $resultado = $this->ClienteModel->criarRegistroCliente($nome, $cpf, $email, $telefone, $cidade);
        if ($resultado) {
            // Redireciona ou mostra uma mensagem de sucesso
            header('Location: sucesso.php'); // Você pode modificar para a página que deseja
        } else {
            // Redireciona ou mostra uma mensagem de erro
            header('Location: erro.php'); // Você pode modificar para a página que deseja
        }
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
