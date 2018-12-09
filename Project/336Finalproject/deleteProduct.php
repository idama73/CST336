<?php

include '../../inc/dbConnection.php';
$dbConn = startConnection("ottermart");


$sql = "DELETE FROM sc_product WHERE prodId = " . $_GET['productId'];
$stmt=$dbConn->prepare($sql);
$stmt->execute();

header("Location: admin.php");



?>