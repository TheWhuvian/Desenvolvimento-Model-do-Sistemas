<?php
class Venda {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function addVenda($clienteId, $automovelId, $preco) {
        $sql = "INSERT INTO pablo_automoveis_venda (cliente_id, automovel_id, preco) VALUES (:clienteId, :automovelId, :preco)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':clienteId', $clienteId);
        $stmt->bindParam(':automovelId', $automovelId);
        $stmt->bindParam(':preco', $preco);
        return $stmt->execute();
    }

    public function getVenda($id) {
        $sql = "SELECT * FROM pablo_automoveis_venda WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateVenda($id, $clienteId, $automovelId, $preco) {
        $sql = "UPDATE pablo_automoveis_venda SET cliente_id = :clienteId, automovel_id = :automovelId, preco = :preco WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':clienteId', $clienteId);
        $stmt->bindParam(':automovelId', $automovelId);
        $stmt->bindParam(':preco', $preco);
        return $stmt->execute();
    }

    public function deleteVenda($id) {
        $sql = "DELETE FROM pablo_automoveis_venda WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function sellVeiculo($carId, $clientId, $price) {
        // Código para registrar a venda de um carro
        $this->pdo->beginTransaction();
        try {
            // Adicionar venda
            $this->addVenda($clientId, $carId, $price);

            // Atualizar status do automóvel (exemplo: marcar como vendido)
            $sql = "UPDATE pablo_automoveis_automovel SET status = 'vendido' WHERE id = :carId";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':carId', $carId);
            $stmt->execute();

            $this->pdo->commit();
            return true;
        } catch (Exception $e) {
            $this->pdo->rollBack();
            throw $e;
        }
    }
}


?>