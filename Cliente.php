<?php
class Cliente {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function addCliente($nome) {
        $sql = "INSERT INTO pablo_automoveis_cliente (nome) VALUES (:nome)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        return $stmt->execute();
    }

    public function getCliente($id) {
        $sql = "SELECT * FROM pablo_automoveis_cliente WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateCliente($id, $nome) {
        $sql = "UPDATE pablo_automoveis_cliente SET nome = :nome WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        return $stmt->execute();
    }

    public function deleteCliente($id) {
        $sql = "DELETE FROM pablo_automoveis_cliente WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}

?>