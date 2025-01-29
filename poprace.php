<<<<<<< HEAD
<?php
=======
<?php 

>>>>>>> 0edf446da1fa2a51484dc3dd8cbe9a6d21e520a0
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

<<<<<<< HEAD
=======
set_include_path(__DIR__ . '/../');
>>>>>>> 0edf446da1fa2a51484dc3dd8cbe9a6d21e520a0
require 'vendor/autoload.php'; 
require 'src/database.php'; 
require 'src/popraceController.php'; 
require 'src/popraceModel.php'; 
<<<<<<< HEAD

try {
    $config = include __DIR__ . '/config/config.php'; 
    $pdo = createPDO($config); 

    // Model and Controller creation 
    $popraceModel = new popraceModel($pdo); 
    $controller = new popraceController($popraceModel); 
    // Request handling 
    $controller->handleRequest();
=======
try { 
    // Database connection 
    $config = include __DIR__ . '/config/config.php'; 
    $pdo = createPDO($config);

    // Model and Controller creation 
    $innoModel = new popraceModel($pdo); 
    $controller = new popraceController($innoModel); 
    // Request handling 
    $controller->handleRequest();

>>>>>>> 0edf446da1fa2a51484dc3dd8cbe9a6d21e520a0
} catch (Exception $e) { 
    error_log("Exception caught: " . $e->getMessage()); 
    error_log("Stack trace: " . $e->getTraceAsString()); 
    http_response_code(500); 
    echo "Internal Server Error. Please try again later."; 
<<<<<<< HEAD
}
?>
=======
} 
?>

>>>>>>> 0edf446da1fa2a51484dc3dd8cbe9a6d21e520a0
