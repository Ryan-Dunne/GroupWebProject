<!--Name:       Ryan Dunne
    Student No: C00263405
    Date:       03/2024
    Purpose:    Allow User to make Rentals
-->
<?php
include 'db.inc.php';
include 'Rental.html.php';
date_default_timezone_set("UTC");


//Inserts Session Variables into Rental Table
$sql = "Insert into rental (CompanyID,carID,companyName,companyAddress,carReg,carName,rentalDate,dueReturnDate) 
VALUES ('$_SESSION[companyID]','$_SESSION[carID]','$_SESSION[companyName]','$_SESSION[address]','$_SESSION[carReg]','$_SESSION[carName]','$_SESSION[currentDate]','$_SESSION[returnDate]')";


if (!mysqli_query($con,$sql))
{
    die ("An Error in the SQL Query: " . mysqli_error($con) );
}



Session_unset(); //Unsets Session variables
mysqli_close($con); //Closes the SQL connection
?>
