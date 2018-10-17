<?php

function yearList($startYear=1500, $endyear=2000){

    for ($i=1500; $i <= 2000; $i++) {
       echo "<li>  Year  $i </li>";
       if($i==1776){
           echo "<strong> USA INDEPENDENCE </strong>";
       }
       if($i % 100==0){
           echo "<strong> Happy New Century </stong>";
       }
    }
return $sum

}
for ($i = 1500; $i <= 2000; $i++){
       
       for($i=1500; $i <= 2000; $i++){
          
       }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>

        <h1> Chinese Zodiac Tasks</h1>
        
        <ul>
          <?= yearList(500,600) ?>
        </ul>
        
    </body>
</html>