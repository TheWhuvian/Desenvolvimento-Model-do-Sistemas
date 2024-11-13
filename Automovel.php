<?php
class Automovel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function addAutomovel($modelo, $preco) {
        $sql = "INSERT INTO pablo_automoveis_automovel (modelo, preco) VALUES (:modelo, :preco)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':modelo', $modelo);
        $stmt->bindParam(':preco', $preco);
        return $stmt->execute();
    }

    public function getAutomovel($id) {
        $sql = "SELECT * FROM pablo_automoveis_automovel WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateAutomovel($id, $modelo, $preco) {
        $sql = "UPDATE pablo_automoveis_automovel SET modelo = :modelo, preco = :preco WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':modelo', $modelo);
        $stmt->bindParam(':preco', $preco);
        return $stmt->execute();
    }

    public function deleteAutomovel($id) {
        $sql = "DELETE FROM pablo_automoveis_automovel WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}

?>