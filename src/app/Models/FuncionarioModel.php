
<?php
class FuncionarioModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Método para criar um novo registro de funcionário
    public function criarRegistroFuncionario($nome, $cpf, $email, $telefone, $cargo_id, $data_admissao) {
        try {
            $sql = "INSERT INTO funcionarios (nome, cpf, email, telefone, cargo_id, data_admissao) 
                    VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$nome, $cpf, $email, $telefone, $cargo_id, $data_admissao]);

            return $stmt->rowCount() > 0; // Retorna true se a inserção for bem-sucedida
        } catch (PDOException $e) {
            error_log("Erro ao inserir funcionário: " . $e->getMessage());
            return false;
        }
    }

    // Método para listar todos os funcionários
    public function listarFuncionarios() {
        try {
            $sql = "SELECT * FROM funcionarios";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro ao listar funcionários: " . $e->getMessage());
            return [];
        }
    }

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

    // Método para buscar horários
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
}
?>
