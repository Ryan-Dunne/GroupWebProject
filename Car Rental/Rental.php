<?php
include 'db.inc.php';
include 'Rental.html.php';
date_default_timezone_set("UTC");



$sql = "Insert into rental (CompanyID,carID,companyName,companyAddress,carReg,carName,rentalDate,dueReturnDate) 
VALUES ('$_SESSION[companyID]','$_SESSION[carID]','$_SESSION[companyName]','$_SESSION[address]','$_SESSION[carReg]','$_SESSION[carName]','$_SESSION[currentDate]','$_SESSION[returnDate]')";

//$updateCarTableSQL= "UPDATE car SET currentStatus = 'Unavailable' WHERE carID = '$_SESSION[carID]'";

//$updateCompanyTableSQL= "UPDATE company SET amountOwed = 'Unavailable' WHERE carID = '$_SESSION[carID]'";


if (!mysqli_query($con,$sql))
{
    die ("An Error in the SQL Query: " . mysqli_error($con) );
}

/*if(!mysqli_query($con,$updateCarTableSQL))
{
    die ("An Error in the update car Query: " . mysqli_error($con) );
}*/


Session_unset(); //Unsets Session variables
mysqli_close($con); //Closes the SQL connection

function popUpMsg()
{
    echo"<p class=popupmsg>" . $_SESSION['chosenCompanyID'] . " has been chosen </p>";
}

?>
