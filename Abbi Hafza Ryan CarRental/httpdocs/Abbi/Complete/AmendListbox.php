<?php
include "db.inc.php"; // Include database connection
date_default_timezone_set('UTC');

$sql = "SELECT car.carID, car.registration, car.currentStatus, car.chassisNumber, car.doors, car.price, car.dateAdded, car.bodyStyle, car.colour, carType.modelName, carType.version, carType.engineSize, carType.fuelType, carType.manufacturer 
        FROM car 
        INNER JOIN carType  ON car.carTypeID = carType.carTypeID
        WHERE car.deletedFlag = 0"; // car type information from carType table
if (!$result = mysqli_query($con, $sql)) {
    die ('Error in querying the database' . mysqli_error($con)); // Use die instead of echo to stop execution
}

echo "<br> <select name ='AmendListbox' id='AmendListbox' onclick='populate()'> "; // Generate listbox

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
    $allText = "$id,$registration,$status,$chassis,$doors,$price,$date,$bodyStyle,$colour,$carType"; // Include car type in the concatenated string
    echo "<option value= '$allText' > $registration</option>";
}

echo "</select>";
mysqli_close($con); // Close database connection
?>