<!--HTML SHEET FOR ADDING A COMPANY-->
<!DOCTYPE html>
<html lang="en">

<!---------------------------------------------------------------------------------------------------------------->

<?php include 'RentalCarListbox.php'; ?>  <!--Includes listbox file -->
<script>
    populate();
</script>

<p id ="display"> </p>

<form name = "myForm" class="form" action="Rental.html.php" method="POST">  <!--Calls confirmCheck() & Sends values to AmendView.php if true -->

    <input type="hidden" id="companyID" name="companyID">

    <label for="companyName">Company Name</label>
    <input type="text" name="companyName" id="companyName" disabled>       <!--Defaults all input fields as disabled -->

    <label for= "companyAddress">Address</label>
    <input type="text" name="address" id="address" disabled>

    <label for="credit">Credit Limit</label>
    <input type="text" name="credit" id="credit" disabled>

    <label for="amountOwed">Amount Owed</label>
    <input type="text" name="amountOwed" id="amountOwed" disabled>



    <br><br>

    <input type="submit" value="Choose Company" id="chooseCompany" name="chooseCompany" onclick="submitFields()">
    <br><br>

<?php
if(isset($_POST["chooseCompany"]))
{
$_SESSION['companyID'] = $_POST['companyID'];
$_SESSION['companyName'] = $_POST['companyName'];
$_SESSION['address'] = $_POST['address'];
$_SESSION['credit'] = $_POST['credit'];
$_SESSION['amountOwed'] = $_POST['amountOwed'];

include 'RentalCarListbox.html.php';
}
?>
</form>

 
</body>
</html>