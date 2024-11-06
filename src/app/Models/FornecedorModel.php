<?php
class FornecedorModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Método para criar um novo registro de fornecedor
    public function criarRegistroFornecedor($nome, $cnpj, $email, $telefone, $endereco) {
        try {
            $sql = "INSERT INTO fornecedores (nome, cnpj, email, telefone, endereco) 
                    VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$nome, $cnpj, $email, $telefone, $endereco]);

            return $stmt->rowCount() > 0; // Retorna true se a inserção for bem-sucedida
        } catch (PDOException $e) {
            error_log("Erro ao inserir fornecedor: " . $e->getMessage());
            return false;
        }
    }

    // Método para listar todos os fornecedores
    public function listarFornecedores() {
        try {
            $sql = "SELECT * FROM fornecedores";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro ao listar fornecedores: " . $e->getMessage());
            return [];
        }
    }

    // Método para buscar fornecedor específico por CNPJ
    public function buscarFornecedorPorCNPJ($cnpj) {
        try {
            $sql = "SELECT * FROM fornecedores WHERE cnpj = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$cnpj]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro ao buscar fornecedor: " . $e->getMessage());
            return null;
        }
    }
}
?>
