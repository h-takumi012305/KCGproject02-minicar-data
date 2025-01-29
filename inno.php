<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

set_include_path(__DIR__ . '/../');
require 'vendor/autoload.php'; 
require 'src/database.php'; 
require 'src/innoController.php'; 
require 'src/innoModel.php'; 
<<<<<<< HEAD
try {
    $config = include __DIR__ . '/config/config.php'; 
    $pdo = createPDO($config); 
=======
try { 
    // Database connection 
    $config = include __DIR__ . '/config/config.php'; 
    $pdo = createPDO($config);
>>>>>>> 0edf446da1fa2a51484dc3dd8cbe9a6d21e520a0

    // Model and Controller creation 
    $innoModel = new innoModel($pdo); 
    $controller = new innoController($innoModel); 
    // Request handling 
    $controller->handleRequest();
<<<<<<< HEAD
=======

>>>>>>> 0edf446da1fa2a51484dc3dd8cbe9a6d21e520a0
} catch (Exception $e) { 
    error_log("Exception caught: " . $e->getMessage()); 
    error_log("Stack trace: " . $e->getTraceAsString()); 
    http_response_code(500); 
    echo "Internal Server Error. Please try again later."; 
<<<<<<< HEAD
}
=======
} 
>>>>>>> 0edf446da1fa2a51484dc3dd8cbe9a6d21e520a0
?>