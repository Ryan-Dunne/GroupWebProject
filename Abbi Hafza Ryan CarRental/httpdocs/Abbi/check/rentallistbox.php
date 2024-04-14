<!--rentallistbox.php
 php file to generate a listbox of all cars which are currently out on rental
|Student Name: Abigail Murray|Student Number: C00260073| Date: march/april 2024
-->


<?php

	include "db.inc.php"; // Database connection
	date_default_timezone_set('UTC');

/* Get values for cars that are currently on rental */
/*car is still out on rental if the actual return date is still null*/
$sql= "SELECT car.registration, carType.modelName, carType.version, carType.engineSize, company.CompanyName, rental.dueReturnDate
        FROM rental
        INNER JOIN `rental/car` ON rental.rentalID = `rental/car`.rentalID
        INNER JOIN car ON `rental/car`.carID = car.carID
        INNER JOIN carType ON car.carTypeID = carType.carTypeID
        INNER JOIN company ON rental.CompanyID = company.CompanyID
        WHERE rental.actualReturnDate IS NULL";

if (!$result = mysqli_query($con, $sql)) {
    die('Error in querying the database: ' . mysqli_error($con));
}

echo "<br><select name='returnslistbox' id='returnslistbox' onclick='populate()'>";

while ($row = mysqli_fetch_array($result)) {
    $registration = $row['registration'];
    $modelName = $row['modelName'];
    $version = $row['version'];
    $engineSize = $row['engineSize'];
    $companyName = $row['CompanyName'];
    $dueReturnDate = $row['dueReturnDate'];
    $allText = "$registration,$modelName,$version,$engineSize,$companyName,$dueReturnDate";
    echo "<option value='$allText'>$registration - $modelName</option>";
}

echo "</select>";
mysqli_close($con); // Close database connection
?>


