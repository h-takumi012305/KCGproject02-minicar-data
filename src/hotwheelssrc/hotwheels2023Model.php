<?php

class hotwheels2023Model
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(string $itemID, string $Col, string $Name, string $Series, int $have): void
    {
        $stmt = $this->pdo->prepare('INSERT INTO hotwheels2023 (itemID, Col, Name, Series, have) VALUES (:itemID, :Col, :Name, :Series, :have)');
        $stmt->execute([
            ':itemID' => $itemID,
            ':Col' => $Col,
            ':Name' => $Name,
            ':Series' => $Series,
            ':have' => $have,
        ]);
    }

    public function delete(int $ID): void
    {
        $stmt = $this->pdo->prepare('DELETE FROM hotwheels2023 WHERE ID = :ID');
        $stmt->execute([':ID' => $ID]);
    }

    public function getAll(string $sort = 'Name', string $search = ''): array
    {
        $allowedSorts = ['ID', 'itemID', 'Col', 'Name', 'Series', 'have'];
        if (!in_array($sort, $allowedSorts)) {
            $sort = 'Name';
        }
        $stmt = $this->pdo->prepare("SELECT * FROM hotwheels2023 WHERE Name LIKE :search ORDER BY $sort DESC");
        $stmt->execute([':search' => "%$search%"]);
        return $stmt->fetchAll();
    }

    public function updateHave(int $ID, int $increment): void
    {
        $stmt = $this->pdo->prepare('UPDATE hotwheels2023 SET have = have + :increment WHERE ID = :ID');
        $stmt->execute([
            ':increment' => $increment,
            ':ID' => $ID,
        ]);
    }
}
?>
