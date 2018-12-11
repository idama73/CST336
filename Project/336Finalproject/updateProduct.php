<?php

include '../../inc/dbConnection.php';
$dbConn = startConnection("ottermart");
include 'functions.php';


if (isset($_GET['updateProduct'])) { //checks whether the form was submitted
    
    $productName = $_GET['productName'];
    $description =  $_GET['description'];
    $price =  $_GET['price'];
    $catId =  $_GET['catId'];
    $image = $_GET['productImage'];
    
    
    $sql = "INSERT INTO sc_product (team, description,image,price, catId, prodId) 
            VALUES (:productName, :productDescription, :productImage, :price, :catId, 25);";
    $np = array();
    $np[":productName"] = $productName;
    $np[":productDescription"] = $description;
    $np[":productImage"] = $image;
    $np[":price"] = $price;
    $np[":catId"] = $catId;
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    echo "New Product was added!";
}

if (isset($_GET['productId'])) {

  $productInfo = getProductInfo($_GET['productId']);    
  
  //print_r($productInfo);
    
    
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Update Products! </title>
    </head>
            <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

            <link rel="stylesheet" href="css/styles.css" type="text/css" />

    <body>

        <h1> Update a Product here </h1>
        
        <form>
           Product name: <input type="text" name="productName" value="<?=$productInfo['team']?>"><br>
           Description: <textarea name="description" cols="50" rows="4"> <?=$productInfo['description']?> </textarea><br>
           Price: <input type="text" name="price" value="<?=$productInfo['price']?>"><br>
           Category: 
           <select name="catId">
              <option value="">Select One</option>
              <?php
              
              $categories = getCategories();
              foreach ($categories as $category) {
                  
                  echo "<option  "; 
                  echo  ($category['catId']==$productInfo['catId'])?"selected":"";
                  echo " value='".$category['catId']."'>" . $category['catName'] . "</option>";
                  
              }
              
                  
                 
              
              
              ?>
           </select> <br />
           Set Image Url: <input type="text" name="productImage" value="<?=$productInfo['image']?>"><br>
           <input type="submit" name="updateProduct" value="Update Product">
        </form>
        
         <a href = 'admin.php' class = 'btn btn-success'> Admin page</a>

    </body>
</html>