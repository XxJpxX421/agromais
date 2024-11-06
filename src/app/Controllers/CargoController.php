<?php
require_once 'C:\xampp\htdocs\agromais\src\app\Models\CargoModel.php';

class CargoController {
    private $CargoModel;

    public function __construct($pdo) {
        $this->CargoModel = new CargoModel($pdo);
    }

    // Método para criar um novo cargo
    public function criarCargo($nome, $salario) {
        return $this->CargoModel->criarRegistroCargo($nome, $salario);  // Certifique-se de passar os dois parâmetros
    }

    // Método para listar todos os cargos
    public function listarCargos() {
        return $this->CargoModel->listarCargos();
    }

    // Método para exibir a lista de cargos
    public function exibirListaCargos() {
        $cargos = $this->listarCargos();
        include 'C:\xampp\htdocs\agromais\src\app\Views\cargos\lista.php'; // Caminho para a sua view de lista de cargos
    }

    // Método para buscar cargo por ID
    public function buscarCargoPorId($id) {
        return $this->CargoModel->buscarCargoPorId($id);
    }
}
?>
