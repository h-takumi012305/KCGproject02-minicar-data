<?php

use eftec\bladeone\BladeOne;

class popraceController
{
    private popraceModel $popraceModel;
    private BladeOne $blade;

    public function __construct(popraceModel $popraceModel)
    {
        $this->popraceModel = $popraceModel;
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
    {   
        $sort = $_GET['sort'] ?? 'DATE'; // ソートパラメータを取得、デフォルトはDATE
        $search = $_GET['search'] ?? ''; // 検索パラメータを取得、デフォルトは空文字列
        $posts = $this->popraceModel->getAll($sort, $search);
        echo $this->blade->run('poprace', ['posts' => $posts]);
        exit;
    }
}
?>
