<?php

$backgroundImage = "img/cars.jpg";

if (isset($_GET["keyword"])) {  

    include "api/pixabayAPI.php";

    $keyword = $_GET["keyword"];
    
    if (!empty($_GET['category'])) { 
        
        $keyword = $_GET['category'];
        
    }
    
    
    echo "You searched for:  $keyword";
    

   $imageURLs = getImageURLs($keyword, $_GET["layout"]);
   //print_r($imageURLs);
   shuffle($imageURLs);

   $backgroundImage = $imageURLs[array_rand($imageURLs)];
  
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 4: Pixabay Slideshow </title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        
        <style>
            
            body {
                
                background-image: url(<?=$backgroundImage?>);
                background-size: cover;
                
            }
            
            #carouselExampleIndicators{
                 width:500px;
                 margin:0 auto; 
            }
            
        </style>
        
    </head>


    <body>
    
        <br>

        <form method="GET">
            
            <input type="text" name="keyword" size="15" placeholder="Keyword"/>
            
            <input type="radio" name="layout" value="horizontal"> Horizontal
            <input type="radio" name="layout" value="vertical"> Vertical
        

            <select name="category">
                <option value=""> Select One </option>
                <option value="cars"> Bugatti</option>
                <option>Ferrari</option>
                <option>Lamborghini</option>
                <option>McLaren</option>
            </select>
            
            <input type="submit" name="submit" value="Search"/>
            
        </form>

        <!--<h1>You must type a keyword or select a category</h1>-->
        
        <?php 
        if (isset($imageURLs)) { ?>
        
           <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <?php
                  for ($i=1; $i < 9; $i++) { 
                    echo "<li data-target='#carouselExampleIndicators' data-slide-to='$i'></li>";
                  }
                 ?>
              </ol>
              <div class="carousel-inner">
                <?php
                  for ($i = 0; $i < 9; $i++) {
                      echo "<div class=\"carousel-item ";
                      echo ($i == 0)?" active ":"";
                      echo "\">";
                      echo "<img class=\"d-block w-100\" src=\"".$imageURLs[$i]."\" alt=\"Second slide\">";
                      echo "</div>";
                  }
                 ?>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
        
        <?php
         } //closing if isset($imageURLs)
         else {
            
            echo "<br><h1>Enter a Keyword or Select a Category!</h1>";     
             
         }
        ?>


       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
       
       
       <footer>
            <hr>
            
            <center> 
         
             &COPY; 2018 Okumagba <br />
            <strong>Disclaimer: </strong> the information in this webpage is fictitous, it is used for academic purposes only. <br />
           
               
                <img src = "../../img/csumb_logo.jpg" width = "120"alt ="CSUMB Logo" />
                                                
                                                <img src = "../../img/buddy.jpg" width ="80"alt ="buddy program Logo" />
</center>
               </footer>

    </body>
</html>