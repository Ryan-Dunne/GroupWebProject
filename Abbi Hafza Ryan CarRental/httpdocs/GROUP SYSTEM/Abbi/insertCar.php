<!--
•	Name of screen: insertCar.php 
•	Purpose of screen: php file which connects to database and carries out queries for adding a new car to the database
	generates cartype listbox, calculates new carid,inserts new car into database
•	|Student name:Abigail Murray|Student Number:C00260073|Date: March 2024|
-->

<?php

	include "db.inc.php"; //allows us to connect + checks connection
	date_default_timezone_set('UTC');

	//Check if the connection was successful
	if (!$con)
	{
		die("Connection failed: " . mysqli_connect_error());//using die so it will stop executing if connection fails
	}

	// Assign values to variables from $_POST data (received from  form submission)
	$reg = $_POST['registration'];
	$chassis = $_POST['chassis'];
	$doors = $_POST['doors'];
	$price = $_POST['price']; 
	$colour = $_POST['colour'];
	$body = $_POST['bodyStyle'];
	$dateAdded = $_POST['dateAdded'];

	//method to calculate new carid
	//SQL Query-- to retrieve the maximum value of carID from the car table.
	$queryMaxCarID ="SELECT max(carID) as maxID FROM car";
	//execute the query to retrieve the max carID in car table 
	$resultMaxCarID = mysqli_query($con, $queryMaxCarID);
	//fetches the result of the query in the previous line and stores it in the variable $row.
	//mysqli_fetch_assoc() fetches a single row of data from the result set as an associative array.
	$row = mysqli_fetch_assoc($resultMaxCarID);
	//calculate a new carID by accessing the value of the maxID column from the associative array stored in $row 
	//then increments this value by 1 to generate a new unique carID.
	$newCarID = $row['maxID'] + 1;

	
	// Retrieve the selected car type from the form submitted via POST method.
	$selectedCarType = $_POST['carType']; 

	//SQL Query-- retrieve the carTypeID from the carType table based on the selected car type.
	$queryCarType = "SELECT carTypeID FROM carType WHERE modelName = '$selectedCarType'";
	//execute query and store result in $resultCarType
	$resultCarType = mysqli_query($con, $queryCarType);

	if ($resultCarType) //if query was successful and returns single row
	{
		$rowCarType = mysqli_fetch_assoc($resultCarType);//get the result set row as an associative array and store in $rowCarType.
		$carTypeID = $rowCarType['carTypeID'];//Retrieve the carTypeID from the fetched result set row.

		//SQL query-- for inserting a new car entry into the car table
		//values are taken from the variables containing the form data and the retrieved carTypeID.
    	$sql = "INSERT INTO car (registration, chassisNumber, doors, price, colour, bodyStyle, dateAdded, cumulativeRentals, 		         currentStatus, carID, carTypeID) VALUES ('$reg', '$chassis', '$doors', '$price', '$colour', '$body', '$dateAdded', 0,     		    'Available', $newCarID, $carTypeID)";

	
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
	
    