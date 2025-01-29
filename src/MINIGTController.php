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
<<<<<<< HEAD
        $this->miniGTModel->create($_POST['itemID'], $_POST['Name'], $_POST['Make'], $_POST['DATE'], $_POST['have']);
=======
        $this->innoModel->create($_POST['name'], $_POST['title'], $_POST['content']);
>>>>>>> 0edf446da1fa2a51484dc3dd8cbe9a6d21e520a0
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit;
    }

    private function handleDelete(): void
    {
<<<<<<< HEAD
        $this->miniGTModel->delete((int)$_POST['ID']);
=======
        $this->innoModel->delete($_POST['id']);
>>>>>>> 0edf446da1fa2a51484dc3dd8cbe9a6d21e520a0
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit;
    }

    private function handleGet(): void
    {
<<<<<<< HEAD
        $sort = $_GET['sort'] ?? 'DATE';
        $search = $_GET['search'] ?? '';
        $posts = $this->miniGTModel->getAll($sort, $search);
        echo $this->blade->run('miniGT', ['posts' => $posts]);
        exit;
    }
}
?>
=======
        $posts = $this->innoModel->getAll();
        echo $this->blade->run('index', ['posts' => $posts]);
        exit;
    }
}
>>>>>>> 0edf446da1fa2a51484dc3dd8cbe9a6d21e520a0
