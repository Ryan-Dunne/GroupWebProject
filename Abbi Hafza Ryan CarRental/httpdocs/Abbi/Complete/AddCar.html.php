<!--AddCar.html.php
This is the php file which allows the user to enter details to Add a new car
connects to style.css for stylesheet
|Student name:Abigail Murray|Student Number:C00260073|Date: February 2024|
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"> <!--specifying character encoding for html document-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--defining the viewport to control the page's dimensions and scaling for different devices:-->
    <link rel="stylesheet" href="style2.css">
    <title>Add Car</title>
</head>

<body>
    <!--HEADER-->
	<div class="header">
    <h1>Car Menu: Add</h1>
    <a href="Help.html"><img class="help-button" alt="help-button" src="images/helpbutton.png"></a>
    <img class="logo" alt="logo" src="images/godrivelogo.png">
    </div>
	
	<?php include 'menu.php'?> <!-- including the navbar to get to other pages-->
    
    <!--Form content
    type in:registration number, chassis number, number of doors, purchase price date added to fleet (default to systems date)
    from presets: can select colour, body style
    from listbox: can select car type
  	-->
    
	<div class="column">
	<!-- form fields-->
	<div class="addCar">
	<form id="addCarForm" action="insertCar.php" method="post" onsubmit="return confirmInsert()">
	<h2>Add A Car</h2>
    	<div class="form-group">
    		<label for="registration">Registration Number:</label>
    		<input type="text" id="registration" name="registration" placeholder="registration number eg. 231-KE-56734"
			title="Format: 2/3 digits- 1 or 2 uppercase alphabetical characters- 1 to 6 numerical values. Eg 211-KE-64375" 
    		pattern="\d{2,3}-[A-Z]{1,2}-\d{1,6}"required>
    	</div><!--validation: The \d is shorthand pattern for 0-9. Accept 2 or 3 numeric values - two or one alpha Uppercase - 1 		 or 6 numeric   -->
	
    	<div class="form-group">
      		<label for="chassis">Chassis Number:</label>
      		<input type="text" id="chassis" name="chassis" placeholder ="chassis number eg. 123456789ABCDEFT6"  
	  		title="Format:Chassis number must be 17 alphanumeric characters,alpha characters must be upper(excluding Q, I, O)" 
      		pattern="[A-HJ-NPR-Z0-9]{17}" required>
    	</div><!--Validation:17 characters, alphanumeric, uppercase alpha characters, excluding I,O,Q-->
	
    	<div class="form-group">
      		<label for="doors">Number of Doors:</label>
      		<input type="text" id="doors" name="doors"  placeholder="number of doors eg. 4"
		 	title="Format: You must enter a numeric digit in the range 1-5" pattern="[1-5]" required >
    	</div><!--making number of doors required--><!--validation: must only accept numerical values. min 1, max =5 -->
	
    	<div class="form-group">
        	<label for="price">Purchase Price:</label>
        	<input type="text" id="price" name="price" pattern="^[0-9]+\.?[0-9]{0,2}$" placeholder= "purchase price eg. 25500.00" 
				   title="Format: you must only enter numeric digits or fullstop. eg  25980.98  " required>
    	</div><!--VALIDATION: any number of digits followed by optional . followed bt 0 or 2 digits -->
	
    	<div class="form-group">
    		<label for="dateAdded">Date Added:</label>
    		<input type="date" id="dateAdded" name="dateAdded"  onfocus="setCurrentDate()" onblur="validateDate()">
    		<!--is of type date, insertCar.js has function for setting it to default to system date -->
    	</div>
	   
		<div class="form-group">
		<!--putting all dropdown inputs together to ensure it looks neater-->
			<label for="carType">Select a car type:</label>
			<select name="carType" id="carType">
			<?php include 'carTypeListbox.php';?><!--this php file generates listbox-->
			</select>
		</div>
	
		<div class="form-group">
    		<label for="bodyStyle">Body Style:</label>
    		<select name="bodyStyle" id="bodyStyle">
				<option value="saloon">Saloon</option>
				<option value="pickup">Pickup</option>
				<option value="suv">Suv</option>
				<option value="hatchback">Hatchback</option>
			</select>
		</div>
	
		<div class="form-group">
			<label for="colour">Colour:</label>
			<select name="colour" id="colour">
 	 			<option value="silver">Silver</option>
  				<option value="black">Black</option>
  				<option value="blue">Blue</option>
				<option value="green">Green</option>
				<option value="grey">Grey</option>
				<option value="white">White</option>
				<option value="red">Red</option>
				<option value="yellow">Yellow</option>
				<option value="blueMetallic">Blue Metallic</option>
				<option value="midnightBlue">Midnight Blue</option>
				<option value="pearlWhite">Pearl White</option>
				<option value="crimsonRed">Crimson Red</option>
				<option value="graphiteGrey">Graphite Grey</option>
				<option value="deepBlack">Deep Black</option>
			</select>
		</div><br>
		
		<div class="button-group">
   			<button type="submit" class="submit-button">Insert Record</button>
			<!--when pressed they should be prompted with message are you sure you want to submit-->
		<button type="reset" class="reset-button">Reset </button><!--clear button as user should always have a way to clear what they have done-->
		</div>
 	</form>
</div><!-- close addCarForm-->
</div><!--close column-->
  <script src="insertCar.js"></script><!--functionality for date and ensuring they want to submit-->
</body>
</html>
