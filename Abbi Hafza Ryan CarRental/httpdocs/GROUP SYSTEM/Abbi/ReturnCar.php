<!--File name: ReturnCar.php 
File purpose:Php file for returning a car out on rental.
If car has been kept for longer than agreed then penalty must be charged 
The penalty is twice the standard charge for the extra duration
|Student name:Abigail Murray|Student Number:C00260073|Date: March 2024|
-->

<?php
	session_start();
	include "db.inc.php"; // Database connection

	// Get data from the form
	$carRegistration = $_POST['registration'];

	
// Retrieve additional details from the database
$sql = "SELECT 
            car.carID, 
            car.registration, 
            carType.modelName, 
            carType.version, 
            carType.engineSize, 
            company.CompanyName, 
            rental.dueReturnDate, 
            rental.rentalCategoryID
        FROM car
        INNER JOIN rental ON car.carID = rental.carID
        INNER JOIN carType ON car.carTypeID = carType.carTypeID
        INNER JOIN company ON rental.CompanyID = company.CompanyID
        WHERE car.registration = '$carRegistration' AND rental.actualReturnDate IS NULL";



	$result = mysqli_query($con, $sql);

	if (!$result) {
		die('Error in querying the database: ' . mysqli_error($con));
	}

	// Fetch the returned data
	$row = mysqli_fetch_assoc($result);
	$reg = $row['registration'];
	$modelName = $row['modelName'];
	$version = $row['version'];
	$engineSize = $row['engineSize'];
	$companyName = $row['CompanyName'];
	$dueReturnDate = $row['dueReturnDate'];
	$rentalCategoryID = $row['rentalCategoryID'];
	$carID = $row['carID'];

	// Calculate penalty if applicable
	$currentDate = date('Y-m-d');
	if ($currentDate > $dueReturnDate) {
		// Calculate the extra days
		$extraDays = (strtotime($currentDate) - strtotime($dueReturnDate)) / (60 * 60 * 24);

		// Fetch rental category rates
		$rentalCategorySql = "SELECT costPerDay, 5DayDiscount, 10DayDiscount FROM rentalCategory WHERE rentalCategoryID = '$rentalCategoryID'";
		$rentalCategoryResult = mysqli_query($con, $rentalCategorySql);
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

	// Update the Company Table with the penalty
	$updateSql = "UPDATE company SET AmountOwed = AmountOwed + $penalty WHERE CompanyName = '$companyName'";
	$updateResult = mysqli_query($con, $updateSql);
	// Error checking
	if (!$updateResult) {
		die('Error updating company table: ' . mysqli_error($con));
	}

	// Update the Rental Table and Car Table
	$updateRentalSql = "UPDATE rental SET actualReturnDate = '$currentDate' WHERE rentalID IN (SELECT rentalID FROM `rental/car` WHERE carID = $carID) AND actualReturnDate IS NULL";
	$updateCarSql = "UPDATE car SET currentStatus = 'Available' WHERE carID = $carID";

	$updateRentalResult = mysqli_query($con, $updateRentalSql);
	$updateCarResult = mysqli_query($con, $updateCarSql);
	// Error checking
	if (!$updateRentalResult || !$updateCarResult) {
		die('Error updating rental or car table: ' . mysqli_error($con));
	}

	// Prepare the pop-up message
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
