<!--
    Ryan Dunne
    C00263405
    14/02/2024
-->

<?php
include 'db.inc.php';   //include database connection file
date_default_timezone_set("UTC");   //sets timezone for dob
echo "The details sent down are: <br>";

echo "First Name is :" . $_POST['fname'] . "<br>";
echo "Last Name is :" . $_POST['lname'] . "<br>";
echo "Date Of Birth :" . $_POST['dob'] . "<br>";
echo "Phone Number :" . $_POST['phone'] . "<br>";   //Echos variables sent to DB using POST
echo "Email Address :" . $_POST['email'] . "<br>";

$date = date_create($_POST['dob']);     //Creates Date from POST value

echo "Date of Birth is :" . date_format($date,"d/m/Y") . "<br>";    //Formats DOB

$sql = "Insert into persons (firstName,lastName,DOB,phoneNumber,emailAddress) 
VALUES ('$_POST[fname]','$_POST[lname]','$_POST[dob]','$_POST[phone]','$_POST[email]')";  //SQL Statement send POST values into the appropriate rows & tables

if (!mysqli_query($con,$sql)) //If there is an error...
{
    die ("An Error in the SQL Query: " . mysqli_error($con) ); //kills program & outputs an error
}

echo "<br>A record has  been added for " . $_POST['fname'] . " " . $_POST['lname'];    //Confirmation

mysqli_close($con); //Closes connection

?>

<form action = "CreateARecord.html" method = "POST">
<br>
    <input type="submit" value = "Return to Form Page"/>  <!--Return to Data Entry page-->

</form>