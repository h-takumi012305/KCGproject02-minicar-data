<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

set_include_path(__DIR__ . '/../');
require 'vendor/autoload.php'; 
require 'src/database.php'; 
require 'src/miniGTController.php'; 
require 'src/miniGTModel.php'; 

try {
    $config = include __DIR__ . '/config/config.php'; 
    $pdo = createPDO($config); 

    // Model and Controller creation 
    $miniGTModel = new miniGTModel($pdo); 
    $controller = new miniGTController($miniGTModel); 

    // Request handling 
    $controller->handleRequest();
} catch (Exception $e) { 
    error_log("Exception caught: " . $e->getMessage()); 
    error_log("Stack trace: " . $e->getTraceAsString()); 
    http_response_code(500); 
    echo "Internal Server Error. Please try again later."; 
}
?>
