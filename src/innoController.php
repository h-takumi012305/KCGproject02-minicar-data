<?php

use eftec\bladeone\BladeOne;

class innoController
{
    private innoModel $innoModel;
    private BladeOne $blade;

    public function __construct(innoModel $innoModel)
    {
        $this->innoModel = $innoModel;
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
        $this->innoModel->create($_POST['itemID'], $_POST['Name'], $_POST['DATE'], $_POST['have']);
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit;
    }

    private function handleDelete(): void
    {
        $this->innoModel->delete((int)$_POST['ID']);
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit;
    }

    private function handleGet(): void
<<<<<<< HEAD
    {   
        $sort = $_GET['sort'] ?? 'DATE'; // ソートパラメータを取得、デフォルトはDATE
        $search = $_GET['search'] ?? ''; // 検索パラメータを取得、デフォルトは空文字列
        $posts = $this->innoModel->getAll($sort, $search);
=======
    {
        $posts = $this->innoModel->getAll();
>>>>>>> 0edf446da1fa2a51484dc3dd8cbe9a6d21e520a0
        echo $this->blade->run('inno', ['posts' => $posts]);
        exit;
    }
}
?>
<<<<<<< HEAD

=======
>>>>>>> 0edf446da1fa2a51484dc3dd8cbe9a6d21e520a0
