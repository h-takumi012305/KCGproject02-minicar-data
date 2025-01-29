<?php

use eftec\bladeone\BladeOne;

<<<<<<< HEAD
class popraceController
=======
class innoController
>>>>>>> 0edf446da1fa2a51484dc3dd8cbe9a6d21e520a0
{
    private popraceModel $popraceModel;
    private BladeOne $blade;

    public function __construct(popraceModel $popraceModel)
    {
        $this->popraceModel = $popraceModel;
<<<<<<< HEAD
        $this->blade = new BladeOne(__DIR__ . '/views', __DIR__ . '/../cache', BladeOne::MODE_AUTO);
=======
        $this->blade = new BladeOne(__DIR__ . '/views', __DIR__ . '/../cache', 
        BladeOne::MODE_AUTO);
>>>>>>> 0edf446da1fa2a51484dc3dd8cbe9a6d21e520a0
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
        $this->popraceModel->create($_POST['ID'], $_POST['itemID'], $_POST['Name'], $_POST['Description'], $_POST['Make'], $_POST['DATE'], $_POST['Manufacturer'], $_POST['have']);
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit;
    }

    private function handleDelete(): void
    {
        $this->popraceModel->delete((int)$_POST['ID']);
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit;
    }

    private function handleGet(): void
<<<<<<< HEAD
    {   
        $sort = $_GET['sort'] ?? 'DATE'; // ソートパラメータを取得、デフォルトはDATE
        $search = $_GET['search'] ?? ''; // 検索パラメータを取得、デフォルトは空文字列
        $posts = $this->popraceModel->getAll($sort, $search);
=======
    {
        $posts = $this->popraceModel->getAll();
>>>>>>> 0edf446da1fa2a51484dc3dd8cbe9a6d21e520a0
        echo $this->blade->run('poprace', ['posts' => $posts]);
        exit;
    }
}
?>
