<!--DeleteCar.html.php 
This is the form which allows a user to delete a car from the database 

Will need to create a listbox of all the cars on the database and let user select from the listbox, the car they would like to delete.

Student name: Abigail Murray 
Student Num: C00260073
-->
<?php session_start();
?>

<html lang="en">
<head>
    <meta charset="utf-8"> <!--specifying character encoding for html document-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--defining the viewport to control the page's dimensions and scaling for different devices:-->
    <!-- LINKING CSS Styles sheet-->
    <link rel="stylesheet" href="style.css">
    <title>Delete Car</title>
</head>

<body>
    <!--HEADER-->
	<div class="header">
    <h1>Car Menu: Delete</h1>
    <a href="Help.html">
        <img class="help-button" alt="help-button" src="images/helpbutton.png">
    </a>
        <img class="logo" alt="logo" src="images/godrivelogo.png">
    </div>
	
    <!--NAVIGATION BAR (these links are to screens we have been allocated except for login and exit) -->
    <div class="navbar">
    <a href="home.html">Home Page <img class="home-icon" src="images/home_icon.png" alt="Home icon"></a>
    <a href="#login">Login <img class="login-icon" src="images/login_icon.png" alt="Login icon"></a>
	<div class="dropdown">
    <button class="dropbtn">Company<img class="arrow" src="images/arrow.png"></button>
    	<div class="dropdown-content">
        	<a href="#">Add Company</a>
            <a href="#">Delete Company</a>
            <a href="#">Amend/view Company</a>
        </div><!--close dropdown-content-->
    </div><!--close dropdown-->	
			
	<div class="dropdown">
    <button class="dropbtn">Car <img class="arrow" src="images/arrow.png"></button>
    	<div class="dropdown-content">
        	<a href="AddCar.html.php">Add A Car</a>
            <a href="DeleteCar.html.php">Delete A Car</a>
            <a href="AmendCar.html.php">Amend/view A Car</a>
        </div><!--close dropdown-content-->
    </div><!--close dropdown-->

	<div class="dropdown">
    <button class="dropbtn">Car Type<img class="arrow" src="images/arrow.png"></button>
    	<div class="dropdown-content">
          	<a href="#">Add New Car Type</a>
            <a href="#">Delete Car Type</a>
            <a href="#">Amend/View Car Type</a>
        </div><!--close dropdown-content-->
    </div><!--close dropdown-->
		
	<a href="#">Rentals </a>	
	<a href="#">Rental Report </a>	
	<a href="#">Returns </a>	
	<a href="#exit">Exit <img class="exit-icon" src="images/exit_icon.png" alt="Exit icon"></a>
    </div>
<!------------------------------close navbar------------------------------------------------------------------>
	<div class="deleteCar">
    <h1>Delete a Car</h1>
    <h4>Please select a car registration and then click delete button to delete</h4>
		

    <?php include 'deletecarlistbox.php'; ?>

    <script>
		/*function to populate when user clicks on car from listbox */
        function populate()
        {
            var sel = document.getElementById("deletecarlistbox");
            var result;
            result = sel.options[sel.selectedIndex].value;
            var carDetails = result.split(',');
           // document.getElementById("display").innerHTML = "The details of the selected car are :" + result;
            document.getElementById("delid").value = carDetails[0];
            document.getElementById("delregistration").value = carDetails[1];
            document.getElementById("delcolour").value = carDetails[2];
			document.getElementById("delbodyStyle").value = carDetails[3];
			document.getElementById("deldoors").value = carDetails[4];
			document.getElementById("deldateAdded").value = carDetails[5];
			document.getElementById("delcurrentstatus").value = carDetails[6];
			document.getElementById("delcarType").value = carDetails[7];
        }
        /*confirm that they want to delete*/
        function confirmCheck()
        {
            var response; 
            response = confirm('Are you sure you want to delete this Car?');
            if (response)
            {
                document.getElementById("delid").disabled= false;
                document.getElementById("delregistration").disabled= false;
				document.getElementById("delcolour").disabled= false;
				document.getElementById("delbodyStyle").disabled= false;
				document.getElementById("deldoors").disabled= false;
                document.getElementById("deldateAdded").disabled= false;
				document.getElementById("delcurrentstatus").disabled= false;
				document.getElementById("delcarType").disabled= false;
                return true;
            }
            else {
                populate();
                return false;
            }
        }
        </script>
	<!-- user form displayed-->
		
        <p id = "display"></p>
        <form name = "deleteForm" action ="DeleteCar.php" onsubmit= "return confirmCheck()" method="post">
		
		<div class="form-group">
        <label for= "delid">Car ID</label>
        <input type="text" name="delid" id ="delid" disabled>
		</div>
			
		<div class="form-group">	
        <label for ="delregistration">Registration Number</label>
        <input type="text" name="delregistration" id ="delregistration" disabled>
		</div>
		
		<div class="form-group">
        <label for ="delcolour">Colour</label>
        <input type="text" name="delcolour" id ="delcolour" disabled>
		</div>
			
		<div class="form-group">
        <label for ="delbodyStyle">Body Style</label>
        <input type="text" name="delbodyStyle" id ="delbodyStyle" disabled>
		</div>
			
		<div class="form-group">
        <label for ="deldoors">Number of Doors</label>
        <input type="text" name="deldoors" id ="deldoors" disabled>
		</div>
			
		<div class="form-group">
        <label for ="deldateAdded">Date Added to Fleet</label>
        <input type="text" name="deldateAdded" id ="deldateAdded" disabled>
		<div class="form-group">
			
		<div class="form-group">	
        <label for ="delcurrentstatus">Current Status</label>
        <input type="text" name="delcurrentstatus" id ="delcurrentstatus" disabled>
		<div class="form-group">
			
		<div class="form-group">
		<label for="delcarType">Car Type</label>
		<select name="delcarType" id="delcarType" disabled>
		<?php include 'carTypeListbox.php';?><!--this php file generates listbox-->
       <div class="form-group">
		
		<div class="button-group">
        <input type="submit" value ="Delete the record" >
	 	</div>
		</div>
        <?php /*message for deleted record */
            if (ISSET($_SESSION["carID"])) {echo "<h1 class='myMessage'>Record deleted for " .$_session["carID"] . " " .$_SESSION["registration"] . "</h1>" ;}
            session_destroy();
        ?>
        </body>
        </html>