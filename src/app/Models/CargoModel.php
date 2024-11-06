<?php
class CargoModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Método para criar um novo registro de cargo
    public function criarRegistroCargo($nome, $salario) {
        try {
            $sql = "INSERT INTO cargos (nome, salario) VALUES (?, ?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$nome, $salario]);
    
            return $stmt->rowCount() > 0; // Retorna true se a inserção for bem-sucedida
        } catch (PDOException $e) {
            // Lida com erros e pode salvar em um log se necessário
            error_log("Erro ao inserir cargo: " . $e->getMessage());
            return false;
        }
    }
    

    // Método para listar todos os cargos
    public function listarCargos() {
        try {
            $sql = "SELECT * FROM cargos";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro ao listar cargos: " . $e->getMessage());
            return [];
        }
    }

    // Método para buscar cargo por ID
    public function buscarCargoPorId($id) {
        try {
            $sql = "SELECT * FROM cargos WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro ao buscar cargo: " . $e->getMessage());
            return null;
        }
    }
}
?>
