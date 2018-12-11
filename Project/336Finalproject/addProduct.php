<?php

include '../../inc/dbConnection.php';
include 'functions.php';
$dbConn = startConnection("ottermart");
validateSession();

if (isset($_GET['addProduct'])) { //checks whether the form was submitted
    
    $productName = $_GET['productName'];
    $description =  $_GET['description'];
    $price =  $_GET['price'];
    $catId =  $_GET['catId'];
    $image = $_GET['productImage'];
    
    
    $sql = "INSERT INTO sc_product (team, description, image,price, catId) 
            VALUES (:productName, :productDescription, :productImage, :price, :catId);";
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

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Admin Section: Add New Product </title>
    </head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

            <link rel="stylesheet" href="css/styles.css" type="text/css" />

    <body>
        
        <h1> Adding New Product </h1>
        
        <form>
           Product name: <input type="text" name="productName"><br>
           Description: <textarea name="description" cols="50" rows="4"></textarea><br>
           Price: <input type="text" name="price"><br>
           Category: 
           <select name="catId">
              <option value="">Select One</option>
              <?php
              
              $categories = displayCategories();
              
            //   foreach ($categories as $category) {
                  
            //       echo "<option value='".$category['catId']."'>" . $category['catName'] . "</option>";
                  
            //   }
              
              ?>
           </select> <br />
           Set Image Url: <input type="text" name="productImage"><br>
           <input type="submit" name="addProduct" value="Add Product">
        </form>


         <a href = 'admin.php' class = 'btn btn-success'> Admin page</a>
    </body>
</html>