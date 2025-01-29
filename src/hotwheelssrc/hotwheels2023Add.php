<?php

require '../../vendor/autoload.php'; 
require '../database.php'; 
require 'hotwheels2023Model.php';

try {
    $config = include __DIR__ . '/../../config/config.php'; 
    $pdo = createPDO($config); 

    $model = new hotwheels2023Model($pdo);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['itemID']) && isset($_POST['Col']) && isset($_POST['Name']) && isset($_POST['Series']) && isset($_POST['have'])) {
            $itemID = $_POST['itemID'];
            $Col = $_POST['Col'];
            $Name = $_POST['Name'];
            $Series = $_POST['Series'];
            $have = (int)$_POST['have'];
            $model->create($itemID, $Col, $Name, $Series, $have);
            http_response_code(200);
            header('Location: ' . $_SERVER['REQUEST_URI']);
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
