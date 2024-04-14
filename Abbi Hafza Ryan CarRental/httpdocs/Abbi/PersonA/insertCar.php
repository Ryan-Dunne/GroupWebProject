<!--
inserCar.php 
php file which connects to database and carries out queries for adding a new car to the database
generates cartype listbox, calculates new carid,inserts new car into database
|student name: Abigail Murray|student number:C00260073|Date: feb 2024|
-->

<?php

	// connect to database
	include "db.inc.php"; //allows us to connect + checks connection
	date_default_timezone_set('UTC');

	//Check if the connection was successful
	if (!$con)
	{
		die("Connection failed: " . mysqli_connect_error());//using die so it will stop if connection fails
	}

	// Assign values to variables
	$reg = $_POST['registration'];
	$chassis = $_POST['chassis'];
	$doors = $_POST['doors'];
	$price = $_POST['price']; 
	$colour = $_POST['colour'];
	$body = $_POST['bodyStyle'];
	$dateAdded = $_POST['dateAdded'];

	//calculate new carid
	$queryMaxCarID ="SELECT max(carID) as maxID FROM car";
	$resultMaxCarID = mysqli_query($con, $queryMaxCarID);
	$row = mysqli_fetch_assoc($resultMaxCarID);
	$newCarID = $row['maxID'] + 1;

	//Get carTypeID fk
	// Retrieve the carTypeID based on the selected car type
	$selectedCarType = $_POST['carType']; 

	// Query to retrieve the carTypeID from the carType table
	$queryCarType = "SELECT carTypeID FROM carType WHERE modelName = '$selectedCarType'";
	$resultCarType = mysqli_query($con, $queryCarType);

	// Assuming the query is successful and returns a single row
	if ($resultCarType) 
	{
		$rowCarType = mysqli_fetch_assoc($resultCarType);
		$carTypeID = $rowCarType['carTypeID'];

		// Construct the SQL query with the retrieved carTypeID
    	$sql = "INSERT INTO car (registration, chassisNumber, doors, price, colour, bodyStyle, dateAdded, cumulativeRentals, 		       currentStatus, carID, carTypeID) VALUES ('$reg', '$chassis', '$doors', '$price', '$colour', '$body', '$dateAdded', 0,     'Available', $newCarID, $carTypeID)";

	
		// Execute the SQL query for adding a new car  
		if (mysqli_query($con, $sql)) 
			{
				//echo "<script>alert('A Record has been added for $reg'); window.location.href = 'AddCar.html.php';</script>";
				// Redirect back to the AddCar page
				header("Location: AddCar.html.php");
				exit(); // Ensure script stops executing after redirecti
			} 
		else 
			{
				echo "Error: " . $sql . "<br>" . mysqli_error($con);// feedback for error
			}
	} 
	else 
		{
			echo "Error: Unable to retrieve carTypeID";//feedback for error
		}


	mysqli_close($con);// Close the database connection
?>
	
    