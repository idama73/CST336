<?php
header('Access-Control-Allow-Origin: *');
session_start();

include '../../inc/dbConnection.php';
$dbConn = startConnection("ottermart");
include 'functions.php';
validateSession();

$sql = "SELECT AVG(prodId) as avg from sc_product";
        
$stmt = $dbConn->prepare($sql);
$stmt->execute();
$avg = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($avg);
?>