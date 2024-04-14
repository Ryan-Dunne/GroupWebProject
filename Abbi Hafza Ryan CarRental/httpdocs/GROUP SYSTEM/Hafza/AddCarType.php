<?php include 'db.inc.php';
session_start();
 // Including the database configuration file and setting the timezone

date_default_timezone_set("UTC");

// SQL query to get the highest id so we can add to it
$sql = "SELECT MAX(carTypeID) AS highest_carTypeID
FROM carType";


// Executing the SQL query to get the highest id
if (!mysqli_query($con, $sql)){
	die ("An error occured in the SQL QUERY: " . mysqli_error($con) );
}

else
{
	$result = mysqli_query($con, $sql);

	// Fetch the result
	$row = mysqli_fetch_assoc($result);

	// increment the highest id by 1
	$_SESSION['highest_carTypeID'] = $row['highest_carTypeID'];
	$_SESSION['new_carTypeID'] = $_SESSION['highest_carTypeID'] + 1;

}

// Displaying details obtained from the form
echo "modelName is : " . $_POST['modelName']. "<br>";
echo "verison is : " .$_POST['version'] . "<br>";
echo "engine sz is : " .$_POST['engineSize'] . "<br>";
echo "fuel is : " .$_POST['fuelType'] . "<br>";
echo "manufac : " .$_POST['manufacturer'] . "<br>";


//SQL query to insert the form data into the database
$sql2 = "Insert into carType (carTypeID,modelName,version,engineSize,fuelType,manufacturer) VALUES ('$_SESSION[new_carTypeID]', '$_POST[modelName]', ' $_POST[version]', '$_POST[engineSize]', '$_POST[fuelType]', '$_POST[manufacturer]')";


// Executing the SQL query
if (!mysqli_query($con, $sql2)){
	die ("An error occured in the SQL QUERY: " . mysqli_error($con) );
}

else
{
	// Echo out the value
	echo "succesfully sent a new entry";

}

mysqli_close($con);	
?>

<!-- Form to return to the insert page -->
<form action="AddCarType.html" method="Post" >
	<br>
	<input type="submit" value = "Return to Insert Page">
</form>