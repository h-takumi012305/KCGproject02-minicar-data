<?php
require '../vendor/autoload.php'; 
require 'database.php'; 
require 'popraceModel.php';

try {
    $config = include __DIR__ . '/../config/config.php'; 
    $pdo = createPDO($config); 

    $popraceModel = new popraceModel($pdo);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['ID'], $_POST['itemID'], $_POST['Name'], $_POST['Description'], $_POST['Make'], $_POST['DATE'], $_POST['Manufacturer'], $_POST['have'])) {
            $id = (int)$_POST['ID'];
            $itemID = $_POST['itemID'];
            $name = $_POST['Name'];
            $description = $_POST['Description'];
            $make = $_POST['Make'];
            $date = $_POST['DATE'];
            $manufacturer = $_POST['Manufacturer'];
            $have = (int)$_POST['have'];
            $popraceModel->create($id, $itemID, $name, $description, $make, $date, $manufacturer, $have);
            http_response_code(200);
            header('Location: ../poprace.php');
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
