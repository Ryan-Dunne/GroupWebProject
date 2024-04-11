<!--Name:       Ryan Dunne
    Student No: C00263405
    Date:       03/2024
    Purpose:    Screen to add a company to DB
-->
<!--HTML SHEET FOR ADDING A COMPANY-->
<!DOCTYPE html>
<html lang="en">
<?php
session_start();  //Starts PHP Session to check for SESSION variables
?>
<head>
    <meta charset="utf-8"> <!--specifying character encoding for html docu-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--defining the viewport to control the page's dimensions and scaling for different devices:-->
    <!-- LINKING CSS Styles sheet-->
    <link rel="stylesheet" href="css/AddCompany.css">
    <script src="AddCompany.js"></script>
    <title>Add A Company </title>
    <?php include "navbar.html"; ?>
</head>



<!------------------START OF FORM--------------------------------------------------------------------------->


            <form action="AddCompany.php" class="form" method="POST"  onsubmit="return confirmSubmit()"> <!--Sends data to AddCompany.php & asks user for confirmation-->

                <label for="company">Company name:</label><br>
                <input type="text" id="company" name="company" placeholder="Company Name" required pattern="[a-z\-\& A-Z0-9]{2,}" title="Omit apostrophes & special characters"><br>

                <label for="address">Company Address:</label><br>
                <input type="text" id="address" name="address" placeholder="123 Maple Road, Carlow" required pattern="[0-9a-z\-\&, A-Z]{6,}"  title="Omit apostrophes & special characters"><br>

                <label for="tele">Company Telephone No:</label><br>
                <input type="tel" id="tele" name="tele" placeholder="(353)0852841923" required pattern="[0-9\(\)\-]{7,}" title="Enter a valid phone number"><br>

                <label for="web">Company Web Address:</label><br>
                <input type="text" id="web" name="web" placeholder="yourcompany.com" pattern="[A-Za-z0-9.\-]+\.[a-z]{2,}$" title="Enter a valid web address"><br>

                <label for="email">Company Email Address:</label><br>
                <input type="email" id="email" name="email" placeholder="yourname@gmail.com" required pattern="[a-zA-Z0-9._%+\-]+@[a-z0-9.\-]+\.[a-zA-Z]{2,}"title="Enter a valid Email"><br>

                <label for="text">Company Credit Limit:</label><br>
                <input type="number" id="credit" name="credit" value="1000" min="0"required pattern="[0-9]{1,}"><br>


                <input type="Submit" value="Submit" id="Submit" name="Submit"> <input type="reset" id="reset" value="Clear" onclick="submitFields()">
            </form>


    <div>

                <?php
                if(isset($_POST['Submit'])) //check if form was submitted
                { 
                    $_SESSION['company']=$_POST['company'];
                    $_SESSION['address']=$_POST['address'];
                    $_SESSION['tele']=$_POST['tele'];               //Sets form data as session data using POST
                    $_SESSION['web']=$_POST['web'];
                    $_SESSION['email']=$_POST['email'];
                    $_SESSION['credit']=$_POST['credit'];

                    echo"<p class=popupmsg>A record has been added for: " . $_SESSION['company'] . "</p>"; //Popup displayed to user

                }?>   
    </div>
</body>

</html>