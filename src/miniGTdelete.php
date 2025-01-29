<?php

require '../vendor/autoload.php'; 
require 'database.php'; 
require 'miniGTModel.php';

try {
    $config = include __DIR__ . '/../config/config.php'; 
    $pdo = createPDO($config); 

    $miniGTModel = new miniGTModel($pdo);
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['_method']) && $_POST['_method'] === 'DELETE') {
        if (isset($_POST['id'])) {
            $id = (int)$_POST['id'];
            $miniGTModel->delete($id);
            http_response_code(200);
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
