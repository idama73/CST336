<?php

function displayArray($my_symbols){
    global $symbols;
    
    
    
    echo"<hr>";
    print_r($my_symbols);
    
    for($i = 0; $i <count($symbols); $i ++) { //count() returns the size of the array
        
        echo $symbols[$i] . ", ";
    
   
}


   $symbols = array("seven");
   print_r($symbols); //display array content
   
   
 array_push($symbols, "orange","grapes","cherry"); // adds elements to the end of the array
 print_r($symbols); //display array content
 
 $symbols[2] = "cherry";
 //print_r($symbols);
 displayArray();  
 
 sort($symbols);
 displayArray();
 
 rsort($symbols);
 displayArray();
 
 unset($symbols);
 displayArray();
 
 $symbols = array_values($symbols);
 displayArray();
 
 shuffle($symbols);
 displayArray();
 
 echo "<hr>";
 
 //echo "Random item: ""  "
 

 echo "<img src =../lab2/img" .$symbols[array_rand($symbols)]  . ".png'>"; //display random items           ""
 
 
 print_r($indexes);


 
   
   
   
   
?>





<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>

    </body>
</html>