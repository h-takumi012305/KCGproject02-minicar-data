<?php
require '../vendor/autoload.php'; 
require 'database.php'; 
require 'innoModel.php';

try {
    $config = include __DIR__ . '/../config/config.php'; 
    $pdo = createPDO($config); 

    $innoModel = new innoModel($pdo);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['ID'], $_POST['itemID'], $_POST['DATE'], $_POST['Name'], $_POST['have'])) {
            $id = (int)$_POST['ID'];
            $itemID = $_POST['itemID'];
            $date = $_POST['DATE'];
            $name = $_POST['Name'];
            $have = (int)$_POST['have'];
            $innoModel->create($id, $itemID, $date, $name, $have); // 正しい順序でパラメータを渡す
            http_response_code(200);
            header('Location: ../inno.php'); // Redirect to the controller
            exit;
        } else {
            http_response_code(400); // Bad Request
        }
    } else {
        http_response_code(405); // Method Not Allowed
    }
} catch (Exception $e) { 
    error_log("Exception caught: " . $e->getMessage()); 
    error_log("Stack trace: " . $e->getTraceAsString()); 
    http_response_code(500); 
    echo "Internal Server Error. Please try again later."; 
}
?>
