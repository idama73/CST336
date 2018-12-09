<?php
header('Access-Control-Allow-Origin: *');
session_start();

include '../../inc/dbConnection.php';
$dbConn = startConnection("ottermart");
include 'functions.php';
validateSession();

$sql = "SELECT COUNT(prodId) as count from sc_product";
        
$stmt = $dbConn->prepare($sql);
$stmt->execute();
$count = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($count);
?>