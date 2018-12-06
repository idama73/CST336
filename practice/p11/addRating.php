<?php
include "../../inc/dbConnection.php";

$dbConn = startConnection();

$sql = "INSERT INTO `ratings` (`ratingId`, `ratingValue`) VALUES (NULL, " . $_GET['rating'] .")";
 $stmt = $dbConn->prepare($sql);
 $stmt->execute();
 
 $sql = "SELECT AVG('ratingValue') FROM ratings";
  $stmt = $dbConn->prepare($sql);
 $stmt->execute();
 $record = $stmt->fetch(PDO::FETCH_ASSOC);
 print_r($record);
 
  $sql = "SELECT * FROM ratings";
  $stmt = $dbConn->prepare($sql);
 $stmt->execute();
 $ratings = $stmt->fetch(PDO::FETCH_ASSOC);
 print_r($ratings);
 
 $record['numRatings'] = count($ratings);
 
 echo json_encode($record);
?>