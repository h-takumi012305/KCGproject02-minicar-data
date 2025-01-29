<?php
class popraceModel
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(int $ID, string $itemID, string $Name, string $Description, string $Make, string $DATE, string $Manufacturer, int $have): void
    {
        $stmt = $this->pdo->prepare('INSERT INTO poprace (ID, itemID, Name, Description, Make, DATE, Manufacturer, have) VALUES (:ID, :itemID, :Name, :Description, :Make, :DATE, :Manufacturer, :have)');
        $stmt->execute([
            ':ID' => $ID,
            ':itemID' => $itemID,
            ':Name' => $Name,
            ':Description' => $Description,
            ':Make' => $Make,
            ':DATE' => $DATE,
            ':Manufacturer' => $Manufacturer,
            ':have' => $have,
        ]);
    }

    public function delete(int $ID): void
    {
        $stmt = $this->pdo->prepare('DELETE FROM poprace WHERE ID = :ID');
        $stmt->execute([':ID' => $ID]);
    }

    public function getAll(string $sort = 'DATE', string $search = ''): array
    {
        $allowedSorts = ['ID', 'itemID', 'Name', 'Description', 'Make', 'DATE', 'Manufacturer', 'have'];
        if (!in_array($sort, $allowedSorts)) {
            $sort = 'DATE';
        }
        $stmt = $this->pdo->prepare("SELECT * FROM poprace WHERE Name LIKE :search OR Description LIKE :search OR Make LIKE :search OR Manufacturer LIKE :search ORDER BY $sort DESC");
        $stmt->execute([':search' => "%$search%"]);
        return $stmt->fetchAll();
    }

    public function updateHave(int $ID, int $increment): void
    {
        $stmt = $this->pdo->prepare('UPDATE poprace SET have = have + :increment WHERE ID = :ID');
        $stmt->execute([
            ':increment' => $increment,
            ':ID' => $ID,
        ]);
    }
}
?>
