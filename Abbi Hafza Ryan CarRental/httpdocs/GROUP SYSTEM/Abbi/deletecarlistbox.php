<!--
•	Name of screen:deletecarlistbox.php
•	Purpose of screen:file used for generating a delete carlistbox with fields from database
•	|Student name:Abigail Murray|Student Number:C00260073|Date: feb/March 2024|
-->

<?php

	include "db.inc.php" ; //database connection
	date_default_timezone_set('UTC');

	//SQL Query--retrieve car details from the car table and carType table using INNER JOIN for cars which are not deleted
	$sql = "SELECT car.carID, car.registration, car.colour, car.bodyStyle, car.doors, car.dateAdded, car.currentStatus,  				carType.modelName, carType.version, carType.engineSize, carType.fuelType, carType.manufacturer FROM car 
	INNER JOIN carType ON car.carTypeID = carType.carTypeID WHERE car.deletedFlag = 0";


	if (!$result = mysqli_query($con, $sql))//executes the SQL query, stores the result in the variable $result
	{
		die ('Error in querying the database' . mysqli_error($con));/*use die instead of echo so it stops */

	}

	//Generates listbox, onclick calls the JavaScript function populate() when the dropdown list is clicked.
	echo "<br> <select name ='deletecarlistbox' id='deletecarlistbox' onclick='populate()'> ";

	while($row = mysqli_fetch_array($result))//to fetch all rows in result set
	{//Inside the loop, extracts data from each row and assigns it to variables.
	//concatenates all the values into a single string separated by commas and assigns it to the variable $allText.
		$id = $row['carID'];
		$reg = $row['registration'];
		$colour = $row['colour'];
		$style = $row['bodyStyle'];
		$doors= $row['doors'];
		$dateAdded=$row['dateAdded'];
		$date = date_create($row['dateAdded']);
		$date = date_format($date,"Y-m-d");
		$status =$row['currentStatus'];
		$carType= $row['modelName'];
		$allText = "$id,$reg,$colour,$style,$doors,$date,$status,$carType";/*populates in this order*/
		echo "<option value= '$allText' > $reg </option>";
	}
	echo "</select>";
	mysqli_close($con);//closing connection to database

?>