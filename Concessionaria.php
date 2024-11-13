<?php
class Concessionaria {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function addConcessionaria($nome) {
        $sql = "INSERT INTO pablo_automoveis_concessionaria (nome) VALUES (:nome)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        return $stmt->execute();
    }

    public function getConcessionaria($id) {
        $sql = "SELECT * FROM pablo_automoveis_concessionaria WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateConcessionaria($id, $nome) {
        $sql = "UPDATE pablo_automoveis_concessionaria SET nome = :nome WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        return $stmt->execute();
    }

    public function deleteConcessionaria($id) {
        $sql = "DELETE FROM pablo_automoveis_concessionaria WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}

?>