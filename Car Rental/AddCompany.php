<?php
include 'db.inc';
date_default_timezone_set("UTC");
echo "The details sent down are: <br>";

echo "Your Company unique ID is: " . $_POST['id'] . "<br>";
echo "Company name: " . $_POST['company'] . "<br>";
echo "Company Tele: " . $_POST['tele'] . "<br>";
echo "Address: " . $_POST['address'] . "<br>";
echo "Company Balance: " . $_POST['balance'] . "<br>";
echo "Company Credit: " . $_POST['credit'] . "<br>";


$sql = "Insert into company (CompanyID,CompanyName,Address,Balance,CreditLimit)
VALUES ('$_POST[id]','$_POST[company]','$_POST[address]','$_POST[balance]','$_POST[credit]')";

if (!mysqli_query($con,$sql))
{
    die ("An Error in the SQL Query: " . mysqli_error($con) );
}

echo "<br>A record has been added for " . $_POST['company'];

mysqli_close($con);

?>

<form action = "AddCompany.html" method = "POST">
<br>
    <input type="submit" value = "Return to Add Company Page"/>

</form>