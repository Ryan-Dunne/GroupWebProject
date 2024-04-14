<!--carMenu.html
CAR MENU PAGE WHICH ALLOWS USER TO SELECT: ADD A CAR, DELETE A CAR OR AMMEND A CAR
WHEN THEY PRESS ON THE WORD IN THE BOX
student name: Abigail Murray
student number: C00260073
connected to style.css-->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"> <!--specifying character encoding for html docu-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--defining the viewport to control the page's dimensions and scaling for different devices:-->
    <!-- LINKING CSS Styles sheet-->
    <link rel="stylesheet" href="myStyle.css">
    <title>Car Menu </title>
</head>
<body>
<!--HEADER-->
	<div class="header">
    <h1>Car Menu</h1>
    <a href="Help.html"><img class="help-button" alt="help-button" src="images/helpbutton.png"></a>
    <img class="logo" alt="logo" src="images/godrivelogo.png">
    </div>
    
<?php include 'menu.php'?> <!-- file with navbar/menu to reduce code-->
    <!--BOX CONTENT- WHEN USER CLICKS ON WORD IN BOX IT TAKES THEM TO RELATED FORM PAGE-->
    <div class="boxes-container">
        <div class="box" id="box1"><h2><a href="AddCar.html.php">Add</a></h2></div>
		<div class="box" id="box2"><h2><a href="AmendCar.html.php">Amend</a></h2></div>
		<div class="box" id="box3"><h2><a href="DeleteCar.html.php">Delete</a></h2></div>
		
    </div>
</body>
</html>