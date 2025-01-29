<?php

use eftec\bladeone\BladeOne;

class hotwheels2023Controller
{
    private hotwheels2023Model $model;
    private BladeOne $blade;

    public function __construct(hotwheels2023Model $model)
    {
        $this->model = $model;
        $this->blade = new BladeOne(__DIR__ . '/../views/hotwheelviews', __DIR__ . '/../cache', BladeOne::MODE_AUTO);
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
        $this->model->create($_POST['itemID'], $_POST['Col'], $_POST['Name'], $_POST['Series'], $_POST['have']);
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit;
    }

    private function handleDelete(): void
    {
        $this->model->delete((int)$_POST['ID']);
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit;
    }

    private function handleGet(): void
    {
        $sort = $_GET['sort'] ?? 'Name';
        $search = $_GET['search'] ?? '';
        $posts = $this->model->getAll($sort, $search);
        echo $this->blade->run('hotwheels2023', ['posts' => $posts]);
        exit;
    }
}
?>
