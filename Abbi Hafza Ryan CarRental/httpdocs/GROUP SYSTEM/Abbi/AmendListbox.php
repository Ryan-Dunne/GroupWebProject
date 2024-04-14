<!--
•	Name of screen: AmendListbox.php 
•	Purpose of screen: This file is used to create a listbox for the cars in the database by registration
•	|Student name:Abigail Murray|Student Number:C00260073|Date: February/March 2024|
-->


<?php
	include "db.inc.php"; // Include database connection
	date_default_timezone_set('UTC');

	/*SQL query--retrieves information about cars from the car table and their corresponding car types from the carType table.
	Selects various columns from both tables using an INNER JOIN on the carTypeID.
    The WHERE clause filters out records where the deletedFlag column is set to 0 (car is not deleted).*/

	$sql = "SELECT car.carID, car.registration, car.currentStatus, car.chassisNumber, car.doors, car.price, car.dateAdded, 		  		car.bodyStyle, car.colour, carType.modelName, carType.version, carType.engineSize, carType.fuelType, carType.manufacturer 
	FROM car INNER JOIN carType  ON car.carTypeID = carType.carTypeID
	WHERE car.deletedFlag = 0"; 

	//execute sql query
	if (!$result = mysqli_query($con, $sql)) 
	{
		die ('Error in querying the database' . mysqli_error($con)); // Use die instead of echo to stop execution
	}

	//generating a listbox, calls the populate() function when clicked.
	echo "<br> <select name ='AmendListbox' id='AmendListbox' onclick='populate()'> "; 


	/*inside while loop, fetch each row of the result set as an associative array($row)
	Extracts fields from the row such as carID and assigns them to variables
	Concatenates all extracted fields into single string seperated by ','*/
	while ($row = mysqli_fetch_array($result)) {
		$id = $row['carID'];
		$registration = $row['registration'];
		$status = $row['currentStatus'];
		$chassis = $row['chassisNumber'];
		$doors = $row['doors'];
		$price = $row['price'];
		$date = date_create($row['dateAdded']);
		$date = date_format($date, "Y-m-d");
		$bodyStyle = $row['bodyStyle'];
		$colour = $row['colour'];
		$carType= $row['modelName'];
		$allText = "$id,$registration,$status,$chassis,$doors,$price,$date,$bodyStyle,$colour,$carType";
		
		echo "<option value= '$allText' > $registration</option>";
		/*generates an <option> element for each row of data in the dropdown list. 
		value of each option is set to $allText, and the displayed text is the car registration number.
		This loop continues until all rows of the result set have been processed*/
	}

	echo "</select>";
	mysqli_close($con); // Close database connection
?>