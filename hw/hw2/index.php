<HTML>
<HEAD>
	 <link rel = "stylesheet"  type = "text/css"  href = "style.css">
	</HEAD>
	<BODY>

<?php

/**
 * Landscape generator will display animals in different locations, and different sizes;
 * using rand();
 * 1 condition is: when two of the same animals are present;
 * we keep a counter, every 4 frames we place 8 animals instead of 4
 * picture is 600high, 1000 wide
 * In one loop we do x and y of the animals
 * In the next loop we do the size of the animals
 */ 

$bgArray = array('bg1.png', 'bg2.png', 'bg3.jpg');
$animalArray = array('kangaroo.png', 'penguin.png', 'pig.png', 'turtle.png');

if(empty($_GET['c'])) $_GET['c'] = 0;
$button = '<a href="index.php?c='.($_GET['c'] + 1).'" class="refresh">Refresh</a>';
if($_GET['c'] % 4 == 0) {
	$numAnimals = 8;
} else {
	$numAnimals = 4;
}

$bgIndex = rand(0, 2);
$bgImage = $bgArray[$bgIndex];

$screenAnimals = array();
$usedAnimals = array();

$content = '';

for($i = 0; $i < $numAnimals; $i++) {
	$animalIndex = rand(0,3);
	$screenAnimals[$i]['image'] = $animalArray[$animalIndex];
	foreach($screenAnimals as $k => $v) {
		if($k == $i) continue;
		if($v['image'] == $screenAnimals[$i]['image']) {
//			print __LINE__.' '.$screenAnimals[$i]['image'].'<br>';
			//$screenAnimals[$k]['double'] = 1;
			$screenAnimals[$i]['x'] = $screenAnimals[$k]['x'] + 20;
			$screenAnimals[$i]['y'] = $screenAnimals[$k]['y'] + 20;
			break;
		} 
	}
	if(empty($screenAnimals[$i]['x'])) {
		$screenAnimals[$i]['x'] = rand(0,800);
		$screenAnimals[$i]['y'] = rand(0,400);
	}
	$screenAnimals[$i]['size'] = rand(20,100);
	$content .= "\n".'<img src="images/'.$screenAnimals[$i]['image'].'" class="animal" '
	.'style="left:'.$screenAnimals[$i]['x'].'px; top:'.$screenAnimals[$i]['y'].'px;
	width: 30%; height:30%;" >';
	
}

print $button;
//print '<pre>';
//print_r($screenAnimals);
//print '</pre>';
print '<div class="animalContainer" style="background-image:url(images/backgrounds/'.$bgImage.');">';
print $content;
print '</div>';
?>


<footer>
            <hr>
             
            <center>
         
             &COPY; 2018 Okumagba <br />
            <strong>Disclaimer: </strong> the information in this webpage is fictitous, it is used for academic purposes only. <br />
           
                <img src = "../../img/csumb_logo.jpg" width ="120" alt ="CSUMB Logo" />
                
                <img src = "../../img/buddy.jpg" width ="80" alt ="buddy program Logo" />

                </center>
            </footer>
</BODY>
