<?php
	session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="./css/card.css">
<title>About us</title>
</head>

<body onload="typeWriter()">
<?php
	include "header.php";
?>

<div id="about">
<table id="dialog">
	<tr>
	<td><img id="shake" src="./img/person.PNG" alt="shakespeare" width="120"/></td>

	<td><p id="shakemessage"></p></td>
	</tr>
</table>
	<div class="w3-card-4  card" >
		<div class="w3-container w3-center">
      			<div class="w3-panel w3-card-4 w3-light-grey" style="width:100%">
  				<p class=" w3-large w3-serif" style="color:Maroon">
  				<i class="fa fa-quote-right w3-xxlarge"></i><br>
  				Never trust anyone who has not brought a book with them. 
				</br>- Lemony Snicket, Horseradish</p>
			</div>
      			<h5><b><i class="fa fa-user-circle"></i>&nbsp;AISHWARYAA SHREE</b></h5>

      			<div class="w3-section">
       			 I'm a year 4 student in VIT CHENNAI  and </br>
			I hope this BOOK CROSSING application can help people swap books and 
			</br>explore this world.
      			</div>
			<i class="fa fa-github"></i>&nbsp; Find me at: github.com </br></br>
   	 	</div>
	</div>

	
	</div>
</div>
<script>
var i = 0;
var txt = 'Our developers hope to share their favorite quotes and books with you';
var speed = 50;

function typeWriter() {
	
  if (i < txt.length) {
    document.getElementById("shakemessage").innerHTML += txt.charAt(i);
    i++;
    setTimeout(typeWriter, speed);
  }
}

var shakes = document.getElementById('shake');
shake.addEventListener('mouseover', function() {document.location.reload();});
</script>

</body>
</html>
