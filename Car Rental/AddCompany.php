<?php
include 'db.inc';
date_default_timezone_set("UTC");
// echo "The details sent down are: <br>";

$companyID = generateID();


$sql = "Insert into company (CompanyID,CompanyName,Address,Telephone,WebAddress,EmailAddress,CreditLimit)
VALUES ('$companyID','$_POST[company]','$_POST[address]','$_POST[tele]','$_POST[web]','$_POST[email]','$_POST[credit]')";

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
   while(mysqli_query($con,$sql) != null)
   {
   $id = rand(0,1000000);
   }
   return $id;
}

?>
