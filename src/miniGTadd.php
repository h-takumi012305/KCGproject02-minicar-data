<?php

require '../vendor/autoload.php'; 
require 'database.php'; 
require 'miniGTModel.php';

try {
    $config = include __DIR__ . '/../config/config.php'; 
    $pdo = createPDO($config); 

    $miniGTModel = new miniGTModel($pdo);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['itemID']) && isset($_POST['Name']) && isset($_POST['Make']) && isset($_POST['DATE']) && isset($_POST['have'])) {
            $itemID = $_POST['itemID'];
            $Name = $_POST['Name'];
            $Make = $_POST['Make'];
            $DATE = $_POST['DATE'];
            $have = (int)$_POST['have'];
            $miniGTModel->create($itemID, $Name, $Make, $DATE, $have);
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
