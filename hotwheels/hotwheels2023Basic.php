<!DOCTYPE html>
<html lang="ja">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2023Basic</title>
</head>
<body>
    <p><a href="../hotwheels.html" ><input type="image" src="../images/hotwheels-logo.jpg" /></a></p>
    <h1>ホットウィール2023ベーシック</h1>
    <p><input type="image" src="../images/basics.jpg" /></p>
    
    <h2><a href="../minicardata-base.html" >ミニカーデータベースへ戻る</a></h2>
    <i class="far fa-check-circle"></i>

    <h3><a href="https://hotwheels.fandom.com/wiki/List_of_2023_Hot_Wheels" >wikiはこちらから</a></h3>
<?php
set_include_path(__DIR__ . '/../');
require 'vendor/autoload.php';
require 'src/database.php'; // データベース接続関数の読み込み
require 'src/MessageController.php';
require 'src/MessageModel.php';

// アプリはここから開始
try {
    // データベース接続
    $config = include __DIR__ . '/../config/config.php';
    $pdo = createPDO($config);

    // Modelの生成
    $messageModel = new MessageModel($pdo);

    // Controllerの生成
    $controller = new MessageController($messageModel);

    // リクエストの処理
    $controller->handleRequest();
} catch (Exception $e) {
    error_log("Exception caught: " . $e->getMessage());
    error_log("Stack trace: " . $e->getTraceAsString());
    http_response_code(500);
    echo "Internal Server Error. Please try again later.";
}
?>
</body>
</html>
