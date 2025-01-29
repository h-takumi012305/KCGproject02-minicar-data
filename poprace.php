<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php'; 
require 'src/database.php'; 
require 'src/popraceController.php'; 
require 'src/popraceModel.php'; 

try {
    $config = include __DIR__ . '/config/config.php'; 
    $pdo = createPDO($config); 

    // Model and Controller creation 
    $popraceModel = new popraceModel($pdo); 
    $controller = new popraceController($popraceModel); 
    // Request handling 
    $controller->handleRequest();
} catch (Exception $e) { 
    error_log("Exception caught: " . $e->getMessage()); 
    error_log("Stack trace: " . $e->getTraceAsString()); 
    http_response_code(500); 
    echo "Internal Server Error. Please try again later."; 
}
?>
