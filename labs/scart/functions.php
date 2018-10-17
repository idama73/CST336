<?php

function displayResults(){
    if(isset($_SESSION['cart'])){
        echo "<table class = 'table'>";
    foreach ($_SESSION['cart'] as $item){
        echo "<tr>";
        echo"<td><h4>$item</h4></td>";
        echo "</tr>";
    }
    echo "</table>";
    }
 
 global $items;
 
 if(isset($items)){
     echo "<table class = 'table'>";
     foreach($items as $item) {
         $itemName = $item ['name'];
         $itemPrice = $item['salePrice'];
         $itemImage = $item['thumbnailImage'];
         $itemId = $iten['itemId'];
         
         
         echo '<tr>';
         echo "<td><img src= '$itemImage'></td>";
         echo "<td><h4>$itemName</h4></td>";
         echo "<td><h4>$$itemPrice</h4></td>";
         
         echo "<form method = 'post>";
         echo "<input type = 'hidden' name = 'itemName' value = '$itemName'>";
         echo "<td><button class = 'btn btn-warning'>Add</button></td";
         echo ",/form>";
         
         echo"</tr>";
         
     }
     echo "</table>";
 }


}

?>