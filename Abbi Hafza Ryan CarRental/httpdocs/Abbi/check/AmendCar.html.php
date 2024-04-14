<!-- AmendCar.html.php
file used to get the user to click which car they want to amend/view details for
|Student name:Abigail Murray|Student Number:C00260073|Date: February 2024|-->

<!DOCTYPE html>
<html>
	<head>
    <meta charset="utf-8"> <!--specifying character encoding for html document-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--defining the viewport to control the page's dimensions and scaling for different devices:-->
    <link rel="stylesheet" href="style.css">
    <title>Amend/View Car</title>
	</head>
	
	<body> 
	<!--Header-->
	<div class="header">
    	<h1>Amend/View  a car</h1>
    	<a href="Help.html"><img class="help-button" alt="help-button" src="images/helpbutton.png"></a>
        <img class="logo" alt="logo" src="images/godrivelogo.png">
    </div>
		
	<?php include 'menu.php'?> <!-- file with navbar/menu-->
	<div class="column">
	<div class="amendCar">
    <h2>Please select a car registration and then click the amend button if you wish to update</h2>
	<div class="form-group">
		<?php include 'AmendListbox.php';?> <!--contains php for generating a listbox of registrations from the database-->
	</div>
		
    <script>
	//function to populate the details of the car table*/
  	function populate() 
		{
    		var sel = document.getElementById("AmendListbox");
    		var result = sel.options[sel.selectedIndex].value;
    		var carDetails = result.split(',');

    		// Populate form fields with car details
    		document.getElementById("amendid").value = carDetails[0];
    		document.getElementById("amendregistration").value = carDetails[1];
    		document.getElementById("amendstatus").value = carDetails[2];
    		document.getElementById("amendchassis").value = carDetails[3];
    		document.getElementById("amenddoors").value = carDetails[4];
    		document.getElementById("amendprice").value = carDetails[5];
    		document.getElementById("amenddate").value = carDetails[6];
    		document.getElementById("amendstyle").value = carDetails[7];
    		document.getElementById("amendcolour").value = carDetails[8];

    		// Extract and populate car type separately- working better this way as car type has listbox
    		var carTypeID = carDetails[9];
    		document.getElementById("amendtype").value = carTypeID;
		}

	//function which locks fields
    function toggleLock() 
		{
			// If the button value is "Amend Details", it means the user wants to amend details.
        	// enable the input fields and change the button value to "View Details"
            if (document.getElementById("amendViewButton").value == "Amend Details") 
				{
					document.getElementById("amendchassis").disabled = false;
					document.getElementById("amenddoors").disabled = false;
					document.getElementById("amendprice").disabled = false;
					document.getElementById("amenddate").disabled = false;
					document.getElementById("amendstyle").disabled = false;
					document.getElementById("amendcolour").disabled = false;
					document.getElementById("amendtype").disabled = false;

					document.getElementById("amendViewButton").value = "View Details";
				} 
			else 
				{
				// If the button value is not "Amend Details", it means the user wants to view details.
				//disable the input fields and change the button value to "Amend Details".
					document.getElementById("amendchassis").disabled = true;
					document.getElementById("amenddoors").disabled = true;
					document.getElementById("amendprice").disabled = true;
					document.getElementById("amenddate").disabled = true;
					document.getElementById("amendstyle").disabled = true;
					document.getElementById("amendcolour").disabled = true;
					document.getElementById("amendtype").disabled = true;

					document.getElementById("amendViewButton").value = "Amend Details";
				}
        }

	//function for checking user wants to make changes
    function confirmCheck()
		{
            var response;
            response = confirm('Are you sure you want to save these changes?');
            if (response) 
				{
					document.getElementById("amendid").disabled = false;
					document.getElementById("amendregistration").disabled = false;
					document.getElementById("amendstatus").disabled = false;
					document.getElementById("amendchassis").disabled = false;
					document.getElementById("amenddoors").disabled = false;
					document.getElementById("amendprice").disabled = false;
					document.getElementById("amenddate").disabled = false;
					document.getElementById("amendstyle").disabled = false;
					document.getElementById("amendcolour").disabled = false;
					document.getElementById("amendtype").disabled = false;

					return true;

				} 
			else 
				{
					// If they don't want to amend then populate and keep fields locked
					populate();
					toggleLock();
					return false;
				}
        }
		
    </script>
	<!-- amend form which is displayed to system user-->
    <p id="display"></p>
    <form name="amendCarForm" action="AmendCar.php" onsubmit="return confirmCheck()" method="post">
		<!--the first 3 will not be editable :id, registration and current status so no need to put title or pattern-->
		<div class="form-group">
        <label for="amendid">Car ID</label>
        <input type="text" name="amendid" id="amendid" class="disabled-input" disabled >
		</div>
		
        <div class="form-group">
        <label for="amendregistration">Registration</label>
        <input type="text" name="amendregistration" id="amendregistration" class="disabled-input" disabled required>
		</div>

		<div class="form-group">
        <label for="amendstatus">Current Status</label>
        <input type="text" name="amendstatus" id="amendstatus" class="disabled-input" disabled required>
		</div>
		<!--following are editable-->
		<div class="form-group">
        <label for="amendchassis">Chassis</label>
        <input type="text" name="amendchassis" id="amendchassis" title="Format:Chassis number must be 17 alphanumeric characters,alpha characters must be upper(excluding Q, I, O)" pattern="[A-HJ-NPR-Z0-9]{17}" disabled required>
		</div><!--Validation:17 characters, alphanumeric, uppercase alpha characters, excluding I,O,Q-->
		
		<div class="form-group">
		<label for="amenddoors">Number of Doors</label>
        <input type="text" name="amenddoors" id="amenddoors" title="Format: You must enter a numeric digit in the range 1-5" 			pattern="[1-5]" disabled required >
		</div>
		
		<div class="form-group">
		<label for="amendprice">Purchase Price</label>
        <input type="text" name="amendprice" id="amendprice"  title="Format: you must only enter numeric digits or fullstop. eg  25980.98  " pattern="^[0-9]+\.?[0-9]{0,2}$" disabled required >
		</div><!--VALIDATION: any number of digits followed by optional . followed bt 0 or 2 digits -->
        
		<div class="form-group">
        <label for="amenddate">Date added to fleet</label>
        <input type="date" name="amenddate" id="amenddate" title="format is yyyy-mm-dd" disabled required>
		</div>
		
		<div class="form-group">
		<label for="amendstyle">Body Style</label>
       	<select name="amendstyle" id="amendstyle" disabled required>
			<option value="saloon">Saloon</option>
			<option value="pickup">Pickup</option>
			<option value="suv">Suv</option>
			<option value="hatchback">Hatchback</option>
		</select>
		</div>
		
		<div class="form-group">
		<label for="amendcolour">Colour</label>
		<select name="amendcolour" id="amendcolour" disabled required>
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
		</div>
		
		<div class="form-group">
		<label for="amendtype">Car type</label>
		<select name="amendtype" id="amendtype" disabled required>
		<?php include 'carTypeListbox.php';?>--><!--this php file generates listbox-->
		</select>
		</div>	
        <br><br>
		<br><br>
		<div class="button-group-amend">
		 <input type="button" value="Amend Details" id="amendViewButton" onclick="toggleLock()">
        <input id ="saveChanges" type="submit" value="Save Changes">
		</div>
    </form>
	</div><!--close amendCar-->
	</div><!--close column-->
	
	
	 <!--<script src="insertCar.js"></script><!-- validation for date -->
</body>
</html>
