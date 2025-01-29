<?php

class miniGTModel
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(string $itemID, string $Name, string $Make, string $DATE, int $have): void
    {
        $stmt = $this->pdo->prepare('INSERT INTO MINIGT (itemID, Name, Make, DATE, have) VALUES (:itemID, :Name, :Make, :DATE, :have)');
        $stmt->execute([
            ':itemID' => $itemID,
            ':Name' => $Name,
            ':Make' => $Make,
            ':DATE' => $DATE,
            ':have' => $have,
        ]);
    }

    public function delete(int $ID): void
    {
        $stmt = $this->pdo->prepare('DELETE FROM MINIGT WHERE ID = :ID');
        $stmt->execute([':ID' => $ID]);
    }

    public function getAll(string $sort = 'DATE', string $search = ''): array
    {
        $allowedSorts = ['ID', 'itemID', 'Name', 'Make', 'DATE', 'have'];
        if (!in_array($sort, $allowedSorts)) {
            $sort = 'DATE';
        }
        $stmt = $this->pdo->prepare("SELECT * FROM MINIGT WHERE Name LIKE :search ORDER BY $sort DESC");
        $stmt->execute([':search' => "%$search%"]);
        return $stmt->fetchAll();
    }

    public function updateHave(int $ID, int $increment): void
    {
        $stmt = $this->pdo->prepare('UPDATE MINIGT SET have = have + :increment WHERE ID = :ID');
        $stmt->execute([
            ':increment' => $increment,
            ':ID' => $ID,
        ]);
    }
}
?>
