
<!--
•	Name of screen: AmendCar.php 
•	Purpose of screen: This file is used to amend the car details
•	|Student name:Abigail Murray|Student Number:C00260073|Date: February/March 2024|
-->

<?php

	include 'db.inc.php'; //include database connection
	date_default_timezone_set('UTC');

	$dbDate = date("Y-m-d", strtotime($_POST['amenddate'])); /*format date for database---takes the value of the amenddate field 		from the POST request, converts it into a date format using strtotime, and then formats it as a string in YYYY-MM-DD format 		suitable for database insertion.*/

	// Retrieve form input values from the POST request and assign them to corresponding variables.
	$chassis = $_POST['amendchassis'];
	$doors=$_POST['amenddoors'];
	$price=$_POST['amendprice'];
	$bodyStyle=$_POST['amendstyle'];
	$colour=$_POST['amendcolour'];
	$registration=$_POST['amendregistration'];

	// Retrieve car type selected in the form and assign it to the $carTypeSelected variable
	$carTypeSelected = $_POST['amendtype'];

	// Retrieve carTypeID from carType table based on modelName selected in the form
	// Construct SQL query and execute the query using mysqli_query
	$queryCarType = "SELECT carTypeID FROM carType WHERE modelName = '$carTypeSelected'";
	$resultCarType = mysqli_query($con, $queryCarType);

	// Check if car type exists
	//If the car type exists in the database, assign the retrieved carTypeID to the $carTypeID variable and constructs an SQL UPDATE 	 query to update the corresponding record in the car table.
	if ($rowCarType = mysqli_fetch_assoc($resultCarType))
	{
		$carTypeID = $rowCarType['carTypeID'];

	$sql = "UPDATE car SET chassisNumber='$chassis', doors='$doors', price='$price' , dateAdded='$dbDate', bodyStyle='$bodyStyle', colour='$colour', carTypeID='$carTypeID' WHERE registration='$registration'";


	// Execute SQL query
		if (!mysqli_query($con, $sql)) 
		{
			die ("ERROR " . mysqli_error($con)); // Display error if query fails
		} else {
			if (mysqli_affected_rows($con) != 0) {
				echo "<script>alert('Record has been updated'); window.location.href='AmendCar.html.php';</script>";
			} else {
				echo "<script>alert('No records were changed'); window.location.href='AmendCar.html.php';</script>";
			}
		}
	} else {
		echo "<script>alert('Error: car type not found'); window.location.href='AmendCar.html.php';</script>";
	}



	mysqli_close($con);// Close database connection
?>
