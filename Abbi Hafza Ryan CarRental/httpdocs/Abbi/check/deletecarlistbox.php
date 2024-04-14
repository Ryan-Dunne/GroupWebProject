<?php


/*student name: Abigail Murray
student number:C00260073
file used for generating a delete carlistbox with fields from database*/ 


include "db.inc.php" ; //database connection
date_default_timezone_set('UTC');

/*get values for users who are not deleted*/
$sql = "SELECT car.carID, car.registration, car.colour, car.bodyStyle, car.doors, car.dateAdded, car.currentStatus,  carType.modelName, carType.version, carType.engineSize, carType.fuelType, carType.manufacturer FROM car 
INNER JOIN carType ON car.carTypeID = carType.carTypeID WHERE car.deletedFlag = 0";


//$sql = "SELECT car.carID, car.registration, car.currentStatus, car.chassisNumber, car.doors, car.price, car.dateAdded, //car.bodyStyle, car.colour, carType.modelName, carType.version, carType.engineSize, carType.fuelType, carType.manufacturer 
      //  FROM car 
      //  INNER JOIN carType  ON car.carTypeID = carType.carTypeID
      //  WHERE car.deletedFlag = 0"; // car type information from carType table

if (!$result = mysqli_query($con, $sql))/*error in connecting*/
{
    die ('Error in querying the database' . mysqli_error($con));/*use die instead of echo so it stops */

}

echo "<br> <select name ='deletecarlistbox' id='deletecarlistbox' onclick='populate()'> ";//generates listbox

while($row = mysqli_fetch_array($result))//to fetch all rows in result set
{
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