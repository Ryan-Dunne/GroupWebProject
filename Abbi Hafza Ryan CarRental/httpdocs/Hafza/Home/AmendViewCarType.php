<!--Student Name: Hafza Abdullahi
	Student Number: C00286249
	Date: 07/03/2024
	Title: Lab 5 Task 2
-->
<?php
include "db.inc.php";

date_default_timezone_set('UTC');


$sql = "UPDATE carType SET modelName = '$_POST[am_modelName]', 
		version = '$_POST[am_version]', 
		engineSize = '$_POST[am_engineSize]',
		fuelType = '$_POST[am_fuelType]',
		manufacturer = '$_POST[am_manufacturer]'
		WHERE carTypeID = '$_POST[am_carTypeID]' ";

if(!mysqli_query($con, $sql)){	//if connection is not succesful
	echo "ERROR ".mysqli_error($con);
}
else{
	if(mysqli_affected_rows($con) != 0){ //if a an entry is found
		
		echo mysqli_affected_rows($con)." record(s) updated <br>";
		echo "carTypeID" . $_POST['am_carTypeID']. ", " . $_POST['am_modelName'] .
		" " . $_POST['am_version'] . " has been updated";
	}
	else{
		"ERROR ".mysqli_error($con);
		echo "No records were changed";
	
	}
}
mysqli_close($con);
?>

<form action="AmendViewCarType.html.php" method="POST">
	<input type="submit" value="Return to Previous Screen">
</form>