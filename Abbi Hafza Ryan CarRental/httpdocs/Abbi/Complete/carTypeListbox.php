<!--carTypeListbox.php
This is the php file which connects to the cartype table in the database and generates a listbox for AddCar.html.php
|studentname: abigail murray|student number: c00260073|Date:jan/feb-->

<?php 

	include "db.inc.php"; //allows us to connect + checks connection
	date_default_timezone_set('UTC');


	// Retrieve car type data from carType in the database
 	$sql = "SELECT modelName, version, engineSize, fuelType, manufacturer FROM carType"; 
 	$result = $con->query($sql);

	// Generate options for the select dropdown
	if ($result->num_rows > 0) //checks if query result contains one or more rows.
	{
		while($row = $result->fetch_assoc())//fetches each row of the result set as an associative array + assigns it to $row.
										//The while loop iterates through each row of the result set.
		{
				echo "<option value=\"" . $row["modelName"] . "\">" . $row["modelName"] . " - " . $row["version"] . " - " . 					$row["engineSize"] . " - " . $row["fuelType"] . " - " . $row["manufacturer"] . "</option>";
		}
	} 
	else //no rows found/no car types data found
	{
	  	echo "<option value=\"\">No car types available</option>";//error checking
	}


	$con->close();// Close the database connection
?>