<?php
include 'db.inc';
include 'AddCompany.html.php';
session_start();
date_default_timezone_set("UTC");

$companyID = generateID();
$companyName = $_SESSION['company'];


$sql = "Insert into company (CompanyID,CompanyName,Address,Telephone,WebAddress,EmailAddress,CreditLimit)
VALUES ('$companyID','$companyName','$_SESSION[address]','$_SESSION[tele]','$_SESSION[web]','$_SESSION[email]','$_SESSION[credit]')";

if (!mysqli_query($con,$sql))
{
    die ("An Error in the SQL Query: " . mysqli_error($con) );
}



mysqli_close($con);


function generateID()
{
    include 'db.inc';

   $id = rand(0,1000000);
   $sql = "SELECT * FROM company WHERE CompanyID = $id";
   while(mysqli_query($con,$sql) == $id)
   {
   $id = rand(0,1000000);
   }
   return $id;
}

?>
