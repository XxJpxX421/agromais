<?php
class ClienteModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Método para criar um novo registro de cliente
    public function criarRegistroCliente($nome, $cpf, $email, $telefone, $cidade) {
        try {
            $sql = "INSERT INTO clientes (nome, cpf, email, telefone, cidade) 
                    VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$nome, $cpf, $email, $telefone, $cidade]);

            return $stmt->rowCount() > 0; // Retorna true se a inserção for bem-sucedida
        } catch (PDOException $e) {
            // Lida com erros e pode salvar em um log se necessário
            error_log("Erro ao inserir cliente: " . $e->getMessage());
            return false;
        }
    }

    // Método para listar todos os clientes
    public function listarClientes() {
        try {
            $sql = "SELECT * FROM clientes";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro ao listar clientes: " . $e->getMessage());
            return [];
        }
    }

    // Método para buscar cliente específico por CPF
    public function buscarClientePorCPF($cpf) {
        try {
            $sql = "SELECT * FROM clientes WHERE cpf = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$cpf]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro ao buscar cliente: " . $e->getMessage());
            return null;
        }
    }
}
?>
