<!--File name: Returns.html.php 
    File Purpose: This is the form which allows a user to return a car from rentals
	User selects a car from listbox of all cars currently out on rental
	Related details are populated and penalty is charged if applicable.
	|Student name:Abigail Murray|Student Number:C00260073|Date: March/April 2024| 
-->

<?php session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"> <!--specifying character encoding for html document-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--defining the viewport to control the page's dimensions and scaling for different devices:-->
    <link rel="stylesheet" href="myStyle.css">
    <title>Return Car</title>
</head>

<body>
    <!--HEADER-->
	<div class="header">
    <h1>Return a Car</h1>
    <a href="Help.html"><img class="help-button" alt="help-button" src="images/helpbutton.png"></a>
    <img class="logo" alt="logo" src="images/godrivelogo.png">
    </div>
	
	<?php include 'menu.php'; ?> <!--including navbar -->
	
	
	<div class="column">
	<div class="returnCar">
    <h2>Please Select by Registration  </h2>
	<div class="form-group">
    <?php include 'returnlistbox.php'; ?> <!--generates a listbox of cars out on rental-->
	</div>
		
    <script>
		/*function to populate when user clicks on car from listbox of cars out on rental */
        
		function populate()
        {
            var sel = document.getElementById("returnslistbox");
            var result;
            result = sel.options[sel.selectedIndex].value;
			
            var carDetails = result.split(',');
            document.getElementById("registration").value = carDetails[0];//from car table
            document.getElementById("modelName").value = carDetails[1];//from carType table
            document.getElementById("version").value = carDetails[2];//from carType table
			document.getElementById("engineSize").value = carDetails[3];//from carType table
			document.getElementById("companyName").value = carDetails[4];//from company table
			document.getElementById("dueReturnDate").value = carDetails[5];//from rental table
		
        }
		
        /*confirm that they want to submit details to return the car*/
        function confirmCheck()
        {
            var response; 
            response = confirm('Are you sure you want to submit these details to return the car?');
            if (response)
            {
                
                document.getElementById("registration").disabled= false;
				document.getElementById("modelName").disabled= false;
				document.getElementById("version").disabled= false;
				document.getElementById("engineSize").disabled= false;
                document.getElementById("companyName").disabled= false;
				document.getElementById("duereturnDate").disabled= false;
		
                return true;
            }
            else {
                populate();
                return false;
            }
        }
        </script>
		
		<!-- JavaScript code to display pop-up message -->
		<script>
			// Check if the session variable 'popup_message' is set
			<?php if(isset($_SESSION['popup_message'])): ?>
			// Display the pop-up message
			alert("<?php echo $_SESSION['popup_message']; ?>");
			// Unset the session variable after displaying the message
			<?php unset($_SESSION['popup_message']); ?>
			<?php endif; ?>
		</script>
		
		<!-- returns form displayed-->
        <p id = "display"></p>
		
        <form name = "returnForm" action ="ReturnCar.php" onsubmit= "return confirmCheck()" method="post">
		
		<div class="form-group">	
        <label for ="registration">Registration Number</label>
        <input type="text" name="registration" id ="registration" disabled>
		</div>
		
		<div class="form-group">	
		<label for="modelName">Model Name</label>
		<input type="text" id="modelName" name="modelName" disabled>
		</div>
			
		<div class="form-group">	
		<label for="version">Version</label>
		<input type="text" id="version" name="version" disabled>
		</div>
		
		<div class="form-group">	
		<label for="engineSize">Engine Size</label>
		<input type="text" id="engineSize" name="engineSize" disabled>
		</div>
			
		<div class="form-group">	
		<label for="companyName">Company Name:</label>
		<input type="text" id="companyName" name="companyName" disabled>
		</div>
			
		<div class="form-group">
        <label for ="dueReturnDate">Date Due Back:</label>
        <input type="text" name="dueReturnDate" id ="dueReturnDate" disabled>
		</div>
		
		
		<div class="button-group">
			<button type="submit" value="Submit the record">Submit</button>
			<button type="reset">Reset</button><!-- adding in reset option if user woudld like to reset the fields-->
		</div>
			
</form>
</div><!--close returnCar-->
</div><!--close column-->
</body>
</html>

			
       