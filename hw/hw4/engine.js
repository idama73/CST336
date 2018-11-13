function move(){
				var xCat = Math.floor(Math.random()*401);
				var yCat = Math.floor(Math.random()*201);
				var xDog = Math.floor(Math.random()*411);;
				var yDog = Math.floor(Math.random()*201);;
				
				//alert('xCat = ' + xCat + ', yCat =' + yCat);
				//alert('xDog = ' + xDog + ', yDog =' + yDog);
				//document.getElementById('cat').style.left = xCat + 'px';
								$('#cat').css('left', xCat+'px');

				//document.getElementById('cat').style.left = yCat + 'px';
								$('#cat').css('top', yCat+'px');

				//document.getElementById('dog').style.left = xDog + 'px';
								$('#dog').css('left', xDog+'px');

				//document.getElementById('dog').style.left = yDog + 'px';
								$('#dog').css('top', yDog+'px');

}