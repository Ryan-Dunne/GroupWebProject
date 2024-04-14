<!--
•	Name of screen: returnlistbox.php 
•	Purpose of screen: php file to generate a listbox of all cars which are currently out on rental
•	|Student name:Abigail Murray|Student Number:C00260073|Date:March/April  2024|
-->

<?php

	include "db.inc.php"; // Database connection
	date_default_timezone_set('UTC');

	//SQL Query-- Retrieve information on cars that are currently out on rental
	//car is still out on rental if the actual return date is still null
	
$sql = "SELECT 
            car.registration,
            carType.modelName,
            carType.version,
            carType.engineSize,
            company.CompanyName,
            rental.dueReturnDate
        FROM rental
        INNER JOIN car ON rental.carID = car.carID
        INNER JOIN carType ON car.carTypeID = carType.carTypeID
        INNER JOIN company ON rental.CompanyID = company.CompanyID
        WHERE rental.actualReturnDate IS NULL";


	if (!$result = mysqli_query($con, $sql)) {//executes query, if query fails shows error message
		die('Error in querying the database: ' . mysqli_error($con));
	}

	//generates listbox of cars that are out on rental, populates on click 
	echo "<br><select name='returnslistbox' id='returnslistbox' onclick='populate()'>";

	//while loop fetches each row of the result set returned by the query
	while ($row = mysqli_fetch_array($result)) {
		$registration = $row['registration'];//assigns values from the fetched row to variables
		$modelName = $row['modelName'];
		$version = $row['version'];
		$engineSize = $row['engineSize'];
		$companyName = $row['CompanyName'];
		$dueReturnDate = $row['dueReturnDate'];
		$allText = "$registration,$modelName,$version,$engineSize,$companyName,$dueReturnDate";//concatenates to a string seperated 		by commas 
		echo "<option value='$allText'>$registration - $modelName</option>";
	}

	echo "</select>";//echoes HTML to end the <select> dropdown list
	mysqli_close($con); // Close database connection
?>


