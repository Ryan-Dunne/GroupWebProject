
<!--
•	Name of screen: carMenu.html
•	Purpose of screen: A menu page which allows the user to select add, delete or amend car
• 	connected to myStyle.css
•	|Student name:Abigail Murray|Student Number:C00260073|Date: February/March 2024|
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"> <!--specifying character encoding for html docu-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--defining the viewport to control the page's dimensions and scaling for different devices:-->
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
    <!--Box Content-When the user clicks on a word in the box it takes them to relevant form page -->
    <div class="boxes-container">
        <div class="box" id="box1">
            <h2><a href="AddCar.html.php">Add</a></h2>
        </div>
        <div class="box" id="box2">
            <h2><a href="AmendCar.html.php">Amend</a></h2>
        </div>
        <div class="box" id="box3">
            <h2><a href="DeleteCar.html.php">Delete</a></h2>
        </div>
    </div>
	
</body>

</html>