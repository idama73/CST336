
<!DOCTYPE html>
<html>
    <head>
        <title> Task 1</title>
    </head>
    <body>
        <div class = "jumbotron">Winter Vacation itenary</div>
<form action = "midterm_practice1.php" METHOD = "POST">  
  month 
    <select name ="month">
       <option value=""> ( Select month ) </option>    
       <option value = "November"> November </option>
       <option value = "December"> December </option>
       <option value = "January" selected> January </option>
       <option value = "Feburary"> Feburary </option>
    </select>
       <br>
       <br>
       <br>
       Number Of Locations
       <input type="radio" name="number" value="3" id="n3"> <label for = "n3">three</label>
       <input type="radio" name="number" value="4" id="n4" checked> <label for = "n4">four</label>
       <input type="radio" name="number" value="5" id="n5"> <label for = "n5">five</label>
       <br>
       <br>
       <br>
       Select Country
       <select name ="country"> 
           <option value = "USA"> USA </option>
           <option value = "France" selected> France </option>
           <option value = "Mexico"> Mexico </option>
       </select>
       <input type="radio" name="alpha" value="a" id="a1"> <label for = "a1">A-Z</label>
       <input type="radio" name="alpha" value="z" id="a2"> <label for = "a2">Z-A</label>
        <input type="submit" value="Create Itinerary">
</form>

<?php
$alpha = '';
$month = '';
$number = '';
$country = '';
$days = 0;

$months = array(
    'November' => 30,
    'December' => 31,
    'January' => 31,
    'Februrary' => 28,
);

$countries = array(
    'France' => array(
        'Paris', 'Nice', 'Marseilles', 'Rouen', 'Amiens'
        ),
    'USA' => array( 'Charlotte', 'Chicago','Detroit', 'Atlanta', 'Philadelphia'
        ),
    'Mexico' => array( 'Monterrey', 'Guadalajara', 'Puebla', 'Tijuana', 'Acapulco'
        ),
    );
    
function name2pic($cityName) {
 $cityName = 'image/' . str_replace(' ', '', $cityName).'.jpg';
 return $cityName;   
}

$error = '';
if(!empty($_POST)) {
    if(!empty($_POST['month']) ) {
        $month = $_POST['month'];
        $days = $months[$month];
        print $days;
    } else {
        $error .= 'You must fill in the month <br>'; 
    }
    if(!empty($_POST['number'])) {
        $number = $_POST['number'];
    } else {
        $error .= 'You must fill in the number';
    }
    if(!empty($_POST['country'])) {
        $country = $_POST['country'];
    }
    if(!empty($_POST['alpha'])){
        $alpha = $_POST['alpha'];
    }
    if(empty($error)) {
    $itineraryCities = array();
    $cityKeys = array_rand($countries[$country], $number);
    foreach($cityKeys as $k => $v) {
        $itineraryCities[$k] = $countries[$country][$v];
    }
    print '<pre>';
    print_r($itineraryCities);
    print '</pre>';
    sort($itineraryCities);
    if($alpha == 'z') {
        $itineraryCities = array_reverse($itineraryCities);
    }
    $itineraryDays = array_fill(0, $days, '');
    /*
    
    */
    //$daysAvailable = $itineraryDays;
    $daysBooked = array_rand($itineraryDays, $number);
    $daysBooked = array_flip($daysBooked);
    print_r($daysBooked);
    foreach($itineraryDays as $k => $v){
        if(isset($daysBooked[$k])) {
            $cityName = array_shift($itineraryCities);
            $string =  '<img src="'.name2pic($cityName).'">'.$cityName;
            $itineraryDays[$k] = $string;
        }

    }
            print '<pre>';
        print_r($itineraryDays);
        print '</pre>';
    
    print '<div class = "jumbotron" > '.$month.' itenary </div>';
    print 'you are going to ' . $number . ' Destinations ';
    } else {
        print '<div class="error">'.$error.'</div>';
        
    }

}


?>

    </body>
</html>