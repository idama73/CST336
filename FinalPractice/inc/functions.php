<?php
include  "../../inc/dbConnection.php";

$dbConn = startConnection("final");
// function getHerosName(){
//      global $dbConn;

//      $sql = " SELECT * FROM superhero ORDER BY name ASC";
//      $stmt = $dbConn->prepare($sql);
//      $stmt->execute();
//      $records = $stmt->fetchall(); //we are getting all the records
//  print_r($records);
//   // print_r($stmt->errorInfo());
//     foreach($records as $record){
//         echo"<option value='" .$record['name']. "'";

//         if($_GET['sheroname'] == $record['name']){
//             echo "seleted = 'seleted'";
//         }
//         echo ">".$record['name']."</option><br/>";
//     }
// }

function displayCategories()
{
  global $dbConn;

  $sql = "SELECT DISTINCT name FROM superhero ORDER BY name";
  $statement = $dbConn -> prepare($sql);
  $statement -> execute();
  $records = $statement -> fetchAll();

  echo "<option value=''>Select One</option>";

  foreach ($records as $record)
  {
      echo "<option value='". $record['id'] ."'>" . $record['name'] . "</option>";
  }
}
////////////////////////////////////////////////////
//creat a random image when page is refresh
$photo = array("batman", "captain_america", "hulk", "iron_man", "spiderman", "superman", "wonder_woman");

function picture($photo){
  /*$match = $false;*/

   for($i = 0; $i <1; $i++){
       $randompic = rand(0,(count($photo)-1));
       echo "<img width= '100' src= '../img/superheroes/$photo[$randompic].png'>";
   }
}


?>
<!DOCTYPE html>
<html>
   <head>
       <script src="js/jquery.min.js"></script>
       <link  href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
       <script src="js/bootstrap.min.js"></script>

       <title> Final project </title>
   </head>
   <body>
<h2>What is the real name of the following superhero?</h2>
   <?php picture($photo) ?>
<select name ="sheroname">
   <option value="">Select One</option>
   <?php displayCategories() ?>
</select><br></br>


<form>
   <input type="submit" name="superheroname" value="Check Answer"/>
</form>
   </body>
</html>