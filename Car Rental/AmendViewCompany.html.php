<!--Name:       Ryan Dunne
    Student No: C00263405
    Date:       03/2024
    Purpose:    Screen to Amend/View Companies
-->
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/AmendViewCompany.css">   <!--Import css stylesheet-->
<script src="AmendViewCompany.js"></script>  <!--Import javascript functionality-->
</head>
<body>
<body class="background">
    <!--HEADER-->
    <div class="header">
        <h1>Amend / View A Company</h1>
            <img class="help-button" alt="help-button" src="images/helpbutton.png" onclick="helpMenu()">
        </a>
        <img class="logo" alt="logo" src="images/godrivelogo.png">
    </div>
    <!--NAVIGATION BAR -->
    <div class="navbar">
        <a href="home.html">Home Page</a>
        <a href="#login">Login</a>

        <div class="dropdown">
            <button class="dropbtn">Rentals
                <img class="arrow" src="images/arrow.png">
            </button>
            <div class="dropdown-content">
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
            </div><!--close dropdown-content-->
        </div><!--close dropdown-->

        <div class="dropdown">
            <button class="dropbtn">Returns
                <img class="arrow" src="images/arrow.png">
            </button>
            <div class="dropdown-content">
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
            </div><!--close dropdown-content-->
        </div><!--close dropdown-->

        <div class="dropdown">
            <button class="dropbtn">Accept Payments
                <img class="arrow" src="images/arrow.png">
            </button>
            <div class="dropdown-content">
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
            </div><!--close dropdown-content-->
        </div><!--close dropdown-->

        <div class="dropdown">
            <button class="dropbtn">Blacklist Menu
                <img class="arrow" src="images/arrow.png">
            </button>
            <div class="dropdown-content">
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
            </div><!--close dropdown-content-->
        </div><!--close dropdown-->

        <div class="dropdown">
            <button class="dropbtn">Reports Menu
                <img class="arrow" src="images/arrow.png">
            </button>
            <div class="dropdown-content">
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
            </div><!--close dropdown-content-->
        </div><!--close dropdown-->

        <div class="dropdown">
            <button class="dropbtn">File Maintenance Menu
                <img class="arrow" src="images/arrow.png">
            </button>
            <div class="dropdown-content">
                <a href="AddCompany.html.php">Add a Company</a>
                <a href="AmendViewCompany.html.php">Amend a Company</a>
                <a href="DeleteCompany.html.php">Delete a Company</a>
                <a href="Rental.html.php">Rentals</a>
            </div><!--close dropdown-content-->
        </div><!--close dropdown-->

        <div class="dropdown">
            <button class="dropbtn">Set-Up
                <img class="arrow" src="images/arrow.png">
            </button>
            <div class="dropdown-content">
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
            </div><!--close dropdown-content-->
        </div><!--close dropdown-->

        <a href="#exit">Exit <img class="exit-icon" src="images/exit_icon.png" alt="Exit icon"></a>
    </div><!--close navbar-->

<div class="banner">

<h4 id="listboxHeader">Please select a Company and then click the amend button if you wish to update</h4>
</div>
<?php include 'AmendViewListbox.php'; ?>  <!--Includes listbox file -->

<p id ="display"> </p>

<form class="form" action="AmendViewCompany.php" onsubmit="return confirmCheck()"  method ="post">  <!--Calls confirmCheck() & Sends values to AmendView.php if true -->

    <input type="hidden" name="companyID" id="companyID">
    <label for="companyName">Company Name</label>
    <input type="text" name="companyName" id="companyName" placeholder="Company Name" required pattern="[a-z\-\& A-Z0-9]{2,}" title="Omit apostrophes & special characters" disabled>  <br><br>     <!--Defaults all input fields as disabled -->
    <label for="address">Address</label>
    <input type="text" name="address" id="address" placeholder="123 Maple Road, Carlow" required pattern="[0-9a-z\-\&, A-Z]{6,}"  title="Omit apostrophes & special characters" disabled> <br><br>
    <label for= "phone">Phone No.</label>
    <input type="text" name="phone" id="phone" placeholder="(353)0852841923" required pattern="[0-9\(\)\-]{7,}" title="Enter a valid phone number" disabled> <br><br>
    <label for= "webAddress">Web Address</label>
    <input type="text" name="webAddress" id="webAddress" placeholder="yourcompany.com" pattern="[A-Za-z0-9.\-]+\.[a-z]{2,}$" title="Enter a valid web address" disabled> <br><br> <!--Increments/Decrements by 0.01-->
    <label for= "email">Email</label>
    <input type="text" name="email" id="email" placeholder="yourname@gmail.com" required pattern="[a-zA-Z0-9._%+\-]+@[a-z0-9.\-]+\.[a-zA-Z]{2,}"title="Enter a valid Email" required disabled> <br><br>
    <label for= "creditLimit">Credit Limit</label>
    <input type="number" name="creditLimit" id="creditLimit" min="0.0" disabled> <br><br>
    <label for= "amountOwed">Amount Owed</label>
    <input type="text" name="amountOwed" id="amountOwed" disabled> 
    <label for= "blacklistFlag">Blacklist Flag</label>
    <input type="text" name="blacklistFlag" id="blacklistFlag" disabled> 
    <label for= "previousBlacklists">No. Of Previous Blacklists</label>
    <input type="text" name="previousBlacklists" id="previousBlacklists" disabled> 
    
    
    <br><br><br><br>
    

    <!--Form buttons, toggleLock() enables and disables Submit button-->
    <input type="submit" class="button" id="submit" value="Save Changes" disabled> <input type = "button" id="amendviewbutton" value="Amend Details" onclick="toggleLock()">
</form>
<div>

<?php
if(isset($_POST['submit'])) //check if form was submitted
{ 
    echo"<p class=popupmsg>A record for:" . $_SESSION['companyName'] . " has been modified:  </p>"; //Popup upon completion
}?>   
</div>

</body>
</html>