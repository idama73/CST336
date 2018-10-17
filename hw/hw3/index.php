<?php
print '<html><body><head>'."\n";
print '<link rel="stylesheet" href="css/styles.css">';
print '</head>'."\n";

/* setting of variables step */

$shirtText = '';
$size = '';
$color = 'white';
$number = 1;
$terms = '0';
$textComments = '';

if(isset($_POST['shirtText'])) {
	$shirtText = htmlspecialchars($_POST['shirtText']);
}
if(isset($_POST['size'])) {
	$size = $_POST['size'];
}
if(isset($_POST['color'])) {
	$color = $_POST['color'];
}
if(isset($_POST['number'])) {
	$number = $_POST['number'];
}
if(isset($_POST['terms'])) {
	$terms = $_POST['terms'];
}
if(isset($_POST['textComments'])) {
	$textComments = htmlspecialchars($_POST['textComments']);
}

/* Validation step */
$validationArray = array('shirtText', 'size', 'color', 'number');

//for debugging - comment out after debugging / script is done
$validationArray = array();
$error = false;
$errorString = '';
if(!empty($_POST)) {
	foreach($validationArray as $k => $v) {
		if(empty($_POST[$v])) {
			$error = true;
			$errorString .= ' '.$v.' is empty';
			//die('Stopped at '.__LINE__);
		}
	}
}


/*
print '<pre>';
print_r($_POST);
print '</pre>';*/

//$color = 'white';

/* processed part: picture of t-shirt, etc. here - IF input is provided AND error-free */
if(!empty($_POST) && $error == false) {
	/* display t-shirt and t-shirt information */
	print '<div id="processing">';
	print '<img id="shirt" src="images/shirt-'.$color.'.png">'."\n";
	print '<div class="shirtText" id="text-'.$color.'">'.$shirtText.'</div>';
	print '<div>You would like '.$number.' shirts.</div>';
	print '<div>Your cost is $'. $number * 1000 . '.</div>';
	if($terms == '1') {
		 print '<div>Thanks for agreeing to the conditions</div>';
	 } else {
		print '<div>We can not go through with the transaction without your agreeing to the terms and conditions</div>';
	 }
	print '<div>'.$textComments.'</div>';
	
	
	
	print '</div>';
	
	
	
}
if(!empty($errorString)) print '<span style="color:red;">'.$errorString.'</span>';



$options = array('small' => '', 'medium' => '', 'large' => '', '' => '');
$options[$size] = ' selected';

$colorChecked = array('white' => '', 'grey' => '', 'black' => '');
$colorChecked[$color] = ' checked';

$termsChecked['0'] = '';
$termsChecked['1'] = ' checked';




/* name in regular text input, size in select, color in radios, 
number you want to order, checkbox for terms and conditions, order note in textarea, submit. */
print '<div class="formContainer">';
print '<form action="index.php" method="post">'."\n";

print '<label for="shirtText">Words on shirt:</label>'
    . '<br><input name="shirtText" type="text" value="' . $shirtText . '">'
    . '<label for="size">Size</label>'
    .   '<select name="size">' 
    .	'<option value=""'.$options[''].'>(select one)</option>'
    . 	'<option value="small"'.$options['small'].'>small</option>'
    . 	'<option value="medium"'.$options['medium'].'>medium</option>'
	. 	'<option value="large"'.$options['large'].'>large</option><br>'    
    . '</select><br>'
    . '<legend>Color</legend><br>'
    . '<input name="color" type="radio" value="white" id="white" '.$colorChecked['white']. ' >'
    . '<label for="white" class="radio">white</label><br>'
    . '<input name="color" type="radio" value="grey" id="grey" '.$colorChecked['grey']. ' >'
    . '<label for="grey" class="radio">grey</label><br>'
    . '<input name="color" type="radio" value="black" id="black" '.$colorChecked['black']. ' >'
    . '<label for="black" class="radio">black</label><br>'
    . '<label for="number">Number</label>'
    . '<input type="number" name="number" value="'.$number.'" min="1" max="10"><br>'
    . '<label for="terms" class="radio">I agree to the terms and conditions</label>'
    . '<input type="checkbox" name="terms" value="1" '.$termsChecked[$terms].'>'
    . '<label for="textComments">Order comments</label>'
    . '<textarea name="textComments">'.$textComments.'</textarea>';

    


print '<br><input type="submit" name="submit">'."\n";
print '</form>'."\n";
print '</div>';



print '</body><html>';
