<?php

class innoModel
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(string $itemID, string $Name, string $DATE, string $have): void
    {
        $stmt = $this->pdo->prepare('INSERT INTO inno (itemID, Name, DATE, have) VALUES (:itemID, :Name, :DATE, :have)');
        $stmt->execute([
            ':itemID' => $itemID,
            ':Name' => $Name,
            ':DATE' => $DATE,
            ':have' => $have,
        ]);
    }

    public function delete(int $ID): void
    {
        $stmt = $this->pdo->prepare('DELETE FROM inno WHERE ID = :ID');
        $stmt->execute([':ID' => $ID]);
    }

    public function getAll(): array
    {
        $stmt = $this->pdo->query('SELECT * FROM inno ORDER BY DATE DESC');
        return $stmt->fetchAll();
    }
}
?>