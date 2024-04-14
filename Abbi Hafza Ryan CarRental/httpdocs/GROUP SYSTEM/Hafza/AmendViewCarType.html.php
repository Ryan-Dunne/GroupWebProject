<!--HTML SHEET FOR AMEND/VIEW FOR CAR TYPE-->
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--defining the viewport to control the page's dimensions and scaling for different devices:-->
    <link rel="stylesheet" href="CarType.css">
    <script src="AddCarType.js"></script>
    <title>Amend CarType</title>
</head>

<body class="background">
    <!--HEADER-->
    <div class="header">
        <h1>View Amend Car Type</h1>
        <img class="logo" alt="logo" src="images/godrivelogo.png">
    </div>
    <!--NAVIGATION BAR -->
    <div class="navbar">
        <a href="../home.html">Home Page
		<img class="home-icon" src="images/home_icon.png" alt="Home_icon">
		</a>
        <a href="#login">Login
		<img class="login-icon" src="images/login_icon.png" alt="Login_icon">
		</a>

        <div class="dropdown">
            <button class="dropbtn">Company
                <img class="arrow" src="images/arrow.png">
            </button>
            <div class="dropdown-content">
                <a href="#">Add a Company</a>
                <a href="#">Delete a Company</a>
                <a href="#">Amend/view a Company </a>
            </div><!--close dropdown-content-->
        </div><!--close dropdown-->

        <div class="dropdown">
            <button class="dropbtn">Car
                <img class="arrow" src="images/arrow.png">
            </button>
            <div class="dropdown-content">
                <a href="#">Add a Car</a>
                <a href="#">Delete a Car</a>
                <a href="#">Amend/view a Car</a>
            </div><!--close dropdown-content-->
        </div><!--close dropdown-->

        <div class="dropdown">
            <button class="dropbtn">Car Type
                <img class="arrow" src="images/arrow.png">
            </button>
            <div class="dropdown-content">
                <a href="AddCarType.html">Add a Car Type</a>
                <a href="DeleteCarType.html.php">Delete a Car Type</a>
                <a href="AmendViewCarType.html.php">Amend/View a Car Type</a>
            </div><!--close dropdown-content-->
        </div><!--close dropdown-->

        <a href=#>Rentals</a>
        <a href=#>Report</a>
        <a href="RentalReport.php">Rentals Report</a>
        <a href="#exit">Exit <img class="exit-icon" src="images/exit_icon.png" alt="Exit icon"></a>
    </div><!--close navbar-->
	
<div class="container" id="amContainer">
	
<h1 class="whiteText"> Please select a Car Type and click amend to change details</h1>

<?php include 'listboxCarType.php'; ?>
<script>
function populate(){	//filling the list
	var sel = document.getElementById("listbox");
	var result;
	result = sel.options[sel.selectedIndex].value;
	var carTypeDetails = result.split(',');		//split them by commas
	
	//filling in the form
	document.getElementById("am_carTypeID").value = carTypeDetails[0];
	document.getElementById("am_modelName").value = carTypeDetails[1];
	document.getElementById("am_version").value = carTypeDetails[2];
	document.getElementById("am_engineSize").value = carTypeDetails[3];
	document.getElementById("am_fuelType").value = carTypeDetails[4];
	document.getElementById("am_manufacturer").value = carTypeDetails[5];
}

function toggleLock()
{
	if(document.getElementById("amendViewbutton").value == "Amend Details")
	{
		document.getElementById("am_modelName").disabled = false;
		document.getElementById("am_version").disabled = false;
		document.getElementById("am_engineSize").disabled = false;
		document.getElementById("am_fuelType").disabled = false;
		document.getElementById("am_manufacturer").disabled = false;
		
		document.getElementById("amendViewbutton").value = "View Details";	//change the value to view details
	}
	else
	{	
		//enable everything but the id because we dont want to change the id
		document.getElementById("am_modelName").disabled = true;
		document.getElementById("am_version").disabled = true;
		document.getElementById("am_engineSize").disabled = true;
		document.getElementById("am_fuelType").disabled = true;
		document.getElementById("am_manufacturer").disabled = true;
		
		document.getElementById("amendViewbutton").value = "Amend Details";	//change 			back to Amend Details
	}
}

function ConfirmCheck(){	//confirmation before its saved on db
	var response;
	response = confirm("Are you sure you want to delete this car type?");
	if (response)
	{
		//if reponse is true, enable all the fields so they can be submitted into the form
		document.getElementById("am_carTypeID").disabled = false;
		document.getElementById("am_modelName").disabled = false;
		document.getElementById("am_version").disabled = false;
		document.getElementById("am_engineSize").disabled = false;
		document.getElementById("am_fuelType").disabled = false;
		document.getElementById("am_manufacturer").disabled = false;
		return true;
	}
	else
	{
		return false;
	}
}
</script>	
	
	 <input type="button" value="Amend Details" id="amendViewbutton" onclick="toggleLock()">

	<form id="amForm" class="forms" action="AmendViewCarType.php" onsubmit="return ConfirmCheck()" method="POST">
		
		<!-- Input field for carTypeID-->
		<div class="box">
			<label for="am_carTypeID">Car Type ID</label>
			<input type="text" name="am_carTypeID" id="am_carTypeID" disabled />
		</div>
		
		<div class="box">
			<label for="am_modelName">Model Name</label>
			<input type="text" name="am_modelName" id="am_modelName" disabled />
		</div>
		
		<!-- Input field for version -->
		<div class="box">
			<label for="am_version"> Model Version / Year </label>
			<input type="number" id="am_version" name="am_version" min="1990" max="" step="1" disabled >
		</div>
		
		<!-- Input field for engineSize -->
		<div class="box">
			<label for="am_engineSize"> Engine Size (L)</label>
			<input type="number" id="am_engineSize" name="am_engineSize" min="1.0" max="10" step="0.1" disabled />
		</div>
		
		<!-- Input field for fuelType -->
		<div class="box">
			<label for="am_fuelType">Select Fuel Type:</label>
			<input type="text" name="am_fuelType" class="selectbox" id="am_fuelType"  disabled />
		</div>
		
		<!-- Input field for manufacturer -->
		<div class="box">
			<label for="am_manufacturer">Car Manufacturer</label>
			<input type="text" name="am_manufacturer" id="am_manufacturer" disabled />
		</div>
		
		<div class="box" >
		<!-- Submit and clear buttons -->
		<input type="submit" class="amButtons" id="amSubmit" value="Amend" />
		<input type="reset" class="amButtons" id="amReset" value="Clear"/>
		</div>
<?php 
	if(ISSET($_SESSION['carTypeID']))
	{
		echo "<h1 class='myMessage'> Record deleted for ". $_SESSION['carTypeID'] . " " . $_SESSION['modelName'] . "</h1>" ;
		session_destroy();
	}
?>
	</form>
</div>
</body>
</html>