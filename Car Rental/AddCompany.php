<?php
include 'db.inc';
date_default_timezone_set("UTC");
echo "The details sent down are: <br>";

$companyID = generateID();

echo "Your Company unique ID is: " . $companyID . "<br>";
echo "Company name: " . $_POST['company'] . "<br>";
echo "Address: " . $_POST['address'] . "<br>";
echo "Company Tele: " . $_POST['tele'] . "<br>";
echo "Company Web Address: " . $_POST['web'] . "<br>";
echo "Company Email Address: " . $_POST['email'] . "<br>";
echo "Company Credit Limit: " . $_POST['credit'] . "<br>";


$sql = "Insert into company (CompanyID,CompanyName,Address,Telephone,WebAddress,EmailAddress,CreditLimit)
VALUES ('$companyID','$_POST[company]','$_POST[address]','$_POST[tele]','$_POST[web]','$_POST[email]','$_POST[credit]')";

if (!mysqli_query($con,$sql))
{
    die ("An Error in the SQL Query: " . mysqli_error($con) );
}

echo "<br>A record has been added for " . $_POST['company'];

mysqli_close($con);


function generateID()
{
    include 'db.inc';

   $id = rand(0,1000000);
   $sql = "SELECT * FROM company WHERE CompanyID = $id";
   if(mysqli_query($con,$sql) != null)
   {
   $id = rand(0,1000000);
   }
   return $id;
}

?>

<form action = "AddCompany.html" method = "POST">
<br>
    <input type="submit" value = "Return to Add Company Page"/>

</form>