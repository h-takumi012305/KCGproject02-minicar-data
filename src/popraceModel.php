<?php

class popraceModel
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(string $Model, string $ModelID, string $Description, string $Make, string $DATE, string $Manufacturer, string $have): void
    {
        $stmt = $this->pdo->prepare('INSERT INTO pop race (Model ID, Model, Description, Make, DATE, Manufacturer, have) VALUES (:itemID, :Name, :DATE, :have)');
        $stmt->execute([
            ':Model' => $Model,
            ':Model ID' => $ModelID,
            ':Description' => $Description,
            ':Make' => $Make,
            ':DATE' => $DATE,
            ':Manufacturer' => $Manufacturer,
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