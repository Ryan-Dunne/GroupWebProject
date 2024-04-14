<!--Name:       Ryan Dunne
    Student No: C00263405
    Date:       03/2024
    Purpose:    Allow User to make Rentals
-->
<!DOCTYPE html>
<html lang="en">
<?php
include 'db.inc.php'; //DB Connection
session_start();    //Starts Session
?>
<head>
    <meta charset="utf-8"> <!--specifying character encoding for html docu-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--defining the viewport to control the page's dimensions and scaling for different devices:-->
    <!-- LINKING CSS Styles sheet-->
    <link rel="stylesheet" href="css/Rental.css">
    <script src="Rental.js"></script>
    <title>Rentals </title>
    <h1 class="header">Rentals</h1>
    <?php include "navbar.html"; ?>
</head>

<!---------------------------------------------------------------------------------------------------------------->

<?php include 'RentalCompanyListbox.php'; ?>  <!--Includes listbox file -->
<script>
    populate(); //Populates Formfields
</script>

<form name = "myForm" class="form" action="Rental.php" method="POST" onsubmit='confirmSubmit()'>  <!--Calls confirmSubmit() & Sends values to AmendView.php if true -->

    <input type="hidden" id="companyID" name="companyID">

    <label for="companyName">Company Name</label> 
    <input type="text" name="companyName" id="companyName" disabled>       <!--Defaults all input fields as disabled -->

    <label for= "companyAddress">Address</label>
    <input type="text" name="address" id="address" disabled>

    <label for="credit">Credit Limit</label>
    <input type="text" name="credit" id="credit" disabled>

    <label for="amountOwed">Amount Owed</label>
    <input type="text" name="amountOwed" id="amountOwed" disabled>

    <?php include 'RentalCarTable.html.php'; ?> <!--Includes -->

    <br><br>

</form>

 
</body>
</html>