<?php
require_once 'C:\xampp\htdocs\agromais\src\app\Models\HorarioModel.php';

class HorarioController {
    private $HorarioModel;

    public function __construct($pdo) {
        $this->HorarioModel = new HorarioModel($pdo);
    }

    // Método para registrar um novo horário de trabalho
    public function CriarregistroHorario($descricao, $hora_inicio, $hora_fim) {
        $resultado = $this->HorarioModel->CriarregistroHorario($descricao, $hora_inicio, $hora_fim);
    }

    // Método para listar todos os horários
    public function listarHorarios() {
        return $this->HorarioModel->listarHorarios();
    }

    // Método para exibir a lista de horários
    public function exibirListaHorarios() {
        $horarios = $this->listarHorarios();
        include 'C:\xampp\htdocs\agromais\src\app\Views\horarios\lista.php'; // Caminho para a sua view de lista de horários
    }

    // Método para buscar horários de um funcionário por ID
    public function buscarHorariosPorFuncionario($funcionario_id) {
        return $this->HorarioModel->buscarHorariosPorFuncionario($funcionario_id);
    }
}
?>
