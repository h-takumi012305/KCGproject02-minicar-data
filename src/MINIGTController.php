<?php

use eftec\bladeone\BladeOne;

class miniGTController
{
    private miniGTModel $miniGTModel;
    private BladeOne $blade;

    public function __construct(miniGTModel $miniGTModel)
    {
        $this->miniGTModel = $miniGTModel;
        $this->blade = new BladeOne(__DIR__ . '/views', __DIR__ . '/../cache', BladeOne::MODE_AUTO);
    }

    public function handleRequest(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['_method']) && $_POST['_method'] === 'DELETE') {
                $this->handleDelete();
            } else {
                $this->handlePost();
            }
        } else {
            $this->handleGet();
        }
    }

    private function handlePost(): void
    {
        $this->miniGTModel->create($_POST['itemID'], $_POST['Name'], $_POST['Make'], $_POST['DATE'], $_POST['have']);
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit;
    }

    private function handleDelete(): void
    {
        $this->miniGTModel->delete((int)$_POST['ID']);
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit;
    }

    private function handleGet(): void
    {
        $sort = $_GET['sort'] ?? 'DATE';
        $search = $_GET['search'] ?? '';
        $posts = $this->miniGTModel->getAll($sort, $search);
        echo $this->blade->run('miniGT', ['posts' => $posts]);
        exit;
    }
}
?>
