<?php
session_start();

include '../../inc/dbConnection.php';
$dbConn = startConnection("ottermart");
include 'functions.php';
validateSession();

if (isset($_GET['productId'])) {

  $productInfo = getProductInfo($_GET['productId']);    
  //print_r($productInfo);
    
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Product Info </title>
    </head>
    <body>
    
    <h3><?=$productInfo['team']?></h3>
     <?=$productInfo['description']?><br>
     <img src='<?=$productInfo['image']?>' height='75'/>
 
    </body>
</html>