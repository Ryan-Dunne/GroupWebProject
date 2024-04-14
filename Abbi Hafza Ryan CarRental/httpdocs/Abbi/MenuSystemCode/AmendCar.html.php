<!--AmendCar.html.php
This is the php file which contains the form that allows the user to enter details to Amend car details
connects to style.css for stylesheet
student name: abigail murray
student number: C00260073
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"> <!--specifying character encoding for html document-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--defining the viewport to control the page's dimensions and scaling for different devices:-->
    <!-- LINKING CSS Styles sheet-->
    <link rel="stylesheet" href="style.css">
    <title>Amend Car</title>
</head>

<body>
    <!--HEADER-->
	<div class="header">
    <h1>Car Menu: Amend</h1>
    <a href="Help.html">
        <img class="help-button" alt="help-button" src="images/helpbutton.png">
    </a>
        <img class="logo" alt="logo" src="images/godrivelogo.png">
    </div>
	
    <!--NAVIGATION BAR (these links are to screens we have been allocated except for login and exit) -->
    <div class="navbar">
    <a href="home.html">Home Page <img class="home-icon" src="images/home_icon.png" alt="Home icon"></a>
    <a href="#login">Login <img class="login-icon" src="images/login_icon.png" alt="Login icon"></a>
	<div class="dropdown">
    <button class="dropbtn">Company<img class="arrow" src="images/arrow.png"></button>
    	<div class="dropdown-content">
        	<a href="#">Add Company</a>
            <a href="#">Delete Company</a>
            <a href="#">Amend/view Company</a>
        </div><!--close dropdown-content-->
    </div><!--close dropdown-->	
			
	<div class="dropdown">
    <button class="dropbtn">Car <img class="arrow" src="images/arrow.png"></button>
    	<div class="dropdown-content">
        	<a href="AddCar.html.php">Add A Car</a>
            <a href="#">Delete A Car</a>
            <a href="AmendCar.html.php">Amend/view A Car</a>
        </div><!--close dropdown-content-->
    </div><!--close dropdown-->

	<div class="dropdown">
    <button class="dropbtn">Car Type<img class="arrow" src="images/arrow.png"></button>
    	<div class="dropdown-content">
          	<a href="#">Add New Car Type</a>
            <a href="#">Delete Car Type</a>
            <a href="#">Amend/View Car Type</a>
        </div><!--close dropdown-content-->
    </div><!--close dropdown-->
		
	<a href="#">Rentals </a>	
	<a href="#">Rental Report </a>	
	<a href="#">Returns </a>	
	<a href="#exit">Exit <img class="exit-icon" src="images/exit_icon.png" alt="Exit icon"></a>
    </div><!--close navbar--><BR><BR>

<!---------------------------------------------------------------------------------------------------------->
    <div class="amendCar">
		<h4>Please select a car registration from the listbox to view details.</h4>

		<div class= "form-group">
    <?php include 'amendListbox.php';?> <!--amendListbox.php contains php for generating a listbox from the database-->
		</div>
    <script>
		//function to populate the details of the car table*/
        function populate() {
            var sel = document.getElementById("amendListbox");
            var result; 
            result = sel.options[sel.selectedIndex].value;
            var carDetails = result.split(',');
            //document.getElementById("display").innerHTML = " The details of the selected car are: " + result;
			document.getElementById("amendcarId").value = carDetails[0];
            document.getElementById("amendregistration").value = carDetails[1];
			 document.getElementById("amendchassisNumber").value = carDetails[2];
			document.getElementById("amenddoors").value = carDetails[3];
			document.getElementById("amendprice").value = carDetails[4];
			document.getElementById("amenddateAdded").value = carDetails[5];
			document.getElementById("amendCarType").value = carDetails[6];
			document.getElementById("amendbodyStyle").value = carDetails[7];
            document.getElementById("amendcolour").value = carDetails[8];
			document.getElementById("amendcurrentStatus").value = carDetails[9];
			
        }
		//function which locks fields -- cannot edit registration and current status
        function toggleLock() {
			/// If the button value is "Amend Details", it means the user wants to amend details.
        // enable the input fields and change the button value to "View Details"
            if (document.getElementById("amendViewButton").value == "Amend Details") {
                document.getElementById("amendcolour").disabled = false;
                document.getElementById("amendchassisNumber").disabled = false;
                document.getElementById("amendbodyStyle").disabled = false;
				document.getElementById("amenddoors").disabled = false;
				document.getElementById("amendprice").disabled = false;
				document.getElementById("amenddateAdded").disabled = false;
				document.getElementById("amendcarType").disabled = false;
                document.getElementById("amendViewButton").value = "View Details";
            } 
			else {// If the button value is not "Amend Details", it means the user wants to view details.
        //disable the input fields and change the button value to "Amend Details".
                document.getElementById("amendcolour").disabled = true;
                document.getElementById("amendchassisNumber").disabled = true;
                document.getElementById("amendbodyStyle").disabled = true;
				 document.getElementById("amenddoors").disabled = true;
				 document.getElementById("amendprice").disabled = true;
				 document.getElementById("amenddateAdded").disabled = true;
				 document.getElementById("amendcarType").disabled = true;
				document.getElementById("amendcurrentStatus").disabled= true;
                document.getElementById("amendViewButton").value = "Amend Details";
            }
        }

		//function for checking user wants to make changes
        function confirmCheck() {
            var response;
            response = confirm('Are you sure you want to save these changes?');
            if (response) {
				document.getElementById("amendcarId").disabled = false;
                document.getElementById("amendregister").disabled = false;
                document.getElementById("amendcolour").disabled = false;
                document.getElementById("amendchassisNumber").disabled = false;
                document.getElementById("amendbodyStyle").disabled = false;
				 document.getElementById("amenddoors").disabled = false;
				 document.getElementById("amendprice").disabled = false;
				 document.getElementById("amenddateAdded").disabled = false;
				 document.getElementById("amendcurrentStatus").disabled = false;
                return true;
				
            } else {
                // If they don't want to amend then populate and keep fields locked
                populate();
                toggleLock();
                return false;
            }
        }
    </script>

    <p id="display"></p>
	
    <!--<input type="button" value="Amend Details" id="amendViewButton" onclick="toggleLock()">-->
	
    <form name="amendCarForm" action="amendCar.php" onsubmit="return confirmCheck()" method="post">
		
		<div class="form-group">
		<label for="amendcarId"> Car ID:</label>
		<input type ="text" name="amendcarId" id ="amendcarId" disabled >
		</div>
		
		 <div class="form-group">
        <label for="amendregistration">Registration Number: </label>
        <input type="text" name="amendregistration" id="amendregistration" placeholder="registration number eg. 231-KE-56734"
		title="Format: 2/3 digits- 1 or 2 uppercase alphabetical characters- 1 to 6 numerical values. Eg 211-KE-64375" 
			   pattern="\d{2,3}-[A-Z]{1,2}-\d{1,6}"disabled></div>
		<!--validation: The \d is shorthand pattern for 0-9. Accept 2 or 3 numeric values - two or one alpha Uppercase - 1 or 6 numeric   -->
		
        <div class="form-group">
        <label for="amendchassisNumber">Chassis Number:</label>
        <input type="text" name="amendchassisNumber" id="amendchassisNumber" placeholder ="chassis number eg. 123456789ABCDEFT6"  
	  	title="Format:Chassis number must be 17 alphanumeric characters,alpha characters must be upper(excluding Q, I, O)" 
			   pattern="[A-HJ-NPR-Z0-9]{17}"  disabled></div><!--Validation:17 characters, alphanumeric, uppercase alpha characters, excluding I,O,Q-->
		
		<div class="form-group">
		<label for="amenddoors">Number of doors:</label>
        <input type="text" name="amenddoors" id="amenddoors"  placeholder="number of doors eg. 4"
			   title="Format: You must enter a numeric digit in the range 1-5" pattern="[1-5]" disabled></div>
		<!--making number of doors required--><!--validation: must only accept numerical values. min 1, max =5 -->
		
		 <div class="form-group">
		 <label for="amendprice">Purchase Price:</label>
        <input type="number" name="amendprice" id="amendprice" pattern="^[0-9]+\.?[0-9]{0,2}$"
		placeholder= "purchase price eg.25500.00" title="Format: you must only enter numeric digits or fullstop. eg  25980.98" disabled></div>
		<!--VALIDATION: any number of digits followed by optional . followed bt 0 or 2 digits -->
		
		<div class="form-group">
		<label for="amenddateAdded">Date Added:</label>
        <input type="date" name="amenddateAdded" id="amenddateAdded" onfocus="setCurrentDate()" onblur="validateDate()" disabled></div>
		<!--js functions for date validation -->
		
		<!-- fields which are in listbox/ dropdown format-->
		<div class="form-group">
		<label for="amendbodyStyle">Body Style:</label>
		<select name="amendbodyStyle" id="amendbodyStyle" disabled>
			<option value="saloon">Saloon</option>
			<option value="pickup">Pickup</option>
			<option value="suv">Suv</option>
			<option value="hatchback">Hatchback</option>
			</select></div>
        <!--input type="text" name="amendbodyStyle" id="amendbodyStyle" 
			   disabled-->
		
		<div class="form-group">
		<label for="amendcolour">Colour:</label>
        <!--input type="text" name="amendcolour" id="amendcolour" disabled-->
		<select name="amendcolour" id="amendcolour" disabled background-color="blue">
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
			</select></div>
		
		<div class="form-group">
		<label for="amendcurrentStatus">Current Status:</label>
        <input type="text" name="amendcurrentStatus" id="amendcurrentStatus"  placeholder="status 0 or 1"
			   title="Format: You must enter a numeric digit 0 or 1." pattern="[0-1]" disabled></div>
		
		
		<div class="form-group">
		<label for="amendcarType">Select a car type:</label>
		<select name="amendcarType" id="amendcarType" disabled>
		<?php include 'carTypeListbox.php';?><!--this php file generates listbox-->
		</select></div>
		
        <br><br>
		
		<div class="button-group-amend">
		 	<input type="button" value="Amend Details" id="amendViewButton" onclick="toggleLock()">
        	<input id ="saveChanges" type="submit" value="Save Changes">
		</div>
    </form>
	</div>
	
	 <script src="insertCar.js"></script>
</body>
</html>


