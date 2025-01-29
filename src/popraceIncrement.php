<?php
require '../vendor/autoload.php'; 
require 'database.php'; 
require 'popraceModel.php';
error_log("popraceIncrement.php called");
try {
    $config = include __DIR__ . '/../config/config.php'; 
    $pdo = createPDO($config); 

    $popraceModel = new popraceModel($pdo);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['id']) && isset($_POST['increment'])) {
            $id = (int)$_POST['id'];
            $increment = (int)$_POST['increment'];
            $popraceModel->updateHave($id, $increment);
            http_response_code(200);
            error_log("Update successful");
        } else {
            http_response_code(400); // Bad Request
            error_log("Missing parameters");
        }
    } else {
        http_response_code(405); // Method Not Allowed
        error_log("Invalid request method");
    }
} catch (Exception $e) { 
    error_log("Exception caught: " . $e->getMessage()); 
    error_log("Stack trace: " . $e->getTraceAsString()); 
    http_response_code(500); 
    echo "Internal Server Error. Please try again later."; 
}
?>
