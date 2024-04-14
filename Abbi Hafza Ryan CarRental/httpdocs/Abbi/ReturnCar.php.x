

<!--
•	Name of screen: ReturnCar.php 
•	Purpose of screen: Php file for returning a car out on rental.
	If car has been kept for longer than agreed then penalty must be charged 
	The penalty is twice the standard charge for the extra duration
•	|Student name:Abigail Murray|Student Number:C00260073|Date:February/ March 2024|
-->

<?php
	session_start();// initialise a session and allows you to store and retrieve session variables
	include "db.inc.php"; // Database connection

	//Retrieves the car registration number from the form submitted via POST method.
	$carRegistration = $_POST['registration'];

	// SQL Query-- retrieve details about car and rental using inner joins
	$sql = "SELECT car.carID, car.registration, carType.modelName, carType.version, carType.engineSize, company.CompanyName, 		rental.dueReturnDate, rentalcar.rentalCategoryID
	FROM car
	INNER JOIN `rental/car` AS rentalcar ON car.carID = rentalcar.carID
	INNER JOIN rental ON rentalcar.rentalID = rental.rentalID
	INNER JOIN carType ON car.carTypeID = carType.carTypeID
	INNER JOIN company ON rental.CompanyID = company.CompanyID
	WHERE car.registration = '$carRegistration' AND rental.actualReturnDate IS NULL";

	//execute query and store result in $result
	$result = mysqli_query($con, $sql);

	if (!$result) {//check query was successful
		die('Error in querying the database: ' . mysqli_error($con));
	}

	// Fetch the returned data and assign to variables
	//function fetches a single row of data from the result set of the SQL query and returns it as an associative array.
	//Each column value in the row is accessible using the column name as the key in the array.
	$row = mysqli_fetch_assoc($result);

	$reg = $row['registration'];
	$modelName = $row['modelName'];
	$version = $row['version'];
	$engineSize = $row['engineSize'];
	$companyName = $row['CompanyName'];
	$dueReturnDate = $row['dueReturnDate'];
	$rentalCategoryID = $row['rentalCategoryID'];
	$carID = $row['carID'];

	// Calculate penalty if applicable (if they are late returning)
	$currentDate = date('Y-m-d');
	if ($currentDate > $dueReturnDate) {//if current date is greater than due return date
		// Calculate the extra days
		$extraDays = (strtotime($currentDate) - strtotime($dueReturnDate)) / (60 * 60 * 24);
		//(strtotime($currentDate) - strtotime($dueReturnDate)) calculates the difference in seconds between the two
		//strotime function converts the date strings into Unix timestamps,the number of seconds since the Unix Epoch (Jan 1, 1970)
		//(60 * 60 * 24):divides the time difference in seconds by the total number of seconds in a day ( 60 * 60 * 24)
		//This is necessary to get the difference in days instead of seconds.
		/*https://www.w3schools.com/php/func_date_strtotime.asp*/

		
		//SQL Query-- fetch the rental category rates
		$rentalCategorySql = "SELECT costPerDay, 5DayDiscount, 10DayDiscount FROM rentalCategory WHERE rentalCategoryID = 				'$rentalCategoryID'";
		$rentalCategoryResult = mysqli_query($con, $rentalCategorySql);//executes query, $rentalCategoryResult holds the result set
		
		//fetches a row from the result set ($rentalCategoryResult) as an associative array
		//Each key in the array corresponds to a field name from the SQL query (costPerDay, 5DayDiscount, 10DayDiscount)
		//the values are the corresponding values from the fetched row.
		$rentalCategoryRow = mysqli_fetch_assoc($rentalCategoryResult);

		// Apply discounts based on rental category
		if ($extraDays >= 11) {
			$penalty = $rentalCategoryRow['costPerDay'] * $extraDays - ($extraDays * $rentalCategoryRow['10DayDiscount']);
		} elseif ($extraDays >= 6) {
			$penalty = $rentalCategoryRow['costPerDay'] * $extraDays - ($extraDays * $rentalCategoryRow['5DayDiscount']);
		} else {
			$penalty = $rentalCategoryRow['costPerDay'] * $extraDays;
		}

	} else {
		$penalty = 0;
	}

	//SQL Query-- to update the Company Table with the penalty
	$updateSql = "UPDATE company SET AmountOwed = AmountOwed + $penalty WHERE CompanyName = '$companyName'";
	$updateResult = mysqli_query($con, $updateSql);//executes query
	
	if (!$updateResult) {//check if query is successful
		die('Error updating company table: ' . mysqli_error($con));
	}

	//SQL Query-- to Update the Rental Table and Car Table
	$updateRentalSql = "UPDATE rental SET actualReturnDate = '$currentDate' WHERE rentalID IN (SELECT rentalID FROM `rental/car` 	 WHERE carID = $carID) AND actualReturnDate IS NULL";
	$updateCarSql = "UPDATE car SET currentStatus = 'Available' WHERE carID = $carID";

	$updateRentalResult = mysqli_query($con, $updateRentalSql);//execute query for updating rental table
	$updateCarResult = mysqli_query($con, $updateCarSql);//executes query for updating the car table 

	// Error checking
	if (!$updateRentalResult || !$updateCarResult) {
		die('Error updating rental or car table: ' . mysqli_error($con));
	}

	// Prepare pop-up message
	if ($penalty > 0) {
		$_SESSION['popup_message'] = "Car returned successfully. Penalty charged: $penalty";
	} else {
		$_SESSION['popup_message'] = "Car returned successfully. No Penalty applied.";
	}

	// Close database connection
	mysqli_close($con);

	// Redirect back to Returns.html.php
	header("Location: Returns.html.php");
	exit();
?>
