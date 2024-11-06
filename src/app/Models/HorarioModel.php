<?php
class HorarioModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Método para registrar um novo horário de trabalho
    public function CriarregistroHorario($descricao, $hora_inicio, $hora_fim) {
        try {
            $sql = "INSERT INTO horarios (descricao, hora_inicio, hora_fim) 
                    VALUES (?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$descricao, $hora_inicio, $hora_fim]);

            return $stmt->rowCount() > 0; // Retorna true se o registro for bem-sucedido
        } catch (PDOException $e) {
            error_log("Erro ao registrar horário: " . $e->getMessage());
            return false;
        }
    }

    // Método para listar todos os horários
    public function listarHorarios() {
        try {
            $sql = "SELECT * FROM horarios";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro ao listar horários: " . $e->getMessage());
            return [];
        }
    }

    // Método para buscar horários de um funcionário por ID
    public function buscarHorariosPorFuncionario($funcionario_id) {
        try {
            $sql = "SELECT * FROM horarios WHERE funcionario_id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$funcionario_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro ao buscar horários: " . $e->getMessage());
            return [];
        }
    }

}
?>
