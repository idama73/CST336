<?php

$connect = mysqli_connect('localhost', 'root', '', 'midprac'); //setting up the connection handler // default

print '<h3>Exercise 1</h3>';
$popQuery = 'SELECT town_name, population  FROM mp_town WHERE population > 50000 AND population < 80000'; //query string
$result = mysqli_query($connect, $popQuery);
while($row = mysqli_fetch_array ($result)){ //row is always an array that consists of town name and population
 print $row['town_name'].' - '.$row['population']; //print_r 
}

print '<h3>Exercise 2</h3>';

$popDesc = 'SELECT town_name, population FROM mp_town ORDER BY population DESC';

$result = mysqli_query($connect, $popDesc);
print '<table>';
while($row = mysqli_fetch_array ($result)){ //row is always an array that consists of town name and population
 print  "\n".'<tr><td>'. $row['town_name'].'</td><td>'.$row['population'].'</td></tr>'; //print_r 
}
 
print '</table>';


print '<h3>Exercise 3</h3>';

$popAsc = 'SELECT town_name, population FROM mp_town ORDER BY population ASC LIMIT 0,3';

$result = mysqli_query($connect, $popAsc);
print '<table>';
while($row = mysqli_fetch_array ($result)){ //row is always an array that consists of town name and population
 print  "\n".'<tr><td>'. $row['town_name'].'</td><td>'.$row['population'].'</td></tr>'; //print_r 
}
 
print '</table>';

print '<h3>Exercise 4</h3>';

$county = 'SELECT county_name FROM mp_county WHERE county_name LIKE \'S%\'';
//$county = "SELECT county_name FROM mp_county WHERE county_name LIKE 'S%'";

$result = mysqli_query($connect, $county);
print '<table>';
while($row = mysqli_fetch_array ($result)){ //row is always an array that consists of town name and population
 print  "\n".'<tr><td>'. $row['county_name'].'</td></tr>'; //print_r 
}
 
print '</table>';