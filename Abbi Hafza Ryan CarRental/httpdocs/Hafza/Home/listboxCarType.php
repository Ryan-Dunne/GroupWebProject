<?php
include "db.inc.php";

date_default_timezone_set('UTC');

$sql = "SELECT carTypeID,modelName,version,engineSize,fuelType,manufacturer  FROM carType where DeleteFlag=0"; //deleteFlag marks things for deletion instead of actually deleting them

if (!$result = mysqli_query($con, $sql)) { //if we cant connect to the database
	die("Error connecting to the database" . mysqli_error($con));
}
 
//otherwise, succesful connection to the database
echo "<br><select name='listbox' id ='listbox' onclick ='populate()' >";

while ($row = mysqli_fetch_array($result)) {	//while there are rows left in the table in db
	$carTypeID = $row['carTypeID'];
	$modelName = $row['modelName'];
	$version = $row['version'];
	$engineSize = $row['engineSize'];
	$fuelType = $row['fuelType'];
	$manufacturer = $row['manufacturer'];
	$alltext = "$carTypeID,$modelName,$version,$engineSize,$fuelType,$manufacturer";
	echo "<option value ='$alltext'> $carTypeID $modelName</option>";
}

echo "</select>";
mysqli_close($con);

?>