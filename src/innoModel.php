<?php
<<<<<<< HEAD
=======

>>>>>>> 0edf446da1fa2a51484dc3dd8cbe9a6d21e520a0
class innoModel
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(int $ID, string $itemID, string $DATE, string $Name, int $have): void
    {
        $stmt = $this->pdo->prepare('INSERT INTO inno (ID, itemID, DATE, Name, have) VALUES (:ID, :itemID, :DATE, :Name, :have)');
        $stmt->execute([
            ':ID' => $ID,
            ':itemID' => $itemID,
            ':DATE' => $DATE,
            ':Name' => $Name,
            ':have' => $have,
        ]);
    }

    public function delete(int $ID): void
    {
        $stmt = $this->pdo->prepare('DELETE FROM inno WHERE ID = :ID');
        $stmt->execute([':ID' => $ID]);
    }

<<<<<<< HEAD
    public function getAll(string $sort = 'DATE', string $search = ''): array
    {
        $allowedSorts = ['ID', 'itemID', 'DATE', 'Name', 'have'];
        if (!in_array($sort, $allowedSorts)) {
            $sort = 'DATE';
        }
        $stmt = $this->pdo->prepare("SELECT * FROM inno WHERE Name LIKE :search ORDER BY $sort DESC");
        $stmt->execute([':search' => "%$search%"]);
        return $stmt->fetchAll();
    }

    public function updateHave(int $ID, int $increment): void
    {
        $stmt = $this->pdo->prepare('UPDATE inno SET have = have + :increment WHERE ID = :ID');
        $stmt->execute([
            ':increment' => $increment,
            ':ID' => $ID,
        ]);
    }
}
=======
    public function getAll(): array
    {
        $stmt = $this->pdo->query('SELECT * FROM inno ORDER BY DATE DESC');
        return $stmt->fetchAll();
    }
}
?>
>>>>>>> 0edf446da1fa2a51484dc3dd8cbe9a6d21e520a0
