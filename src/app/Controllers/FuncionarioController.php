<?php
require_once 'C:\xampp\htdocs\agromais\src\app\Models\FuncionarioModel.php';

class FuncionarioController {
    private $FuncionarioModel;

    public function __construct($pdo) {
        $this->FuncionarioModel = new FuncionarioModel($pdo);
    }

    // Método para criar um novo registro de funcionário
    public function criarRegistroFuncionario($nome, $cpf, $email, $telefone, $cargo_id, $data_admissao) {
        $resultado = $this->FuncionarioModel->criarRegistroFuncionario($nome, $cpf, $email, $telefone, $cargo_id, $data_admissao);
    }

    // Método para listar todos os funcionários
    public function listarFuncionarios() {
        return $this->FuncionarioModel->listarFuncionarios();
    }

    // Método para exibir a lista de funcionários
    public function exibirListaFuncionarios() {
        $funcionarios = $this->listarFuncionarios();
        include 'C:\xampp\htdocs\agromais\src\app\Views\funcionarios\lista.php'; // Caminho para a sua view de lista de funcionários
    }

    public function listarCargos() {
        return $this->FuncionarioModel->listarCargos();
    }

    // Método para listar todos os horários
    public function listarHorarios() {
        return $this->FuncionarioModel->listarHorarios();
    }
}
?>
