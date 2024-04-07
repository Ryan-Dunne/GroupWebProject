<!--Name:       Ryan Dunne
    Student No: C00263405
    Date:       03/2024
    Purpose:    SQL statement to add a company to DB & Unique ID generation
-->
<?php
include 'db.inc.php'; //includes file to connect to DB
include 'AddCompany.html.php'; //Includes file to restore html elements

$companyID = generateID();  //Creates ID for company entry

$sql = "Insert into company (CompanyID,CompanyName,Address,Telephone,WebAddress,EmailAddress,CreditLimit) 
VALUES ('$companyID','$_SESSION[company]','$_SESSION[address]','$_SESSION[tele]','$_SESSION[web]','$_SESSION[email]','$_SESSION[credit]')";

if (!mysqli_query($con,$sql)) //If query throws an error...
{
    die ("An Error in the SQL Query: " . mysqli_error($con) ); //Displays error
}


Session_unset(); //Unsets Session variables
mysqli_close($con); //Closes the SQL connection


function generateID()
{
    include 'db.inc.php'; //includes DB Connection

   $id = rand(0,1000000); //Generates a random number between 0 & 1000000
   $sql = "SELECT * FROM company WHERE CompanyID = $id"; //SQL Statement for query
   while(mysqli_query($con,$sql) == $id) //While the unique ID equals an ID in the DB...
   {
   $id = rand(0,1000000); //Generate a new ID
   }
   return $id; //Returns ID if it is not found in DB
}

?>
