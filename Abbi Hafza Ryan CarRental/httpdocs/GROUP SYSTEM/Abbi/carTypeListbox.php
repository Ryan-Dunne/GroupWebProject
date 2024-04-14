<!--
•	Name of screen: carTypeListbox.php
•	Purpose of screen: This is the php file which connects to the cartype table in the database and generates a listbox for 			AddCar.html.php
•	|Student name:Abigail Murray|Student Number:C00260073|Date: January/ February 2024|
-->

<?php 

	include "db.inc.php"; //allows us to connect + checks connection
	date_default_timezone_set('UTC');

	
	//SQL query-- retrieve data from the carType table in the database.
 	$sql = "SELECT modelName, version, engineSize, fuelType, manufacturer FROM carType"; 
 	
	//query is executed using mysqli_query and the result is stored in $result
	$result = mysqli_query($con, $sql);

	// Generate options for the select dropdown
	if (mysqli_num_rows($result) > 0) // Check if the query result contains one or more rows
	{
		while($row = mysqli_fetch_assoc($result)) ////If are rows in the result set,enters while loop and iterates through each row.
		{
			// Output an option element for each row, containing information about car types
			echo "<option value=\"" . $row["modelName"] . "\">" . $row["modelName"] . " - " . $row["version"] . " - " . 						$row["engineSize"] . " - " . $row["fuelType"] . " - " . $row["manufacturer"] . "</option>";
		}
	} 
	else // If no rows are found
	{
		// Output an option element with a message indicating no car types are available
		echo "<option value=\"\">No car types available</option>";
	}

	mysqli_close($con); // Close the database connection

	

?>